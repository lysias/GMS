<div class="view">
        <?= $data->user->getUserImage(array('style'=>'float:right; width: 80px')) ?>
        	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	by <b><?= CHtml::encode($data->user->nick) ?></b>
        <hr />
	<div>
                <?php echo $data->parseContent(); ?>
        </div>
	<br />


        



</div>