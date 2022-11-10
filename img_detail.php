<?php include 'func/header.php'; 
      require_once 'func/db.php';
      
$num = mysqli_escape_string($conn, $_GET['iid']) ;
$sql = "select * from img where img_id=$num";
$result = mysqli_query($conn, $sql);
?>


<?php 
while($row = mysqli_fetch_array($result)){
    $filter = array(
        'img_title' => htmlspecialchars($row['img_title']),
        'img_date' => htmlspecialchars($row['img_date']),
        'img_imgname' => htmlspecialchars($row['img_imgname']),
        'img_comment' => htmlspecialchars($row['img_comment']),
        'img_comment' => htmlspecialchars($row['img_comment'])
    );
    
    $imgdate = substr($filter['img_date'], 0,10);
    $imgname = $filter['img_imgname'];
    $img_dir = "./fileupload/".$imgname;
    
?>
	<div class="img_detail_content_div">
    	<p><?= $filter['img_title']?></p>
    	<p><?= $filter['img_comment']?></p><p><?= $imgdate?></p>
    	<img class="img_detail_img" src="<?=$img_dir?>" onerror="this.style.visibility='hidden'">
    	
	</div>
<?php }?>

<?php 
$preContent = $num-1;
$nextContent = $num +1;

$sql = "select * from img where img_id=".$preContent;
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
    $filter = array('img_title' => htmlspecialchars($row['img_title']));
}

?>
	<p><a href="img_detail.php?iid=<?= $preContent?>">이전글 : <?= $filter['img_title']?></a></p>
	
<?php 
$sql = "select * from img where img_id=".$nextContent;
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
    $filter = array('img_title' => htmlspecialchars($row['img_title']));
}
?>
	<p><a href="img_detail.php?iid=<?= $nextContent?>">다음글 : <?= $filter['img_title']?></a></p>
	




<?php include 'func/footer.php';?>