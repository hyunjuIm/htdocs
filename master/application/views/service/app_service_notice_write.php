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
				공지사항 (듀얼케어 앱) - 글쓰기
			</div>

			<table id="noticeInfos" class="table" style="margin-top: 30px">
				<tbody>
				<tr>
					<th>제목</th>
					<td>
						<input class="form-control" type="text" id="ntTitle" placeholder="">
					</td>
				</tr>
<!--				<tr>-->
<!--					<th>파일</th>-->
<!--					<td>-->
<!--						<span id="filename">&nbsp;</span>-->
<!--						<label for="file-upload">파일찾기<input type="file" id="file-upload"></label>-->
<!--					</td>-->
<!--				</tr>-->
<!--				<tr>-->
<!--					<th style="height: 65px">읽기대상</th>-->
<!--					<td>-->
<!--						<div class="form-check form-check-inline">-->
<!--							<input class="form-check-input" type="checkbox" id="ntTargetAll"-->
<!--								   name="ntTarget" value="전체" onclick="onlyCheck(this, name); targetCheck(id);">-->
<!--							<label class="form-check-label" for="ntTargetAll">전체&nbsp</label>-->
<!--						</div>-->
<!--						<div class="form-check form-check-inline">-->
<!--							<input class="form-check-input" type="checkbox" id="ntTargetCus"-->
<!--								   name="ntTarget" value="고객" onclick="onlyCheck(this, name); targetCheck(id);">-->
<!--							<label class="form-check-label" for="ntTargetCus">고객&nbsp</label>-->
<!--						</div>-->
<!--						<div class="form-check form-check-inline">-->
<!--							<input class="form-check-input" type="checkbox" id="ntTargetCom"-->
<!--								   name="ntTarget" value="기업" onclick="onlyCheck(this, name); targetCheck(id);">-->
<!--							<label class="form-check-label" for="ntTargetCom">기업&nbsp</label>-->
<!---->
<!--						</div>-->
<!--						<div class="form-check form-check-inline">-->
<!--							<input class="form-check-input" type="checkbox" id="ntTargetHos"-->
<!--								   name="ntTarget" value="병원" onclick="onlyCheck(this, name); targetCheck(id);">-->
<!--							<label class="form-check-label" for="ntTargetHos">병원&nbsp</label>-->
<!--						</div>-->
<!--						<div class="form-check form-check-inline" id="target" style="width: 350px">-->
<!---->
<!--						</div>-->
<!--					</td>-->
<!--				</tr>-->
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

	<hr>

	<div class="row">
		<div style="margin: 0 auto">
			<div class="btn-save-square" style="font-size: 18px; padding: 7px 40px; margin-right: 20px"
				 onclick="saveNotice()">
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

	//저장
	function saveNotice() {
		var saveItems = new Object();

		saveItems.title = document.getElementById('ntTitle').value;
		saveItems.author = "관리자";
		saveItems.content = document.getElementById('ntContent').value;
		saveItems.targetName = '고객-all';


		if (saveItems.title == "") {
			alert("제목을 입력해주세요.")
		} else if (saveItems.content == "") {
			alert("내용을 입력해주세요.")
		} else {
			if (confirm("저장하시겠습니까?") == true) {
				instance.post('M019004_REQ', saveItems).then(res => {
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
