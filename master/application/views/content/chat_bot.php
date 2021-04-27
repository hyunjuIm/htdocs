<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:챗봇관리</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<style>
		.row {
			width: 100%;
			padding: 0;
			margin: 0;
		}

		.chat-bot-table thead tr,
		.chat-bot-table thead th {
			background: #EDEDED;
		}

		.chat-bot-table tbody tr {
			border-bottom: 1px solid #DCDCDC;
			background: white;
		}

		.chat-bot-table tbody td:not(:last-child) {
			border-right: 1px solid #DCDCDC;
		}

		.chat-bot-table th {
			padding: 5px;
		}

		.chat-bot-table td {
			vertical-align: middle !important;
			padding: 10px 15px;
		}

		i {
			cursor: pointer;
			padding: 7px;
			border-radius: 50%;
			border: 1px solid #DCDCDC;
		}

		i:hover {
			color: #636363;
		}

		textarea {
			width: 100%;
			height: 150px;
			min-height: 150px;
			max-height: 150px;
			background: none;
			outline: none;
			border: none;
			font-weight: 300;
			padding: 10px 15px;
			text-align: justify;
		}

		.btn {
			margin: 0 1px;
		}

		.select {
			background: #eaf9ff !important;
			font-weight: 400;
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
<div class="container" style="padding: 50px 0; max-width: none;width: 70%">
	<div class="row">
		<div class="menu-title" style="font-size: 22px">
			<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px">
			챗봇관리
		</div>
	</div>

	<div class="row" style="margin: 30px 0;border-top: 1px solid #5645ED;">
		<table style="width: 100%" class="chat-bot-table table-bordered">
			<thead>
			<tr>
				<th style="width: 10%">타입</th>
				<th style="width: 20%">키워드</th>
				<th style="width: 30%">질문</th>
				<th style="width: 40%">답변</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>
					<select class="form-control" id="type">
						<option>검진</option>
						<option>건강</option>
					</select>
				</td>
				<td style="padding: 0">
					<textarea id="keywords" readonly>(생성시 입력 X)</textarea>
				</td>
				<td style="padding: 0">
					<textarea id="question"></textarea>
				</td>
				<td style="padding: 0">
					<textarea id="answer"></textarea>
				</td>
			</tr>
			</tbody>
		</table>

		<div style="width: 100%;display: inline-block;margin-top: 5px">
			<div style="float: right" id="chatBotControl">
				<div class="btn btn-dark" onclick="addChatBotItem()">시트추가</div>
				<div class="btn btn-danger" onclick="resetText()">취소</div>
			</div>

		</div>

	</div>

	<hr>

	<div class="row" style="margin-top: 50px">
		<div style="width: 100%;display: inline-block;border-bottom: 1px solid #5645ED;padding-bottom: 5px">
			<div style="float: left">
				<div class="btn-purple-square" data-toggle="modal" data-target="#chatBotUploadModal">
					시트 업로드
				</div>
				<div class="btn-light-purple-square"
					 onclick="tableExcelDownload()">
					시트 다운로드
				</div>
			</div>
<!--			<div class="btn-save-square" style="float: right"-->
<!--				 onclick="setAddChatBotItem()">-->
<!--				시트 추가-->
<!--			</div>-->
		</div>

		<table style="width: 100%" class="chat-bot-table">
			<thead>
			<tr>
				<th style="width: 5%">No</th>
				<th style="width: 8%">타입</th>
				<th style="width: 20%">키워드</th>
				<th style="width: 25%">질문</th>
				<th style="width: 35%">답변</th>
				<th style="width: 7%;font-size: 13px">수정 / 삭제</th>
			</tr>
			</thead>
		</table>

		<div id="chatBotView" style="width: 100%;height: 40vh;overflow-y: auto">
			<table style="width: 100%" class="chat-bot-table table-hover">
				<tbody id="chatBotItems">

				</tbody>
			</table>
		</div>

	</div>

</div>
<!--콘텐츠 내용-->

<?php
require('chat_bot_modal.php');
?>

</body>
</html>

<script>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/check_data.js');
	?>

	var chatBotItems = new Array();

	refreshChatBotTable();

	function refreshChatBotTable() {
		instance.post('M1801').then(res => {
			chatBotItems = res.data;
			setChatBotTable(res.data);
		});
	}

	//챗봇 테이블 셋팅
	function setChatBotTable(data) {
		$('#chatBotItems').empty();

		for (i = 0; i < data.length; i++) {
			var keywords = new Array();
			for (j = 0; j < data[i].keywords.length; j++) {
				keywords.push(data[i].keywords[j]/*.split(':')[0]*/);
			}

			var html = '<tr id=\'' + data[i].id + '\'>' +
					'<td style="width: 5%">' + (i + 1) + '</td>' +
					'<td style="width: 8%">' + data[i].type + '</td>' +
					'<td style="width: 20%;text-align: justify">' + keywords.join(',') + '</td>' +
					'<td style="width: 25%;text-align: justify">' + textareaLine(data[i].question) + '</td>' +
					'<td style="width: 35%;text-align: justify">' + textareaLine(data[i].answer) + '</td>' +
					'<td style="font-size: 18px;width: 7%;padding: 10px">' +
					'<i class="ri-pencil-line" onclick="setUpdateChatBotItem(\'' + i + '\', \'' + data[i].id + '\')"></i>' +
					'<i class="ri-delete-bin-line" onclick="deleteChatBotItem(\'' + data[i].id + '\')"></i>' +
					'</td>' +
					'</tr>';

			$('#chatBotItems').append(html);
		}
	}

	//챗봇 아이템 추가뷰 셋팅
	function setAddChatBotItem() {
		resetText();

		$("#keywords").attr("readonly", true);
		$("#keywords").val('(생성시 입력 X)');

		var html = '';
		html += '<div class="btn btn-dark" onclick="addChatBotItem()">' +
				'시트추가' +
				'</div>';
		html += '<div class="btn btn-danger" onclick="resetText()">' +
				'취소' +
				'</div>'
		$('#chatBotControl').html(html);
	}

	//챗봇 아이템 추가
	function addChatBotItem() {
		var saveItems = new Object();

		saveItems.type = $('#type').val();
		saveItems.keywords = '';
		saveItems.question = $('#question').val();
		saveItems.answer = $('#answer').val();

		if (confirm("새로운 시트를 추가하시겠습니까?") == true) {
			instance.post('M1803', saveItems).then(res => {
				if (res.data.message == "success") {
					alert("추가되었습니다.");
					refreshChatBotTable();
					setAddChatBotItem();
				}
			});
		} else {
			return false;
		}
	}

	//챗봇 아이템 수정뷰 셋팅
	function setUpdateChatBotItem(index, id) {
		$('tr').removeClass('select');
		$('#' + id).addClass('select');

		$("#keywords").attr("readonly", false);

		$('#type').val(chatBotItems[index].type);
		$('#keywords').val(chatBotItems[index].keywords.join(','));
		$('#question').val(chatBotItems[index].question);
		$('#answer').val(chatBotItems[index].answer);

		var html = '';
		html += '<div class="btn btn-secondary" ' +
				'onclick=" updateChatBotItem(\'' + chatBotItems[index].id + '\')">' +
				'수정' +
				'</div>';
		html += '<div class="btn btn-danger" onclick="setAddChatBotItem()">' +
				'취소' +
				'</div>'
		$('#chatBotControl').html(html);
	}

	//챗봇 아이템 수정
	function updateChatBotItem(id) {
		var saveItems = new Object();
		saveItems.id = id;
		saveItems.type = $('#type').val();
		saveItems.keywords = $('#keywords').val();
		saveItems.question = $('#question').val();
		saveItems.answer = $('#answer').val();

		if (confirm("저장하시겠습니까?") == true) {
			instance.post('M1804', saveItems).then(res => {
				if (res.data.message == "success") {
					alert("저장되었습니다.");

					refreshChatBotTable();
					setAddChatBotItem();

					$('#' + id).removeClass('select');
				}
			});
		} else {
			return false;
		}
	}

	//챗봇 아이템 삭제
	function deleteChatBotItem(id) {
		var sendItems = new Object();
		sendItems.id = id;

		if (confirm("삭제하시겠습니까?") == true) {
			instance.post('M1802', sendItems).then(res => {
				if (res.data.message == "success") {
					alert("삭제되었습니다.");
					refreshChatBotTable();
				}
			});
		} else {
			return false;
		}
	}

	//챗봇 입력폼 초기화
	function resetText() {
		$('#type').val('검진');
		$('#keywords').val('');
		$('#question').val('');
		$('#answer').val('');
		$('#chatBotControl').empty();

		$('tr').removeClass('select');
	}

	//챗봇 시트 다운로드
	function tableExcelDownload() {
		fileURL.post('downloadExcel/chatBotSheet').then(res => {
			var data = res.data;

			var excelHandler = {
				getExcelFileName: function () {
					return '[' + todayString() + ']' + ' 챗봇시트.xlsx';
				},
				getSheetName: function () {
					return 'sheet 1';
				},
				getExcelData: function () {
					const table = [];
					const tt = [];
					tt.push("종류");
					tt.push("키워드");
					tt.push("질문");
					tt.push("답변");
					table.push(tt);
					for (var i = 0; i < data.length; i++) {
						const td = [];
						td.push(data[i].type);

						td.push(data[i].keywords);
						td.push(data[i].question);
						td.push(data[i].answer);
						table.push(td);
					}
					return table;
				},
				getWorksheet: function () {
					return XLSX.utils.aoa_to_sheet(this.getExcelData());
				}
			}

			// step 1. workbook 생성
			var wb = XLSX.utils.book_new();

			// step 2. 시트 만들기
			var newWorksheet = excelHandler.getWorksheet();

			// step 3. workbook에 새로만든 워크시트에 이름을 주고 붙인다.
			XLSX.utils.book_append_sheet(wb, newWorksheet, excelHandler.getSheetName());

			// step 4. 엑셀 파일 만들기
			var wbout = XLSX.write(wb, {bookType: 'xlsx', type: 'binary'});

			// step 5. 엑셀 파일 내보내기
			saveAs(new Blob([s2ab(wbout)], {type: "application/octet-stream"}), excelHandler.getExcelFileName());
		});
	}
</script>
