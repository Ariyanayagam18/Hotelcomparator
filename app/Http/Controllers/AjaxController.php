<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Redirect;

use View;

class AjaxController extends Controller
{

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

     echo '<script>localStorage.setItem("locale","enUS")</script>';

    $suggestCities = DB::table("T_idsRegions_enUS")
    ->select('RegionID','CityName','ProvinceName','CountryName')
    ->where('CityName','!=','')
    ->whereOr('CountryName','=',"$user_country")
    ->where('CountryName','like',"$user_country")
    ->distinct('CityName')
    ->get()
    ->toArray();

    $hotels = DB::table("T_summary_data_enUS")
    ->select('heroImage','propertyName','city','country','rating','referencePrice_value')
    ->where('province',$staycation_cities["0"]->ProvinceName)
    ->where('rating','!=','')
    ->limit(12)
    ->orderBy('rating','desc')
    ->get()
    ->toArray();

    $login = 1; 

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
        $exchange_rate = round($this->currencyConversion($request->currency),5);

        // echo "Exchange rate : ".$exchange_rate."<br/>";
        // echo "<pre>";print_r($hotels);

        // $converted_price = array();
        // for ($i=0; $i < count($hotels); $i++) { 
        //     $hotels[$i]->$converted_price = round(($hotels[$i]->referencePrice_value/$exchange_rate),2);
        // }

        foreach($hotels as $hotel)
        {
            // print_r($hotel);

            $hotel->referencePrice_value = round(($hotel->referencePrice_value/$exchange_rate),2);
          
            // print_r($hotel);
            // echo "round : ".round(($hotel->referencePrice_value/$exchange_rate),2)."<br/>";
            // array_push($converted_price,round(($hotel->referencePrice_value/$exchange_rate),2));
            // $hotel_new =  array_fill_keys($hotel,round(($hotel->referencePrice_value/$exchange_rate),2));

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

public function locale($locale)
{
        $user_country = 'India';

        $locale =  isset($locale)? $locale : 'enUS';
        
        $user_country = $this->userCountry($locale,$user_country);

        $staycation_cities = DB::table("T_idsRegions_$locale")
        ->select('ProvinceName')
        ->where('ProvinceName','!=','')
        ->where('CountryName',"$user_country")
        ->limit(5)
        // ->distinct()
        ->inRandomOrder()
        ->get()
        ->toArray();
    
        $suggestCities = DB::table("T_idsRegions_$locale")
        ->select('RegionID','CityName','ProvinceName','CountryName')
        ->where('CityName','!=','')
        ->whereOr('CountryName','=',"$user_country")
        ->where('CountryName','like',"$user_country")
        ->distinct('CityName')
        ->get()
        ->toArray();

        $hotels = DB::table("T_summary_data_$locale")
        ->select('heroImage','propertyName','city','country','rating','referencePrice_value')
        ->where('province',$staycation_cities["0"]->ProvinceName)
        ->where('rating','!=','')
        ->limit(12)
        ->orderBy('rating','desc')
        ->get()
        ->toArray();

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
    return $currency_rate->data->rates->USD;
}


public function getapi(Request $request)

{

   
    $inputdata = $request->all();
    // dd($inputdata);
    
    $regionIds =$request->regionid;  
    


$hotels= DB::table('T_summary_data_enUS')
->select('T_summary_data_enUS.propertyId_expedia','T_summary_data_enUS.heroImage','T_summary_data_enUS.propertyName','T_summary_data_enUS.city',
'T_summary_data_enUS.country','T_summary_data_enUS.rating','T_summary_data_enUS.referencePrice_value','T_idsRegions_enUS.Name')
->join('T_idsRegions_enUS','T_idsRegions_enUS.CityName', '=', 'T_summary_data_enUS.city')
->where('RegionID',$regionIds)
->limit(5)
->get();

// dd($hotels);


return View::make('pages.afterlogin')
->with('login',2)
// ->with('avatar_cond',false)
->with('hotels',$hotels)
->with('inputdata',$inputdata);

}

}
?>
