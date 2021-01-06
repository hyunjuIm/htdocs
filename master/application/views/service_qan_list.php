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
								<input type="text" id="searchWord" class="search-input" placeholder="제목으로 검색하세요" onkeyup="enterKey();">
								<div class="search-icon" onclick="searchInformation(0)"></div>
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
	var pageCount = 0;
	var pageNum = 0;

	//검색항목리스트
	instance.post('M014001_RES').then(res => {
		setQnAOption(res.data);
	});

	function enterKey() {
		if (window.event.keyCode == 13) {
			// 엔터키가 눌렸을 때 실행할 내용
			searchInformation(0);
		}
	}
	
	//검색 selector
	function setQnAOption(data) {
		//회사
		for (i = 0; i < data.coNameBranch.length; i++) {
			var html = '';
			html += '<option>' + data.coNameBranch[i] + '</option>'
			$("#qnaCoNameBranch").append(html);
		}

		//로딩 되자마자 초기 셋팅
		searchInformation(0);
	}

	//페이징-숫자클릭
	function searchInformation(index) {
		if($("#searchWord").val().length == 1) {
			alert('두 글자 이상 검색어로 입력주세요.');
			return false;
		}

		pageNum = index;
		drawTable();
	}

	function drawTable() {
		pageNum = parseInt(pageNum);
		var searchItems = new Object();

		searchItems.pageNum = pageNum;
		if($("#qnaCoNameBranch option:selected").val() == "-전체-") {
			searchItems.coNameBranch = "all";
		} else {
			searchItems.coNameBranch = $("#qnaCoNameBranch option:selected").val();
		}
		searchItems.searchWord = $("#searchWord").val();

		instance.post('M014002_REQ_RES', searchItems).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}

			setQnAListData(res.data.qnADTOList, pageNum);
			console.log(res.data);
		});
	}

	//페이징-화살표클릭
	function pmPageNum(val) {//화살표클릭
		pageNum = Math.floor(parseInt(val) / 10) * 10;
		if (pageNum < 0) pageNum = 0;
		if (pageCount <= pageNum) pageNum = pageCount - 1;
		drawTable();
	}

	//페이징
	function setPaging(index) {
		$("#paging").empty();

		var html = "";
		var pre = parseInt(index) - 1;
		if (pre < 0) {
			pre = 0;
		}
		html += '<a class="arrow pprev" onclick= "searchInformation(\'' + 0 + '\')" href="#"></a>'
		html += '<a class="arrow prev" onclick= "pmPageNum(\'' + -10 + '\')" href="#"></a>'
		$("#paging").append(html);

		var start = index - Math.floor((index % 10)) + 1;

		for (i = start; i < (start + 10); i++) {
			var html = '';

			if ((i - 1) < pageCount) {
				if (i == index + 1) {
					html += '<a onclick= "searchInformation(\'' + (i - 1) + '\')" class="active">' + i + '</a>';
				} else {
					html += '<a onclick= "searchInformation(\'' + (i - 1) + '\')" href="#">' + i + '</a>';
				}
			}

			$("#paging").append(html);
		}

		var html = "";
		html += '<a class="arrow next" onclick= "pmPageNum(\'' + 10 + '\')" href="#"></a>'
		html += '<a class="arrow nnext" onclick= "searchInformation(\'' + (pageCount - 1) + '\')" href="#"></a>'
		$("#paging").append(html);
	}

	//QnA 리스트 테이블
	function setQnAListData(data, index) {
		setPaging(index);

		$("#QnAInfos > tbody").empty();

		if(data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="6">해당하는 검색 결과가 없습니다.</td>';
			html += '</tr>';
			$("#QnAInfos").append(html);
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
