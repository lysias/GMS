<?php
$this->breadcrumbs=array(
	'Forum Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ForumCategory', 'url'=>array('index')),
	array('label'=>'Create ForumCategory', 'url'=>array('create')),
	array('label'=>'View ForumCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ForumCategory', 'url'=>array('admin')),
);
?>

<h1>Update ForumCategory <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>