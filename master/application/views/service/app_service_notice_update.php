<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:공지사항 (듀얼케어 앱)</title>

	<?php
	$parentDir = dirname(__DIR__ . 'views');
	require($parentDir . '/common/head.php');
	?>

	<style>
		td {
			text-align: left;
		}

		th {
			text-align: center;
			width: 200px;
			background: #f1f1f1;
		}

		#file-upload {
			position: absolute;
			left: -9999px;
		}

		label[for="file-upload"] {
			padding: 2px 10px;
			font-size: 13px;
			margin: 0 0 0 3px !important;
			display: inline-block;
			background: #DCDCDC;
			border: 1px solid #888888;
			color: #444444;
			cursor: pointer;
			border-radius: 3px;
		}

		label[for="file-upload"]:hover {
			background: #e0e0e0;
		}

		#filename {
			padding: 3px 10px;
			font-size: 13px;
			float: left;
			white-space: nowrap;
			overflow: hidden;
		}
	</style>
</head>

<body>

<!--상단 네비바-->
<header>
	<?php
	$parentDir = dirname(__DIR__ . 'views');
	require($parentDir . '/common/header.php');
	?>
</header>
<!--상단 네비바-->

<!--콘텐츠 내용-->
<div class="container" style="padding-top: 50px; max-width: none">
	<div class="row">
		<form style="margin: 0 auto; width: 70%">
			<div class="menu-title" style="font-size: 22px">
				<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px">
				공지사항 (듀얼케어 앱) - 글수정
			</div>

			<table id="noticeInfos" class="table" style="margin-top: 30px">
				<tbody>
				<tr>
					<th>제목</th>
					<td>
						<input class="form-control" type="text" id="ntTitle" placeholder="">
					</td>
				</tr>
				<tr>
					<td colspan="2" style="height: 400px; min-height: 400px ; max-height: 400px; background: white">
						<textarea class="form-control" id="ntContent"
								  style="height: inherit; min-height: inherit ; max-height: inherit"></textarea>
					</td>
				</tr>
				</tbody>
			</table>
		</form>
	</div>

	<div class="row">
		<div style="margin: 0 auto">
			<div class="btn-save-square" style="font-size: 18px; padding: 7px 40px; margin-right: 20px"
				 onclick="saveNoticeUpdate()">
				저장
			</div>
			<div class="btn-cancel-square" style="font-size: 18px; padding: 7px 40px;" onclick="cancelBack()">
				취소
			</div>
		</div>
	</div>
</div>
</div>
<!--콘텐츠 내용-->
</body>
</html>

<script>
	<?php
	$parentDir = dirname(__DIR__ . 'views');
	require($parentDir . '/common/check_data.js');
	?>

	//nID 값 받기
	var nId = new Object();
	$(document).ready(function () {
		var val = location.href.substr(
				location.href.lastIndexOf('=') + 1
		);
		nId.id = val;

		instance.post('M019003_REQ_RES', nId).then(res => {
			setNoticeUpdateData(res.data);
		});
	})

	var noticeData;

	function setNoticeUpdateData(data) {
		$('#ntTitle').val(data.title);
		$('#ntContent').val(data.content);

		noticeData = data;
	}

	//수정 저장
	function saveNoticeUpdate() {
		var saveItems = new Object();

		saveItems.id = nId.id;
		saveItems.title = document.getElementById('ntTitle').value;
		saveItems.author = '관리자';
		saveItems.content = document.getElementById('ntContent').value;
		saveItems.targetName = '고객-all';

		if (saveItems.title == "") {
			alert("제목을 입력해주세요.")
		} else if (saveItems.content == "") {
			alert("내용을 입력해주세요.")
		} else {
			if (confirm("저장하시겠습니까?") == true) {
				instance.post('M01900401', saveItems).then(res => {
					if (res.data.message != "FAILED") {
						alert('저장되었습니다');
						location.href = '/master/app_service_notice';
					}
				});
			} else {
				return false;
			}
		}
	}

</script>
