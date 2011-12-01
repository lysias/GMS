<?php
$this->breadcrumbs=array(
	'Forum Posts',
);

$this->menu=array(
	array('label'=>'Create ForumPost', 'url'=>array('create')),
	array('label'=>'Manage ForumPost', 'url'=>array('admin')),
);
?>

<h1>Forum Posts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
