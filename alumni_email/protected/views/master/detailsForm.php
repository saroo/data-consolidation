<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'basic-basicInfoForm-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($basic); ?>
	<?php echo $form->errorSummary($education); ?>
	<?php echo $form->errorSummary($contacts); ?>

	<div class="row">
		<?php echo $form->labelEx($basic,'name'); ?>
		<?php echo $form->textField($basic,'name'); ?>
		<?php echo $form->error($basic,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($basic,'date_of_birth'); ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model'=>$basic,
				'attribute'=>'date_of_birth',
				//'name'=>'publishDate',
				// additional javascript options for the date picker plugin
				'options' => array(
					// how to change the input format? see http://docs.jquery.com/UI/Datepicker/formatDate
					'dateFormat'=>'mm-dd-yy',
					'yearRange'=>'-100:+0',

					// user will be able to change month and year
					'changeMonth' => 'true',
					'changeYear' => 'true',

					// shows the button panel under the calendar (buttons like "today" and "done")
					'showButtonPanel' => 'true',

					// this is useful to allow only valid chars in the input field, according to dateFormat
					'constrainInput' => 'false',

					// speed at which the datepicker appears, time in ms or "slow", "normal" or "fast"
					'duration'=>'fast',

					// animation effect, see http://docs.jquery.com/UI/Effects
					'showAnim' =>'slide',
					),  

				'htmlOptions'=>array(
					'style'=>'height:20px;'
					),
				));
	?>
		<?php echo $form->error($basic,'date_of_birth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($basic,'alumni_email'); ?>
    <div class="hint"> Preferably Use : [firstname].[lastname].<?php echo $basic->postEmail ?> </div>
		<?php echo $form->textField($basic,'alumni_email'); ?>
    . <?php echo $basic->postEmail; ?> @ iit-roorkee.org
		<?php echo $form->error($basic,'alumni_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($basic,'nickname'); ?>
		<?php echo $form->textField($basic,'nickname'); ?>
		<?php echo $form->error($basic,'nickname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($education,'passing_year'); ?>
<?php 
$years=array('empty'=>'Year');
  for($i=intval(date('Y')); $i> 1856 ;--$i) $years[$i.""]=$i;
echo CHtml::activeDropDownList($education, 'passing_year',  $years);
?>
		<?php //echo $form->textField($education,'passing_year', array('size'=>'20', 'maxLength'=>4)); ?>
		<?php echo $form->error($education,'passing_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($education,'branch_id'); ?>
    <?php echo $form->dropDownList($education,'branch_id', CHtml::listData(Branch::model()->findAll(array('order' => 'name')),'id','name'));?>
		<?php echo $form->error($education,'branch_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($education,'degree_id'); ?>
    <?php echo $form->dropDownList($education,'degree_id', CHtml::listData(Degree::model()->findAll(array('order' => 'name')),'id','name'));?>
		<?php echo $form->error($education,'degree_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($education,'misc'); ?>
		<?php echo $form->textArea($education,'misc'); ?>
		<?php echo $form->error($education,'misc'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($contacts,'phone_home'); ?>
		<?php echo $form->textField($contacts,'phone_home'); ?>
		<?php echo $form->error($contacts,'phone_home'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($contacts,'general_email'); ?>
		<?php echo $form->textField($contacts,'general_email'); ?>
		<?php echo $form->error($contacts,'general_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($contacts,'phone_mobile'); ?>
		<?php echo $form->textField($contacts,'phone_mobile'); ?>
		<?php echo $form->error($contacts,'phone_mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($contacts,'phone_work'); ?>
		<?php echo $form->textField($contacts,'phone_work'); ?>
		<?php echo $form->error($contacts,'phone_work'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($contacts,'iitr_email'); ?>
		<?php echo $form->textField($contacts,'iitr_email', array('readOnly'=>true)); ?>
		<?php echo $form->error($contacts,'iitr_email'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
