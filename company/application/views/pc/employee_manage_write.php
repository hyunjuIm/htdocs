<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	require('common/head.php');
	?>

	<style>
		.basic-table th {
			background: #f3f3f3;
		}

		.basic-table tr:hover{
			background: white;
		}

		input[type=text] {
			width: 85%;
			outline: none;
			font-size: 1.4rem;
			padding: 0.3rem 1rem;
			border: 1px solid #DDDDDD;
		}

		select {
			width: 15%;
			outline: none;
			font-size: 1.4rem;
			padding: 0.3rem 0.5rem;
			border: 1px solid #DDDDDD;
		}

		textarea {
			width: 100%;
			height: 35rem;
			min-height: 35rem;
			max-height: 35rem;
			font-size: 1.4rem;
			padding: 1rem 1.5rem;
			outline: none;
			border: 1px solid #DDDDDD !important;
		}

		form {
			text-align: left;
			height: 3.138rem;
		}

		#file-upload {
			position: absolute;
			left: -9999px;
		}

		label[for="file-upload"] {
			padding: 0.3em 1rem;
			margin-left: 0.5rem;
			font-size: 1.4rem;
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
			padding: 0.3em 1rem;
			font-size: 1.4rem;
			float: left;
			width: 50rem;
			white-space: nowrap;
			overflow: hidden;
			background: white;
			border: 1px solid #DCDCDC;
		}

		.btn-red {
			padding: 0.3em 1rem;
			margin-left: 0.5rem;
			font-size: 1.4rem;
			display: inline-block;
			background: #db3b3b;
			border: 1px solid #db3b3b;
			color: white;
			cursor: pointer;
			border-radius: 3px;
		}

		.btn-red:hover {
			background: #c23535;
		}

		.btn-white {
			padding: 0.3em 1rem;
			margin-left: 0.5rem;
			font-size: 1.4rem;
			display: inline-block;
			background: white;
			border: 1px solid #888888;
			color: #444444;
			cursor: pointer;
			border-radius: 3px;
		}

		.btn-white:hover {
			background: #f5f5f5;
		}
	</style>
</head>
<body>

<!--상단 메뉴-->
<header>
	<?php
	require('common/header.php');
	?>
</header>

<!--콘텐츠 내용-->

<div class="main">
	<div class="container" style="width:80%;margin: 0 auto">
		<div class="row">
			<div class="box-title">
				<img src="/asset/images/icon_title.png">
				<h2 style="font-weight: 300;font-size: 2.3rem">직원관리</h2>
			</div>
		</div>

		<div class="row" style="display: block">
			<table class="basic-table">
				<tr>
					<th width="10%">제목</th>
					<td style="display: flex">
						<select id="division" style="margin-right: 0.5rem">
							<option>사원등록</option>
							<option>퇴사자관리</option>
						</select>
						<input type="text" id="title">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<textarea id="content"></textarea>
					</td>
				</tr>
				<tr>
					<th>파일첨부</th>
					<td style="vertical-align: middle !important;">
						<div style="text-align: left;font-size: 1.3rem;font-weight: 400;margin-bottom: 0.5rem">
							요청하신 작업에 필요한 파일이 있는 경우 추가해 주세요.<br>
							<span style="color: #d70e24">※ 명단 등록 및 삭제 작업 시에는 필수로 첨부해 주셔야 합니다.(샘플 양식 참고)</span>
						</div>
						<div style="display: flex;">
							<form method="post" enctype="multipart/form-data" action="">
								<span id="filename">&nbsp;</span>
								<label for="file-upload">파일찾기<input type="file" id="file-upload"></label>
							</form>
							<div class="btn-red" onclick="deleteFile()">삭제</div>
							<div class="btn-white" onclick="downloadBasicSheet('customer', '회사명_사업장명_날짜_직원입력 양식.xlsx')">양식다운로드</div>
						</div>
					</td>
				</tr>
			</table>
		</div>

		<div class="row" style="display: block;margin-top: 5rem;">
			<div style="float:right;">
				<div class="btn-light-grey-square" onclick="saveEmployeeManageData()">글쓰기</div>
				<div class="btn-white-square" onclick="history.back();">목록</div>
			</div>
		</div>
	</div>
</body>
</html>

<script>
	//상단바 선택된 메뉴
	$('#topMenu2').addClass('active');
	$('#topMenu2').before('<div class="menu-select-line"></div>');

	$('#loading').hide();

	//파일 업로드명 셋팅
	$('#file-upload').change(function () {
		var filepath = this.value;
		var m = filepath.match(/([^\/\\]+)$/);
		var filename = m[1];
		$('#filename').text(filename);
	});

	function deleteFile() {
		$("input:file").clearInputs(true);
		$('#filename').html('&nbsp;');
	}

	//파일삭제
	$.fn.clearFields = $.fn.clearInputs = function(includeHidden) {
		var re = /^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i;
		return this.each(function() {
			var t = this.type, tag = this.tagName.toLowerCase();
			if (re.test(t) || tag == 'textarea') {
				this.value = '';
			}
			else if (t == 'checkbox' || t == 'radio') {
				this.checked = false;
			}
			else if (tag == 'select') {
				this.selectedIndex = -1;
			}
			else if (t == "file") {
				if (/MSIE/.test(navigator.userAgent)) {
					$(this).replaceWith($(this).clone(true));
				} else {
					$(this).val('');
				}
			}
			else if (includeHidden) {
				if ( (includeHidden === true && /hidden/.test(t)) ||
						(typeof includeHidden == 'string' && $(this).is(includeHidden)) )
					this.value = '';
			}
		});
	};

	//글쓰기
	function saveEmployeeManageData() {
		var saveItems = new Object();

		saveItems.title = $('#title').val();
		saveItems.division = $("#division option:selected").val();
		saveItems.content = $('#content').val();
		saveItems.author = sessionStorage.getItem("userComID");//companyManagerId
		saveItems.companyId = sessionStorage.getItem("userCoID");//companyId

		console.log(saveItems);

		if (confirm("저장하시겠습니까?") == true) {
			instance.post('C0301', saveItems).then(res => {
				if (res.data != 'FAILED') {
					uploadFile(res.data);
				}
			}).catch(function (error) {
				alert("잘못된 접근입니다.")
			});
		} else {
			return false;
		}
	}

	//파일 업로드
	function uploadFile(id) {
		var file = document.getElementById('file-upload');

		if (file.files[0] == null) {
			alert('저장되었습니다');
			location.href = '/company/employee_manage';
		}

		var params = new FormData();
		params.append("file", file.files[0]);
		params.append('fileName', $('#filename').text());
		params.append('hlpId', id);
		console.log(params);

		instance.post('C0302', params, {
			headers: {
				'Content-Type': 'multipart/form-data'
			}
		}).then(res => {
			alert('저장되었습니다');
			location.href = '/company/employee_manage';
		});
		return true;
	}

	<?php
	require('common/file_data.js');
	?>

</script>

