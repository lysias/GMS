<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'forum-post-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php
                $this->widget(
                        'ext.jmarkitup.JBBCodeEditor', array(
                    'model' => $model,
                    'attribute' => 'content',
                    'theme' => 'markitup',
                    'htmlOptions' => array('rows' => 15, 'cols' => 70),
                    'options' => array(
                    'previewParserPath'=>Yii::app()->urlManager->createUrl('forum/forumPost/create'),
                    )
                ));

                ?>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->