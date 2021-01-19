<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	require('common/head.php');
	?>

	<style>
		.row {
			width: 100%;
			display: block;
		}

		.basic-table tbody tr {
			cursor: pointer;
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
	<div class="container" style="width: 110rem;margin: 0 auto">
		<div class="row">
			<div class="box-title">
				<img src="/asset/images/icon_title.png">
				<h2 style="font-weight: 300;font-size: 2.3rem">패키지관리</h2>
			</div>
		</div>
		<div class="row" style="border-top: 1px solid #DCDCDC;border-bottom: 1px solid #DCDCDC;padding: 1rem">
			<table class="select-form">
				<tr>
					<td>
						<div class="select-list" style="float:left;">
							<div class="select-label">
								<img src="/asset/images/icon_dot_menu.png">
								병원명
							</div>
							<div class="select-content">
								<select id="hoName">
									<option selected>-전체-</option>
								</select>
							</div>
						</div>
					</td>
					<td>
						<div class="select-list" style="float:right;">
							<div class="select-label">
								<img src="/asset/images/icon_dot_menu.png">
								기업승인
							</div>
							<div class="select-content">
								<select id="coApproval">
									<option selected>-전체-</option>
									<option value="true">Y</option>
									<option value="false">N</option>
								</select>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</div>
		<div class="row" style="margin-top: 1rem">
			<div class="btn-light-grey-square" style="float: right" onclick="searchInformation(0)">검색</div>
		</div>
	</div>

	<div class="row" style="margin-top: 10rem;padding: 4rem">
		<table class="basic-table" style="margin-top: 5rem">
			<thead>
			<th width="5%">NO</th>
			<th>병원</th>
			<th>고객사</th>
			<th >사업장</th>
			<th >병원제안</th>
			<th >듀얼승인</th>
			<th >기업승인</th>
			<th >단가</th>
			<th width="15%">운영기간</th>
			</thead>
			<tbody id="packageConfirmInfos">

			</tbody>
		</table>
	</div>

	<div class="row" style="margin-top: 5rem">
		<form style="margin: 0 auto; width: 85%; padding: 1rem">
			<div class="page_wrap">
				<div class="page_nation" id="paging">
				</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>

<script>
	//상단바 선택된 메뉴
	$('#topMenu2').addClass('active');
	$('#topMenu2').before('<div class="menu-select-line"></div>');

	var pageCount = 0;
	var pageNum = 0;

	var coIdObj = new Object();
	coIdObj.coId = sessionStorage.getItem("userCoID");

	instance.post('C0601', coIdObj).then(res => {
		setPackageConfirmSelectData(res.data);
	});

	//검색 selector
	function setPackageConfirmSelectData(data) {
		//병원명
		for (i = 0; i < data.hoName.length; i++) {
			var html = '';
			html += '<option>' + data.hoName[i] + '</option>'
			$("#hoName").append(html);
		}

		//로딩 되자마자 초기 셋팅
		searchInformation(0);
	}

	//페이징-숫자클릭
	function searchInformation(index) {
		pageNum = index;
		drawTable();
	}

	//검색
	function drawTable() {
		pageNum = parseInt(pageNum);
		var searchItems = new Object();

		searchItems.coId = coIdObj.coId;
		searchItems.hoName = $("#hoName option:selected").val();
		searchItems.coApproval= $("#coApproval option:selected").val();
		searchItems.pagingNum = pageNum;

		if (searchItems.hoName == "-전체-") {
			searchItems.hoName = "all";
		}
		if (searchItems.coApproval == "-전체-") {
			searchItems.coApproval = "all";
		}

		console.log(searchItems);

		instance.post('C0602', searchItems).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}
			setPackageConfirmData(res.data.packageListDTOList, pageNum);
			console.log(res.data);
		});
	}

	<?php
	require('common/paging.js');
	?>

	//패키지 생성 테이블
	function setPackageConfirmData(data, index) {
		setPaging(index);

		$('#packageConfirmInfos').empty();

		if(data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="20">해당하는 결과가 없습니다.</td>';
			html += '</tr>';
			$("#packageConfirmInfos").append(html);
			$("#paging").empty();
			return false;
		}

		for (i = 0; i < data.length; i++) {
			var html = '';

			var dual = data[i].dualApproval ? 'Y' : 'N';
			var company = data[i].coApproval ? 'Y' : 'N';

			html += '<tr onclick="sendPackageID(\'' + data[i].pkgId + '\', \'' + company + '\')">';

			var no = 0;
			if (index == 0) {
				no = (index + 1) + i;
			} else {
				no = index * 10 + (i+1);
			}
			html += '<td>' + no + '</td>';

			html += '<td>' + data[i].hoName + '</td>';
			html += '<td>' + data[i].coName + '</td>';
			html += '<td>' + data[i].coBranch + '</td>';

			if (data[i].hoSuggest) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}

			html += '<td>' + dual + '</td>';
			html += '<td>' + company + '</td>';
			html += '<td>' + data[i].price.toLocaleString() + '</td>';
			html += '<td>' + data[i].reservationStartDate + " ~ " + data[i].reservationEndDate + '</td>';
			html += '</tr>';

			$("#packageConfirmInfos").append(html);
		}
	}

	//세부항목 설정에 pkgID 값 던지기
	function sendPackageID(index, company) {
		location.href = "confirm_package_detail?pkgID=" + index + "?state=" + company;
	}
</script>

