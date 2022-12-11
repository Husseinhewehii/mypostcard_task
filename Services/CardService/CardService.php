<?php

interface CardService{
    public function getBerlinProducts();
    public function getGreetingCard($storeID);
    public function getPriceOptions($storeID);
    public function getPriceOption($storeID, $option);
}