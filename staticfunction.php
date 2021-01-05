<?php
class getDays {
    public $curl;
    public $responses;
    public $test3;
    function __construct(){
        $this->curl = curl_init();
        curl_setopt_array($this->curl,[
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://canada-holidays.ca/api/v1/provinces/ON',
        CURLOPT_USERAGENT => 'API'
        ]);
        $this->responses = curl_exec($this->curl);
        $this->responses = json_decode($this->responses, true);
        $this->responses = $this->responses['province']['holidays'];
        
    }
    public function getDate($date, $delivery){
        foreach($this->responses as $response):
            if ($response['date'] === $date){
                $delivery += 1;
            }
        endforeach;
        return $delivery; 
    }

}
//test
$test = new getDays();
print_r($test->getDate('2021-01-01', 5));