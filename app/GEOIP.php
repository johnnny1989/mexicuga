<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GEOIP extends Model
{
    public static $lat,$lng,$userip,$address,$locality = '',$postalcode,$city,$state,$country;
    
    public static function GeoInfo($address) {
        $json = self::GetFromAddress($address);
        self::$userip = $_SERVER['REMOTE_ADDR'];
        
        if($json->status == "OK"){
            self::$lat = $json->results[0]->geometry->location->lat;
            self::$lng = $json->results[0]->geometry->location->lng;
            self::LocalName();
            self::$address = ucwords($address);
        }else{
            $local = self::GeoIPFromUserIp();
            self::$lat      = $local['lat'];
            self::$lng      = $local['lon'];
            self::LocalName();
            self::$address = ucwords(self::$locality.','.self::$city.','.self::$state.','.self::$country);
        }
    }
    
    public static function GeoIPFromUserIp() {
        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.self::$userip));
    	return $query;
    }
    
    public static function GetFromAddress($address) {
        $address = str_replace(' ','+', $address);
       // $dtls = "https://maps.googleapis.com/maps/api/geocode/json?address=".$address."&key=AIzaSyApHBoeetiQ60PL-1cOnTjBLRKEnWFuE_Y";
        $dtls = "https://maps.googleapis.com/maps/api/geocode/json?address=".$address;
        return json_decode(file_get_contents($dtls));
    }
    
    public static function LocalName() {
        $geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.self::$lat.','.self::$lng.'&sensor=false');
        $output= json_decode($geocode);

        for($j=0;$j<count($output->results[0]->address_components);$j++){
            
            if($output->results[0]->address_components[$j]->types[0] == 'postal_code'){
                self::$postalcode = $output->results[0]->address_components[$j]->long_name;
            }
            
            if($output->results[0]->address_components[$j]->types[0] == 'country'){
                self::$country = $output->results[0]->address_components[$j]->long_name;
            }
            
            if($output->results[0]->address_components[$j]->types[0] == 'administrative_area_level_1'){
                self::$state = $output->results[0]->address_components[$j]->long_name;
            }
            
            if($output->results[0]->address_components[$j]->types[0] == 'administrative_area_level_2'){
                self::$city = $output->results[0]->address_components[$j]->long_name;
            }
            
            if($output->results[0]->address_components[$j]->types[0] == 'sublocality_level_1'){
                self::$locality .= $output->results[0]->address_components[$j]->long_name;
            }
            
            if($output->results[0]->address_components[$j]->types[0] == 'locality'){
                self::$locality .= ', '.$output->results[0]->address_components[$j]->long_name;
            }
        }
    }
    
    public static function LocationFromZip($zip) {
        $geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$zip.'&sensor=true');
        return $geocode;
    }
}
