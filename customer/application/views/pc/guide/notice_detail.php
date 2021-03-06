<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:공지사항</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="/asset/css/sub-page.css"/>

	<style>
		.notice-detail-table {
			text-align: left;
		}

		.notice-detail-table th {
			background: #f6f6f6;
			font-weight: normal !important;
			width: 17rem;
			text-align: left;
			padding: 1.3rem 4rem;
			vertical-align: middle;
		}

		.notice-detail-table td {
			vertical-align: middle;
			padding: 1.3rem 4rem;
		}

		.notice-detail-table td div {
			padding: 0.5rem;
		}

		#content {
			white-space: pre-wrap;
		}

		#fileName {
			cursor: pointer;
		}

		#fileName:hover {
			color: #5645ed;
			text-decoration: underline;
		}
	</style>

</head>
<body>

<header>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/header.php');
	?>
</header>

<div class="container-fluid">
	<div class="row" style="display: table">
		<!-- 좌측 사이드바 -->
		<?php
		$parentDir = dirname(__DIR__ . '..');
		require($parentDir . '/menu/side_bar_light.php');
		?>
		<!-- 우측 컨텐츠 -->
		<div class="col"
			 style="display: table-cell;min-width: fit-content;margin: 0;padding: 0;color: white;vertical-align: top;">
			<div style="height:100vh; overflow-y: auto;min-height: 90rem;">
				<!-- 상단 메뉴 -->
				<div class="container top-menu"
					 style="background-image: url(../../../../asset/images/title4.jpg)">
					<div class="row line">
						<div class="line-content">
							<img src="/asset/images/icon_home.png">
							<span>｜</span>
							<span>이용안내</span>
							<span>｜</span>
							<span>공지사항</span>
						</div>
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
									병원별 검진 항목 비교
								</div>
							</a>
							<a href="/customer/health_checkup_guide">
								<div class="title-menu">
									건강검진 안내
								</div>
							</a>
						</div>
					</div>
				</div>


				<!-- 컨텐츠내용 -->
				<div style="margin:0 10rem">
					<div class="container content-view">
						<div class="row" style="padding-top: 3rem">
							<div class="sub-title">공지사항</div>
						</div>
						<div class="row" style="display: block;margin-top: 5rem">
							<table class="notice-detail-table table">
								<tr>
									<th>제목</th>
									<td id="title">제목</td>
								</tr>
								<tr>
									<th>작성자</th>
									<td id="author">제목</td>
								</tr>
								<tr>
									<td colspan="2">
										<div style="font-size: 1.4rem">
											<span style="font-weight: bold">작성일 </span>
											<span id="createDate"></span>
										</div>
										<hr>
										<div id="content" style="padding-top: 1rem">
										</div>
										<hr>
										<div style="font-size: 1.4rem">
											<span style="font-weight: bold">첨부파일 : </span>
											<span id="fileName" onclick="downloadFile()"></span>
										</div>
									</td>
								</tr>
							</table>
							<hr>
						</div>
						<div class="row" style="margin-top: 5rem;display: block">
							<div class="btn-cancel-square" onclick="location.href = '/customer/notice_list'"
								 style="margin: 0 auto;color: #2f2f2f;border-color: #2F2F2F">목록으로
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>

<script>
	//예약을 위한 id 가져오기
	var sendItems = new Object();
	sendItems.noticeId = location.href.substr(
			location.href.lastIndexOf('=') + 1
	);

	//선택한 병원 정보
	instance.post('CU_007_002', sendItems).then(res => {

		setNoticeContent(res.data);
	});

	function setNoticeContent(data) {
		$("#title").text(data.title);
		$("#author").text(data.author);
		if(data.createDate.indexOf('9999') != -1) {
			$("#createDate").text('2020-12-22');
		} else {
			$("#createDate").text(data.createDate);
		}
		$("#content").html(data.content);
		$("#fileName").text(data.fileName);
	}

	//파일 다운로드
	function downloadFile() {
		var saveItems = new Object();
		saveItems.id = sendItems.noticeId;

		instance.post('CU_007_003', saveItems,{
			responseType: 'arraybuffer',
			headers: {
				'Content-Type': 'application/json'
			}
		}).then(response => {

			const type = response.headers['content-type'];
			const blob = new Blob([response.data], {type: type, encoding: 'UTF-8'});
			const link = document.createElement('a');
			link.href = window.URL.createObjectURL(blob);
			link.download = $("#fileName").text();
			link.click();
		})
	}

</script>
