<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<style>
		.row {
			display: block;
		}

		.basic-table {
			border-top: 3px solid #DCDCDC;
			border-bottom: 3px solid #DCDCDC;
		}

		.basic-table th:not(:last-child),
		.basic-table td:not(:last-child) {
			border-right: 1px solid #DCDCDC;
		}

		.basic-table tr {
			border-bottom: 1px solid #DCDCDC;
		}

		.basic-table td {
			font-size: 1.5rem;
		}

		.basic-table th, .basic-table td {
			padding: 0.7rem;
		}

		.tab-content {
			height:fit-content;
			max-height: 40rem;
			overflow-y: scroll;
			border-left: 1px solid #DCDCDC;
			border-right: 1px solid #DCDCDC;
			border-bottom: 1px solid #DCDCDC;
		}

		.nav-link {
			font-size: 1.8rem !important;
			padding: 0.5rem 2rem;
		}

		.select-label {
			width: fit-content !important;
			margin-right: 1rem;
		}

		select {
			width: 10rem !important;
			margin-right: 0.5rem;
		}

		.btn {
			font-size: 1.5rem;
		}
	</style>
</head>
<body>

<!--상단 메뉴-->
<header>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/header.php');
	?>
</header>

<!--콘텐츠 내용-->

<div class="main">
	<div style="width:65%;margin: 0 auto 4rem auto">
		<div class="row" style="">
			<div class="select-list" style="float:right">
				<div class="select-label">승인여부 변경</div>
				<select id="companySelect">
					<option value=true>승인</option>
					<option value=false>취소</option>
				</select>
				<div class="btn btn-dark" onclick="setConfirm()">확인</div>
			</div>
		</div>

		<div class="row">
			<div class="box-title">
				<img src="/asset/images/icon_title.png">
				<h2 style="font-weight: 300;font-size: 2.3rem">패키지승인 - <span id="companyState">승인</span></h2>
			</div>

			<div style="padding: 1.5rem 0">
				<ul class="nav nav-tabs package-tabs" id="packageTab">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#" onclick="clickPackageTab('전체')">전체</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade show active" id="packageTab">
						<table class="basic-table">
							<thead>
							<tr>
								<th width="20">세부항목</th>
								<th width="30%">검사명</th>
								<th width="8%">구분</th>
								<th width="8%">성별</th>
								<th width="12%">추가금</th>
								<th width="20%">비고</th>
							</tr>
							</thead>
							<tbody id="packageTable">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<hr>

	<div class="row" style="margin-top: 2rem">
		<div style="margin: 0 auto;width: fit-content">
			<div class="btn-white-square" onclick="history.back();">목록으로</div>
		</div>
	</div>

</body>
</html>

<script>
	//상단바 선택된 메뉴
	$('#topMenu2').addClass('active');
	$('#topMenu2').before('<div class="menu-select-line"></div>');

	//pkgID 값 받기
	var pkgId = new Object();
	var packageItemList = new Object();
	var ipClassList = new Array();

	$(document).ready(function () {
		var get = location.href.substr(
				location.href.indexOf('=', 1) + 1
		);
		var tmpPkgId = get.split("?");
		tmpPkgId = tmpPkgId[0];

		pkgId.pkgId = tmpPkgId;

		var state = location.href.substr(
				location.href.lastIndexOf('=') + 1
		);
		var company = state[0];

		//검사항목 리스트 맨 처음 불러와서 셋팅
		instance.post('C0603', pkgId).then(res => {
			packageItemList = res.data;
			setCategoryData();
			setConfirmData(company);
		});
	})

	//검사항목 카테고리 종류
	function setCategoryData() {
		var ipClassSet = new Set();
		for (i = 0; i < packageItemList.length; i++) {
			if (packageItemList[i].ipClass.indexOf('선택') != -1) {
				ipClassSet.add(packageItemList[i].ipClass)
			}
		}
		ipClassList = Array.from(ipClassSet);
		ipClassList.sort();

		ipClassList.unshift('추가');
		ipClassList.unshift('기본');

		for (i = 0; i < ipClassList.length; i++) {
			$('#packageTab').append(
					'<li class="nav-item">' +
					'<a class="nav-link" data-toggle="tab" href="#"' +
					'onclick="clickPackageTab(\'' + ipClassList[i] + '\')">' + ipClassList[i] + '</a>' +
					'</li>');
		}

		clickPackageTab('전체');
	}

	//승인 여부 셋팅
	function setConfirmData(val) {
		if (val == 'Y') {
			$("#companySelect").val('true');
			$('#companyState').text('승인');
			$('#companyState').css('color', 'red');
		} else {
			$("#companySelect").val('false');
			$('#companyState').text('미승인');
			$('#companyState').css('color', 'grey');
		}
	}

	//패키지 구성 테이블 출력
	function clickPackageTab(category) {
		$('#packageTable').empty();

		if (category == '전체') {
			for (i = 0; i < packageItemList.length; i++) {
				var html = '';
				html += '<tr>' +
						'<td>' + packageItemList[i].category + '</td>' +
						'<td>' + packageItemList[i].inspection + '</td>' +
						'<td>' + packageItemList[i].ipClass + '</td>';
				if (packageItemList[i].sex == 0) {
					html += '<td>전체</td>';
				} else if (packageItemList[i].sex == 1) {
					html += '<td>남</td>';
				} else if (packageItemList[i].sex == 2) {
					html += '<td>여</td>';
				}
				html += '<td>' + packageItemList[i].price.toLocaleString() + '</td>' +
						'<td>' + packageItemList[i].memo + '</td>' +
						'</tr>';
				$('#packageTable').append(html);
			}
		} else {
			for (i = 0; i < packageItemList.length; i++) {
				if (packageItemList[i].ipClass == category) {
					var html = '';
					html += '<tr>' +
							'<td>' + packageItemList[i].category + '</td>' +
							'<td>' + packageItemList[i].inspection + '</td>' +
							'<td>' + packageItemList[i].ipClass + '</td>';
					if (packageItemList[i].sex == 0) {
						html += '<td>전체</td>';
					} else if (packageItemList[i].sex == 1) {
						html += '<td>남</td>';
					} else if (packageItemList[i].sex == 2) {
						html += '<td>여</td>';
					}
					html += '<td>' + packageItemList[i].price.toLocaleString() + '</td>' +
							'<td>' + packageItemList[i].memo + '</td>' +
							'</tr>';
					$('#packageTable').append(html);
				}
			}
		}
	}

	//기업승인, 듀얼승인
	function setConfirm() {
		var sendItems = new Object();
		sendItems.pkgId = pkgId.pkgId;
		sendItems.status = $("#companySelect option:selected").val();

		if (confirm("승인 상태를 변경하시겠습니까?") == true) {
			instance.post('C0604', sendItems).then(res => {
				console.log(res.data.message);
				if (res.data.message == "success") {
					alert("변경되었습니다.");
					if (sendItems.status == 'true') {
						$('#companyState').text('승인');
						$('#companyState').css('color', 'red');
					} else {
						$('#companyState').text('미승인');
						$('#companyState').css('color', 'grey');
					}
				}
			});
		} else {
			return false;
		}
	}
</script>

