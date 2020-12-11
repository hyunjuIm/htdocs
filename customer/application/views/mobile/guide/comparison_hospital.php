<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:병원별 검진 항목 비교</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="../asset/css/mobile/sub_page.css?ver=1.1"/>

	<!-- "excel download" -->
	<script src="xlsx.core.min.js"></script>
	<script src="FileSaver.min.js"></script>
	<script src="tableexport.js"></script>
	<script src="saveexcel.js"></script>

	<style>
		.compare-table {
			width: 100%;
			border-top: black 2px solid;
			margin-bottom: 5rem;
			font-size: 1.3rem;
			word-break: break-all;
		}

		.compare-table tr {
			border-bottom: 1px solid #a7a7a7;
		}

		.compare-table th {
			width: 10rem;
			background: #f6f6f6;
			padding: 0.5rem 1rem;
			font-weight: normal;
			vertical-align: middle;
		}

		.compare-table td {
			font-weight: bolder;
			padding: 0.8rem 2rem;
			vertical-align: middle;
		}

		.compare-table .select {
			padding: 0;
		}

		#choiceTable th, #addTable th {
			vertical-align: top;
		}

		#choiceTable td, #addTable td {
			vertical-align: top;
			text-align: left;
			font-weight: 300 !important;
		}

		.choiceNum {
			color: #5849ea;
			font-weight: bolder;
		}

		.form-control, option {
			width: 100%;
			height: 100%;
			border: none;
			font-size: 1.3rem;
			vertical-align: middle;
			background: white;
		}

	</style>

</head>
<body>

<header>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/header.php');
	?>
</header>

<div class="row" style="display: block">
	<img src="/asset/images/mobile/icon_sub_title_bar.png">
	<h1>병원별 검진 항목 비교</h1>
</div>

<div class="btn-light-purple-square" style="float:right;font-size: 1.2rem;margin-bottom: 1rem"
	 onclick="fnExcelReport('inspectionView','병원비교');">엑셀 다운로드</div>

<div class="row" style="display: block;margin-top: 3rem">
	<table id="pdf" class="compare-table table-bordered">
		<tr>
			<td width="10%">병원</td>
			<td width="30%" class="select">
				<select id="hos1" class="form-control"
						onchange="setPackageSelectOption(this, 'pkg1')">
					<option selected>- 선택 -</option>
				</select>
			</td>
			<td width="30%" class="select">
				<select id="hos2" class="form-control"
						onchange="setPackageSelectOption(this, 'pkg2')">
					<option selected>- 선택 -</option>
				</select>
			</td>
			<td width="30%" class="select">
				<select id="hos3" class="form-control"
						onchange="setPackageSelectOption(this, 'pkg3')">
					<option selected>- 선택 -</option>
				</select>
			</td>
		</tr>
		<tr>
			<td width="10%">패키지</td>
			<td width="30%" class="select">
				<select id="pkg1" class="form-control" onchange="setSearchPackage(id)">
					<option selected>- 선택 -</option>
				</select>
			</td>
			<td width="30%" class="select">
				<select id="pkg2" class="form-control" onchange="setSearchPackage(id)">
					<option selected>- 선택 -</option>
				</select>
			</td>
			<td width="30%" class="select">
				<select id="pkg3" class="form-control" onchange="setSearchPackage(id)">
					<option selected>- 선택 -</option>
				</select>
			</td>
		</tr>
	</table>
</div>

<div class="row" id="inspectionView" style="display: none">
	<table class="compare-table table-bordered" id="nameTable" >
		<tr>
			<td width="30%">병원</td>
			<td width="20%" id="hosName1"></td>
			<td width="20%" id="hosName2"></td>
			<td width="20%" id="hosName3"></td>
		</tr>
		<tr>
			<td width="30%">패키지</td>
			<td width="20%" id="pacName1"></td>
			<td width="20%" id="pacName2"></td>
			<td width="20%" id="pacName3"></td>
		</tr>
	</table>

	<div class="row" style="display: block">
		<div style="text-align: left; font-size: 2rem; font-weight: bolder;line-height: 5rem">
			기본검사
		</div>
		<div style="height: 30rem; overflow-y: scroll">
			<table class="compare-table table-bordered" id="baseTable">
			</table>
		</div>

	</div>
	<div class="row" style="display: block;margin-top: 2rem">
		<div style="text-align: left; font-size: 2rem; font-weight: bolder;line-height: 5rem">
			선택검사
		</div>
		<table class="compare-table table-bordered" id="choiceTable">
		</table>
	</div>

	<div class="row" style="display: block;margin-top: 2rem">
		<div style="text-align: left; font-size: 2rem; font-weight: bolder;line-height: 5rem">
			추가검사
		</div>
		<table class="compare-table table-bordered" id="addTable">

		</table>
	</div>
</div>
</body>

<script>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/check_data.js');
	?>

	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");
	// 내정보
	instance.post('CU_006_001', userData).then(res => {
		setHospitalSelectOption(res.data);
	});

	var packageSelect = new Array();

	//병원 셀렉터 셋팅
	function setHospitalSelectOption(data) {
		packageSelect = data;

		var name = [];

		for (i = 0; i < data.length; i++) {
			var check = 0;

			//회사명 - 지점있을때
			var jbSplit = data[i].hosPkg.split('-');
			var hosName = jbSplit[0];

			for (var j = 0; j < name.length; j++) {
				if (name[j] == hosName) {
					check += 1;
				}
			}
			if (check == 0) {
				name.push(hosName);
			}
		}

		for (i = 0; i < name.length; i++) {
			$("#hos1").append(new Option(name[i]));
			$("#hos2").append(new Option(name[i]));
			$("#hos3").append(new Option(name[i]));
		}
	}

	//패키지 셀렉터 셋팅
	function setPackageSelectOption(selectPackage, target) {
		var branch = document.getElementById(target);

		var opt = document.createElement("option");
		branch.appendChild(opt);

		removeAll(branch);

		for (i = 0; i < packageSelect.length; i++) {
			var jbSplit = packageSelect[i].hosPkg.split('-');
			var branchName = jbSplit[jbSplit.length - 1];

			if (selectPackage.value == jbSplit[0]) {
				$("#" + target + "").append(new Option(branchName, packageSelect[i].pkgId));
			}
		}
	}

	//옵션 삭제
	function removeAll(e) {
		for (i = 0, limit = e.options.length; i < limit - 1; ++i) {
			e.remove(1);
		}
	}

	var pkgList = new Array();
	var totalInspectionItems = new Set();

	//패키지 검색
	function setSearchPackage(id) {
		var pkgId = $("#" + id + " option:selected").val();

		var sendItems = new Object();
		sendItems.pkgId = pkgId;

		instance.post('CU_006_002', sendItems).then(res => {
			$("#inspectionView").show();
			addBaseInjectionData(res.data, id);
			setChoiceInjectionData(res.data, id);
			setAddInjectionTable(res.data, id);
			setName();
		});
	}

	function setName() {
		$('#hosName1').text($('#hos1 option:selected').val());
		$('#hosName2').text($('#hos2 option:selected').val());
		$('#hosName3').text($('#hos3 option:selected').val());

		$('#pacName1').text($('#pkg1 option:selected').text());
		$('#pacName2').text($('#pkg2 option:selected').text());
		$('#pacName3').text($('#pkg3 option:selected').text());
	}

	//id -> 인덱스 몇 번인지
	function findIndex(id) {
		var index = 0;
		if (id === "pkg1") {
			index = 0;
		} else if (id === "pkg2") {
			index = 1;
		} else if (id === "pkg3") {
			index = 2;
		}

		return index;
	}

	//패키지별 기본 검사항목 세팅
	function addBaseInjectionData(data, id) {
		var index = findIndex(id);

		var baseInjection = new Set();
		select = new Set();
		for (i = 0; i < data.length; i++) {
			if (data[i].ipClass == '기본') {
				for (j = 0; j < data[i].inspection.length; j++) {
					baseInjection.add(data[i].inspection[j]);
				}
			} else if (data[i].ipClass.indexOf('선택') > -1) {

				select.add(data[i].ipClass);
			}
		}

		pkgList[index] = baseInjection;
		resetTotalInspectionItems();
		setBaseInjectionTable();
	}

	//기본검사 교집합 배열
	function resetTotalInspectionItems() {
		for (i = 0; i < pkgList.length; i++) {
			if (pkgList[i] != null) {
				pkgList[i].forEach((value) => totalInspectionItems.add(value));
			}
		}
	}

	//기본검사 테이블 셋팅
	function setBaseInjectionTable() {
		$("#baseTable").empty();
		totalInspectionItems.forEach((value) =>
				setBaseInspectionItems(value)
		);
	}

	//기본검사 테이블 프린트
	function setBaseInspectionItems(value) {
		var html = "";
		var ox = new Array();
		ox[0] = "";
		ox[1] = "";
		ox[2] = "";
		for (i = 0; i < pkgList.length; i++) {
			if (pkgList[i] != null) {
				ox[i] = (pkgList[i].has(value)) ? "O" : "";
			}
		}

		html += '<tr>' +
				'<th width="40%" style="text-align: left">' + value + '</th>' +
				'<td width="20%" style="color: #5849ea">' + ox[0] + '</td>' +
				'<td width="20%" style="color: #5849ea">' + ox[1] + '</td>' +
				'<td width="20%" style="color: #5849ea">' + ox[2] + '</td>' +
				'</tr>';
		$("#baseTable").append(html);
	}

	var select = new Set(); //선택검사 항목 이름 몇 개 있는지 담는 배열
	var selectInjection = new Array();
	var allChoiceInspectionItemList = new Array();

	//선택검사 각 인덱스에 할당
	function setChoiceInjectionData(data, id) {
		var index = findIndex(id);

		var idx = 0;
		var choiceInspectionItems = new Array();

		for (i = 0; i < data.length; i++) {
			if (data[i].ipClass.indexOf('선택') > -1) {
				choiceInspectionItems[idx] = data[i];
				idx++;
			}
		}
		selectInjection[index] = choiceInspectionItems;
		setChoiceInjectionTable();
	}

	//선택검사 테이블에 셋팅
	function setChoiceInjectionTable() {
		$("#choiceTable").empty();
		const maxRow = select.size;

		var selectName = [...select];

		for (i = 0; i < maxRow; i++) {
			var html = '';
			html += '<tr>' +
					'<th width="10%" style="text-align: left">' + selectName[i] + '</th>';
			for (j = 0; j < 3; j++) {
				if (selectInjection[j] != null && selectInjection[j][i] != null) {
					html += '<td width="30%">';
					html += '<div class="choiceNum">선택개수 : ' + selectInjection[j][i].choiceLimit + '</div><br>';
					for (k = 0; k < selectInjection[j][i].inspection.length; k++) {
						html += selectInjection[j][i].inspection[k] + '<br>';
					}
					html += '</td>';
				} else {
					html += '<td>';
					html += '</td>';
				}
			}

			html += '</tr>';
			$("#choiceTable").append(html);
		}
	}

	var addInspection = new Array(3);

	//추가검사
	function setAddInjectionTable(data, id) {
		var index = findIndex(id);

		for (i = 0; i < data.length; i++) {
			if (data[i].ipClass == '추가') {
				addInspection[index] = data[i].inspection;
			}
		}

		$("#addTable").empty();

		var html = '';
		html += '<tr>' +
				'<th width="10%" style="text-align: left">추가검사</th>';

		for (i = 0; i < 3; i++) {
			html += '<td width="30%">'
			if (addInspection[i] != null) {
				for (j = 0; j < addInspection[i].length; j++) {
					html += addInspection[i][j] + '<br>';
				}
			}
			html += '</td>';
		}
		html += '</tr>';

		$("#addTable").append(html);
	}

</script>

<!--엑셀다운로드-->
<script>
	function fnExcelReport(id, title) {
		var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
		tab_text = tab_text + '<head><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">';
		tab_text = tab_text + '<xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>'
		tab_text = tab_text + '<x:Name>Test Sheet</x:Name>';
		tab_text = tab_text + '<x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
		tab_text = tab_text + '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';
		tab_text = tab_text + "<table border='1px'>";
		var exportTable = $('#' + id).clone();
		exportTable.find('input').each(function (index, elem) { $(elem).remove(); });
		tab_text = tab_text + exportTable.html();
		tab_text = tab_text + '</table></body></html>';
		var data_type = 'data:application/vnd.ms-excel';
		var ua = window.navigator.userAgent;
		var msie = ua.indexOf("MSIE ");
		var fileName = title + '.xls';
//Explorer 환경에서 다운로드
		if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
			if (window.navigator.msSaveBlob) {
				var blob = new Blob([tab_text], {
					type: "application/csv;charset=utf-8;"
				});
				navigator.msSaveBlob(blob, fileName);
			}
		} else {
			var blob2 = new Blob([tab_text], {
				type: "application/csv;charset=utf-8;"
			});
			var filename = fileName;
			var elem = window.document.createElement('a');
			elem.href = window.URL.createObjectURL(blob2);
			elem.download = filename;
			document.body.appendChild(elem);
			elem.click();
			document.body.removeChild(elem);
		}
	}
</script>

</html>
