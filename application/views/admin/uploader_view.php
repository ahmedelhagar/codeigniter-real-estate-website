<html>
<head>
<title>Upload Form</title>
    <style type="text/css">
    body{
        text-align: center;
    }
    input.upp {
        background: #2a709e;
        color: #fff;
        border: 0px;
        padding: 8px;
        cursor: pointer;
    }
    input[type="number"] {
    float: left;
    width: 50%;
    padding: 5px;
    margin: 10px 0px;
    }
    h5{
    color: #bf3333;
    margin: 0px;
    }
</style>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />
    <h5>Leave ( New Width , New Height ) Empty If You Don`t Need To Resize.</h5>
<input type="number" name="width" placeholder="New Width">
<input type="number" name="height" placeholder="New Height">
<input type="submit" class="upp" value="Upload" />

<?php echo form_close(); ?>

</body>
</html>