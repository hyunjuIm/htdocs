<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:회원관리</title>

	<?php
	require('head.php');
	?>

	<style>
		.info-input {
			border:none;
			text-align: center;
			width: 100%;
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
		<div class="col">
			<form style="margin: 0 auto; width: 95%; max-width: 1150px; padding: 20px">
				<ul class="img-circle">
					<div class="menu-title" style="font-size: 22px">
						<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
						회원관리
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
								<option selected>-전체-</option>
							</select>
						</div>
					</div>
					<hr>
					<div class="btn-save-square" style="float: right;" onclick="searchCustomerData()">
						검색
					</div>
				</ul>
			</form>
		</div>
	</div>

	<div class="row" style="margin-top:100px">
		<div class="col">
			<div class="d-flex justify-content-center px-5">
				<h6>
					<div style="margin-right: 15px">통합검색</div>
					<div class="search">
						<input type="text" class="search-input" id="searchWord" placeholder="사원번호, 이름으로 검색하세요" onkeyup="enterKey()">
						<div class="search-icon" onclick="searchCustomerData()"></div>
					</div>
				</h6>
			</div>
		</div>
	</div>

	<div class="row" style="margin-left: 30px; margin-right: 30px; margin-top: 20px">
		<form class="table-responsive" style="margin: 0 auto">
			<div class="btn-default-small excel" style="float: right"></div>
			<table id="customerInfos" class="table table-hover" style="margin-top: 45px">
				<thead>
				<tr>
					<th style="width: 3%"><input type="checkbox" id="customerCheck" name="customerCheck" onclick="clickAll(id, name)"></th>
					<th style="width: 5%">NO</th>
					<th style="width: 8%;color: #3529b1">사번</th>
					<th style="width: 10%">아이디</th>
					<th style="width: 8%">이름</th>
					<th>소속</th>
					<th>생년월일</th>
					<th>연락처</th>
					<th>생성일</th>
					<th>마지막 로그인 기록</th>
				</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</form>
	</div>

	<!--페이징-->
	<div class="row">
		<form style="margin: 0 auto; width: 85%; padding: 10px">
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
require('customer_modal.php');
?>

</body>

<!--체크박스 검사-->
<?php
require('check_data.php');
?>

</html>


<script type="text/javascript">
	//검색항목리스트
	instance.post('M001001_RES').then(res => {
		setCustomerSelectData(res.data);
	});

	var pageCount = 0;
	var pageNum = 0;

	var companySelect;
	//검색 selector
	function setCustomerSelectData(data) {
		//회사
		var name = [];
		var nameSize = 0;
		for (i = 0; i < data.coNameBranch.length; i++) {
			var check = 0;

			//회사명 - 지점있을때
			var jbSplit = data.coNameBranch[i].split('-');
			var companyName = jbSplit[0];

			for(var j=0; j<nameSize; j++) {
				if(name[j] == companyName) {
					check += 1;
				}
			}
			if(check < 1) {
				name[nameSize] = companyName;
				nameSize += 1;
			}
		}
		for(i=0; i<nameSize; i++) {
			var html = '';
			html += '<option value=\'' + name[i] + '\'>' + name[i] + '</option>'
			$("#companyName").append(html);
		}
		companySelect = data.coNameBranch;

		pageCount = 0;
		for (i = 0; i < data.pageCount; i += 10) {
			pageCount++;
		}
		console.log(pageCount);

		//로딩 되자마자 초기 셋팅
		searchCustomerData(0);
	}

	//페이징-숫자클릭
	function searchCustomerData(index) {//숫자클릭
		pageNum = index;
		drawTable();
	}

	function drawTable() {
		pageNum = parseInt(pageNum);
		var searchItems = new Object();

		searchItems.pagingNum = pageNum;
		searchItems.companyName = $("#companyName option:selected").val();
		searchItems.companyBranch = $("#companyBranch option:selected").val();

		searchItems.searchWord =  $("#searchWord").val();

		console.log(searchItems);

		if (searchItems.companyName == "-전체-") {
			searchItems.companyName = "all";
		}
		if (searchItems.companyBranch == "-전체-") {
			searchItems.companyBranch = "all";
		}

		instance.post('M001002_REQ_RES', searchItems).then(res => {
			setCustomerData(res.data, pageNum);
		});
	}

	//페이징-화살표클릭
	function pmPageNum(val) {//화살표클릭
		console.log("before: pageNum: " + pageNum + ", pageCount: " + pageCount + ", val: " + val);

		pageNum += parseInt(val);
		if (pageNum < 0) pageNum = 0;
		if (pageCount <= pageNum) pageNum = pageCount - 1;

		console.log("after: pageNum: " + pageNum + ", pageCount: " + pageCount + ", val: " + val);
		drawTable();
	}

	//회원관리 테이블
	function setCustomerData(data, index) {
		$('#customerInfos > tbody').empty();
		$("#paging").empty();

		var html = "";
		var pre = parseInt(index) - 1;
		if (pre < 0) {
			pre = 0;
		}
		html += '<a class="arrow pprev" onclick= "searchCustomerData(\'' + 0 + '\')" href="#"></a>'
		html += '<a class="arrow prev" onclick= "pmPageNum(\'' + -1 + '\')" href="#"></a>'
		$("#paging").append(html);

		for (i = 0; i < pageCount; i++) {
			var html = '';

			var num = i + 1;

			if (i == index) {
				html += '<a onclick= "searchCustomerData(\'' + i + '\')" class="active">' + num + '</a>';
			} else {
				html += '<a onclick= "searchCustomerData(\'' + i + '\')" href="#">' + num + '</a>';
			}

			$("#paging").append(html);
		}

		var html = "";
		html += '<a class="arrow next" onclick= "pmPageNum(\'' + 1 + '\')" href="#"></a>'
		html += '<a class="arrow nnext" onclick= "searchCustomerData(\'' + (pageCount - 1) + '\')" href="#"></a>'
		$("#paging").append(html);


		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';
			html += '<td><input type="checkbox" name="customerCheck" value=\'' + data[i].id + '\' onclick="clickOne(name)"></td>';

			var no = i+1;
			html += '<td>' + no + '</td>';
			html += '<td style="font-weight: bold; color: #3529b1;cursor: pointer"' +
					'data-toggle="modal" data-target="#customerModal" onClick="clickDetail(\'' + data[i].id + '\')">' + data[i].id + '</td>';
			html += '<td>' + data[i].email + '</td>';
			html += '<td>' + data[i].name + '</td>';
			html += '<td>' + data[i].companyName + '-' + data[i].companyBranch + '</td>';
			html += '<td>' + data[i].birthDate + '</td>';
			html += '<td>' + data[i].phone + '</td>';
			html += '<td>' + data[i].createDate + '</td>';
			html += '<td>' + data[i].lastSignInTime + '</td>';
			html += '</tr>';

			$("#customerInfos").append(html);
		}
	}

</script>
