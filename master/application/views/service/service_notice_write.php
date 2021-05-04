<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:공지사항 (예약 웹)</title>

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
				공지사항 (예약 웹) - 글쓰기
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
					<th>파일</th>
					<td>
						<span id="filename">&nbsp;</span>
						<label for="file-upload">파일찾기<input type="file" id="file-upload"></label>
					</td>
				</tr>
				<tr>
					<th style="height: 65px">읽기대상</th>
					<td>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="ntTargetAll"
								   name="ntTarget" value="전체" onclick="onlyCheck(this, name); targetCheck(id);">
							<label class="form-check-label" for="ntTargetAll">전체&nbsp</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="ntTargetCus"
								   name="ntTarget" value="고객" onclick="onlyCheck(this, name); targetCheck(id);">
							<label class="form-check-label" for="ntTargetCus">고객&nbsp</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="ntTargetCom"
								   name="ntTarget" value="기업" onclick="onlyCheck(this, name); targetCheck(id);">
							<label class="form-check-label" for="ntTargetCom">기업&nbsp</label>

						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="ntTargetHos"
								   name="ntTarget" value="병원" onclick="onlyCheck(this, name); targetCheck(id);">
							<label class="form-check-label" for="ntTargetHos">병원&nbsp</label>
						</div>
						<div class="form-check form-check-inline" id="target" style="width: 350px">

						</div>
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
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/check_data.js');
	?>

	function targetCheck(id) {
		$("#target").empty();

		if ($("#" + id + "").is(':checked')) {
			if (id == 'ntTargetCus' || id == 'ntTargetCom') {
				$("#target").html(
						'<select id="ntComName" class="form-control" style="margin-right: 10px"' +
						'onchange="setCompanySelectOption(this,\'' + 'ntComBranch' + '\')">' +
						'<option selected value="all">-전체-</option>' +
						'</select>' +
						'<select id="ntComBranch" class="form-control">' +
						'<option selected>-선택-</option>' +
						'</select>'
				);
			} else if (id == 'ntTargetHos') {
				$("#target").html(
						'<select id="ntHosName" class="form-control" style="margin-right: 10px">' +
						'<option selected value="all">-전체-</option>' +
						'</select>'
				);
			}
		}

		instance.post('M013003_RES').then(res => {

			setNoticeTargetOption(res.data, id);
		});
	}

	var companySelect;

	//읽기대상 selector
	function setNoticeTargetOption(data, id) {
		if (id == 'ntTargetCus' || id == 'ntTargetCom') {
			//회사
			var name = [];
			var nameSize = 0;

			for (i = 0; i < data[1].length; i++) {
				var check = 0;

				//회사명 - 지점있을때
				var jbSplit = data[1][i].split('-');
				var companyName = jbSplit[0];

				for (var j = 0; j < nameSize; j++) {
					if (name[j] == companyName) {
						check += 1;
					}
				}
				if (check < 1) {
					name[nameSize] = companyName;
					nameSize += 1;
				}
			}

			for (i = 0; i < nameSize; i++) {
				var html = '';
				html += '<option value=\'' + name[i] + '\'>' + name[i] + '</option>'
				$("#ntComName").append(html);
			}

			companySelect = data[1];

		} else if (id == 'ntTargetHos') {
			for (i = 0; i < data[0].length; i++) {
				var html = '';
				html += '<option value=\'' + data[0][i] + '\'>' + data[0][i] + '</option>'
				$("#ntHosName").append(html);
			}

		}
	}

	//저장
	function saveNotice() {
		var saveItems = new Object();

		saveItems.title = document.getElementById('ntTitle').value;
		saveItems.author = "관리자";
		saveItems.content = document.getElementById('ntContent').value;

		var check_count = document.getElementsByName("ntTarget").length;

		for (var i = 0; i < check_count; i++) {
			if (document.getElementsByName("ntTarget")[i].checked == true) {
				saveItems.target = document.getElementsByName("ntTarget")[i].value;
			}
		}

		var name = "";
		if (saveItems.target == "전체") {
			name = 'all';
		} else if (saveItems.target == "고객" || saveItems.target == "기업") {
			if ($("#ntComName option:selected").val() == 'all') {
				name = 'all';
			} else {
				name += $("#ntComName option:selected").val();
				name += "-";
				name += $("#ntComBranch option:selected").val();
			}
		} else if (saveItems.target == "병원") {
			name = $("#ntHosName option:selected").val();
		}
		saveItems.targetName = name;



		if (saveItems.title == "") {
			alert("제목을 입력해주세요.")
		} else if (saveItems.content == "") {
			alert("내용을 입력해주세요.")
		} else if (saveItems.target == "" || saveItems.target == null || saveItems.target.indexOf("-선택-") > -1) {
			alert("읽기대상을 선택해주세요.");
		} else {
			if (confirm("저장하시겠습니까?") == true) {
				instance.post('M013004_REQ', saveItems).then(res => {
					if (res.data.message != "FAILED") {

						uploadFile(res.data.message);
					}
				});
			} else {
				return false;
			}
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
			alert('저장되었습니다');
			location.href = '/master/service_notice';
		} else {
			var params = new FormData();
			params.append("file", file.files[0]);
			params.append('fileName', $('#filename').text());
			params.append('noticeId', id);


			instance.post('M01300402', params, {
				headers: {
					'Content-Type': 'multipart/form-data'
				}
			}).then(res => {
				alert('저장되었습니다');
				location.href = '/master/service_notice';
			});
			return true;
		}
	}
</script>
