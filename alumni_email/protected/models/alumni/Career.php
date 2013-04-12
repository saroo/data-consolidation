<?php

/**
 * This is the model class for table "alumni_career".
 *
 * The followings are the available columns in table 'alumni_career':
 * @property integer $id
 * @property integer $alumni_id
 * @property string $job_title
 * @property string $company
 * @property string $progression
 * @property string $misc
 */
class Career extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Career the static model class
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
		return 'alumni_career';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('job_title, company', 'required'),
			array('alumni_id', 'numerical', 'integerOnly'=>true),
			array('job_title, company', 'length', 'max'=>255),
			array('progression, misc', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, alumni_id, job_title, company, progression, misc', 'safe', 'on'=>'search'),
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
			'job_title' => 'Job Title',
			'company' => 'Company',
			'progression' => 'Progression',
			'misc' => 'Misc',
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
		$criteria->compare('job_title',$this->job_title,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('progression',$this->progression,true);
		$criteria->compare('misc',$this->misc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}