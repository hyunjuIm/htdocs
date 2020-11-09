<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:공지사항</title>

	<?php
	require('head.php');
	?>

	<style>
		td {
			text-align: left;
			vertical-align: baseline !important;
		}

		th {
			text-align: center;
			width: 200px;
			background: #f1f1f1;
		}
	</style>
</head>

<body>

<!--상단 네비바-->
<header>
	<?php
	require('header.php');
	?>
</header>
<!--상단 네비바-->

<!--콘텐츠 내용-->
<div class="container" style="padding-top: 50px; max-width: none">
	<div class="row">
		<form style="margin: 0 auto; width: 70%">
			<div class="menu-title" style="font-size: 22px">
				<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px">
				공지사항
			</div>

			<table id="noticeInfos" class="table" style="margin-top: 30px;">
				<tbody>
				<tr>
					<th>제목</th>
					<td id="ntTitle"></td>
				</tr>
				<tr>
					<th>작성자</th>
					<td id="ntAuthor"></td>
				</tr>
				<tr>
					<th>파일</th>
					<td id="ntFile"></td>
				</tr>
				<tr>
					<th>읽기대상</th>
					<td id="ntTarget"></td>
				</tr>
				<tr>
					<td id="ntContent" colspan="2" style="height: 400px; background: white; padding: 40px"></td>
				</tr>
				</tbody>
			</table>
		</form>
	</div>

	<div class="row">
	</div>

	<div class="row">
	<form style="margin: 0 auto; width: 70%">
		<div style="float:right">
			<div class="btn-cancel-square" onclick="cancelBack()">목록</div>
			<div class="btn-purple-square" onclick="sendNoticeID()"> 수정 </div>
			<div class="btn-light-purple-square" onclick="deleteNotice()"> 삭제 </div>
		</div>
	</form>
</div>
</div>
<!--콘텐츠 내용-->
</body>

<?php
require('check_data.php');
?>

</html>

<script>
	//nID 값 받기
	var nId = new Object();
	$(document).ready(function () {
		var val = location.href.substr(
			location.href.lastIndexOf('=') + 1
		);
		nId.id = val;
		nId.dummy = "123";

		instance.post('M013003_REQ_RES', nId).then(res => {
			setNoticeDetailData(res.data);
		});
	})

	function setNoticeDetailData(data){
		console.log(data);

		document.getElementById('ntTitle').innerHTML = data.title;
		document.getElementById('ntAuthor').innerHTML = data.author;
		document.getElementById('ntFile').innerHTML = data.fileName;
		document.getElementById('ntTarget').innerHTML = data.target+ " ) " +data.targetName;
		document.getElementById('ntContent').innerHTML = textareaLine(data.content);
	}

	//공지 수정에 값 던지기
	function sendNoticeID() {
		location.href = "service_notice_update?id=" + nId.id;
	}

	function deleteNotice() {
		if (confirm("삭제하시겠습니까?") == true) {
			console.log(nId);
			instance.post('M013005_REQ', nId).then(res => {
				console.log(res.data.message);
				if (res.data.message == "success") {
					alert("삭제되었습니다.");
					history.back();
				}
			});
		} else {
			return false;
		}
	}
</script>
