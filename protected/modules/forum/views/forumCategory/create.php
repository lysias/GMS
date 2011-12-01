<?php
$this->breadcrumbs=array(
	'Forum Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ForumCategory', 'url'=>array('index')),
	array('label'=>'Manage ForumCategory', 'url'=>array('admin')),
);
?>

<h1>Create ForumCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>