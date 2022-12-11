
<?php

include "./Services/CurlService.php";

$url = "https://appmsds-6aa0.kxcdn.com/content.php?lang=de&json=1&search_text=berlin&currencyiso=EUR";
$url2 = "https://www.mypostcard.com/mobile/product_prices.php?json=1&type=get_postcard_products&currencyiso=EUR&store_id=";
$service = new CurlService();
$output = $service->get($url);
$outputArray = json_decode($output, true);
$content = array_slice($outputArray['content'], 0, 25);
// echo "<pre>";print_r($content[0]);
// echo "<pre>";print_r(json_decode($service->get($url2.$content[0]['id']), true)['products'][0]['product_options']['Envelope']);die;

$backgrounds = ["red", "blue", "green"];
?>


<!DOCTYPE html>
<html lang="en">

<?php include("./partials/headers.php"); ?>
<?php include("./partials/styles.php"); ?>

<body>
<div class="container">
  <h2>Berlin Designs</h2>      
  <table class="table">
    <thead>
      <tr>
        <th>Thumbnail</th>
        <th>Title</th>
        <th>Price (€)</th>
        <th>4th row</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($content as $item) {
        ?>
          <tr>  
            <td><img style="width: 200px; height:150px;" src="<?php echo $item['thumb_url'];?>" alt=""></td>
            <td><?php echo $item['title'];?></td>
            <td>
              <?php 
                echo $item['price'];
                if($item['is_greeting_card']){
                  $products = json_decode($service->get($url2.$item['id']), true);
                  // echo "<pre>";print_r($products);die;
                  $envelope = $products['products'][0]['product_options']['Envelope'];
                  echo ", envelope addon: ".$envelope['price'];
                }
              ?>
            </td>
            <td class="background <?php echo $backgrounds[array_rand($backgrounds)]?>"></td>
          </tr>
        <?php
        }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>




