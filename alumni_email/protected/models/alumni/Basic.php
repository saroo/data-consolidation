<?php

/**
 * This is the model class for table "alumni_basic".
 *
 * The followings are the available columns in table 'alumni_basic':
 * @property integer $id
 * @property string $name
 * @property string $nickname
 * @property string $date_of_birth
 * @property string $alumni_email
 */
class Basic extends CActiveRecord
{

  public $postEmail ; 
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Basic the static model class
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
		return 'alumni_basic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, date_of_birth, alumni_email,postEmail', 'required'),
			array('name, nickname', 'length', 'max'=>50),
			array('alumni_email', 'length', 'max'=>100),
      array('alumni_email', 'unique'),
      array('postEmail','length','max'=>7,'min'=>7),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, nickname, date_of_birth, alumni_email', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'nickname' => 'Nickname',
			'date_of_birth' => 'Date Of Birth',
			'alumni_email' => 'Alumni Email',
		);
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('alumni_email',$this->alumni_email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
