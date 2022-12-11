<div class="btn-group">
    <form method="post" action="App/Services/PDF/print.php">
        
        <input hidden name="imageSrc" style="width: 200px; height:150px;" value="<?php echo $item['thumb_url'];?>" alt="">
        <button type="submit" value="Submit" class="btn btn-success">
            Print PDF
        </button>
    </form>
</div>