<?php

interface CardService{
    public function getBerlinProducts();
    public function getGreetingCard($storeID);
    public function getPriceOptions($storeID);
}