<?php
function class_filesUpload($File, $resource, $debug)
{
    $target_dir    = PATH_RESOURCES . $resource . "/";
    $target_file   = $target_dir . basename($File["name"]);
    $uploadOk      = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    if ($File) {
        $check = getimagesize($File["tmp_name"]);
        if ($check !== false) {
            $results  = "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $results  = "File is not an image.";
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
        $results  = "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($File["size"] > 500000) {
        $results  = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        $results  = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $results = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($File["tmp_name"], $target_file)) {
            $results = "The file " . basename($File["name"]) . " has been uploaded.";
        } else {
            $results = "Sorry, there was an error uploading your file.";
        }
    }

    if ($debug) {
        class_debug($results);
    }

    return array('code'=>$uploadOk,'msg'=>$results);
}
