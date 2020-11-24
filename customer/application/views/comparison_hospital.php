<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:병원별 검진 항목비교</title>

	<?php
	require('head.php');
	?>

	<style>
		html {
			font-size: 10px;
		}

		body {
			font-size: 1.6rem;
			word-break: keep-all;
		}

		.container {
			width: 100%;
			max-width: none;
			text-align: center;
		}

		.wrap {
			display: flex;
			justify-content: center;
		}

		.inner {
			align-self: center;
			padding: 2rem;
		}

		.title-menu, .title-menu-select {
			width: 30rem;
			height: 4.5rem;
			background-color: rgba(0, 0, 0, 0.5);
			color: white;
			line-height: 4.5rem;
			cursor: pointer;
			align-self: flex-end;
		}

		.title-menu:hover, .title-menu-select {
			background: #5645ED;
		}

		.compare-table {
			width: 100%;
			border-top: black 2px solid;
			margin-bottom: 5rem;
			font-size: 1.7rem;
		}

		.compare-table tr {
			border-bottom: 1px solid #a7a7a7;
		}

		.compare-table th {
			width: 25%;
			background: #f6f6f6;
			padding: 0.8rem 3rem;
			font-weight: normal;
			vertical-align: middle;
		}

		.compare-table td {
			width: 25%;
			font-weight: bolder;
			padding: 0.8rem 2rem;
			vertical-align: middle;
		}

		.form-control, option {
			width: 100%;
			border: none;
			font-size: 1.6rem;
			padding: 0;
			vertical-align: middle;
			background: #f6f6f6;
		}

		select {
		}

		.form-group {
			height: 100%;
			padding: 0;
		}

		input {
			width: 100%;
			border: 1px solid #d5d5d5;
		}

		@media only screen and (max-width: 1700px) {
			html {
				font-size: 8px;
			}
		}

		@media only screen and (max-device-width: 480px) {
			html {
				font-size: 7px;
			}
		}
	</style>

</head>
<body>

<header>
	<?php
	require('header.php');
	?>
</header>

<div class="container-fluid">
	<div class="row" style="display: table">
		<!-- 좌측 사이드바 -->
		<?php
		require('side_bar_light.php');
		?>

		<!-- 우측 컨텐츠 -->
		<div class="col"
			 style="display: table-cell;min-width: fit-content;margin: 0;padding: 0;color: white;vertical-align: top;">
			<div style="height:100vh; overflow-y: scroll;min-height: 90rem;">
				<!-- 상단 메뉴 -->
				<div class="container"
					 style="background-image: url(../../asset/images/title1.jpg); height: 30rem">
					<div class="row" style="min-width:inherit; height: 3.5rem;border-bottom:1px solid #9a9a9a">
					</div>
					<div class="row wrap" style="height: 22rem">
						<div class="inner" style="margin: 0 auto; ">
							<span style="font-size: 3.2rem">이용안내<br></span>
							Information on Use
						</div>
					</div>
					<div class="row" style="height: 4.5rem">
						<div style="margin: 0 auto; display: flex">
							<a href="#">
								<div class="title-menu" style="border-right: #828282 1px solid">
									공지사항
								</div>
							</a>
							<div class="title-menu-select" style="border-right: #828282 1px solid">
								병원별검진항목비교
							</div>
							<a href="#">
								<div class="title-menu">
									건강검진안내
								</div>
							</a>
						</div>
					</div>
				</div>


				<!-- 컨텐츠내용 -->
				<div class="container" style="text-align: center;color: black;width: 130rem;padding: 6rem;">
					<div class="row" style="padding-top: 3rem">
						<div style="margin: 0 auto; font-weight: bolder">
							<img src="/asset/images/title_bar.png">
							<p style="font-size: 3.2rem">병원별 검진 항목비교</p>
						</div>
					</div>
					<div class="row" style="display: block;margin-top: 6rem">
						<table class="compare-table table-bordered">
							<tr>
								<td>병원</td>
								<th>
									<div class="form-group col">
										<select id="hos1" class="form-control"
												onchange="setPackageSelectOption(this, 'pkg1')">
											<option selected>-선택-</option>
										</select>
									</div>
								</th>
								<th>
									<div class="form-group col">
										<select id="hos2" class="form-control"
												onchange="setPackageSelectOption(this, 'pkg2')">
											<option selected>-선택-</option>
										</select>
									</div>
								</th>
								<th>
									<div class="form-group col">
										<select id="hos3" class="form-control"
												onchange="setPackageSelectOption(this, 'pkg3')">
											<option selected>-선택-</option>
										</select>
									</div>
								</th>
							</tr>
							<tr>
								<td>패키지</td>
								<th>
									<div class="form-group col">
										<select id="pkg1" class="form-control" onchange="setSearchPackage(id)">
											<option selected>-선택-</option>
										</select>
									</div>
								</th>
								<th>
									<div class="form-group col">
										<select id="pkg2" class="form-control" onchange="setSearchPackage(id)">
											<option selected>-선택-</option>
										</select>
									</div>
								</th>
								<th>
									<div class="form-group col">
										<select id="pkg3" class="form-control" onchange="setSearchPackage(id)">
											<option selected>-선택-</option>
										</select>
									</div>
								</th>
							</tr>
						</table>
					</div>
					<div class="row" style="display: block;margin-top: 3rem">
						<div style="text-align: left; font-size: 2rem; font-weight: bolder;line-height: 5rem">
							기본검사
						</div>
						<div style="height: 50rem; overflow-y: scroll">
							<table class="compare-table table-bordered" id="baseTable">
							</table>
						</div>

					</div>
					<div class="row" style="display: block;margin-top: 3rem">
						<div style="text-align: left; font-size: 2rem; font-weight: bolder;line-height: 5rem">
							선택검사
						</div>
						<table class="compare-table table-bordered" id="choiceTable">
							<tr>
								<th rowspan="2"></th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</table>
					</div>

					<div class="row" style="display: block;margin-top: 3rem">
						<div style="text-align: left; font-size: 2rem; font-weight: bolder;line-height: 5rem">
							추가검사
						</div>
						<table class="compare-table table-bordered">

						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>

<?php
require('check_data.php');
?>

<script>

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
		for (var i = 0, limit = e.options.length; i < limit - 1; ++i) {
			e.remove(1);
		}
	}

	var pkgList = new Array();
	var totalInspectionItems = new Set();
	var baseInjection = new Set();

	//패키지 검색
	function setSearchPackage(id) {
		var pkgId = $("#" + id + " option:selected").val();

		var sendItems = new Object();
		sendItems.pkgId = pkgId;

		instance.post('CU_006_002', sendItems).then(res => {
			addBaseInjectionData(res.data, id);
			setChoiceInjectionData(res.data, id)
		});
	}

	//패키지별 기본 검사항목 세팅
	function addBaseInjectionData(data, id) {
		var index = 0;
		if (id === "pkg1") {
			index = 0;
		} else if (id === "pkg2") {
			index = 1;
		} else if (id === "pkg3") {
			index = 2;
		}

		baseInjection = new Set();
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
			pkgList[i].forEach((value) => totalInspectionItems.add(value));
		}
	}

	//기본검사 테이블 셋팅
	function setBaseInjectionTable() {
		$("#baseTable").empty();
		baseInjection.forEach((value) =>
				setInspectionItems(value)
		);
	}

	//기본검사 테이블 프린트
	function setInspectionItems(value) {
		var html = "";
		var ox = new Array();
		ox[0] = "";
		ox[1] = "";
		ox[2] = "";
		for (var i = 0; i < pkgList.length; i++) {
			ox[i] = (pkgList[i].has(value)) ? "O" : "";
		}

		html += '<tr>' +
				'<th style="text-align: left">' + value + '</th>' +
				'<td>' + ox[0] + '</td>' +
				'<td>' + ox[1] + '</td>' +
				'<td>' + ox[2] + '</td>' +
				'</tr>';
		$("#baseTable").append(html);
	}

	var select = new Set();
	var selectInjection = new Set();
	var choiceInspectionItems = new Array();

	//선택검사 테이블 셋팅
	function setChoiceInjectionData(data, id) {
		var index = 0;
		if (id === "pkg1") {
			index = 0;
		} else if (id === "pkg2") {
			index = 1;
		} else if (id === "pkg3") {
			index = 2;
		}

		selectInjection = new Set();

		setInspectionItem(data, index);
	}

	function setInspectionItem(data, index) {
		var choice = new Array();
		for (i = 0; i < data.length; i++) {
			if (data[i].ipClass.indexOf('선택') > -1) {
				var save = new Object();
				save.ipClass = data[i].ipClass;
				save.item = data[i];
				choice.push(save);
			}
		}

		choiceInspectionItems[index] = choice;
		console.log(choiceInspectionItems);
	}


</script>

</html>
