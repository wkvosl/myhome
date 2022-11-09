<?php
require_once '../func/db.php';
require_once '../func/fileUpload.php';

$conn = mysqli_connect($serv, $user, $pw, $db) or die('연결실패');

$title = mysqli_real_escape_string($conn, $_POST['img_title']);
$comment = mysqli_real_escape_string($conn, $_POST['img_comment']); 
$imgname = $cook_file_name;
$mod = $_POST['mod'];


switch($mod){
    
    case 'insert':
        require_once '../func/fileUpload.php';
//         $stmt = mysqli_prepare($conn, "insert into img (img_title, img_comment, img_date, img_datetimestamp, img_imgname) 
//                                         values(?,?,now(),current_timestamp(),?)");
//         mysqli_stmt_bind_param($stmt,'sss',$title, $comment, $imgname);
//         mysqli_stmt_execute($stmt);
//         mysqli_stmt_close($stmt);
            $sql ="insert into img (img_title, img_comment, img_date, img_datetimestamp, img_imgname) 
                                         values('$title','$comment',now(),current_timestamp(),'$imgname')";
            $result = mysqli_query($conn, $sql);
            header('Location:../img.php');
            
        break;
        
        mysqli_close($conn);
}



// echo mysqli_error($conn);
?>

