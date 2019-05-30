<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php echo $error;?>

    <?php echo form_open_multipart('form_ctrl/do_upload');?>

    <input type="file" name="userfile" size="20" />
    <br><br>
    <input type="file" name="userfile1" size="20" />
    <br /><br />

    <input type="submit" value="upload" />

    </form>
</body>
</html>