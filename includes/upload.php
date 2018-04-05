<?php
$upload_file = null;
if (isset($_FILES['upload_file'])) {
    $upload_file = $_FILES['upload_file'];
}

$upload_dir = null;
if (isset($_POST['upload_dir'])) {
    $upload_dir = $_POST['upload_dir'];
}

$upload_value = null;
if (isset($_POST['upload_value'])) {
    $upload_value = $_POST['upload_value'];
}

$upload_name = null;
if (isset($_POST['upload_name'])) {
    $upload_name = $_POST['upload_name'];
}

if ($upload_file['name'][0]) {

    $i = 0;

    foreach ($upload_file['name'] as $key => $row_upload) {

        //generate new $_FILES array
        $array_upload = array(
            'name'     => $upload_file['name'][$i],
            'type'     => $upload_file['type'][$i],
            'tmp_name' => $upload_file['tmp_name'][$i],
            'size'     => $upload_file['size'][$i],
            'error'    => $upload_file['error'][$i],
        );

        //upload
        class_filesUpload($array_upload, $upload_dir[$i], 0);

        //generate $_POST
        $_POST[$upload_name[$i]] = $upload_file['name'][$i];

        $i++;
    }
}
