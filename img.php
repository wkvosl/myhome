<?php
    require_once 'func/db.php';
   include 'func/header.php';
   
   
   $conn = mysqli_connect($serv, $user, $pw, $db) or die('연결실패');
   
   if (mysqli_connect_errno($conn)) {
       echo "데이터베이스 연결 실패: " .mysqli_connect_error();
   } else {
       //     echo "데이터베이스 연결 성공";
   }
   
   $query0 ="select count(img_id) count from img";
   $result0 = mysqli_query($conn, $query0);
   $row0 =mysqli_fetch_array($result0);
   $count = $row0['count'];
   
   $view = 6;
   $page = 0;
   $sumrow = $count;
   
   $totalpage = ceil($sumrow/$view); //page수
   
   $query="select @rownum:=@rownum+1 rownum, ii.* from
            (select i.* from img i, (select @rownum:=0)r order by img_date desc) ii
            order by rownum limit $page,$view";
   
   $result = mysqli_query($conn, $query);
   ?>

   
<div class="gallery_container">

   <?php
   while($row = mysqli_fetch_array($result)){
       $filter = array(
           'img_id' => htmlspecialchars($row['img_id']),
           'img_title' => htmlspecialchars($row['img_title']),
           'img_comment' => htmlspecialchars($row['img_comment']),
           'img_date' => htmlspecialchars($row['img_date']),
           'img_datetimestamp' => htmlspecialchars($row['img_datetimestamp']),
           'img_bid' => htmlspecialchars($row['img_bid']),
           'img_imgname' => htmlspecialchars($row['img_imgname'])
       );
   
   $onlydate = substr($filter['img_date'],0,10);
   $imgname = $filter['img_imgname'];
//    폴더에 파일 이름이 있으면 데리고 오기
   $file_dir = "./fileupload/".$imgname;
   
   if(file_exists($file_dir)){
           $fp=$file_dir;
   }
//    $sub_imgname = substr($filter['img_imgname'], 12);
?>
    <div class='gallery_div'>
        <img src="<?= $fp?>" onerror="this.style.visibility='hidden'">
		<p><?= $filter['img_title'];?></p>
		<p class="p_comment"><?= nl2br($filter['img_comment']);?></p>
		<p><?= $onlydate?></p>
	</div>
<?php    }
for($i=1; $i<$totalpage+1; $i++){
?>
<a href="img.php?p=<?= $page?>"><?= $i?></a>
<?php     }?>

</div>
<a href = "img_upload.php"><button>등록</button></a>

<?php include 'func/footer.php';?>