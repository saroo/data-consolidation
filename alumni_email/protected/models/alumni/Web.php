<?php

/**
 * This is the model class for table "alumni_web".
 *
 * The followings are the available columns in table 'alumni_web':
 * @property integer $id
 * @property integer $alumni_id
 * @property string $website
 * @property string $fb_profile
 * @property string $linkedin_profile
 * @property string $comments
 */
class Web extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Web the static model class
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
		return 'alumni_web';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('alumni_id', 'numerical', 'integerOnly'=>true),
			array('website, fb_profile, linkedin_profile, comments', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, alumni_id, website, fb_profile, linkedin_profile, comments', 'safe', 'on'=>'search'),
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
			'website' => 'Website',
			'fb_profile' => 'Fb Profile',
			'linkedin_profile' => 'Linkedin Profile',
			'comments' => 'Comments',
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
		$criteria->compare('website',$this->website,true);
		$criteria->compare('fb_profile',$this->fb_profile,true);
		$criteria->compare('linkedin_profile',$this->linkedin_profile,true);
		$criteria->compare('comments',$this->comments,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}