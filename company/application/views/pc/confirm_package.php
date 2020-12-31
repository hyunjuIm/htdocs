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
			<div class="btn-light-grey-square" style="float: right" onclick="searchPackageConfirm(0)">검색</div>
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

	var pagingNum = 0;
	var pageCount = 0;

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
	}

	searchPackageConfirm(0);

	//검색
	function searchPackageConfirm(index) {
		pagingNum = index;
		var searchItems = new Object();

		searchItems.coId = coIdObj.coId;
		searchItems.hoName = $("#hoName option:selected").val();
		searchItems.coApproval= $("#coApproval option:selected").val();
		searchItems.pagingNum = pagingNum;

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

			setPackageConfirmData(res.data.packageListDTOList);
		});
	}

	//페이징-화살표클릭
	function pmPageNum(val) {//화살표클릭
		pageNum = Math.floor(parseInt(val) / 10) * 10;
		if (pageNum < 0) pageNum = 0;
		if (pageCount <= pageNum) pageNum = pageCount - 1;
		searchPackageConfirm(pagingNum);
	}

	//패키지 생성 테이블
	function setPackageConfirmData(data) {
		$('#packageConfirmInfos').empty();
		$("#paging").empty();

		if(data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="9">해당하는 검색 결과가 없습니다.</td>';
			html += '</tr>';
			$("#packageConfirmInfos").append(html);
			return false;
		}

		var html = "";
		var pre = pagingNum - 1;
		if (pre < 0) {
			pre = 0;
		}
		html += '<a class="arrow pprev" onclick= "searchPackageConfirm(\'' + 0 + '\')" href="#"></a>'
		html += '<a class="arrow prev" onclick= "pmPageNum(\'' + -10 + '\')" href="#"></a>'
		$("#paging").append(html);

		var start = pagingNum - Math.floor((pagingNum % 10)) + 1;

		for (i = start; i < (start + 10); i++) {
			var html = '';

			if ((i - 1) < pageCount) {
				if (i == pagingNum + 1) {
					html += '<a onclick= "searchCustomerData(\'' + (i - 1) + '\')" class="active">' + i + '</a>';
				} else {
					html += '<a onclick= "searchCustomerData(\'' + (i - 1) + '\')" href="#">' + i + '</a>';
				}
			}

			$("#paging").append(html);
		}

		var html = "";
		html += '<a class="arrow next" onclick= "pmPageNum(\'' + 10 + '\')" href="#"></a>'
		html += '<a class="arrow nnext" onclick= "searchPackageConfirm(\'' + (pageCount - 1) + '\')" href="#"></a>'
		$("#paging").append(html);

		for (i = 0; i < data.length; i++) {
			var html = '';

			var company = data[i].dualApproval ? 'Y' : 'N';
			var dual = data[i].coApproval ? 'Y' : 'N';

			html += '<tr onclick="sendPackageID(\'' + data[i].pkgId + '\', \'' + company + '\', \'' + dual + '\')">';

			var no = data[i].pkgId.substr(4, data[i].pkgId[data[i].pkgId.length]);
			console.log(data[i].pkgId);
			html += '<td>' + no + '</td>';

			html += '<td>' + data[i].hoName + '</td>';
			html += '<td>' + data[i].coName + '</td>';
			html += '<td>' + data[i].coBranch + '</td>';

			if (data[i].hoSuggest) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}

			html += '<td>' + company + '</td>';
			html += '<td>' + dual + '</td>';
			html += '<td>' + data[i].price.toLocaleString() + '</td>';
			html += '<td>' + data[i].reservationStartDate + " ~ " + data[i].reservationEndDate + '</td>';
			html += '</tr>';

			$("#packageConfirmInfos").append(html);
		}
	}

	//세부항목 설정에 pkgID 값 던지기
	function sendPackageID(index, company, dual) {
		var state = '';
		state += company;
		state += dual;

		location.href = "confirm_package_detail?pkgID=" + index + "?state=" + state;
	}
</script>

