<h1>Поиск по запросу <?php echo CHtml::encode($query); ?></h1>
 
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_item',
)); ?>