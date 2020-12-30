<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:직원관리</title>

	<?php
	require('head.php');
	?>

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
		<div class="col">
			<form style="margin: 0 auto; width: 95%; max-width: 1150px; padding: 20px">
				<ul class="img-circle">
					<div class="menu-title" style="font-size: 22px">
						<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
						직원관리
					</div>
					<hr>
					<div class="form-row row" style="padding: 0 10rem">
						<label class="col-form-label">
							<li>고객사</li>
						</label>
						<div class="form-group col" style="display: flex">
							<select id="companyName" class="form-control" style="margin-right: 10px"
									onchange="setCompanySelectOption(this, 'companyBranch')">
								<option selected>-전체-</option>
							</select>
							<select id="companyBranch" class="form-control">
								<option selected>-선택-</option>
							</select>
						</div>
					</div>
					<hr>
					<div style="float: right">
						<div class="btn-save-square" onclick="searchEmployeeManageInformation(0)">
							검색
						</div>
					</div>
				</ul>
			</form>
		</div>
	</div>


	<div class="row " style="margin-left: 30px; margin-right: 30px; margin-top: 120px">
		<form class="table-responsive" style="margin: 0 auto">
			<div
					class="btn-default-small excel" style="float: right"></div>
			<table id="employeeManageInfos" class="table table-hover" style="margin-top: 45px">
				<thead>
				<tr>
					<th style="width:5%">NO</th>
					<th>구분</th>
					<th>고객사</th>
					<th style="width:40%">제목</th>
					<th>작성자</th>
					<th>처리상태</th>
					<th>작성일</th>
				</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</form>
	</div>

	<div class="row" style="margin-top: 3rem">
		<form style="margin: 0 auto; width: 85%; padding: 1rem">
			<div class="page_wrap">
				<div class="page_nation" id="paging">
				</div>
			</div>
		</form>
	</div>

</div>
<!--콘텐츠 내용-->

<!--Modal-->
<?php
require('confirm_modal.php');
?>

</body>
<!--체크박스 검사-->
<?php
require('check_data.php');
?>
</html>

<script type="text/javascript">
	var pagingNum = 0;
	var pageCount = 0;

	//검색항목리스트
	instance.post('M015001').then(res => {
		setEmployeeManageOptionData(res.data);
	});

	searchEmployeeManageInformation(0);

	//검색
	function searchEmployeeManageInformation(index) {
		pagingNum = index;
		var searchItems = new Object();

		searchItems.coName = $("#companyName option:selected").val();
		searchItems.coBranch = $("#companyBranch option:selected").val();
		searchItems.pagingNum = pagingNum;


		if (searchItems.coName == "-전체-") {
			searchItems.coName = "all";
		} else if (searchItems.coBranch == "-선택-") {
			alert('사업장을 선택해주세요.');
			return false;
		}

		console.log(searchItems);

		instance.post('M015002', searchItems).then(res => {
			console.log(res.data);

			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}
			setEmployeeManageData(res.data.helpdeskDTOList);
		});
	}

	//검색 selector
	function setEmployeeManageOptionData(data) {
		//회사
		var name = [];
		var nameSize = 0;

		for (i = 0; i < data.coNameBranch.length; i++) {
			var check = 0;

			//회사명 - 지점있을때
			var jbSplit = data.coNameBranch[i].split('-');
			var companyName = jbSplit[0];

			for (var j = 0; j < nameSize; j++) {
				if (name[j] == companyName) {
					check += 1;
				}
			}
			if (check < 1) {
				name[nameSize] = companyName;
				nameSize += 1;
			}
		}

		for (i = 0; i < nameSize; i++) {
			var html = '';
			html += '<option value=\'' + name[i] + '\'>' + name[i] + '</option>'
			$("#companyName").append(html);
		}

		companySelect = data.coNameBranch;
	}

	//페이징 - 화살표클릭
	function pmPageNum(val) {//화살표클릭
		console.log("before: pagingNum: " + pagingNum + ", pageCount: " + pageCount + ", val: " + val);

		pagingNum += parseInt(val);
		if (pagingNum < 0) pagingNum = 0;
		if (pageCount <= pagingNum) pagingNum = pageCount - 1;

		console.log("after: pageNum: " + pagingNum + ", pageCount: " + pageCount + ", val: " + val);
		searchEmployeeManageInformation(pagingNum);
	}

	//패키지 생성 테이블
	function setEmployeeManageData(data) {
		$('#employeeManageInfos > tbody').empty();
		$("#paging").empty();

		var html = "";
		var pre = pagingNum - 1;
		if (pre < 0) {
			pre = 0;
		}
		html += '<a class="arrow pprev" onclick= "searchEmployeeManageInformation(\'' + 0 + '\')" href="#"></a>'
		html += '<a class="arrow prev" onclick= "pmPageNum(\'' + -1 + '\')" href="#"></a>'
		$("#paging").append(html);

		for (i = 0; i < pageCount; i++) {
			var html = '';

			var num = i + 1;

			if (i == pagingNum) {
				html += '<a onclick= "searchEmployeeManageInformation(\'' + i + '\')" class="active">' + num + '</a>';
			} else {
				html += '<a onclick= "searchEmployeeManageInformation(\'' + i + '\')" href="#">' + num + '</a>';
			}

			$("#paging").append(html);
		}

		var html = "";
		html += '<a class="arrow next" onclick= "pmPageNum(\'' + 1 + '\')" href="#"></a>'
		html += '<a class="arrow nnext" onclick= "searchEmployeeManageInformation(\'' + (pageCount - 1) + '\')" href="#"></a>'
		$("#paging").append(html);

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';

			var no = data[i].id.substr(5, data[i].id[data[i].id.length]);
			html += '<td>' + no + '</td>';

			html += '<td>' + data[i].division + '</td>';
			html += '<td>' + data[i].coNameBranch + '</td>';
			html += '<td data-toggle="modal" data-target="#employeeManageDetailModal"' +
					'onClick="clickEmployeeManageDetail(\'' + data[i].id + '\')" style="text-align: left;cursor: pointer">' + data[i].title + '</td>';
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

			$("#employeeManageInfos").append(html);
		}
	}
</script>
