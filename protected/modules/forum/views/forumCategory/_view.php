<div class="view">

        
        <b style="float: right">Threads: <?= CHtml::encode($data->threadCount) ?><br />
                Posts: <?= CHtml::encode($data->getPostCount()) ?>
        </b>
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode(CHtml::encode($data->name)), array('forumCategory/view', 'id'=>$data->id)); ?>
	<br />

	<i><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</i>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>