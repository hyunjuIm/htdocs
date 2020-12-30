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

	var choiceNum = 0;
	var maxVal = 1;

	setEmployeeManageListData(0);

	//회사 아이디 페이지 번호 보내서 페이지 갯수, 데이터 가져오기
	function setEmployeeManageListData(idx) {
		var index = parseInt(idx)
		choiceNum = pmPageNum(index);
		var pageCount = 0;
		var sendItems = new Object();

		sendItems.coId = sessionStorage.getItem("userCoID");
		sendItems.pagingNum = choiceNum;
		instance.post('C0303', sendItems).then(res => {
			console.log(res.data);
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}
			maxVal = pageCount;
			setPaging(pageCount);
			setEmployeeManageTable(res.data.helpdeskDTOList);
		});
	}

	//직원관리 리스트 셋팅
	function setEmployeeManageTable(data) {
		//페이징
		$("#employeeManageTable").empty();

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';

			var no = data[i].id.substr(5, data[i].id[data[i].id.length]);


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

	//페이징 - 화살표클릭
	function pmPageNum(val) {//화살표클릭
		if (val < 0) return 0;
		else if (maxVal <= val) {
			return maxVal-1;
		}
		return val;
	}

	//페이징 셋팅
	function setPaging(pageCount) {
		$("#paging").empty();

		var html = '';

		html += '<a class="arrow pprev" onclick= "setEmployeeManageListData(\'' + 0 + '\')" href="#"></a>'
		html += '<a class="arrow prev" onclick= "setEmployeeManageListData(\'' + (choiceNum-1) + '\')" href="#"></a>'
		$("#paging").append(html);

		for (i = 0; i < pageCount; i++) {
			var html = '';

			var num = i + 1;

			if (i == choiceNum) {
				html += '<a onclick= "setEmployeeManageListData(\'' + i + '\')" class="active">' + num + '</a>';
			} else {
				html += '<a onclick= "setEmployeeManageListData(\'' + i + '\')" href="#">' + num + '</a>';
			}

			$("#paging").append(html);
		}

		var html = '';
		html += '<a class="arrow next" onclick= "setEmployeeManageListData(\'' + (choiceNum+1) + '\')" href="#"></a>'
		html += '<a class="arrow nnext" onclick= "setEmployeeManageListData(\'' + (pageCount - 1) + '\')" href="#"></a>'
		$("#paging").append(html);
	}

</script>

