<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pinned'); ?>
		<?php echo $form->textField($model,'pinned'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'global'); ?>
		<?php echo $form->textField($model,'global'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'forum_category_id'); ?>
		<?php echo $form->textField($model,'forum_category_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->