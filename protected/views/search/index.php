<div class="container">
<?php if(isset($query)) {?>
<h3>Поиск по запросу <b><?php echo CHtml::encode($query); ?></b></h3>
<?php } ?>
<div id="prod" class="content2">
<div class="container">
<div class="row products">
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_item',
)); ?>
</div>
</div>
</div>
</div>