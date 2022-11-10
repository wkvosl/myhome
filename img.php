<?php
require_once 'func/db.php';
include 'func/header.php';

if (mysqli_connect_errno($conn)) {
    echo "데이터베이스 연결 실패: " . mysqli_connect_error();
} else {
    // echo "데이터베이스 연결 성공";
}

$query0 = "select count(img_id) count from img";
$result0 = mysqli_query($conn, $query0);
$row0 = mysqli_fetch_array($result0);
$count = $row0['count'];

// pagination : 한 페이지에 보여지는 열 갯수 및 시작과 끝 열.
$view = 6;
$page = 0;
$first_row = (($_GET['ip'] - 1) * $view); // 첫페이지,
$last_row = ($page + 1) * $view;

// pagination : 보여지는 열을 묶음.
$sumrow = $count;
$totalpage = ceil($sumrow / $view); // page수

// pagination : 쿼리에 rownum으로 보여지는 열을 불러옴.
$query = "select @rownum:=@rownum+1 rownum, ii.* from
            (select i.* from img i, (select @rownum:=0)r order by img_date desc) ii
            order by rownum limit $first_row,$last_row";

$result = mysqli_query($conn, $query);
?>

<div class="img_regi_button_div">
	<a href="img_upload.php"><button>등록</button></a>
</div>

<div class="gallery_container">

   <?php
while ($row = mysqli_fetch_array($result)) {
    $filter = array(
        'img_id' => htmlspecialchars($row['img_id']),
        'img_title' => htmlspecialchars($row['img_title']),
        'img_comment' => htmlspecialchars($row['img_comment']),
        'img_date' => htmlspecialchars($row['img_date']),
        'img_datetimestamp' => htmlspecialchars($row['img_datetimestamp']),
        'img_bid' => htmlspecialchars($row['img_bid']),
        'img_imgname' => htmlspecialchars($row['img_imgname'])
    );

    $onlydate = substr($filter['img_date'], 0, 10);
    $imgname = $filter['img_imgname'];
    // 폴더에 파일 이름이 있으면 데리고 오기
    $file_dir = "./fileupload/" . $imgname;

    if (file_exists($file_dir)) {
        $fp = $file_dir;
    }
    // $sub_imgname = substr($filter['img_imgname'], 12);
    ?>

    <div class='gallery_div' onclick="location.href='img_detail.php?iid=<?= $filter['img_id'] ?>'">
		<img class="thumbnail" src="<?= $fp?>" onerror="this.style.visibility='hidden'">
		<p><?= $filter['img_title'];?></p>
		<p class="p_comment"><?= nl2br($filter['img_comment']);?></p>
		<p><?= $onlydate?></p>
	</div>
<?php  }?>
</div>
<!-- gallery_container -->

<div class="pageCount_div">
<?php
// pagination : 열 묶음의 갯수를 구함.
for ($i = 1; $i < $totalpage + 1; $i ++) {
    ?>
	<a href="img.php?ip=<?= $i?>"><?= $i?></a>
<?php     }?>
	</div>
<!-- pageCount_div-->


<?php include 'func/footer.php';?>