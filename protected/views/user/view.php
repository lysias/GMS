<?php
$this->breadcrumbs=array(
	'User'=>array('/user'),
	'View',
);?>

<div style="width: 400px; margin: auto;">
<? $this->renderPartial('_user',array('model'=>$user)) ?>
<? $this->renderPartial('_profile',array('model'=>$profile)) ?>
</div>