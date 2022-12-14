<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Session;

use GuzzleHttp\Client;

use Cookie;

use View;

class AjaxController extends Controller
{

public function defaultDatas()
{

    
 
    // $location = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));

    // $user_country = $location['geoplugin_countryName'];
        
        //      echo '<script>
        //      function setCookie(name,value,days) {
        //        var expires = "";
        //        if (days) {
        //            var date = new Date();
        //            date.setTime(date.getTime() + (days*24*60*60*1000));
        //            expires = "; expires=" + date.toUTCString();
        //        }
        //        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
        //     }
        //     //get your item from the localStorage
        //     setCookie("locale", localStorage.getItem("locale"), 2);
        //     </script>';
        //     // $variableName = session('arya');
        //     $locale = '';

        // if(isset($_COOKIE['locale'])) {
        //     $locale = $_COOKIE['locale'];
        // }

        // echo "locale : ".$locale;
        //     die;

        // echo json_encode('<script>
        //localStorage.getItem("locale")</script>');
        // if(isset($_COOKIE['locale'])) {
        //     $locale = $_COOKIE['locale'];
        // }
        $user_country = 'India';
        
      $locale = isset($_COOKIE['locale']) ? $_COOKIE['locale'] : 'enUS';
  
      if("T_idsRegions_$locale" == 'T_idsRegions_null')
      {
        setcookie("locale", "enUS", time() + 2 * 24 * 60 * 60);
        $locale = 'enUS'; 
      }

        $user_country = ($locale != 'enUS') ? $this->userCountry($locale,$user_country) : $user_country;
     
        
        // dd($user_country);

        $staycation_cities = DB::table("T_idsRegions_$locale")
        ->select('ProvinceName','ParentRegionId','RegionID')
        ->where('ProvinceName','!=','')
        ->where('CountryName',"$user_country")
        ->limit(5)
        ->inRandomOrder()
        ->get()
        ->toArray();

        // dd($staycation_cities);
        
    $suggestCities = DB::table("T_idsRegions_$locale")
    ->select('RegionID','CityName','ExtendedName','Type')
    ->where('CityName','!=','')
    ->whereOr('CountryName','=',"$user_country")
    ->where('CountryName','like',"$user_country")
    ->distinct('CityName')
    // ->toSql();
    ->get()
    ->toArray();

    // dd($suggestCities);


    $hotels =  array();

    if(!empty($staycation_cities)){
    $hotels = DB::table("T_summary_data_$locale")
    ->select('heroImage','propertyName','city','country','rating','referencePrice_value')
    ->where('province',$staycation_cities["0"]->ProvinceName)
    ->where('rating','!=','')
    ->limit(12)
    ->orderBy('rating','desc')
    ->get()
    ->toArray();
    }

    $login = 1; 

    return view('welcome',compact('staycation_cities','hotels','login','suggestCities'));
}

public function getHotels(Request $request)
{

    $locale =  isset($request->locale)? $request->locale : 'enUS';
    $request->currency = isset($request->currency)? $request->currency : 'USD';

   // original hide jan 5

    // $hotels= DB::table("T_summary_data_$locale")
    // ->select('heroImage','propertyName','city','country','rating','referencePrice_value')
    // ->whereNotNull('rating')
    // ->where('referencePrice_value','!=','0')
    // ->where('province',$request->city)
    // ->limit(12)
    // ->orderBy('rating','desc')
    // ->get()
    // ->toArray();

    $hotels= DB::table("T_summary_data_$locale")
    ->select('heroImage','propertyName','city','country','rating','referencePrice_value')
    ->whereNotNull('rating')
    ->where('referencePrice_value','!=','0')
    ->where('province',$request->city)
    ->limit(12)
    ->orderBy('rating','desc')
    ->get()
    ->toArray();

    if(empty($hotels))
    {
        if($locale == 'frFR')
        {
            $res = $this->translate($request->city,'fr','en');
        }
        elseif($locale == 'esES')
        {
            $res = $this->translate($request->city,'es','en');
        }
        else
        {
            $res = $this->translate($request->city,'en','en');
        }

//   echo "res :  ".$res;exit;

        $hotels= DB::table("T_summary_data_enUS")
        ->select('heroImage','propertyName','city','country','rating','referencePrice_value')
        ->whereNotNull('rating')
        ->where('referencePrice_value','!=','0')
        ->where('province','like',"%$res%")
        ->where('city','like',"%$res%")
        ->limit(12)
        ->orderBy('rating','desc')
        ->get()
        ->toArray();

        return $hotels;

    }

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

    // $suggestion = DB::table('T_idsRegions_enUS')
    // ->select('CityName','RegionID','CountryName','ProvinceName')
    // ->whereNotNull('CityName')
    // ->whereNotNull('ProvinceName')
    // ->where('CityName','ilike',"$request->search_word%")
    // // ->orWhere('CityName', 'like', "%$request->search_word%")
    // ->distinct('CityName','CountryName')
    // ->get()
    // ->toArray();

    $suggestion = DB::table('T_idsRegions_enUS')
    ->select('RegionID','CityName','ExtendedName','Type')
    ->whereIn('Type',['city', "airport","point_of_interest","country"])
    ->where('CityName','ilike',"%$request->search_word%")
    ->orWhere('ExtendedName', 'like', "%$request->search_word%")
    ->distinct('CityName')
    // ->limit('1000')
    ->get()
    ->toArray();
    
    // dd($suggestion);

    return $suggestion;
}

public function locale(Request $request)
{

        $user_country = 'India';

        $locale =  isset($request->locale)? $request->locale : 'enUS';
        
        $user_country = $this->userCountry($locale,$user_country); 

        $staycation_cities = DB::table("T_idsRegions_$locale")
        ->select('ProvinceName','ParentRegionId')
        // ->distinct('ProvinceName') 
        ->where('ProvinceName','!=','')
        ->where('CountryName',"$user_country")
        ->limit(5)
        ->inRandomOrder()
        ->get();
    
        $suggestCities = DB::table("T_idsRegions_$locale")
        ->select('RegionID','CityName','ExtendedName','Type')
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

        // dd($hotels);
        //   echo "<script> localStorage.setItem('locale',$locale) </script>";

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
'T_summary_data_enUS.country','T_summary_data_enUS.rating','T_summary_data_enUS.referencePrice_value','T_idsRegions_enUS.Name','T_summary_data_enUS.propertyType_name','T_summary_data_enUS.propertyId_hcom')
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
->select('Summ.city','Summ.province','Summ.country','Summ.address1','Summ.address2','Summ.postalCode','Summ.propertyName','Summ.propertyType_name','Summ.referencePrice_value','Desc.areaDescription','Desc.propertyDescription','Ams.popularAmenities','Ams.propertyAmenities','Img.hero_link','Img.images','Img.hero_title','Reviews.guestReviews','Reviews.guestRating_expedia','Reviews.guestRating_hcom')
->join("T_property_description_$request->locale as Desc",'Desc.propertyId_expedia', '=', 'Summ.propertyId_expedia')
->join("T_property_amenities_$request->locale as Ams",'Ams.propertyId_expedia','=','Desc.propertyId_expedia')
->join("T_property_images_enUS as Img",'Img.propertyId_expedia','=','Desc.propertyId_expedia')
->join("T_guestRatings_reviews_enUS as Reviews","Reviews.propertyId_expedia",'=','Desc.propertyId_expedia')
// ->join("T_property_description_$request->locale as Desc",'Desc.propertyId_expedia', '=', 'Summ.propertyId_expedia')
->where('Summ.propertyId_expedia',$request->expediaId)
->limit(5)
->get();

// $this->cURL(10001);
// dd($search->items);
// echo "<pre>";print_r($search);exit;
// var_dump($search);
// exit;

$search = (isset($search[0]) && !empty($search[0])) ? $search[0] : [];

empty($search) ? dd("This hotel details doesn't available in all the required tables!!") : '';

$images = array();

if(isset($search->images))
{
    $res = json_decode($search->images);
    $images = $res->ROOMS;
}


$login = 1;


// dd($search);
// return view('viewmore',compact('login','search','images'));


return view('viewmore',compact('login','search','images'));

}



public function getExchangedCurrency(Request $request)
{
    return round($request->price /$this->currencyConversion($request->currency),2);
}

public function apiAccess(Request $request)
{
    // dd($request);
    if($request->type == 'partnerlink')
    {
        $API_details = DB::table("T_ApiAccess as API")
        ->where('Local',$request->locale)
        ->whereIn('agency',["expedia","Hcom"])
        ->get();
    }
    else{
        $API_details = DB::table("T_ApiAccess as API")
        ->where('Local',$request->locale)
        ->where('agency',"expedia")
        ->get();
    }

    // dd($API_details);

    if(!empty($API_details) && isset($API_details))
    {
        if($request->type == 'partnerlink')
        {
            return $this->cURL($API_details,$request->propertyId,$request->type);
        }
        else{
            return $this->cURL($API_details[0],$request->regionId,$request->type);
        }
    }
    else{
        dd("no details found!!!");
    }
}

public function cURL($Request_data,$propertyId,$type)
{

$links = array();
$client = new Client();
if($type == "partnerlink")
{
    foreach ($Request_data as $API_Request_data => $header_value) {
        $uri = $header_value->EndPoint."?&ecomHotelIds=$propertyId";
        $params['headers'] = [
            'Authorization' => "Basic ".$header_value->auth_token,
            'Accept' => $header_value->accept,
            'Partner-Transaction-Id'=> $header_value->partner_id,
            'Key' =>$header_value->f_key
        ];
        $response = $client->request('get', $uri, $params);
        $data = json_decode($response->getBody(), true);
        $link = isset($data['Hotels'][0]['RoomTypes']) ? $data['Hotels'][0]['RoomTypes'][0]["Links"]["WebDetails"]["Href"]  : $data['Hotels'][0]['Links']['WebSearchResult']['Href'];
        array_push($links,$link);
}

return $links;

}
else
{
    // dd($Request_data);
    $uri = $Request_data->EndPoint."?&regionIds=$propertyId";
    $params['headers'] = [
        'Authorization' => "Basic ".$Request_data->auth_token,
        'Accept' => $Request_data->accept,
        'Partner-Transaction-Id'=> $Request_data->partner_id,
        'Key' =>$Request_data->f_key
    ];
    $response = $client->request('get', $uri, $params);

    $data = json_decode($response->getBody(), true);
    // dd($data);
    $result = array_splice($data['Hotels'],0,12);

    // echo "<pre>";print_r($result);exit;
    $property_IDs = array();
    foreach($result as $result_filter){
        array_push($property_IDs,$result_filter["Id"]);
    }
    //   echo "<pre>";print_r($property_IDs);

$result_filter = DB::table("T_summary_data_enUS as Summ")
->whereIn('Summ.propertyId_expedia',$property_IDs)
->get();

// return $

// dd($search);exit;

    return $result_filter;
}


}


public function similarHotelsnearBy(Request $request)
{
// dd($request->);
// $similar_hotels  = DB::table("T_summary_data_$request->locale as Summ")
// ->join("T_property_description_$request->locale as Desc",'T_idsRegions_enUS.RegionID', '=', 'Summ.RegionID')
// ->where('Summ.city','Libreville')
// ->limit(5)
// ->get();

$similar_hotels  = DB::table("T_summary_data_enUS as Summ")
->select('Summ.heroImage','Regions.ExtendedName','Regions.RegionID','Summ.rating','Summ.propertyName','Summ.propertyId_expedia','Summ.propertyId_hcom','Summ.referencePrice_value','Reviews.guestRating_expedia','Reviews.guestRating_hcom')
->join("T_idsRegions_enUS as Regions",'Regions.CityName', '=', 'Summ.city')
->join("T_guestRatings_reviews_enUS as Reviews",'Reviews.propertyId_expedia', '=', 'Summ.propertyId_expedia')
->where('Summ.referencePrice_value','!=','0')
->where('Summ.rating','!=','')
->where('Summ.city',$request->city)
->orWhere('Summ.province',$request->city)
->distinct('Summ.propertyName')
->limit(10)
->get();

// dd($similar_hotels);

return $similar_hotels;
}

public function searchByRegionId(Request $request)
{
       return $this->apiAccess($request);     
}


}
?>
