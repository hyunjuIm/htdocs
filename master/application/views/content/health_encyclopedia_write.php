<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:질병백과</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
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

		.textarea-form {
			height: 150px;
			min-height: 150px;
			max-height: 400px;
			background: white;
		}

		textarea {
			height: inherit;
			min-height: inherit;
			max-height: inherit;
			font-size: 15px !important;
		}

		#file-img {
			height: auto;
			width: auto;
			max-width: 80%;
			max-height: 400px;
			display: block;
			margin: 0 auto;
			padding: 20px;
		}

		#file-upload {
			position: absolute;
			left: -9999px;
		}

		#filename {
			white-space: nowrap;
			overflow: hidden;
			margin: 0 auto;
			text-align: center;
			width: 100%;
		}
	</style>
</head>

<body>

<!--상단 네비바-->
<header>
	<?php
	$parentDir = dirname(__DIR__ . '..');
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
				질병백과 - 글쓰기
			</div>

			<table class="table" style="margin-top: 30px">
				<tbody>
				<tr>
					<th>제목</th>
					<td>
						<input class="form-control" type="text" id="title" placeholder="">
					</td>
				</tr>
				<tr>
					<th>
						<div style="display: block; margin: 0 auto !important;">
							<div>대표이미지</div>
							<label class="btn btn-success" for="file-upload">파일찾기<input type="file" id="file-upload"></label>
						</div>
					</th>
					<td>
						<div style="display: block">
							<div>
								<img id="file-img" src="http://www.clker.com/cliparts/c/W/h/n/P/W/generic-image-file-icon-hi.png">
							</div>
							<div id="filename"></div>
						</div>
					</td>
				</tr>
				<tr>
					<th>정의</th>
					<td class="textarea-form">
						<textarea class="form-control" id="content1"></textarea>
					</td>
				</tr>
				<tr>
					<th>진단방법</th>
					<td class="textarea-form">
						<textarea class="form-control" id="content2"></textarea>
					</td>
				</tr>
				<tr>
					<th>원인</th>
					<td class="textarea-form">
						<textarea class="form-control" id="content3"></textarea>
					</td>
				</tr>
				<tr>
					<th>증상</th>
					<td class="textarea-form">
						<textarea class="form-control" id="content4"></textarea>
					</td>
				</tr>
				<tr>
					<th>치료법</th>
					<td class="textarea-form">
						<textarea class="form-control" id="content5"></textarea>
					</td>
				</tr>
				<tr>
					<th>식이방법</th>
					<td class="textarea-form">
						<div style="width: 100%;padding: 5px 0">
							<div style="font-weight: 400;font-size: 17px">✔ 권장</div>
							<textarea class="form-control" id="content61" style="min-height: 100px;"></textarea>
						</div>
						<div style="width: 100%;padding: 5px 0">
							<div style="font-weight: 400;font-size: 17px">✔ 주의</div>
							<textarea class="form-control" id="content62" style="min-height: 100px;"></textarea>
						</div>
					</td>
				</tr>
				<tr>
					<th>운동방법</th>
					<td class="textarea-form">
						<textarea class="form-control" id="content7"></textarea>
					</td>
				</tr>
				</tbody>
			</table>
		</form>
	</div>

	<div class="row" style="padding: 50px">
		<div style="margin: 0 auto">
			<div class="btn-save-square" style="font-size: 18px; padding: 7px 40px; margin-right: 20px"
				 onclick="saveEncyclopedia()">
				저장
			</div>
			<div class="btn-cancel-square" style="font-size: 18px; padding: 7px 40px;" onclick="history.back();">
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
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/check_data.js');
	?>

	//저장
	function saveEncyclopedia() {
		var saveItems = new Object();

		saveItems.title = $('#title').val();
		saveItems.author = '관리자';
		saveItems.content1 = $('#content1').val();
		saveItems.content2 = $('#content2').val();
		saveItems.content3 = $('#content3').val();
		saveItems.content4 = $('#content4').val();
		saveItems.content5 = $('#content5').val();
		saveItems.content61 = $('#content61').val();
		saveItems.content62 = $('#content62').val();
		saveItems.content7 = $('#content7').val();



		if (saveItems.title == "") {
			alert("제목을 입력해주세요.");
			return false;
		} else if ($('#filename').text() == '') {
			alert('대표이미지를 첨부해주세요.');
			return false;
		}

		if (confirm("저장하시겠습니까?") == true) {
			instance.post('M1703', saveItems).then(res => {
				if (res.data.message != "FAILED") {

					uploadFile(res.data.message);
				}
			});
		} else {
			return false;
		}
	}

	//파일 업로드명 셋팅
	$('#file-upload').change(function () {
		var filepath = this.value;
		var m = filepath.match(/([^\/\\]+)$/);
		var filename = m[1];
		$('#filename').text(filename);
	});

	//파일 업로드
	function uploadFile(id) {
		var file = document.getElementById('file-upload');

		if (file.files[0] == null) {
			alert('대표이미지를 첨부해주세요.');
			return false;
		}

		var params = new FormData();
		params.append("file", file.files[0]);
		params.append('fileName', $('#filename').text());
		params.append('id', id);


		instance.post('M1706', params, {
			headers: {
				'Content-Type': 'multipart/form-data'
			}
		}).then(res => {

			alert('저장되었습니다');
			location.href = '/master/health_encyclopedia_list';
		});
		return true;
	}

	$("#file-upload").change(function (event) {
		readURL(this);
	});

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#file-img').attr('src', e.target.result);
				$('#file-img').hide();
				$('#file-img').fadeIn(500);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
