
<?php

include "./Services/CurlService.php";

$url = "https://appmsds-6aa0.kxcdn.com/content.php?lang=de&json=1&search_text=berlin&currencyiso=EUR";
$service = new CurlService();
$output = $service->get($url);
$outputArray = json_decode($output, true);
$content = array_slice($outputArray['content'], 0, 25);
// echo "<pre>";print_r($content[0]);die;
?>


<!DOCTYPE html>
<html lang="en">

<?php include("./partials/headers.php"); ?>

<body>
<div class="container">
  <h2>Berlin Designs</h2>      
  <table class="table">
    <thead>
      <tr>
        <th>Thumbnail</th>
        <th>Title</th>
        <th>Price (€)</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($content as $item) {
        ?>
          <tr>  
            <td><img style="width: 200px;" src="<?php echo $item['thumb_url'];?>" alt=""></td>
            <td><?php echo $item['title'];?></td>
            <td><?php echo $item['price'];?></td>
          </tr>
        <?php
        }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>




