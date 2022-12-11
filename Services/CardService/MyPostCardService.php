<?php

include 'CardService.php';

class MyPostCardService implements CardService{

    protected $apiService;
    public function __construct(ApiService $apiService){
        $this->apiService = $apiService;
    }

    public function getBerlinProducts(){
        $url = "https://appmsds-6aa0.kxcdn.com/content.php?lang=de&json=1&search_text=berlin&currencyiso=EUR";
        $output = $this->apiService->get($url);
        return json_decode($output, true);
    }

    public function getGreetingCardWithEnvelope($storeID){
        $url = "https://www.mypostcard.com/mobile/product_prices.php?json=1&type=get_postcard_products&currencyiso=EUR&store_id=".$storeID;
        $output = $this->apiService->get($url);
        $outputArray = json_decode($output, true);
        return $outputArray['products'][0]['product_options']['Envelope'];
    }
}

?>