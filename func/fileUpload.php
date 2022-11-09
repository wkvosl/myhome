<?php

$upload_file_name = $_FILES['img_imgname']['name'];
$system_name = $_FILES['img_imgname']['tmp_name'];
$file_error = $_FILES['img_imgname']['error'];

//파일 에러 : 크기
if($file_error != UPLOAD_ERR_OK){
    switch ($file_error){
        case UPLOAD_ERR_FORM_SIZE:
            echo "<script>alert('파일이 너무 큽니다.')</script>"; break;
//         case UPLOAD_ERR_NO_FILE:
//             echo "<script>alert('파일이 없습니다.')</script>"; break;
    }
}

//확장자 : 파일명이 넘어왔을 경우.
if(!empty($upload_file_name)){
    $kind_extension = array('jpg','jpeg','png');
    $extension = explode(".", $upload_file_name);
    
    if(in_array($extension, $kind_extension)){
        echo "<script> alert('허용되지 않은 확장자');</script>";
        exit;
    }
}

// 파일 경로
$upload_dir = $_SERVER['DOCUMENT_ROOT']."/myhome/fileupload/";

//파일명 중복으로 파일 덮어쓰기를 방지하기 위한 파일명 + 난수 붙이기
$file_name_plus = rand(1111,9999);
$now = date('ymd');
    if(!empty($upload_file_name)){
        $cook_file_name = $file_name_plus."_".$now."_".$upload_file_name;
    }else{
        $cook_file_name = null;
    }
//업로드 경로
$upload_file_path = $upload_dir.$cook_file_name ;

//fileupload 폴더에 이미지 넣기.
move_uploaded_file($system_name, $upload_file_path);

?>
