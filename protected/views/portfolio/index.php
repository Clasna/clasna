		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/fresco.js"></script>
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fresco.css" />
<div class="container">
        <div class="content3">
            <div class="container">
                <h1>
                    тег #anazone
                </h1>
                <div class="clearfix"></div>
                <div class="row igor_slider">
                <div class="demonstrations">
                <?php if($model) {?>
                <?php foreach($model as $models) {?>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                       <a href="<?php echo $models->path; ?>" class='fresco' data-fresco-group='example' data-fresco-caption="<?php echo $models->alt; ?>" ><img alt="<?php echo $models->alt; ?>" src="<?php echo Yii::app()->request->baseUrl; ?><?php echo $models->path; ?>"></a>
                    </div>
                <?php } ?>
                <?php } ?>
               	</div>
                </div>
            </div>
        </div>
</div>