<?php $counter = 0; ?>
<div class='row shops_grid'>
    <?php
        foreach($shops_users as $shop)
        {
            echo "<div class='span-12 shop_element'>";
                $this->renderPartial("shop", array("shop"=>$shop));
            echo "</div>";
            $counter += 1;
            if($counter == 2)
            {
                echo "</div><div class='row shops_grid'>";
                $counter = 0;
            }
        }
    ?>
</div>