<?php

class ShopController extends Controller
{
	public function actionIndex()
	{

	}

    public function actionUserMagazine()
    {
        $items = PriceItems::model()->findAllByAttributes(array("seller_id"=>Yii::app()->user->id));
        $NewItem = new PriceItems();
        if(isset($_POST['PriceItems']))
        {
            $NewItem->attributes = $_POST['PriceItems'];
            $NewItem->seller_id = Yii::app()->user->id;
            $NewItem->image=CUploadedFile::getInstance($NewItem,'image');
            $filename = md5($NewItem->id . rand() . time()) . ".png";
            $NewItem->image->saveAs("images/prices_pictures/" . $filename);
            $NewItem->image = $filename;
            if($NewItem->save())
            {
                $this->refresh();
            }
        }
        $this->render('user_magazine', array('items'=>$items, 'new_item'=>$NewItem));
    }

    public function actionUserItems()
    {
        $Items = PriceItems::model()->findAll("seller_id = :seller_id", array(":seller_id"=>Yii::app()->user->id));
        $this->render("user_items", array('items'=>$Items));
    }

    public function actionItem_Full()
    {
        $item = PriceItems::model()->findByPk($_GET['item_id']);
        $this->render('item_full', array('item'=>$item));
    }

    public function actionAllShops()
    {
        $users_with_items = Users::model()->getAllowedShops();
        $this->render('all_shops', array('shops_users'=>$users_with_items));
    }
}