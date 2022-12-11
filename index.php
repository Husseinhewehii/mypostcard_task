



<!DOCTYPE html>
<html lang="en">

<?php include("./partials/headers.php"); ?>

<body>
<div class="container">
  <h2>Basic Table</h2>
  <p>The .table class adds basic styling (light padding and horizontal dividers) to a table:</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Thumbnail</th>
        <th>Title</th>
        <th>Price (€)</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>

<?php

include "./Services/CurlService.php";

$url = "https://appmsds-6aa0.kxcdn.com/content.php?lang=de&json=1&search_text=berlin&currencyiso=EUR";
$service = new CurlService();
$output = $service->get($url);
echo $output;
?>


