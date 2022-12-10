<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Redirect;

class AjaxController extends Controller
{


public function defaultDatas()
{
    // $location = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));

    // $user_country = $location['geoplugin_countryName'];
    $user_country = 'India';

    $staycation_cities = DB::table('T_property_location_enUS')
    ->select('province')
    ->where('country',"$user_country")
    ->limit(5)
    ->inRandomOrder()
    ->get()
    ->toArray();
    // dd('dasasd');/
    
    
    $suggestCities = DB::table('T_idsRegions_enUS')
    ->select('RegionID','CityName','ProvinceName','CountryName')
    ->where('CityName','!=','')
    ->whereOr('CountryName','=',"$user_country")
    ->where('CountryName','like',"$user_country")
    ->distinct('CityName')
    ->get()
    ->toArray();

    // echo "<pre>";print_r($staycation_cities);
    // dd($suggestCities);

    $hotels = DB::table('T_summary_data_enUS')
    ->select('heroImage','propertyName','city','country','rating','referencePrice_value')
    ->where('province',$staycation_cities["0"]->province)
    ->where('rating','!=','')
    ->limit(12)
    ->orderBy('rating','desc')
    ->get()
    ->toArray();

    // dd($hotels);

    $login = 1; 

    return view('welcome',compact('staycation_cities','hotels','login','suggestCities'));
    
}


public function getCities(Request $request)
{
    $staycation_cities = DB::table('T_displaySections')
    ->where('RegionID',$request->regionId)->where('Section','staycation')
    ->select('CityName')
    ->get();

    return $staycation_cities;

}

public function getHotels(Request $request)
{
    // dd('dfsdsas');
    $hotels= DB::table('T_summary_data_enUS')
    ->select('heroImage','propertyName','city','country','rating','referencePrice_value')
    ->where('province',$request->city)
    ->where('rating','!=','')
    ->orderBy('rating','desc')
    ->distinct()
    ->limit(12)
    ->get()
    ->toArray();
        
    // dd($hotels);
    
     return $hotels;
}

public function suggestPlaces(Request $request)
{

    $suggestion = DB::table('T_idsRegions_enUS')
    ->select('CityName','RegionID','CountryName','ProvinceName')
    ->distinct('CityName')
    ->where('CountryName','like',$request->country.'%')
    ->where('CityName','like',$request->search_word.'%')
    ->limit(12)
    ->get()
    ->toArray();

    return $suggestion;
}

public function locale($locale)
{
    
    if($locale == "FR")
    {
    // dd($locale);
    $staycation_cities = DB::table("T_idsRegions_frFR as France")
    ->join('T_property_location_enUS as Location','France.CountryName','=','Location.country')
    ->where('France.ProvinceName','!=','')
    ->where('country','France')
    ->distinct('France.ProvinceName')
    ->select('France.ProvinceName')
    ->limit(5)
    ->get()
    ->toArray();

 

    $suggestCities = DB::table('T_idsRegions_frFR')
    ->select('RegionID','CityName','ProvinceName','CountryName')
    ->where('CityName','!=','')
    ->whereOr('CountryName','=','France')
    ->where('CountryName','like','Franc%')
    ->distinct('CityName')
    ->get()
    ->toArray();

    // echo "<pre>";print_r($suggestCities);
    // dd($staycation_cities);


    $hotels = DB::table('T_summary_data_enUS')
    ->select('heroImage','propertyName','city','country','rating','referencePrice_value')
    ->where('province',$staycation_cities["0"]->ProvinceName)
    ->where('rating','!=','')
    ->orderBy('rating','desc')
    ->distinct()
    ->limit(12)
    ->get()
    ->toArray();

    // dd($staycation_cities);

    // $hotels = array();
    $login = 2;
    // $suggestCities = array();
    
    // echo "<pre>";print_r($suggestCities);

    // dd($staycation_cities);
    // return view('homepage',compact('staycation_cities'));

    return view('frwelcome', compact('staycation_cities','hotels','login','suggestCities'));

    }
    // elseif($locale == "EN")
    // {
    //     $staycation_cities = DB::table("T_idsRegions_enES")
    //     ->join('T_property_location_enUS','T_idsRegions_enES.CountryName','=','T_property_location_enUS.country')
    //     ->where('T_idsRegions_enES.ProvinceName','!=','')
    //     ->where('country','France')
    //     ->distinct('T_idsRegions_enES.ProvinceName')
    //     ->select('T_idsRegions_enES.ProvinceName')
    //     ->limit(5)
    //     ->get()
    //     ->toArray();



    // }
    else
    {
        // $staycation_cities = DB::table('T_property_location_enUS')
        // ->select('province')
        // // ->distinct('province')
        // ->where('country','United States')
        // ->limit(5)
        // ->get()
        // ->toArray();
    
    
        // //  dd($staycation_cities);
    
           return redirect('/');
    }
  
}

}
?>
