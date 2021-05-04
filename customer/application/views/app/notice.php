<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	require('head.php');
	?>

	<style>
		.notice {
			width: 100%
		}

		.notice tr {
			border-bottom: 1px solid #DCDCDC;
			cursor: pointer;
		}

		.notice tr:hover {
			background: #f8f8f8;
		}

		.notice td {
			padding: 2rem;
		}

		.notice .title {
			font-size: 2rem
		}

		.notice .date {
			font-size: 1.4rem;
			color: grey
		}

		.notice .title-box, .notice .content-box {
			width: 100%;
		}

		.notice .content-box {
			display: none;
		}
	</style>

</head>
<body>

<div class="row">
	<table class="notice" id="notice">

	</table>
</div>

<script>

	var pageNum = 0;
	loadNoticeData();

	//공지 검색
	function loadNoticeData() {
		var userData = new Object();
		userData.cusId = sessionStorage.getItem("userCusID");
		userData.pageNum = pageNum;

		instance.post('getMobileNoticeList', userData).then(res => {
			setNoticeList(res.data.noticeList);
		});
	}

	//공지 테이블 셋팅
	function setNoticeList(data) {
		for (i = 0; i < data.length; i++) {
			var tbody = '';
			tbody += '<tr>' +
					'<td id=\'' + data[i].id + '\' onclick="clickNotice(id)">' +
					'<div class="title-box">' +
					'<div class="title">' + data[i].title + '</div>' +
					'<div class="date">' + (data[i].createDate).replaceAll('-', '.') + '</div>' +
					'</div>' +
					'<div class="content-box"></div>' +
					'</td>' +
					'</tr>';
			$("#notice").append(tbody);
		}
	}

	//공지 내용
	function clickNotice(id) {
		var sendItems = new Object();
		sendItems.noticeId = id;

		instance.post('getMobileNotice', sendItems).then(res => {
			$('#' + id).find('.content-box').text(res.data.content);
		});
	}

	$(document).on("click", ".title-box", function () {
		function slideDown(target) {
			slideUp();
			$(target).addClass('on').next().slideDown();
		}

		function slideUp() {
			$('.notice .title-box').removeClass('on').next().slideUp();
		};
		$(this).hasClass('on') ? slideUp() : slideDown($(this));
	})

	
	//공지 다음페이지 로딩
	$(window).scroll(function() {
		if($(window).scrollTop() + $(window).height() == $(document).height()) {
			pageNum++;
			loadNoticeData();
		}
	});
</script>

</body>
</html>
