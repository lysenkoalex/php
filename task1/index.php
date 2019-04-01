<?php 

    include_once 'libs/config.php';
    include_once 'libs/functions.php';

    $list_of_file = array();

    if ( isset($_POST["upload_submit_but"]) && isset($_FILES['upload-file-form']['tmp_name']) ) {
        var_dump($_FILES['upload-file-form']['error']);
        $message = upload($_FILES["upload-file-form"]["tmp_name"], $_FILES["upload-file-form"]["name"]);
    }

    if (isset($_POST["submitDeleteFile"]) && isset($_POST["deleteFile"])) 
    {
        $message = delete($uploadDir . $_POST["deleteFile"]);
    }

    //echo validation('files/1.txt', 'f');
    //echo delete('files/1.txt');
    $list_of_file = info(UPLOADS_PATH);

    //var_dump(info(UPLOADS_PATH));

    include_once TEMPLATE_PATH.'index.php';

?>