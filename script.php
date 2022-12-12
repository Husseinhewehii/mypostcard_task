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
            url: './App/Services/Ajax/updatePriceOption.php',
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

  function printPDF(item){

    let imageItem = $('img#'+item.id);
    let src = imageItem.attr('src');
    let imageHTML = `<img style="width: 200px; height:150px;" src="${src}"/>`
    // let imageHTML = `<img style="width: 200px; height:150px;" src="https://appdsapi-6aa0.kxcdn.com/card_front_covers/thumb/1741_46.jpg"/>`

    let data = {
      imageHTML: imageHTML
      };

      $.ajax({
            type: "POST",
            url: './App/Services/PDF/print.php',
            data: data,
            success: function(response)
            {
                alert(response);
          }
      });

  }
</script>
