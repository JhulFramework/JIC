<?= $this->breadcrumbs() ?>

<br/>
<div class="uform">

<form action="" method="post" enctype="multipart/form-data" class="CNT400">
	<span style="padding:6px 0; display:inline-block;"> <?= $form->string('Select Image') ?></span>
	<span class="hide"><input type="file" name="inputImage" /></span>
	<div><?= $form->error('avatar' ) ?></div>
	<input type="hidden" name="<?= $form->token()->fieldName() ?>" value="<?= $form->token() ?>" />

	<div class="VPad24"
	<button type="submit" class="button">
		<?= \app\components\Bar::I(30)->addClass('E')->T( $form->string('Upload') )->done(); ?>
		<?= \app\components\Bar::I(30)->pl(24)->pr(18)->addClass('DB E')->icon('upload', 20)->FR()->done(); ?>
	</button>
	</div>

</form>

</div>

<style>
body {
    background: whitesmoke;
    font-family: 'Open Sans', sans-serif;
}

.container {
    max-width: 960px;
    margin: 30px auto;
    padding: 20px;
}

h1 {
    font-size: 20px;
    text-align: center;
    margin: 20px 0 20px;
    small {
        display: block;
        font-size: 15px;
        padding-top: 8px;
        color: gray;
    }
}

.avatar-upload {
    position: relative;
    max-width: 205px;
    margin: 50px auto;
    .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
        input {
            display: none;
            + label {
                display: inline-block;
                width: 34px;
                height: 34px;
                margin-bottom: 0;
                border-radius: 100%;
                background: #FFFFFF;
                border: 1px solid transparent;
                box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
                cursor: pointer;
                font-weight: normal;
                transition: all .2s ease-in-out;
                &:hover {
                    background: #f1f1f1;
                    border-color: #d6d6d6;
                }
                &:after {
                    content: "\f040";
                    font-family: 'FontAwesome';
                    color: #757575;
                    position: absolute;
                    top: 10px;
                    left: 0;
                    right: 0;
                    text-align: center;
                    margin: auto;
                }
            }
        }
    }
    .avatar-preview {
        width: 192px;
        height: 192px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #F8F8F8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        > div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    }
}
</style>

<div class="container">
    <h1>jQuery Image Upload
        <small>with preview</small>
    </h1>
    <div class="avatar-upload">
        <div class="avatar-edit">
            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
            </div>
        </div>
    </div>
</div>
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
</script>
