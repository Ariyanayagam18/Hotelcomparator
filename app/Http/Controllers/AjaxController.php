<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{

public function cities(Request $request)
{
    $staycation_cities = DB::table('T_displaySections')
    ->where('RegionID',$request->regionId)->where('Section','staycation')
    ->select('CityName')
    ->get();

    return $staycation_cities;
    // $staycation_cities = DB::table('');
    // dd($staycation_cities);
    // return view('homepage',compact('staycation_cities'));

    
}

public function hotels(Request $request)
{
    $city = "New York";

    // $hotels_list = DB::table('T_displaySections')
    // ->leftJoin('T_property_location_enUS','T_displaySections.CityName','=','T_property_location_enUS.city')
    // ->leftJoin('T_summary_data_enUS','T_summary_data_enUS.propertyId_hcom','=','T_property_location_enUS.propertyId_hcom')
    // ->select('T_displaySections.CityName','T_displaySections.CountryName','T_property_location_enUS.propertyName')
    // ->distinct()
    // ->limit(12)
    // ->get();

    $hotels_list = DB::table('T_property_location_enUS')
    ->leftJoin('T_displaySections','T_displaySections.CityName','=','T_property_location_enUS.city')
    ->leftJoin('T_summary_data_enUS','T_summary_data_enUS.propertyId_hcom','=','T_property_location_enUS.propertyId_hcom')
    ->select('T_summary_data_enUS.heroImage','T_displaySections.CityName','T_displaySections.CountryName','T_property_location_enUS.propertyName','T_summary_data_enUS.rating','T_summary_data_enUS.referencePrice_value','T_summary_data_enUS.referencePrice_currency')
    ->where('T_summary_data_enUS.referencePrice_value','!=','0')
    ->wherenotNull('T_summary_data_enUS.rating')
    ->where('T_displaySections.CityName','=',$city)
    ->distinct()
    ->orderBy('T_summary_data_enUS.rating','desc')
    ->limit(12)
    ->get();

     return $hotels_list;


}

}
?>