<script type="text/javascript">
$( document ).ready(function() {
$('.default').click(function(){
	$('#div-default').show();
	$('#div-seo').hide();
	$('#div-content').hide();
	$(this).addClass('active-sp');
	$('.content').removeClass('active-sp');
	$('.seo').removeClass('active-sp');
});
$('.content').click(function(){
	$('#div-default').hide();
	$('#div-seo').hide();
	$('#div-content').show();
	$(this).addClass('active-sp');
	$('.pr-sof li').removeClass('active-sp');
	$('.default').removeClass('active-sp');
	$('.seo').removeClass('active-sp');
});
$('.seo').click(function(){
	$('#div-default').hide();
	$('#div-seo').show();
	$('#div-content').hide();
	$(this).addClass('active-sp');
	$('.pr-sof li').removeClass('active-sp');
	$('.content').removeClass('active-sp');
	$('.default').removeClass('active-sp');
});
	$('.pr-sof li:first').addClass('active-sp');
	$('#div-seo').hide();
	$('#div-content').hide();
});
</script>
<style type="text/css">
.pr-sof {
	display: inline-block;
	border-bottom: 1px solid #ccc;
}
.pr-sof li {
	list-style: none;
	display: inline-block;
	cursor: pointer;
	padding: 5px 15px 5px 15px;
}
.active-sp {
	font-weight: bold;
}
</style>
<div>
	<ul class="pr-sof">
		<li class="default">Основная</li>
		<li class="seo">SEO</li>
		<li class="content">Контент</li>
	</ul>
</div>
<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'articles-form',
	'enableAjaxValidation' => false,
	'htmlOptions' => array(
		'class' => 'form-horizontal',
		'enctype' => 'multipart/form-data'
	)
)); ?>

	<?php echo $form->errorSummary($model); ?>
<div id="div-default">
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'name_ua'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'name_ua', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'name_ua'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'name_ru'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'name_ru', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'name_ru'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'name_en'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'name_en', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'name_en'); ?>
		</div>
	</div>
<hr>
<h4>ЧПУ</h4>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'url'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'url', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'255')); ?>
			</div>
			<?php echo $form->error($model, 'url'); ?>
		</div>
	</div>
<hr>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model,'status'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->dropDownList($model, 'status', array('1'=>'Да', '0'=>'Нет')); ?>
			</div>
			<?php echo $form->error($model,'status'); ?>
		</div>

	</div>

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model,'header'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $main; ?>
			</div>
			<?php echo $form->error($model,'header'); ?>
		</div>

	</div>

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model,'parent_id'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->dropDownList($model, 'parent_id', CHtml::listData(Catalog::model()->findAll(),'id','name'),array(
				'empty'=>'Выберите каталог',
				'class'=>'input-large'
			)); ?>
			</div>
			<?php echo $form->error($model,'parent_id'); ?>
		</div>

	</div>
<?php 
$items = array();
$catalog = Catalog::getCatalog();
foreach ($catalog as $key => $value) {
	$items[$value->id] = $value;
}
$childrens = array(); // Массив для соответствий дочерних элементов их родительским
  foreach ($items as $item) {
    if ($item->parent_id) $childrens[$item->id] = $item->parent_id; // Заполняем массив
  }
//var_dump($childrens);
  function printItem($item, $items, $childrens) {
    /* Выводим пункт меню */
    echo "<li>";
    echo "<a href='".$item->id."'>".$item->name_ua."</a>";
    $ul = false; // Выводились ли дочерние элементы?
    while (true) {
      /* Бесконечный цикл, в котором мы ищем все дочерние элементы */
      $key = array_search($item->id, $childrens); // Ищем дочерний элемент
      if (!$key) {
        /* Дочерних элементов не найдено */
        if ($ul) echo "</ul>"; // Если выводились дочерние элементы, то закрываем список
        break; // Выходим из цикла
     }
      unset($childrens[$key]); // Удаляем найденный элемент (чтобы он не выводился ещё раз)
      if (!$ul) {
        echo "<ul>"; // Начинаем внутренний список, если дочерних элементов ещё не было
        $ul = true; // Устанавливаем флаг
      }
      echo printItem($items[$key], $items, $childrens); // Рекурсивно выводим все дочерние элементы
    }
    echo "</li>";
  }
 ?>
	<?php  if($catalog = Catalog::getCatalog()){?>
	<div class="form-group">
		  <ul>
		    <?php
		      foreach ($items as $item) {
		        if (!$item->parent_id) echo printItem($item, $items, $childrens);
		      }
		    ?>
		  </ul>
	</div>
	<?php } ?>
</div>
<hr>

<div id="div-seo">
<h4>SEO</h4>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'title_ua'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'title_ua', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'255')); ?>
			</div>
			<?php echo $form->error($model, 'title_ua'); ?>
		</div>
	</div>
	<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'title_ru'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'title_ru', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'255')); ?>
			</div>
			<?php echo $form->error($model, 'title_ru'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'title_en'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'title_en', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'255')); ?>
			</div>
			<?php echo $form->error($model, 'title_en'); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'keywords_ua'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'keywords_ua', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'255')); ?>
			</div>
			<?php echo $form->error($model, 'keywords_ua'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'keywords_ru'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'keywords_ru', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'255')); ?>
			</div>
			<?php echo $form->error($model, 'keywords_ru'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'keywords_en'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'keywords_en', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'255')); ?>
			</div>
			<?php echo $form->error($model, 'keywords_en'); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'description_ua'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'description_ua', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'255')); ?>
			</div>
			<?php echo $form->error($model, 'description_ua'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'description_ru'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'description_ru', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'255')); ?>
			</div>
			<?php echo $form->error($model, 'description_ru'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'description_en'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'description_en', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'255')); ?>
			</div>
			<?php echo $form->error($model, 'description_en'); ?>
		</div>
	</div>
<hr>
</div>
<div id="div-content">
<div class="form-group" >
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'content_ua'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php $this->widget('application.extensions.ckeditor.CKEditor',array('model'=>$model,'attribute'=>'content_ua','language'=>'ru','editorTemplate'=>'full'));?>
			</div>
			<?php echo $form->error($model, 'content_ua'); ?>
		</div>
</div>
<div class="form-group" >
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'content_ru'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php $this->widget('application.extensions.ckeditor.CKEditor',array('model'=>$model,'attribute'=>'content_ru','language'=>'ru','editorTemplate'=>'full'));?>
			</div>
			<?php echo $form->error($model, 'content_ru'); ?>
		</div>
</div>
<div class="form-group" >
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'content_en'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php $this->widget('application.extensions.ckeditor.CKEditor',array('model'=>$model,'attribute'=>'content_en','language'=>'ru','editorTemplate'=>'full'));?>
			</div>
			<?php echo $form->error($model, 'content_en'); ?>
		</div>
</div>

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model,'path'); ?>
		</label>
		<div class="col-xs-12 col-sm-9">
			<?php echo $form->fileField($model,'path',array()); ?>
				<?php if ( $model->path ) { ?>
					<img class="admin_grid_image" src="<?php echo $model->path; ?>" width='167px' height="137px"/>
				<?php } ?>
			<?php echo $form->error($model,'path'); ?>
		</div>

	</div>
</div> 
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class' => 'btn btn-info')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

