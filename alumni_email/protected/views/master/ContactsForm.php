<?php
/* @var $this ContactsController */
/* @var $model Contacts */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contacts-ContactsForm-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_home'); ?>
		<?php echo $form->textField($model,'phone_home'); ?>
		<?php echo $form->error($model,'phone_home'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'general_email'); ?>
		<?php echo $form->textField($model,'general_email'); ?>
		<?php echo $form->error($model,'general_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alumni_id'); ?>
		<?php echo $form->textField($model,'alumni_id'); ?>
		<?php echo $form->error($model,'alumni_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_mobile'); ?>
		<?php echo $form->textField($model,'phone_mobile'); ?>
		<?php echo $form->error($model,'phone_mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_work'); ?>
		<?php echo $form->textField($model,'phone_work'); ?>
		<?php echo $form->error($model,'phone_work'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iitr_email'); ?>
		<?php echo $form->textField($model,'iitr_email'); ?>
		<?php echo $form->error($model,'iitr_email'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->