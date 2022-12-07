<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{


public function defaultDatas()
{
    // $staycation_cities = DB::table('T_summary_data_enUS')
    //                         ->select('province')
    //                         ->where('country','United States')
    //                         ->distinct()
    //                         ->limit(5)
    //                         ->get()
    //                         ->toArray();
    
    $staycation_cities = DB::table('T_property_location_enUS')
    ->select('province')
    // ->distinct('province')
    ->where('country','United States')
    ->limit(5)
    ->get()
    ->toArray();



    // dd($staycation_cities);
    
    $suggestCities = DB::table('T_idsRegions_enUS')
    ->select('RegionID','CityName','ProvinceName','CountryName')
    ->where('CityName','!=','')
    ->whereOr('CountryName','=','United States')
    ->where('CountryName','like','United States%')
    ->distinct('CityName')
    ->limit(10)
    ->get()
    ->toArray();
    
    $login = 1;

    $hotels = DB::table('T_summary_data_enUS')
    ->select('heroImage','propertyName','city','country','rating','referencePrice_value')
    ->where('province',$staycation_cities["0"]->province)
    ->where('rating','!=','')
    ->orderBy('rating','desc')
    ->distinct()
    ->limit(12)
    ->get()
    ->toArray();

    return view('welcome',compact('staycation_cities','login','hotels','suggestCities'));
    
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

public function needInspiration()
{
    // SELECT * FROM public."T_property_location_enUS"
    // ORDER BY "propertyId_expedia" ASC LIMIT 100
}

}
?>
