<?php

class MasterController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	// Uncomment the following methods and override them if needed
  public function filters()
  {
    return array( 'accessControl' ); // perform access control for CRUD operations
  }

  public function accessRules()
  {
    return array(
        array('allow', // allow authenticated users to access all actions
          'users'=>array('@'),
          ),
        array('deny'),
        );
  }
  

/*	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/

  public function actionDetails()
  {
    $basic = new Basic;
    $education = new Education;
    $contacts = new Contacts;
    
//    $this->performAjaxValidation(array($basic, $education, $contacts));

    if(isset($_POST['Basic'],$_POST['Education'],$_POST['Contacts'])) 
    {
      $basic->attributes = $_POST['Basic'];
      $education->attributes = $_POST['Education'];
      $contacts->attributes = $_POST['Contacts'];

      $valid = $basic->validate();
      $valid = $education->validate() && $valid ;
      $valid = $contacts->validate() && $valid ;
      
      if($valid)
      {
        $basic->alumni_email = $basic->alumni_email.".".$basic->postEmail;
        $basic->save();

        $education->alumni_id = $basic->id ;
        $education->save();

        $contacts->alumni_id = $basic->id ;
        $contacts->save();
        $this->render('success');
      }
      else
      {
      //  var_dump($basic->getErrors(), $education->getErrors(),$contacts->getErrors(),'hi');
       // throw new CHttpException(000,'Invalid data.');
      }

    }
    else
    {
      $username = Yii::app()->user->name;
      $basic->postEmail = substr($username, 5,3).date('Y');
      $contacts->iitr_email = $username;
     }
      $this->render('detailsForm', array('basic'=>$basic, 'education'=>$education, 'contacts'=>$contacts));
  }
  public function actionBasicInfo()
  {
    $model=new Basic;

    // uncomment the following code to enable ajax-based validation
    
       if(isset($_POST['ajax']) && $_POST['ajax']==='basic-basicInfoForm-form')
       {
       echo CActiveForm::validate($model);
       Yii::app()->end();
       }
     

    if(isset($_POST['Basic']))
    {
      $model->attributes=$_POST['Basic'];
      if($model->validate())
      {
        // form inputs are valid, do something here
        return;
      }
    }
    $this->render('basicInfoForm',array('model'=>$model));
  }

  public function actionEducation()
  {
    $model=new Education;

       if(isset($_POST['ajax']) && $_POST['ajax']==='education-EducationInfo-form')
       {
       echo CActiveForm::validate($model);
       Yii::app()->end();
       }
     

    if(isset($_POST['Education']))
    {
      $model->attributes=$_POST['Education'];
      if($model->validate())
      {
        // form inputs are valid, do something here
        return;
      }
    }
    $this->render('EducationInfo',array('model'=>$model));
  }

  public function actionContacts()
  {
    $model=new Contacts;

       if(isset($_POST['ajax']) && $_POST['ajax']==='contacts-ContactsForm-form')
       {
       echo CActiveForm::validate($model);
       Yii::app()->end();
       }

    if(isset($_POST['Contacts']))
    {
      $model->attributes=$_POST['Contacts'];
      if($model->validate())
      {
        // form inputs are valid, do something here
        return;
      }
    }
    $this->render('ContactsForm',array('model'=>$model));
  }
}
