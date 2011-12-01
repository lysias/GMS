<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('forumThread/view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pinned')); ?>:</b>
	<?php echo CHtml::encode($data->pinned); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('global')); ?>:</b>
	<?php echo CHtml::encode($data->global); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('forum_category_id')); ?>:</b>
	<?php echo CHtml::encode($data->forum_category_id); ?>
	<br />


</div>