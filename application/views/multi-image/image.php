<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- file upload form -->
    <form action="image_ctrl/index" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Choose Files</label>
            <input type="file" name="files[]" multiple>
        </div>
        <div class="form-group">
            <input type="submit" value="UPLOAD" name="fileSubmit" >
        </div>
    </form>
    <!-- display status message -->
    <p><?php echo $this->session->flashdata('statusMsg'); ?></p>

    <!-- display uploaded images -->
    <div class="row">
        <ul class="gallery">
            <?php if(!empty($files)){ foreach($files as $file){ ?>
            <li class="item">
                <img src="<?php echo base_url('uploads/files/'.$file['file_name']); ?>" >
                <p>Uploaded On <?php echo date("j M Y",strtotime($file['uploaded_on'])); ?></p>
            </li>
            <?php } }else{ ?>
            <p>Image(s) not found.....</p>
            <?php } ?>
        </ul>
    </div>
</body>
</html>