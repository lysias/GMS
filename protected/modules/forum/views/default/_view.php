<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

        <? foreach($data->categories as $category): ?>
        <? $this->renderPartial('/forumCategory/_view',array('data'=>$category)) ?>
        <? endforeach; ?>
</div>