<div id="div-images"><!-- CONTENT GALLERY -->
<h4>Изображение</h4>
<hr>
<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right">
		<?php echo $form->labelEx($model,'images'); ?>
	</label>

	<div class="col-xs-12 col-sm-9">
		<?php echo $form->fileField($model,'images',array()); ?>
		<?php if ( $model->images ) { ?>
			<img class="admin_grid_image" src="<?php echo $model->images; ?>" width="100" height="100" />
		<?php } ?>
		<?php echo $form->error($model,'images'); ?>
	</div>

</div>

<input name="path[]" id="filesToUpload" type="file" multiple="" onChange="makeFileList();"/>
<script>
function makeFileList() {
var input = document.getElementById("filesToUpload");
var ul = document.getElementById("fileList");
while (ul.hasChildNodes()) {
ul.removeChild(ul.firstChild);
}
for (var i = 0; i < input.files.length; i++) {
var li = document.createElement("li");
li.innerHTML = input.files[i].name;
ul.appendChild(li);
}
if(!ul.hasChildNodes()) {
var li = document.createElement("li");
li.innerHTML = 'No Files Selected';
ul.appendChild(li);
}
}
</script>
<div class="notification success png_bg">
<div><b>Массовая загрузка фото</b></div>
</div>

<ul id="fileList"></ul>
<?php if($model->id){?>
<?php $img=Images::model()->findAll('id_product = '.$model->id); ?>
<?php } ?>
<?php if(isset($img)){?>
<?php foreach($img as $images){ ?>
<ul>
<li style="list-style:none;">
	<img class="admin_grid_image" src="<?php echo $images->path; ?>" width="100" height="100" />
	<a href="?delimg=<?php echo $images->id;?>" onclick="return confirmDelete();" style="margin: 0 0 0 10px;">x</a>
</li>
</ul>
<?php } ?>
<?php } ?>

<hr>
</div> <!-- END CONTENT GALLERY -->