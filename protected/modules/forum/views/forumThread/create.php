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

<?php $this->renderPartial('_form',array('model'=>$model)); ?>

<? $this->widget(
        'ext.jmarkitup.JBBCodeEditor', array(
    'model' => new ForumPost,
    'attribute' => 'content',
    'theme' => 'markitup',
    'htmlOptions' => array('rows' => 15, 'cols' => 70),
    'options' => array(
    'previewParserPath'=>Yii::app()->urlManager->createUrl('forum/forumPost/create'),
    )
));

?>