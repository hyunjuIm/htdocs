<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:패키지검사항목구성</title>

	<?php
	require('head.php');
	?>

	<style>
		#selectNumTable {
			border: none;
			margin: 5px;
			float: right;
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
		<div style="width:100%; padding: 0 30px">
			<div class="btn-save-square" data-toggle="modal" data-target="#packageUploadModal" style="float: right;">
				검사항목 엑셀 업로드
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-7" style="margin: 0 auto; ">
			<form class="table-box">
				<div class="menu-title" style="font-size: 22px; margin-bottom: 20px">
					<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
					패키지구성
				</div>

				<ul class="nav nav-tabs package-tabs">
					<li class="nav-item" id="allPackageTab">
						<a class="nav-link active" data-toggle="tab" href="#" onclick="clickPackageTab(0)">전체</a>
					</li>
					<li class="nav-item" id="basePackageTab">
						<a class="nav-link" data-toggle="tab" href="#" onclick="clickPackageTab(1)">기본</a>
					</li>
					<li class="nav-item" id="addPackageTab">
						<a class="nav-link" data-toggle="tab" href="#" onclick="clickPackageTab(2)">추가</a>
					</li>
					<li class="nav-item menu-title" id="selectPackageA" style="display: none">
						<a class="nav-link" data-toggle="tab" href="#" onclick="clickPackageTab(3)">선택A</a>
					</li>
					<li class="nav-item" id="selectPackageB" style="display: none">
						<a class="nav-link" data-toggle="tab" href="#" onclick="clickPackageTab(4)">선택B</a>
					</li>
					<li class="nav-item" id="selectPackageC" style="display: none">
						<a class="nav-link" data-toggle="tab" href="#" onclick="clickPackageTab(5)">선택C</a>
					</li>
					<li class="nav-item" id="selectPackageD" style="display: none">
						<a class="nav-link" data-toggle="tab" href="#" onclick="clickPackageTab(6)">선택D</a>
					</li>
					<li class="nav-item" id="addTab">
						<a class="nav-link" data-toggle="tab" href="#addTab"
						   style="font-weight: bold; background: #E6E6E6"
						   onclick="addPackageTab()">+</a>
					</li>
				</ul>
				<div class="tab-content" style="height: 400px; overflow-y: scroll">
					<div class="tab-pane fade show active" id="packageTab">
						<table id="selectNumTable" style="display: none; font-size: 15px; width: fit-content">
							<tbody>
							<tr>
								<td style="font-weight: 400; padding-right: 5px">최대선택개수</td>
								<td><input type="number" class="form-control" id="choiceLimit"
										   min="1" max="10" placeholder=""
										   style="width: 70px"></td>
								<td>
									<div class="btn-save-square" style="padding: 2px 15px; font-size: 13px"
										 onclick="setChoiceNum()">설정
									</div>
								</td>
							</tr>
							</tbody>
						</table>

						<table id="packageTable">
							<thead>
							<tr>
								<th style="width: 5%"><input type="checkbox" id="packageCheck" name="packageCheck"
															 onclick="clickAll(id, name)"></th>
								<th>세부항목</th>
								<th style="width: 30%">검사명</th>
								<th style="width: 10%">구분</th>
								<th style="width: 10%">성별</th>
								<th>추가금</th>
								<th>비고</th>
							</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>

			</form>
		</div>
		<div class="col-xs-auto" style="margin-top: 13%">
			<div style="display: grid; justify-content: center; align-items: center">
				<div class="btn-purple-square" style="font-size: 18px; padding: 5px 10px; margin-bottom: 5px"
					 onclick="delInjection()"> ▶
				</div>
				<div class="btn-purple-square" style="font-size: 18px; padding: 5px 10px" onclick="addInjection()"> ◀
				</div>
			</div>
		</div>
		<div class="col" style="margin: 0 auto">
			<form class="table-box">
				<div class="menu-title" style="font-size: 22px; margin-bottom: 20px">
					<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
					검사항목
				</div>
				<div class="search" style="float: right;width: 250px;padding: 2px">
					<input type="text" id="searchInjectionWord" class="search-input"
						   placeholder="검사명으로 검색하세요" onkeyup="injectionEnterKey()">
					<div class="search-icon" onclick="searchInjection()"></div>
				</div>

				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#" onclick="clickInjectionTab(0)">전체</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#" onclick="clickInjectionTab(1)">기본</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#" onclick="clickInjectionTab(2)">혈액</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#" onclick="clickInjectionTab(3)">장비</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#" onclick="clickInjectionTab(4)">기타</a>
					</li>
				</ul>
				<div class="tab-content" style="height: 400px; overflow-y: scroll">
					<div class="tab-pane fade show active" id="injectionTab">
						<table id="injectionTable">
							<thead>
							<tr>
								<th style="width: 7%"><input type="checkbox" id="injectionCheck" name="injectionCheck"
															 onclick="clickAll(id, name)"></th>
								<th>세부항목</th>
								<th>검사명</th>
								<th>관리코드</th>
							</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</form>
		</div>
	</div>
	<hr>
	<div class="row" style="padding: 20px">
		<div style="margin: 0 auto">
			<div class="btn-save-square" style="font-size: 18px; padding: 7px 40px; margin-right: 20px"
				 onclick="savePackageItems()">
				저장
			</div>
			<div class="btn-cancel-square" style="font-size: 18px; padding: 7px 40px;" onclick="cancelBack()">
				취소
			</div>
		</div>
	</div>
</div>
<!--콘텐츠 내용-->

<!--Modal-->
<?php
require('package_modal.php');
?>

</body>
</html>


<!--체크박스 검사-->
<?php
require('check_data.php');
?>

<script type="text/javascript">

	var tabSize = 3;
	var tabItems = ["전체", "기본", "추가", "선택A", "선택B", "선택C", "선택D"];
	var tabId = 0;
	var choiceLimitArr = [-1, -1, -1, -1, -1, -1, -1];
	var sexItems = ["전체", "남", "여"];

	//선택항목 탭
	function addPackageTab() {
		if ($("#selectPackageA").css("display") == "none") {
			$("#selectPackageA").show();
			tabSize = 4;
		} else {
			if ($("#selectPackageB").css("display") == "none") {
				$("#selectPackageB").show();
				tabSize = 5;
			} else {
				if ($("#selectPackageC").css("display") == "none") {
					$("#selectPackageC").show();
					tabSize = 6;
				} else {
					if ($("#selectPackageD").css("display") == "none") {
						$("#selectPackageD").show();
						tabSize = 7;
						$("#addTab").hide();
					} else {
						alert("더이상 추가할 수 없습니다.");
					}
				}
			}
		}
		clickPackageTab(tabId);
	}

	//검사항목 배열
	var injectionItems = new Array();

	//검사항목 탭 전환
	function clickInjectionTab(id) {
		$("#injectionTable tbody").empty();

		for (i = 0; i < injectionItems[id].length; i++) {
			var value = injectionItems[id][i].details + "#" + injectionItems[id][i].inspection + "#" + injectionItems[id][i].code;
			var html = '';
			html += '<tr>"';
			html += '<td><input type="checkbox" name="injectionCheck" onclick="clickOne(name)" value = \'' + value + '\'></td>';
			html += '<td>' + injectionItems[id][i].details + '</td>';
			html += '<td>' + injectionItems[id][i].inspection + '</td>';
			html += '<td>' + injectionItems[id][i].code + '</td>';
			html += '</tr>';

			$("#injectionTable").append(html);
		}
	}

	//검사항목 초기 셋팅
	function setInjectionData(data, search) {
		var injection0 = new Array();
		var injection1 = new Array();
		var injection2 = new Array();
		var injection3 = new Array();
		var injection4 = new Array();

		for (i = 0; i < data.length; i++) {
			var value = data[i].details + "#" + data[i].inspection + "#" + data[i].code;
			var html = '';
			html += '<tr>"';
			html += '<td><input type="checkbox" name="injectionCheck" onclick="clickOne(name)" value = \'' + value + '\'></td>';
			html += '<td>' + data[i].details + '</td>';
			html += '<td>' + data[i].inspection + '</td>';
			html += '<td>' + data[i].code + '</td>';
			html += '</tr>';

			$("#injectionTable").append(html);

			injection0.push(data[i])
			if (data[i].division == "기본검사") {
				injection1.push(data[i]);
			} else if (data[i].division == "혈액검사") {
				injection2.push(data[i]);
			} else if (data[i].division == "장비검사") {
				injection3.push(data[i]);
			} else {
				injection4.push(data[i]);
			}
		}

		if (search == null) {
			injectionItems[0] = injection0;
			injectionItems[1] = injection1;
			injectionItems[2] = injection2;
			injectionItems[3] = injection3;
			injectionItems[4] = injection4;

			//패키지구성 리스트
			instance.post('M008003_REQ_RES', pkgId).then(res => {
				setPackageTabData(res.data);
			});
		}
	}

	function injectionEnterKey() {
		if (window.event.keyCode == 13) {
			// 엔터키가 눌렸을 때 실행할 내용
			searchInjection();
		}
	}

	//검사항목 검색
	function searchInjection() {
		$('#injectionTable > tbody').empty();

		var search = new Object();
		search.searchWord = $("#searchInjectionWord").val();

		//검사항목리스트
		instance.post('M008001_RES', search).then(res => {
			setInjectionData(res.data, search.searchWord);
		});
	}

	//pkgID 값 받기
	var pkgId = new Object();

	$(document).ready(function () {
		var val = location.href.substr(
				location.href.lastIndexOf('=') + 1
		);
		pkgId.pkgId = val;

		//검사항목 리스트 맨 처음 불러와서 셋팅
		instance.post('M008001_RES', new Object()).then(res => {
			setInjectionData(res.data);
		});

	})

	//패키지구성 배열
	var packageTabItems = new Array();

	//패키지구성에 새로 추가된 검사항목
	var addPackage = new Array();

	//패키지구성 초기 셋팅
	function setPackageTabData(data) {
		var package0 = new Array();
		var package1 = new Array();
		var package2 = new Array();
		var package3 = new Array();
		var package4 = new Array();
		var package5 = new Array();
		var package6 = new Array();

		// 선택검사 알파벳순 정렬
		data.sort(function (a, b) {
			const titleA = a.ipClass.toUpperCase(); // ignore upper and lowercase
			const titleB = b.ipClass.toUpperCase(); // ignore upper and lowercase
			if (titleA < titleB) {
				return -1;
			}
			if (titleA > titleB) {
				return 1;
			}
			return 0;
		});

		for (i = 0; i < data.length; i++) {
			package0.push(data[i])
			if (data[i].ipClass == "기본") {
				package1.push(data[i]);
			} else if (data[i].ipClass == "추가") {
				package2.push(data[i]);
			} else if (data[i].ipClass == "선택A") {
				if (tabSize < 4) {
					$("#selectPackageA").show();
					tabSize = 4;
				}
				package3.push(data[i]);
			} else if (data[i].ipClass == "선택B") {
				if (tabSize < 5) {
					$("#selectPackageB").show();
					tabSize = 5;
				}
				package4.push(data[i]);
			} else if (data[i].ipClass == "선택C") {
				if (tabSize < 6) {
					$("#selectPackageC").show();
					tabSize = 6;
				}
				package5.push(data[i]);
			} else if (data[i].ipClass == "선택D") {
				if (tabSize < 7) {
					$("#selectPackageD").show();
					tabSize = 7;
				}
				package6.push(data[i]);
			}
		}

		packageTabItems[0] = package0;
		packageTabItems[1] = package1;
		packageTabItems[2] = package2;
		packageTabItems[3] = package3;
		packageTabItems[4] = package4;
		packageTabItems[5] = package5;
		packageTabItems[6] = package6;

		printLeftTable(0);
	}

	function leftTableRefresh(id) {
		tabId = id;
		$("#packageTable tbody").empty();
		printLeftTable(id);
	}

	function printLeftTable(id) {
		for (i = 0; i < packageTabItems[id].length; i++) {
			var html = '';
			html += '<tr>"';
			html += '<td><input type="checkbox" name="packageCheck" onclick="clickOne(name)" value = \'' + packageTabItems[id][i].ipCode + '\' ' +
					'id = \'' + packageTabItems[id][i].id + '\'' +
					'value = \'' + packageTabItems[id][i].id + '\'></td>';

			for (j = 0; j < injectionItems[0].length; j++) {
				if (packageTabItems[id][i].ipCode == injectionItems[0][j].code) {
					html += '<td>' + injectionItems[0][j].details + '</td>';
					html += '<td>' + injectionItems[0][j].inspection + '</td>';
				}
			}

			var ipClass = '<td><select class="form-control" onchange="changeIpClass(\'' + packageTabItems[id][i].ipCode + '\', value)\">';
			for (j = 0; j < tabSize; j++) {
				if (tabItems[j] == packageTabItems[id][i].ipClass) {
					ipClass += '<option selected>' + tabItems[j] + '</option>';
				} else {
					ipClass += '<option>' + tabItems[j] + '</option>';
				}
			}
			ipClass += '</select></td>';
			html += ipClass;

			var sex = '<td><select class="form-control" onchange="changeSex(\'' + packageTabItems[id][i].ipCode + '\', value)\">';
			for (j = 0; j < sexItems.length; j++) {
				var tmpSex;
				if (sexItems[j] == "전체") {
					tmpSex = 0;
				} else if (sexItems[j] == "남") {
					tmpSex = 1;
				} else if (sexItems[j] == "여") {
					tmpSex = 2;
				}
				if (tmpSex == packageTabItems[id][i].sex) {
					sex += '<option selected>' + sexItems[j] + '</option>';
				} else {
					sex += '<option>' + sexItems[j] + '</option>';
				}
			}
			sex += '</select></td>';
			html += sex;

			html += '<td contentEditable="true" onkeyup="savePrice(\'' + packageTabItems[id][i].ipCode + '\', this)">' + packageTabItems[id][i].price + '</td>';
			html += '<td contentEditable="true"onkeyup="saveMemo(\'' + packageTabItems[id][i].ipCode + '\', this)">' + packageTabItems[id][i].memo + '</td>';
			html += '</tr>';

			$("#packageTable").append(html);

			choiceLimitArr[id] = packageTabItems[id][i].choiceLimit;
		}
	}

	//패키지구성 탭 전환
	function clickPackageTab(id) {
		tabId = id;
		leftTableRefresh(id);
		console.log('tabId : ', tabId);

		//선택검사 - 최대 선택개수
		$("#choiceLimit").val(choiceLimitArr[id]);
		if (id > 2) {
			$("#selectNumTable").show();
		} else {
			$("#selectNumTable").hide();
		}
	}

	//패키지구성에서 검사항목 구분 셀렉터 선택
	function changeIpClass(code, value) {
		var index = -1;

		//전체 배열에서의 인덱스
		for (i = 0; i < packageTabItems[0].length; i++) {
			if (packageTabItems[0][i].ipCode == code) {
				index = i;
			}
		}

		//옮긴배열
		var beforeIdx = tabItems.indexOf(value);

		//쭉 스캔 후 일치하면 삭제
		for (i = 1; i < tabSize; i++) {
			for (j = 0; j < packageTabItems[i].length; j++) {
				if (packageTabItems[i][j].ipCode == code) {
					packageTabItems[i].splice(j, 1);
				}
			}
		}

		//바뀐 배열에 삽입
		if (beforeIdx != 0) {
			packageTabItems[beforeIdx].push(packageTabItems[0][index]);
		}

		packageTabItems[0][index].ipClass = value;
		packageTabItems[0][index].choiceLimit = choiceLimitArr[beforeIdx];
	}

	//패키지구성에서 성별 셀렉터 선택
	function changeSex(code, value) {
		var sex = 0;

		if (value == "전체") {
			sex = 0;
		} else if (value == "남") {
			sex = 1;
		} else if (value == "여") {
			sex = 2;
		}

		//전체 배열에서의 인덱스
		for (i = 0; i < packageTabItems[0].length; i++) {
			if (packageTabItems[0][i].ipCode == code) {
				index = i;
			}
		}
		for (i = 1; i < tabSize; i++) {
			for (j = 0; j < packageTabItems[i].length; j++) {

				if (packageTabItems[i][j].ipCode == code) {
					packageTabItems[i][j].sex = sex;
				}
			}
		}
		packageTabItems[0][index].sex = sex;
	}

	function savePrice(code, value) {
		var price = parseInt(value.innerHTML);

		for (i = 0; i < packageTabItems[0].length; i++) {
			if (packageTabItems[0][i].ipCode == code) {
				packageTabItems[0][i].price = price;
			}
		}

		for (i = 1; i < tabSize; i++) {
			for (j = 0; j < packageTabItems[i].length; j++) {
				if (packageTabItems[i][j].ipCode == code) {
					packageTabItems[i][j].price = price;
				}
			}
		}
	}

	function saveMemo(code, value) {
		var memo = value.innerHTML;

		for (i = 0; i < packageTabItems[0].length; i++) {
			if (packageTabItems[0][i].ipCode == code) {
				packageTabItems[0][i].memo = memo;
			}
		}

		for (i = 1; i < tabSize; i++) {
			for (j = 0; j < packageTabItems[i].length; j++) {
				if (packageTabItems[i][j].ipCode == code) {
					packageTabItems[i][j].memo = memo;
				}
			}
		}
	}

	//패키지구성 선택항목 최대선택개수
	function setChoiceNum() {
		if ($("#choiceLimit").val() < 1 || $("#choiceLimit").val() > 10) {
			alert('설정값을 초과하였습니다. 다시 설정해주세요.');
		} else {
			choiceLimitArr[tabId] = $("#choiceLimit").val();
			for (i = 0; i < packageTabItems[tabId].length; i++) {
				packageTabItems[tabId][i].choiceLimit = choiceLimitArr[tabId];
			}
			alert('설정되었습니다.');
		}
	}

	//검사항목 추가
	function addInjection() {
		$("input:checkbox[name=injectionCheck]:checked").each(function (index) {
			if ($(this).val() != "on") {
				var value = $(this).val();
				var values = value.split("#");
				var check = 0;

				//검사 관리코드 중복검사
				for (i = 0; i < packageTabItems[0].length; i++) {
					if (packageTabItems[0][i].ipCode == values[2]) {
						alert("검사명 : " + values[1] + "\n세부항목 : " + values[0] + "\n\n중복입니다. 다시 확인해주세요.");
						check++;
					}
				}

				//중복 아닌 검사항목만 추가
				if (check == 0) {
					//검사항목 추가 임시 배열 (전체)
					var add = new Object();
					add.inspection = values[0];
					add.detail = values[1];
					add.ipCode = values[2];
					add.ipClass = "전체";
					add.sex = 0;
					add.price = 0;
					add.memo = "";
					add.choiceLimit = 0;
					packageTabItems[0].push(add);
					
					//검사항목 추가 임시 배열 (해당탭)
					add.ipClass = tabItems[tabId];
					add.choiceLimit = choiceLimitArr[tabId];
					packageTabItems[tabId].push(add);
				}

				$("input:checkbox[name=injectionCheck]:checked").prop("checked", false);
			}
		});
		leftTableRefresh(tabId);
	}

	//검사항목 삭제
	function delInjection() {
		$("input:checkbox[name=packageCheck]:checked").each(function (index) {
			if ($(this).val() != "on") {
				var value = $(this).val();

				//패키지구성에서 삭제
				for (i = 0; i < tabSize; i++) {
					for (j = 0; j < packageTabItems[i].length; j++) {
						if (packageTabItems[i][j].ipCode == value) {
							packageTabItems[i].splice(j, 1);
						}
					}
				}

				$("input:checkbox[name=packageCheck]:checked").prop("checked", false);
			}
		});
		leftTableRefresh(tabId);
	}

	//패키지구성 최종 저장
	function savePackageItems() {
		var sendItems = new Object();

		var text = "";
		for (i = 0; i < packageTabItems[0].length; i++) {
			if (packageTabItems[0][i].ipClass == "전체") {
				text += packageTabItems[0][i].detail + "\n"
			}

			if(packageTabItems[0][i].ipClass.indexOf('선택') != -1) {
				if(packageTabItems[0][i].choiceLimit < 1) {
					alert(packageTabItems[0][i].ipClass + ': 최대선택개수를 설정해주세요.');
					return false;
				}
			}
		}

		if (text != "") {
			alert(text + "\n구분 변경 후, 저장하세요.");
		} else {
			sendItems.pkgId = pkgId.pkgId;
			sendItems.ispList = packageTabItems[0];

			if (confirm("저장하시겠습니까?") == true) {
				instance.post('M008002_REQ', sendItems).then(res => {
					console.log(res.data.message);
					if (res.data.message == "success") {
						alert("저장되었습니다.");
						location.reload();
					}
				});
			} else {
				return false;
			}
		}
	}
</script>
