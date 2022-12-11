<div class="btn-group">
    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Price Options
    </button>
    <div class="dropdown-menu">
        <?php foreach ($card['options'] as $option) { ?>
            <a onclick="changePriceDisplay(this)" id="<?php echo $item['id']?>" name="<?php echo $option;?>"class="dropdown-item" ><?php echo $option?></a>
        <?php } ?>
    </div>
</div>