<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:고객센터</title>

	<?php
	require('head.php');
	?>

	<style>
		.title {
			text-align: left;
			cursor: pointer;
		}

		.qna-td {
			text-align: left;
			vertical-align: baseline !important;
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
		<form style="margin: 0 auto; width: 85%">
			<div class="menu-title" style="font-size: 22px">
				<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
				고객센터
			</div>


			<div class="menu-title" style="float:right">
				<ul class="img-circle">
					<div style="display: flex">
						<label class="col-form-label" style="padding-left: 60px; width: 5px !important;">
							<li style="font-size: 17px">기업</li>
						</label>
						<select id="qnaCoNameBranch" class="form-control" style="width: 200px; margin-right: 10px">
							<option selected>-전체-</option>
						</select>
						<div>
							<div class="search">
								<input type="text" id="searchQnAWord" class="search-input" placeholder="제목으로 검색하세요">
								<div class="search-icon" onclick="searchQnAData()"></div>
							</div>
						</div>
					</div>
				</ul>
			</div>


			<table id="QnAInfos" class="table table-hover" style="margin-top: 10px">
				<thead>
				<tr>
					<th style="width: 8%">NO</th>
					<th style="width: 15%">기업</th>
					<th style="">성명</th>
					<th style="width: 40%">제목</th>
					<th style="">답변상태</th>
					<th style="width: 10%">등록일</th>
				</tr>
				</thead>
				<tbody align="center">
				</tbody>
			</table>
		</form>
	</div>

	<!--페이징-->
	<div class="row">
		<form style="margin: 0 auto; width: 85%; padding: 15px">
			<div class="page_wrap">
				<div class="page_nation" id="paging">
				</div>
			</div>
		</form>
	</div>
</div>
<!--콘텐츠 내용-->
</body>
<!--Modal-->
<?php
require('service_qna_modal.php');
?>
<!--체크박스 검사-->
<?php
require('check_data.php');
?>
</html>

<script>

	//검색항목리스트
	instance.post('M014001_RES').then(res => {
		setQnAOption(res.data);
	});

	var pageCount = 0;
	var pageNum = 0;

	//검색 selector
	function setQnAOption(data) {
		//회사
		for (i = 0; i < data.coNameBranch.length; i++) {
			var html = '';
			html += '<option>' + data.coNameBranch[i] + '</option>'
			$("#qnaCoNameBranch").append(html);
		}
		
		pageCount = 0;
		for (i = 0; i < data.count; i += 10) {
			pageCount++;
		}
		console.log(pageCount);

		//로딩 되자마자 초기 셋팅
		searchQnAData(0);
	}

	function drawTable() {
		pageNum = parseInt(pageNum);
		var searchItems = new Object();

		searchItems.pagingNum = pageNum;
		if($("#qnaCoNameBranch option:selected").val() == "-전체-") {
			searchItems.coNameBranch = "all";
		} else {
			searchItems.coNameBranch = $("#qnaCoNameBranch option:selected").val();
		}
		searchItems.searchWord = $("#searchQnAWord").val();

		instance.post('M014002_REQ_RES', searchItems).then(res => {
			setQnAListData(res.data, pageNum);
		});
	}

	//페이징-숫자클릭
	function searchQnAData(index) {//숫자클릭
		pageNum = index;
		drawTable();
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

	//QnA 리스트 테이블
	function setQnAListData(data, index) {


		$("#QnAInfos > tbody").empty();
		$("#paging").empty();

		var html = "";
		html += '<a class="arrow pprev" onclick= "searchQnAData(\'' + 0 + '\')" href="#"></a>'
		html += '<a class="arrow prev" onclick= "pmPageNum(\'' + -1 + '\')" href="#"></a>'
		$("#paging").append(html);

		for (i = 0; i < pageCount; i++) {
			var html = '';

			var num = i + 1;

			if (i == index) {
				html += '<a onclick= "searchQnAData(\'' + i + '\')" class="active">' + num + '</a>';
			} else {
				html += '<a onclick= "searchQnAData(\'' + i + '\')" href="#">' + num + '</a>';
			}

			$("#paging").append(html);
		}

		var html = "";
		html += '<a class="arrow next" onclick= "pmPageNum(\'' + 1 + '\')" href="#"></a>'
		html += '<a class="arrow nnext" onclick= "searchQnAData(\'' + (pageCount - 1) + '\')" href="#"></a>'
		$("#paging").append(html);

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';
			html += '<td>' + data[i].id + '</td>';
			html += '<td>' + data[i].coNameBranch + '</td>';
			html += '<td>' + data[i].cuName + '</td>';
			html += '<td class="title" data-toggle="modal" data-target="#qnaModal" onclick="sendQnAID(\'' + data[i].id + '\')">' + data[i].title + '</td>';
			if(data[i].status) {
				html += '<td>' + '답변완료' + '</td>';
			} else {
				html += '<td style="color: red">' + '답변대기중' + '</td>';
			}
			html += '<td>' + data[i].createDate + '</td>';
			html += '</tr>';

			$("#QnAInfos").append(html);
		}
	}

	var qnaID;
	//고객센터 게시글 디테일에 값 던지기
	function sendQnAID(index) {
		var sendID = new Object();
		sendID.id = index;

		qnaID = index;

		instance.post('M014003_REQ_RES', sendID).then(res => {
			setQnADetailData(res.data);
		});
	}

</script>
