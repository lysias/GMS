<?php
$this->breadcrumbs=array(
	'Forum Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ForumCategory', 'url'=>array('index')),
	array('label'=>'Create ForumCategory', 'url'=>array('create')),
	array('label'=>'Update ForumCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ForumCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ForumCategory', 'url'=>array('admin')),
        array('label'=>'Create Thread', 'url'=>array('forumThread/create')),
);
?>

<h1>View ForumCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'forum_id',
	),
)); ?>

<? foreach($model->threads as $thread): ?>

<? $this->renderPartial('/forumThread/_view',array('data'=>$thread)) ?>
<? endforeach; ?>

