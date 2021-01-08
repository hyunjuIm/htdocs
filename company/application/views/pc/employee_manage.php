<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	require('common/head.php');
	?>

	<style>
		.basic-table .title {
			text-align: left;
			cursor: pointer;
		}

		.basic-table .title:hover {
			color: grey;
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
				<thead>
				<tr>
					<th width="7%">NO</th>
					<th width="12%">구분</th>
					<th width="50%">제목</th>
					<th>작성자</th>
					<th>처리상태</th>
					<th width="12%">작성일</th>
				</tr>
				</thead>
				<tbody id="employeeManageTable">

				</tbody>
			</table>
			<br>
			<div class="btn-light-grey-square" style="float:right;" onclick="location.href='/company/employee_manage_write'">글쓰기</div>
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

<?php
require('employee_modal.php');
?>

<script>
	//상단바 선택된 메뉴
	$('#topMenu2').addClass('active');
	$('#topMenu2').before('<div class="menu-select-line"></div>');

	var pageCount = 0;
	var pageNum = 0;

	//로딩 되자마자 초기 셋팅
	searchInformation(0);

	//페이징-숫자클릭
	function searchInformation(index) {
		pageNum = index;
		drawTable();
	}

	function drawTable() {
		pageNum = parseInt(pageNum);
		var searchItems = new Object();

		searchItems.coId = sessionStorage.getItem("userCoID");
		searchItems.pagingNum = pageNum;

		instance.post('C0303', searchItems).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}
			setEmployeeManageTable(res.data.helpdeskDTOList, pageNum);
			console.log(res.data);
		});
	}

	<?php
	require('common/paging.js');
	?>

	//직원관리 리스트 셋팅
	function setEmployeeManageTable(data, index) {
		setPaging(index);

		$('#employeeManageTable').empty();

		if(data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="10">해당하는 검색 결과가 없습니다.</td>';
			html += '</tr>';
			$("#employeeManageTable").append(html);
			$("#paging").empty();
			return false;
		}

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';

			var no = 0;
			if (index == 0) {
				no = (index + 1) + i;
			} else {
				no = index * 10 + (i+1);
			}
			html += '<td>' + no + '</td>';

			html += '<td>' + data[i].division + '</td>';
			html += '<td class="title" data-toggle="modal" data-target="#employeeManageDetailModal"' +
					'onClick="clickEmployeeManageDetail(\'' + data[i].id + '\')">' + data[i].title + '</td>';
			html += '<td>' + data[i].author + '</td>';

			if(data[i].status == '처리이전') {
				html += '<td style="color: grey">' + data[i].status + '</td>';
			} else if (data[i].status == '처리완료') {
				html += '<td style="color: #004386;font-weight: 500">' + data[i].status + '</td>';
			} else if (data[i].status == '거절') {
				html += '<td style="color: #d70e24;font-weight: 500">' + data[i].status + '</td>';
			}

			html += '<td>' + data[i].createDate + '</td>';
			html += '</tr>';
			$("#employeeManageTable").append(html);
		}
	}
</script>

