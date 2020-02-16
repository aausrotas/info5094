<html>
<head>
	<meta charset="utf-8">
	<title>File Upload</title>
</head>
<body>
	
<?php
    require_once("php/db_connect.php");
	require_once("php/upload.php");
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST"){
        $err_msgs = validateFormData();
        if (count($err_msgs) > 0){
            displayErrors($err_msgs);
            displayForm();
        } else {
            $status = processUploads();
            displayStatus($status);
        }
    } else {
        displayForm();
    }

    function displayForm(){
?>
    <form method="POST" enctype="multipart/form-data">
    <br />
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
    <input type="file" name="uploads" />
    <br />
    <input type="submit" name="uploadFiles" value="Upload" />
    <br />
    <p>To upload a file, click browse and navigate to a .CSV file on your computer. Then hit upload.</p>
    </form>
<?php
    }

     
?>

</body>
</html>
