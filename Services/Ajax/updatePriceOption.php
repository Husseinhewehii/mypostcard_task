<?php

try {
    if(isset($_POST['storeID']) && is_numeric($_POST['storeID']) && isset($_POST['option'])){
        include __DIR__."/../CardService/MyPostCardService.php";
        include __DIR__."/../Api/CurlService.php";
    
        $cardService = new MyPostCardService(new CurlService());
        $price = $cardService->getPriceOption($_POST['storeID'], $_POST['option']);
        echo json_encode(array('success' => 1, "price" => $price));
    }
} catch (\Throwable $th) {
    echo json_encode(array('success' => 1, "message" => "something went wrong"));
}

?>