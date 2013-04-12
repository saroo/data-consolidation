<?php

/**
 * This is the model class for table "alumni_contacts".
 *
 * The followings are the available columns in table 'alumni_contacts':
 * @property integer $id
 * @property integer $alumni_id
 * @property string $phone_home
 * @property string $phone_mobile
 * @property string $phone_work
 * @property string $general_email
 * @property string $iitr_email
 */
class Contacts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Contacts the static model class
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
		return 'alumni_contacts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('phone_home, general_email, iitr_email', 'required'),
      array('general_email','email'),
      array('general_email,iitr_email','unique'),
			array('alumni_id', 'numerical', 'integerOnly'=>true),
			array('phone_home, phone_mobile, phone_work, general_email, iitr_email', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, alumni_id, phone_home, phone_mobile, phone_work, general_email, iitr_email', 'safe', 'on'=>'search'),
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
			'alumni_id' => 'Alumni',
			'phone_home' => 'Phone Home',
			'phone_mobile' => 'Phone Mobile',
			'phone_work' => 'Phone Work',
			'general_email' => 'Primary Email Forwarding address',
			'iitr_email' => 'Iitr Email',
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
		$criteria->compare('alumni_id',$this->alumni_id);
		$criteria->compare('phone_home',$this->phone_home,true);
		$criteria->compare('phone_mobile',$this->phone_mobile,true);
		$criteria->compare('phone_work',$this->phone_work,true);
		$criteria->compare('general_email',$this->general_email,true);
		$criteria->compare('iitr_email',$this->iitr_email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
