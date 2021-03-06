<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property integer $role
 *
 * The followings are the available model relations:
 * @property Roles $role0
 */
class Users extends CActiveRecord
{

    public $password_repeat = null;
    public $scenario = null;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('role', 'numerical', 'integerOnly'=>true),
            array('username', 'unique'),
            array('password', 'compare'),
			array('username, password', 'length', 'max'=>50),
			array('name', 'length', 'max'=>1024),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username, password, name, role, password_repeat, scenario', 'safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'role' => array(self::BELONGS_TO, 'Roles', 'role'),
            'AllowedPriceCount' => array(self::HAS_ONE, 'AllowedPriceCount', 'user_id'),
            'price_items' => array(self::HAS_MANY, 'PriceItems', 'seller_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Логин пользователя',
			'password' => 'Пароль',
            'password_repeat' => 'Повторный ввод пароля для предотвращения ошибок',
			'name' => 'Отображаемое на сайте имя',
			'role' => 'Роль пользователя в системе',
		);
	}

    public function beforeSave()
    {
        $this->password = md5($this->password);
        return parent::beforeSave();
    }

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('role',$this->role);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    function getAvgPrice()
    {
        $counter = 0;
        $sum = 0;
        foreach($this->price_items as $item)
        {
            $sum += $item->price;
            $counter += 1;
        }
        return $counter == 0 ? 0 : (float)($sum/$counter);
    }

    public function getAllowedShops()
    {
        $prices = PriceItems::model()->findAll(array("select"=>"seller_id", 'distinct'=>true));
        $AllowedUsers = array();
        foreach($prices as $price)
            array_push($AllowedUsers, $price->seller_id);
        $result = Users::model()->findAllByAttributes(array("id"=>$AllowedUsers));
        return $result;
    }
}