<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Session;

use GuzzleHttp\Client;

use View;

class AjaxController extends Controller
{

    // $location = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));

    // $user_country = $location['geoplugin_countryName'];

public function defaultDatas()
{
 
    // $location = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));

    // $user_country = $location['geoplugin_countryName'];
        

        $user_country = 'India';

        $staycation_cities = DB::table("T_idsRegions_enUS")
        ->select('ProvinceName')
        ->where('ProvinceName','!=','')
        ->where('CountryName',"$user_country")
        ->limit(5)
        // ->distinct('ProvinceName')
        ->inRandomOrder()
        ->get()
        ->toArray();

    $suggestCities = DB::table("T_idsRegions_enUS")
    ->select('RegionID','CityName','ProvinceName','CountryName')
    ->where('CityName','!=','')
    ->whereOr('CountryName','=',"$user_country")
    ->where('CountryName','like',"$user_country")
    ->distinct('CityName')
    ->get()
    ->toArray();
// dd($staycation_cities);

    $hotels =  array();

    if(!empty($staycation_cities)){
    $hotels = DB::table("T_summary_data_enUS")
    ->select('heroImage','propertyName','city','country','rating','referencePrice_value')
    ->where('province',$staycation_cities["0"]->ProvinceName)
    ->where('rating','!=','')
    ->limit(12)
    ->orderBy('rating','desc')
    ->get()
    ->toArray();
    }

    $login = 1; 

    echo '<script>
    localStorage.setItem("locale","enUS")
    localStorage.setItem("currency","USD")
    </script>';

    return view('welcome',compact('staycation_cities','hotels','login','suggestCities'));
}


public function getHotels(Request $request)
{
    $locale =  isset($request->locale)? $request->locale : 'enUS';
    $request->currency = isset($request->currency)? $request->currency : 'EUR';

    $hotels= DB::table("T_summary_data_$locale")
    ->select('heroImage','propertyName','city','country','rating','referencePrice_value')
    ->whereNotNull('rating')
    ->where('referencePrice_value','!=','0')
    ->where('province',$request->city)
    ->limit(12)
    ->orderBy('rating','desc')
    ->get()
    ->toArray();

    if($request->currency == 'USD')
    {
    return $hotels;
    }
    else
    {

        $exchange_rate = $this->currencyConversion($request->currency);

        foreach($hotels as $hotel)
        {
            $hotel->referencePrice_value = round(($hotel->referencePrice_value/$exchange_rate),2);
        }
        return $hotels;
    }
     
}

public function suggestPlaces(Request $request)
{

    $suggestion = DB::table('T_idsRegions_enUS')
    ->select('CityName','RegionID','CountryName','ProvinceName')
    ->whereNotNull('CityName')
    ->whereNotNull('ProvinceName')
    ->where('CityName','ilike',"$request->search_word%")
    // ->orWhere('CityName', 'like', "%$request->search_word%")
    ->distinct('CityName','CountryName')
    ->get()
    ->toArray();
    
    return $suggestion;
}

public function locale(Request $request)
{
        // dd($request->locale);

        $user_country = 'India';

        $locale =  isset($request->locale)? $request->locale : 'enUS';
        
        $user_country = $this->userCountry($locale,$user_country); 

        $staycation_cities = DB::table("T_idsRegions_$locale")
        ->select('ProvinceName')
        // ->distinct('ProvinceName') 
        ->where('ProvinceName','!=','')
        ->where('CountryName',"$user_country")
        ->limit(5)
        ->inRandomOrder()
        ->get();
    
        // dd($staycation_cities);


        $suggestCities = DB::table("T_idsRegions_$locale")
        ->select('RegionID','CityName','ProvinceName','CountryName')
        ->where('CityName','!=','')
        ->whereOr('CountryName','=',"$user_country")
        ->where('CountryName','like',"$user_country")
        ->distinct('CityName')
        ->get();

        $hotels = DB::table("T_summary_data_$locale")
        ->select('heroImage','propertyName','city','country','rating','referencePrice_value')
        ->where('province',$staycation_cities["0"]->ProvinceName)
        ->where('rating','!=','')
        ->limit(12)
        ->orderBy('rating','desc')
        ->get();

        $login = 1; 

        return view('welcome',compact('staycation_cities','hotels','login','suggestCities'));
}

public function translate($sourceText,$sourceLang,$targetLang)
{
    $res = json_decode(file_get_contents('https://translate.googleapis.com/translate_a/single?client=gtx&sl='.$sourceLang.'&tl='.$targetLang.'&dt=t&q='.urlencode($sourceText)));
    return $res[0][0][0];
}

public function userCountry($locale,$user_country)
{

    if($locale == 'frFR')
    {
        return  $this->translate($user_country,'en','fr');
    }
    else if($locale == 'esES')
    {
        return $this->translate($user_country,'en','es');
    }
    else
    {
        return $user_country;
    }

}

public function currencyConversion($curr)
{
    $currency_rate = json_decode(file_get_contents("https://api.coinbase.com/v2/exchange-rates?currency=$curr"));
    $conv =  $currency_rate->data->rates->USD;
    return round($conv,5);
}


public function getapi(Request $request)
{
   
$inputdata = $request->all();
// dd($inputdata);

$regionIds =$request->regionid;  

$hotels= DB::table('T_summary_data_enUS')
->select('T_summary_data_enUS.propertyId_expedia','T_summary_data_enUS.heroImage','T_summary_data_enUS.propertyName','T_summary_data_enUS.city',
'T_summary_data_enUS.country','T_summary_data_enUS.rating','T_summary_data_enUS.referencePrice_value','T_idsRegions_enUS.Name','T_summary_data_enUS.propertyType_name')
->join('T_idsRegions_enUS','T_idsRegions_enUS.CityName', '=', 'T_summary_data_enUS.city')
->where('RegionID',$regionIds)
->where('T_summary_data_enUS.referencePrice_value','!=',0)
->limit(5)
->get();

// dd($hotels);


return View::make('pages.afterlogin')
->with('login',2)
// ->with('avatar_cond',false)
->with('hotels',$hotels)
->with('inputdata',$inputdata);

}


public function hotelDetails(Request $request)
{



$search = DB::table("T_summary_data_$request->locale as Summ")
->select('Summ.city','Summ.province','Summ.country','Summ.address1','Summ.address2','Summ.postalCode','Summ.propertyName','Summ.propertyType_name','Summ.referencePrice_value','Desc.areaDescription','Desc.propertyDescription','Ams.popularAmenities','Ams.propertyAmenities','Img.hero_link','Img.images','Img.hero_title')
->join("T_property_description_$request->locale as Desc",'Desc.propertyId_expedia', '=', 'Summ.propertyId_expedia')
->join("T_property_amenities_$request->locale as Ams",'Ams.propertyId_expedia','=','Desc.propertyId_expedia')
->join("T_property_images_enUS as Img",'Img.propertyId_expedia','=','Desc.propertyId_expedia')
// ->join("T_property_description_$request->locale as Desc",'Desc.propertyId_expedia', '=', 'Summ.propertyId_expedia')
->where('Summ.propertyId_expedia',$request->expediaId)
->limit(5)
->get();

// dd($search);
// $this->cURL(10001);
// dd($search);

$images = array();

if(isset($search[0]->images))
{
    $res = json_decode($search[0]->images);
    $images = $res->ROOMS;
}

$login = 1;

return view('viewmore',compact('login','search','images'));

}



public function getExchangedCurrency(Request $request)
{
    return round($request->price /$this->currencyConversion($request->currency),2);
}

public function apiAccess(Request $request)
{
//    dd($request->locale);
//    $locale =  ? 'FR' : ''; 

   $API_details = DB::table("T_ApiAccess as API")
                  ->where('Local',$request->locale)
                  ->where('agency','expedia')
                  ->get();

    // dd($API_details);


    return $this->cURL($API_details[0],$request->propertyId);
}

public function cURL($API,$propertyId)
{
    // echo "cURL";
// dd($API->EndPoint);
// $uri = "https://apim.expedia.com/hotels/listings?&ecomHotelIds=10001";

$uri = "$API->EndPoint?&ecomHotelIds=$propertyId";

$params['headers'] = [
      'Authorization' => "Basic $API->auth_token",
     'Accept' => $API->accept,
     'Partner-Transaction-Id'=> $API->partner_id,
     'Key' =>$API->f_key
];

$client = new Client();
$response = $client->request('get', $uri, $params);
$data = json_decode($response->getBody(), true);

return $data['Hotels'][0]['Links']['WebSearchResult']['Href'];

}

}
?>
