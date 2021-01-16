<?php

$file = $_FILES['image'];
$filename = $file['name'];
$tmp_path = $file['tmp_name'];
$file_err = $file['error'];
$file_size = $file['size'];

$caption=filter_input(INPUT_POST, 'caption', FILTER_SANITIZE_SPECIAL_CHARS);

// バリデーション

var_dump($file);