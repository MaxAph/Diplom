<?php
    $upload_dir = __DIR__ . '/Upload//';      
    $poster_name = $_FILES["poster"]["name"];
    $poster_tmp_name = $_FILES["poster"]["tmp_name"];
    $error = $_FILES["poster"]["error"];
    $poster_name = $_FILES["poster"]["name"];
    $poster_tmp_name = $_FILES["poster"]["tmp_name"];
    $error = $_FILES["poster"]["error"];
    $random_name = rand(1000,1000000)."-".$poster_name;
    $upload_name = $upload_dir.strtolower($random_name);
    $upload_name = preg_replace('/\s+/', '-', $upload_name);

    if(move_uploaded_file($poster_tmp_name , $upload_name)) {
        $response = array(
            "status" => "success",
            "error" => false,
            "message" => "File uploaded successfully",
            "url" => $upload_dir."/".$upload_name
        );
    }else
    {
        $response = array(
            "status" => "error",
            "error" => true,
            "message" => "Error uploading the file!"
        );
    }

$img = 'Upload/'. $random_name;
?>