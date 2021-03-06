<?php
style( 'documents', 'share' );
style( 'documents', 'style' );
style( 'documents', '3rdparty/webodf/dojo-app' );
script('documents', 'share');
script('documents', 'documents');
script('files', 'file-upload');
script('files', 'jquery.iframe-transport');
script('files', 'jquery.fileupload');
?>
<div id="documents-content">
	<ul class="documentslist">
		<li class="add-document">
			<a class="icon-add add svg" target="_blank" href="">
				<label><?php p($l->t('New document')) ?></label>
			</a> 
			<div id="upload" title="<?php p($l->t('Upload (max. %s)', array($_['uploadMaxHumanFilesize']))) ?>">
				<form data-upload-id="1"
					  id="data-upload-form"
					  class="file_upload_form"
					  action="<?php print_unescaped(link_to('files', 'ajax/upload.php')); ?>"
					  method="post"
					  enctype="multipart/form-data"
					  target="file_upload_target_1">
					<?php if($_['uploadMaxFilesize'] >= 0):?>
					<input type="hidden" name="MAX_FILE_SIZE" id="max_upload"
						   value="<?php p($_['uploadMaxFilesize']) ?>" />
					<?php endif;?>
					<!-- Send the requesttoken, this is needed for older IE versions
						 because they don't send the CSRF token via HTTP header in this case -->
					<input type="hidden" name="requesttoken" value="<?php p($_['requesttoken']) ?>" id="requesttoken" />
					<input type="hidden" class="max_human_file_size"
						   value="(max <?php p($_['uploadMaxHumanFilesize']); ?>)" />
					<input type="hidden" name="dir" value="<?php p($_['savePath']) ?>" id="dir" />
					<input type="file" id="file_upload_start" name='files[]' />
					<a href="#" class="icon-upload upload svg">
					<label><?php p($l->t('Upload')) ?></label></a>
				</form>
			</div>
		</li>
		<li class="progress icon-loading"><div><?php p($l->t('Loading documents...')); ?></div></li>
		<li class="document template" data-id="" style="display:none;">
			<a target="_blank" href=""><label></label></a>
		</li>
	</ul>
</div>
<input type="hidden" id="webodf-unstable" value="<?php p($_['useUnstable']) ?>" />
<?php if ($_['enable_previews']): ?>
<input type="hidden" id="previews_enabled" value="<?php p($_['enable_previews']) ?>" />
<?php endif; ?>
<input type="hidden" name="allowShareWithLink" id="allowShareWithLink" value="<?php p($_['allowShareWithLink']) ?>" />
