<?php
$this->breadcrumbs=array(
	'Forum Posts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ForumPost', 'url'=>array('index')),
	array('label'=>'Create ForumPost', 'url'=>array('create')),
	array('label'=>'Update ForumPost', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ForumPost', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ForumPost', 'url'=>array('admin')),
);
?>

<h1>View ForumPost #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'content',
		'created',
		'forum_thread_id',
	),
)); ?>
