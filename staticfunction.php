<?php
require 'vendor/autoload.php'; 
use Carbon\Carbon; 
class getDays {
    public static function check1($date, $newArray){
        $bool = false;
        
        foreach($newArray as $response):
            if ($date === $response['date']){
                $bool = true;
            }
        endforeach;
        return $bool; 
    }
    public static function check2($date){
        $bool2 = false; 
        if ($date->dayOfWeek == 6 or $date->dayOfWeek === 0){
            $bool2 = True;
        }
        return $bool2;
    }
    public static function getDate($date, $days){
        $year = mb_substr($date, 0, 4);
        $curl = curl_init();
        curl_setopt_array($curl,[
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://canada-holidays.ca/api/v1/provinces/ON?year=' . $year,
            CURLOPT_USERAGENT => 'API'
        ]);
        $responses = curl_exec($curl);
        $responses = json_decode($responses, true);
        $responses = $responses['province']['holidays'];
        $final = new Carbon($date);
        $i = 0; 
        while($i !== $days):
            if (getDays::check1($final->toDateString(), $responses)){
                $final->addDay();
            } elseif (getDays::check2($final)){
                $final->addDay();
            } else{
                $final->addDay();
                $i++; 
            }
        endwhile;
        return $final->toDateString(); 
    }
}
#test
echo(getDays::getDate('2021-01-01', 3));
