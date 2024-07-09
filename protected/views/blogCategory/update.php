<?php
/* @var $this BlogCategoryController */
/* @var $model BlogCategory */

$this->breadcrumbs=array(
	'Blog Categories'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BlogCategory', 'url'=>array('index')),
	array('label'=>'Create BlogCategory', 'url'=>array('create')),
	array('label'=>'View BlogCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BlogCategory', 'url'=>array('admin')),
);
?>

<h1>Update BlogCategory <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>