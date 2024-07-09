<?php
/* @var $this BlogsController */
/* @var $model Blogs */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php
$visibltyList = array('0'=>'Hide', '1'=>'Show');
$form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'category_id'); ?>
		<?php echo $form->dropDownList($model,'category_id',BlogCategory::model()->findAll()); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_visible'); ?>
        <?php echo $form->radioButtonList($model,'is_visible',$visibltyList,array('separator'=>' ','labelOptions'=>array('style'=>'display:inline;float: unset;'),)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->