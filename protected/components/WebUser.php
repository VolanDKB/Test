<?php

// this file must be stored in:
// protected/components/WebUser.php

class WebUser extends CWebUser {

        private $_model = null;

        function getRole(){
            $user = $this->loadUser(Yii::app()->user->id);
            if($user)
                return $user->role;
            return -1;
        }

        function getCounter(){
            $user = $this->loadUser(Yii::app()->user->id);
            $price_items = PriceItems::model()->findAllByAttributes(array("seller_id"=>Yii::app()->user->id));
            return (int)($user->AllowedPriceCount->counter - count($price_items));
        }

        protected function loadUser($id=null)
        {
            if($this->_model===null)
            {
                if($id!==null)
                    $this->_model=Users::model()->findByPk($id);
            }
            return $this->_model;
        }
    }
?>