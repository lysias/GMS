<?php
$this->breadcrumbs=array(
	'Forum Threads',
);

$this->menu=array(
	array('label'=>'Create ForumThread', 'url'=>array('create')),
	array('label'=>'Manage ForumThread', 'url'=>array('admin')),
);
?>

<h1>Forum Threads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
