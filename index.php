
<?php

require "./vendor/autoload.php";
include "./Services/CardService/MyPostCardService.php";
include "./Services/Api/CurlService.php";

$cardService = new MyPostCardService(new CurlService());
$outputArray = $cardService->getBerlinProducts();
$content = array_slice($outputArray['content'], 0, 25);

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
                  $card = $cardService->getGreetingCard($item['id']);
                  $envelope = $card['envelope'];
   
                  include './partials/envelopePrice.php';
                  include './partials/dropdown.php';
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

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script >
  function changePriceDisplay(item){
      let id = item.id;
      let name = item.name;
      let data = {
        storeID: id,
        option : name
      };

      $.ajax({
            type: "POST",
            url: './Services/Ajax/updatePriceOption.php',
            data: data,
            success: function(response)
            {
                var jsonData = JSON.parse(response);
  
                if (jsonData.success == 1)
                {
                    let price = jsonData.price;
                    $("#item-price-"+id).html(`${name} price: ${price}`);
                }
                else
                {
                    console.log(jsonData.message);
                }
          }
      });

    }
</script>



