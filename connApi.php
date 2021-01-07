<?php 
require 'vendor/autoload.php'; 
use Carbon\Carbon; 
class apiConn{ 
    private $year1;
    private $year2;
    public $responses1;
    public $responses2;
    private function setYear(){
        $this->year1 = Carbon::now();
        $this->year2 = clone $this->year1;
        $this->year2 = $this->year2->addYear(); 
        $this->year1 = $this->year1->year;
        $this->year2 = $this->year2->year;
    }   
    
    public function connAray1(){
        $curl1 = curl_init();
        curl_setopt_array($curl1, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://canada-holidays.ca/api/v1/provinces/ON?year=' . $this->year1,
            CURLOPT_USERAGENT => 'API'
        ]);
        $this->responses1 = curl_exec($curl1);
        $this->responses1 = json_decode($this->responses1, true);
        $this->responses1 = $this->responses1['province']['holidays'];
    }
    public function connAray2(){ 
        $curl2 = curl_init();
        curl_setopt_array($curl2, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://canada-holidays.ca/api/v1/provinces/ON?year=' . $this->year2,
            CURLOPT_USERAGENT => 'API'
        ]);
        $this->responses2 = curl_exec($curl2);
        $this->responses2 = json_decode($this->responses2, true);
        $this->responses2 = $this->responses2['province']['holidays'];
    }
    public function __construct(){
        $this->setYear();
        $this->connAray1();
        $this->connAray2();

    }
}
 