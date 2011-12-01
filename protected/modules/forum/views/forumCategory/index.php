<?php
$this->breadcrumbs=array(
	'Forum Categories',
);

$this->menu=array(
	array('label'=>'Create ForumCategory', 'url'=>array('create')),
	array('label'=>'Manage ForumCategory', 'url'=>array('admin')),
);
?>

<h1>Forum Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
