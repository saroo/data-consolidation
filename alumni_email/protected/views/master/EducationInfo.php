<?php
/* @var $this EducationController */
/* @var $model Education */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'education-EducationInfo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'passing_year'); ?>
		<?php echo $form->textField($model,'passing_year'); ?>
		<?php echo $form->error($model,'passing_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alumni_id'); ?>
		<?php echo $form->textField($model,'alumni_id'); ?>
		<?php echo $form->error($model,'alumni_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'branch_id'); ?>
		<?php echo $form->textField($model,'branch_id'); ?>
		<?php echo $form->error($model,'branch_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'degree_id'); ?>
		<?php echo $form->textField($model,'degree_id'); ?>
		<?php echo $form->error($model,'degree_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'misc'); ?>
		<?php echo $form->textField($model,'misc'); ?>
		<?php echo $form->error($model,'misc'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
