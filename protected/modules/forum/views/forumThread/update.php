<?php
$this->breadcrumbs=array(
	'Forum Threads'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ForumThread', 'url'=>array('index')),
	array('label'=>'Create ForumThread', 'url'=>array('create')),
	array('label'=>'View ForumThread', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ForumThread', 'url'=>array('admin')),
);
?>

<h1>Update ForumThread <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>