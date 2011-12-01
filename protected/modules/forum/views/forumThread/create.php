<?php
$this->breadcrumbs=array(
	'Forum Threads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ForumThread', 'url'=>array('index')),
	array('label'=>'Manage ForumThread', 'url'=>array('admin')),
);
?>

<h1>Create ForumThread</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>