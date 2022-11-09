<?php
include 'func/header.php';
?>

<!-- body img board upload 나만 쓸거야. 관리자가 올리는 게시판.-->

<div class="gallery_upload_div">
	<H3>갤러리 업로드</H3>

    <form method="post" action="action/img_action.php" enctype="multipart/form-data">
    <input type="hidden" name="mod" value="insert">
    	<table>
    		<tr>
    			<td>제목</td> <!-- varchar 45-->
    			<td><input name="img_title"></td>
    		</tr>
    		<tr>
    			<td>메모</td> <!-- varchar 45-->
    			<td><textarea name="img_comment" ></textarea></td>
    		</tr>
    		<tr>
    			<td>파일</td>
    			
    			<td>
    				<input type="hidden" name="MAX_FILE_SIZE" value="10485760"> <!-- 10MB -->
    				<input type="file" name="img_imgname">
    			</td>
    		</tr>
    	</table>
    	
    <div class="gallery_upload_div_button">
    	<input type="submit" value="등록">
    </div>
    </form>    
    
</div> <!-- gallery_upload_div end-->
<!-- body img board-->

<?include 'func/footer.php'; ?>