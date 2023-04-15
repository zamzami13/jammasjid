<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Form
                </h2>
            </div>
            <div class="alert bg-orange alert-warning alert-dismissible">
				<strong>Warning!</strong> : <span class="message"></span>
			</div>
            <div class="body">
		        <?php echo form_open_multipart($initurl . '/action_' . @$action, 'id="my-form" method="POST" role="form" data-confirm="1"'); ?>
		            <?php echo form_hidden('ID', @$data->font_id); ?>
		            <div class="form-row">

		            	<?php if ($action == "add") : ?>
		                <div class="form-group">
		                	<div class="form-line">
								<input type="file" class="form-control" name="file">
							</div>
		                </div>
		            	<?php endif; ?>

		                <div class="form-group">
							<label>Font Family</label>
		                    <div class="form-line">
								<input type="text" name="family" class="form-control" value="<?php echo @$data->font_family; ?>">
							</div>
						</div>

		                <div class="form-group">
							<label>Font Style</label>
		                    <div class="form-line">
								<input type="text" name="style" class="form-control" value="<?php echo @$data->font_style; ?>">
							</div>
						</div>

		                <div class="form-group">
							<label>Font Weight</label>
		                    <div class="form-line">
								<input type="text" name="weight" class="form-control" value="<?php echo @$data->font_weight; ?>">
							</div>
						</div>

		            </div>

		            <a href="<?php echo @$redirect; ?>" class="btn btn-lg m-t-15 waves-effect">Kembali</a>
                    <button class="btn bg-blue btn-lg m-t-15 waves-effect" type="submit">
		            	<?php echo ($action == "add") ? 'Upload' : 'Edit'; ?>
		            </button>
                    <?php if (@$redirect != "") : ?>
                        <a href="<?php echo @$redirect; ?>" class="myredirect"></a>
                    <?php endif; ?>
		        </form>
		    </div>
		</div>
    </div>
</div>



<script type="text/javascript">

	$(document).ready(function() {
        $('div.alert-warning').slideUp('slow');

		// fungsi validasi
	    var form = "#my-form";
	    var rules = {};
	    var message = {};

	    MyFormValidation.init(form, rules, message);

	    var url = '<?php echo $fullurl; ?>/upload';

	    /*$("#my-form").dropzone({
		     url: url,
		     maxFilesize: 209715200,
		     acceptedFiles: "image/*, video/*",
		     addRemoveLinks: true,
		     dataType: "HTML",
		     timeout: 180000,
		     success: function (file, response, data) {
		         // Do things on Success
		         alert('success');
		     },
		     error: function (file, response) {
		     	file.previewElement.classList.add("dz-error");
		     }
		});*/

	});
</script>