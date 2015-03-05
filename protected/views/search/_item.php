        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="product_img">
             <a href="/product/<?php echo CHtml::encode($data['url']); ?>"><img alt="<?php echo CHtml::encode($data['title']); ?>" src="<?php echo Yii::app()->request->baseUrl; ?><?php echo CHtml::encode($data['images']); ?>" width="213" hegiht="254"></a>
             <div class="discount">
             </div>
             </div>
             <ul class="product_characteristics">
                <li class="product_name"><?php echo CHtml::encode($data['name']); ?></li>
                <li class="product_material">МАТЕРИАЛ: <?php echo CHtml::encode($data['pre_mat']); ?>></li>
                <li class="product_color">ЦВЕТ: <?php echo CHtml::encode($data['color']); ?></li>
                <li class="old_price"><?php echo CHtml::encode($data['price']); ?> ГРН</li>
                <li class="new_price"><?php echo CHtml::encode($data['new_price']); ?> ГРН</li>
             </ul>
             <a href="/product/<?php echo CHtml::encode($data['url']); ?>" class="more_info">подробнее... </a>
        </div>

