<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'forum-thread-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pinned'); ?>
		<?php echo $form->checkBox($model,'pinned'); ?>
		<?php echo $form->error($model,'pinned'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'global'); ?>
		<?php echo $form->checkBox($model,'global'); ?>
		<?php echo $form->error($model,'global'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'forum_category_id'); ?>
		<?php echo $form->dropDownList($model,'forum_category_id', 
                        CHtml::listData(ForumCategory::model()->findAll(), 'id', 'name', 'forum.name')); ?>
		<?php echo $form->error($model,'forum_category_id'); ?>
	</div>

        <?php echo $this->renderPartial('/forumPost/_form', array('model'=>new ForumPost)); ?>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->