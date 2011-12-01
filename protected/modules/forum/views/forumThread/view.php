<?php
$this->breadcrumbs=array(
	'Forum Threads'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ForumThread', 'url'=>array('index')),
	array('label'=>'Create ForumThread', 'url'=>array('create')),
	array('label'=>'Update ForumThread', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ForumThread', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ForumThread', 'url'=>array('admin')),
);
?>

<h1>View ForumThread #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'pinned',
		'global',
		'forum_category_id',
	),
)); ?>

<? foreach($model->posts as $post): ?>
        <? $this->renderPartial('/forumPost/_view',array('data'=>$post)) ?>
<? endforeach; ?>


<?= CHtml::link('Reply', $this->createUrl('forumPost/create',array('forumThread'=>$model->id))) ?>
