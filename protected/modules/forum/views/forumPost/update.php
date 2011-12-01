<?php
$this->breadcrumbs=array(
	'Forum Posts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ForumPost', 'url'=>array('index')),
	array('label'=>'Create ForumPost', 'url'=>array('create')),
	array('label'=>'View ForumPost', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ForumPost', 'url'=>array('admin')),
);
?>

<h1>Update ForumPost <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>