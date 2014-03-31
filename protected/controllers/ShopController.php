<?php

class ShopController extends Controller
{
	public function actionIndex()
	{
        $items = PriceItems::model()->findAllByAttributes(array("seller_id"=>Yii::app()->user->id));
        $NewItem = new PriceItems();
        if(isset($_POST['PriceItems']))
        {
            $NewItem->attributes = $_POST['PriceItems'];
            $NewItem->seller_id = Yii::app()->user->id;
            if($NewItem->save())
                $this->refresh();
        }
		$this->render('index', array('items'=>$items, 'new_item'=>$NewItem));
	}

    public function actionItem_Full()
    {
        $item = PriceItems::model()->findByPk($_GET['item_id']);
        $this->render('item_full', array('item'=>$item));
    }
}