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

		<div class="row">
			<table class="basic-table">
				<thead>
				<tr>
					<th width="8%">NO</th>
					<th width="60%">제목</th>
					<th>작성자</th>
					<th>처리상태</th>
					<th>작성일</th>
				</tr>
				</thead>
				<tbody id="employeeManageTable">

				</tbody>
			</table>
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

	var pagingNum = 0;
	var pageCount = 0;

	setEmployeeManageListData(0);

	function setEmployeeManageListData(index) {
		var sendItems = new Object();

		sendItems.coId = sessionStorage.getItem("userCoID");
		sendItems.pagingNum = index;

		instance.post('C0303', sendItems).then(res => {
			console.log(res.data);
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}
			setEmployeeManageTable(res.data.helpdeskDTOList);
		});
	}

	//직원관리 리스트 셋팅
	function setEmployeeManageTable(data) {
		//페이징
		setPaging();

		$("#employeeManageTable").empty();

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';
			var no = i+1;
			html += '<td>' + no + '</td>';

			html += '<td class="title" data-toggle="modal" data-target="#employeeManageDetailModal"' +
					'onClick="clickEmployeeManageDetail(\'' + data[i].id + '\')">' + data[i].title + '</td>';
			html += '<td>' + data[i].author + '</td>';

			if(data[i].status == '처리이전') {
				html += '<td style="color: grey">' + data[i].status + '</td>';
			} else if (data[i].status == '처리완료') {
				html += '<td style="font-weight: 400;color: #0A5FAF">' + data[i].status + '</td>';
			} else if (data[i].status == '거절') {
				html += '<td style="font-weight: 400;color: #d70e24">' + data[i].status + '</td>';
			}

			html += '<td>' + data[i].createDate + '</td>';
			html += '</tr>';
			$("#employeeManageTable").append(html);
		}
	}

	//페이징 - 화살표클릭
	function pmPageNum(val) {//화살표클릭
		pagingNum += parseInt(val);
		if (pagingNum < 0) pagingNum = 0;
		if (pageCount <= pagingNum) pagingNum = pageCount - 1;

		searchInformation(pagingNum);
	}

	//페이징 셋팅
	function setPaging() {
		$("#paging").empty();

		var html = '';

		var pre = pagingNum - 1;
		if (pre < 0) {
			pre = 0;
		}
		html += '<a class="arrow pprev" onclick= "setEmployeeManageListData(\'' + 0 + '\')" href="#"></a>'
		html += '<a class="arrow prev" onclick= "pmPageNum(\'' + -1 + '\')" href="#"></a>'
		$("#paging").append(html);

		for (i = 0; i < pageCount; i++) {
			var html = '';

			var num = i + 1;

			if (i == pagingNum) {
				html += '<a onclick= "setEmployeeManageListData(\'' + i + '\')" class="active">' + num + '</a>';
			} else {
				html += '<a onclick= "setEmployeeManageListData(\'' + i + '\')" href="#">' + num + '</a>';
			}

			$("#paging").append(html);
		}

		var html = '';
		html += '<a class="arrow next" onclick= "pmPageNum(\'' + 1 + '\')" href="#"></a>'
		html += '<a class="arrow nnext" onclick= "setEmployeeManageListData(\'' + (pageCount - 1) + '\')" href="#"></a>'
		$("#paging").append(html);
	}

</script>

