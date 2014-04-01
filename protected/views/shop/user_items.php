<?php
/**
 * Created by PhpStorm.
 * User: AlexanderV
 * Date: 01.04.14
 * Time: 10:08
 */
?>
<table class="items_table">
    <tr class="table_header">
        <td width="1"><b>ID</b></td>
        <td width="10"><b>Image</b></td>
        <td width="1"><b>Name</b></td>
        <td width="1000"><b>Price</b></td>
        <td width="1000"><b>Actions</b></td>
    </tr>
    <?php
        foreach($items as $item)
        {
            echo "<tr>";
                echo "<td>" . $item->id . "</td>";
                echo "<td> <img src='" . "/images/prices_pictures/" . $item->image . "' style='max-width: 40px;'/></td>";
                echo "<td>" . $item->name . "</td>";
                echo "<td>" . $item->price . "</td>";
                echo "<td>" .
                    TbHtml::button('Просмотреть', array('size' => TbHtml::BUTTON_SIZE_MINI)) .
                    TbHtml::button('Изменить', array('size' => TbHtml::BUTTON_SIZE_MINI)) .
                    TbHtml::button('Удалить', array('size' => TbHtml::BUTTON_SIZE_MINI)) . "</td>";
            echo "</tr>";
        }
    ?>
</table>