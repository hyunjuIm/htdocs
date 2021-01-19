<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:패키지승인</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<style>
		.row, form {
			width: 100%;
			padding: 0;
			margin: 0;
		}

		select {
			border: 1px solid #DCDCDC;
			width: 110px;
			padding: 5px;
		}

		.btn {
			padding: 5px 7px;
			font-size: 13px;
		}

		h5 {
			font-weight: 400;
		}

		#packageTab td:not(:last-child) {
			border-right: 1px solid #DCDCDC;
		}

		#packageTab tr {
			border-bottom: 1px solid #DCDCDC;
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
	<div class="row" style="margin: 20px 0;">
		<table class="table table-bordered" style="width: 500px;margin: 0 auto;">
			<tr>
				<td>
					<h5>듀얼승인:&nbsp;<span id="dualState">취소</span></h5>
					<select id="dualSelect">
						<option value=true>승인</option>
						<option value=false>취소</option>
					</select>
					<button type="button" class="btn btn-dark" onclick="setConfirm('dual')">확인</button>
				</td>
				<td>
					<h5>기업승인:&nbsp;<span id="companyState">승인</span></h5>
					<select id="companySelect">
						<option value=true>승인</option>
						<option value=false>취소</option>
					</select>
					<button type="button" class="btn btn-dark" onclick="setConfirm('company')">확인</button>
				</td>
			</tr>
		</table>
	</div>
	<div class="row">
		<form class="table-box" style="width: 1000px;margin: 0 auto;height:560px">
			<div class="menu-title" style="font-size: 22px; margin-bottom: 20px">
				<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
				패키지구성
			</div>

			<ul class="nav nav-tabs package-tabs" id="packageTab">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#" onclick="clickPackageTab('전체')">전체</a>
				</li>
			</ul>
			<div class="tab-content" style="height: 400px; overflow-y: scroll">
				<div class="tab-pane fade show active" id="packageTab">
					<table>
						<thead>
						<tr>
							<th>세부항목</th>
							<th style="width: 27%">검사명</th>
							<th style="width: 10%">구분</th>
							<th style="width: 10%">성별</th>
							<th>추가금</th>
							<th>비고</th>
						</tr>
						</thead>
						<tbody id="packageTable">
						</tbody>
					</table>
				</div>
			</div>
		</form>
	</div>
</div>
<!--콘텐츠 내용-->

</body>
</html>

<script type="text/javascript">
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/check_data.js');
	?>

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
		var dual = state[0];
		var company = state[1];

		//검사항목 리스트 맨 처음 불러와서 셋팅
		instance.post('M016003', pkgId).then(res => {
			packageItemList = res.data;
			setCategoryData();
			setConfirmData(dual, company);
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
	function setConfirmData(dual, company) {
		if(dual == 'Y') {
			$("#dualSelect").val('true');
			$('#dualState').text('승인');
			$('#dualState').css('color', 'red');
		} else {
			$("#dualSelect").val('false');
			$('#dualState').text('미승인');
			$('#dualState').css('color', 'grey');
		}

		if(company == 'Y') {
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
				} else if(packageItemList[i].sex == 1) {
					html += '<td>남</td>';
				} else if(packageItemList[i].sex == 2) {
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
					} else if(packageItemList[i].sex == 1) {
						html += '<td>남</td>';
					} else if(packageItemList[i].sex == 2) {
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
	function setConfirm(value) {
		var sendItems = new Object();
		sendItems.pkgId = pkgId.pkgId;
		
		if(value == 'company') {
			sendItems.status =$("#companySelect option:selected").val();

			if (confirm("승인 상태를 변경하시겠습니까?") == true) {
				instance.post('M016005', sendItems).then(res => {
					console.log(res.data.message);
					if (res.data.message == "success") {
						alert("변경되었습니다.");
						if(sendItems.status == 'true') {
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
		} else if(value == 'dual') {
			sendItems.status =$("#dualSelect option:selected").val();

			if (confirm("승인 상태를 변경하시겠습니까?") == true) {
				instance.post('M016004', sendItems).then(res => {
					console.log(res.data.message);
					if (res.data.message == "success") {
						alert("변경되었습니다.");
						$('#dualState').text(sendItems.status);
						if(sendItems.status == 'true') {
							$('#dualState').text('승인');
							$('#dualState').css('color', 'red');
						} else {
							$('#dualState').text('미승인');
							$('#dualState').css('color', 'grey');
						}
					}
				});
			} else {
				return false;
			}
		}
	}

</script>
