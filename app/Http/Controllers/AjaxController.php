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

        $staycation_cities = DB::table("T_idsRegions_enUS")
        ->select('ProvinceName')
        ->where('ProvinceName','!=','')
        ->where('CountryName',"$user_country")
        ->limit(5)
        // ->distinct('ProvinceName')
        ->inRandomOrder()
        ->get()
        ->toArray();

//    dd($staycation_cities);

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

    $hotels= DB::table("T_summary_data_$locale")
    ->select('heroImage','propertyName','city','country','rating','referencePrice_value')
    ->where('province',$request->city)
    ->orWhere('province',$this->translate($request->city,'fr','en'))
    ->whereNotNull('rating')
    ->orderBy('rating','desc')
    ->limit(12)
    ->get()
    ->toArray();

     return $hotels;
}

public function suggestPlaces(Request $request)
{

    $suggestion = DB::table('T_idsRegions_enUS')
    ->select('CityName','RegionID','CountryName','ProvinceName')
    ->whereNotNull('CityName')
    ->whereNotNull('ProvinceName')
    ->where('CityName','like',"$request->search_word%")
    ->distinct('CityName','CountryName')
    ->get()
    ->toArray();

    return $suggestion;
}

public function locale($locale)
{
    
        $user_country = 'India';

        $locale =  isset($locale)? $locale : 'enUS';
        
        $user_country =  $locale == 'enUS' ? 'India' : $this->translate($user_country,'en','fr');

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
    $res = json_decode(file_get_contents("https://translate.googleapis.com/translate_a/single?client=gtx&sl=".$sourceLang."&tl=". $targetLang."&dt=t&q=".$sourceText));
    return $res[0][0][0];
}

}
?>
