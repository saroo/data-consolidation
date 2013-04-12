<?php

/**
 * This is the model class for table "alumni_education".
 *
 * The followings are the available columns in table 'alumni_education':
 * @property integer $id
 * @property integer $alumni_id
 * @property integer $passing_year
 * @property integer $branch_id
 * @property integer $degree_id
 * @property string $misc
 */
class Education extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Education the static model class
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
		return 'alumni_education';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('passing_year', 'required'),
			array('alumni_id, passing_year, branch_id, degree_id', 'numerical', 'integerOnly'=>true),
			array('misc', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, alumni_id, passing_year, branch_id, degree_id, misc', 'safe', 'on'=>'search'),
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
			'passing_year' => 'Passing Year',
			'branch_id' => 'Branch',
			'degree_id' => 'Degree',
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
		$criteria->compare('passing_year',$this->passing_year);
		$criteria->compare('branch_id',$this->branch_id);
		$criteria->compare('degree_id',$this->degree_id);
		$criteria->compare('misc',$this->misc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
