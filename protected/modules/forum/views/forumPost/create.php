<?php
$this->breadcrumbs=array(
	'Forum Posts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ForumPost', 'url'=>array('index')),
	array('label'=>'Manage ForumPost', 'url'=>array('admin')),
);
?>

<h1>Create ForumPost</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>