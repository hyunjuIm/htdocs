<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:공지사항</title>

	<?php
	require('head.php');
	?>

	<link rel="stylesheet" type="text/css" href="/asset/css/sub-page.css"/>

	<style>
		.notice-table {
			width: 100%;
			font-size: 1.7rem;
			border-top: 2px black solid;
		}

		.notice-table th {
			padding: 1.6rem;
			font-weight: bolder;
		}

		.notice-table tbody {
			border-top: 1px black solid;
		}

		.notice-table tbody tr {
			border-bottom: 1px solid #a7a7a7;
		}

		.notice-table tbody tr:hover {
			background: #f1f1f1;
		}

		.notice-table td {
			padding: 1.3rem;
		}

		.notice-table .title {
			cursor: pointer;
			text-align: left;
		}

	</style>

</head>
<body>

<header>
	<?php
	require('header.php');
	?>
</header>

<div class="container-fluid">
	<div class="row" style="display: table">
		<!-- 좌측 사이드바 -->
		<?php
		require('side_bar_light.php');
		?>

		<!-- 우측 컨텐츠 -->
		<div class="col"
			 style="display: table-cell;min-width: fit-content;margin: 0;padding: 0;color: white;vertical-align: top;">
			<div style="height:100vh; overflow-y: scroll;min-height: 90rem;">
				<!-- 상단 메뉴 -->
				<div class="container top-menu"
					 style="background-image: url(../../asset/images/title3.jpg)">
					<div class="row line">
					</div>
					<div class="row wrap" style="height: 22rem">
						<div class="inner " style="margin: 0 auto; ">
							<span class="title">이용안내<br></span>
							Information on Use
						</div>
					</div>
					<div class="row" style="height: 4.5rem">
						<div style="margin: 0 auto; display: flex">
							<a href="/customer/notice_list">
								<div class="title-menu-select" style="border-right: #828282 1px solid">
									공지사항
								</div>
							</a>
							<a href="/customer/comparison_hospital">
								<div class="title-menu" style="border-right: #828282 1px solid">
									병원별검진항목비교
								</div>
							</a>
							<a href="/customer/health_checkup_guide">
								<div class="title-menu">
									건강검진안내
								</div>
							</a>
						</div>
					</div>
				</div>


				<!-- 컨텐츠내용 -->
				<div class="container" style="text-align: center;color: black;width: 130rem;padding: 6rem;">
					<div class="row" style="padding-top: 3rem">
						<div class="sub-title">공지사항</div>
					</div>
					<div class="row" style="display: block;margin-top: 5rem">
						<div style="display: flex; float:right;margin-bottom: 2rem">
							<input type="text" id="searchWord" class="search-input" placeholder="검색어를 입력하세요"
								   onkeyup="enterKey()">
							<div class="search-btn" onclick="searchNoticeData(0)">
								<img src="/asset/images/icon_search.png">
							</div>
						</div>
						<table class="notice-table" id="noticeTable">
							<thead>
							<tr>
								<th>NO</th>
								<th width="50%">제목</th width="50%">
								<th>작성자</th>
								<th>작성일</th>
							</tr>
							</thead>
							<tbody>
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
			</div>
		</div>
	</div>
</div>
</body>

<script>
	var pagingNum = 0;
	var pageCount = 0;
	var searchWord = "";

	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");
	userData.pagingNum = pagingNum;
	userData.searchWord = searchWord;

	searchNoticeData(0);

	//검색 - 엔터키
	function enterKey() {
		if (window.event.keyCode == 13) {
			// 엔터키가 눌렸을 때 실행할 내용
			searchNoticeData(0);
		}
	}

	//공지 검색
	function searchNoticeData(index) {
		pagingNum = index;

		userData.pagingNum = pagingNum;
		userData.searchWord = $("#searchWord").val();

		console.log(userData);

		instance.post('CU_007_001', userData).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}
			setNoticeList(res.data.noticeList);
		}).catch(function (error) {
			alert("잘못된 접근입니다.")
			console.log(error);
		});
	}

	//공지 테이블 셋팅
	function setNoticeList(data) {
		console.log(data);

		$("#paging").empty();
		$("#noticeTable > tbody").empty();

		var html = "";
		var pre = pagingNum - 1;
		if (pre < 0) {
			pre = 0;
		}
		html += '<a class="arrow pprev" onclick= "searchNoticeData(\'' + 0 + '\')" href="#"></a>'
		html += '<a class="arrow prev" onclick= "pmPageNum(\'' + -1 + '\')" href="#"></a>'
		$("#paging").append(html);

		for (i = 0; i < pageCount; i++) {
			var html = '';

			var num = i + 1;

			if (i == pagingNum) {
				html += '<a onclick= "searchNoticeData(\'' + i + '\')" class="active">' + num + '</a>';
			} else {
				html += '<a onclick= "searchNoticeData(\'' + i + '\')" href="#">' + num + '</a>';
			}

			$("#paging").append(html);
		}

		var html = "";
		html += '<a class="arrow next" onclick= "pmPageNum(\'' + 1 + '\')" href="#"></a>'
		html += '<a class="arrow nnext" onclick= "searchNoticeData(\'' + (pageCount - 1) + '\')" href="#"></a>'
		$("#paging").append(html);

		for (i = 0; i < data.length; i++) {
			var tbody = "";
			tbody += '<tr>' +
					'<td>'+ data[i].id +'</td>' +
					'<td class="title" onclick="detailNoticePage(\'' + data[i].id + '\')">'+ data[i].title +'</td>' +
					'<td>'+ data[i].author +'</td>' +
					'<td>'+ data[i].createDate +'</td>' +
					'<tr>';

			$("#noticeTable").append(tbody);
		}
	}

	//다음 페이지에 공지 id 값 넘기기
	function detailNoticePage(noticeId) {
		location.href = "notice_detail?noticeId=" + noticeId;
	}

	<?php
	require('paging.js');
	?>

</script>

</html>
