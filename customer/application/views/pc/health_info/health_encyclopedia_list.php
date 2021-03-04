<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:건강정보</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="/asset/css/sub-page.css"/>

	<style>
		table {
			width: 100%;
		}

		table td {
			min-width: calc(100% / 3);
			max-width: calc(100% / 3);
			width: calc(100% / 3);
			padding: 1rem;
		}

		.card {
			cursor: pointer;
			width: 100%;
		}

		.card:hover {
			box-shadow: 0px 0px 7px #c1c1c1;
		}

		.card-body {
			padding: 0.5rem;
		}

		.card-text {
			font-size: 2.2rem;
			font-weight: 500;
			padding: 0;
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
					 style="background-image: url(../../../../asset/images/title6.png)">
					<div class="row line">
						<div class="line-content">
							<img src="/asset/images/icon_home.png">
							<span>｜</span>
							<span>건강정보</span>
							<span>｜</span>
							<span>질병백과</span>
						</div>
					</div>
					<div class="row wrap" style="height: 22rem">
						<div class="inner " style="margin: 0 auto; ">
							<span class="title">건강정보<br></span>
							Health Contents
						</div>
					</div>
					<div class="row" style="height: 4.5rem">
						<div style="margin: 0 auto; display: flex">
							<a href="/customer/health_encyclopedia_list">
								<div class="title-menu-select">
									질병백과
								</div>
							</a>

						</div>
					</div>
				</div>


				<!-- 컨텐츠내용 -->
				<div style="margin:0 10rem">
					<div class="container content-view">
						<div class="row" style="padding-top: 3rem">
							<div class="sub-title">질병백과</div>
						</div>
						<div class="row" style="display: block;margin-top: 5rem">
							<table id="encyclopediaCards">
							</table>
						</div>
						<div class="row" style="margin-top: 3rem">
							<form style="margin: 0 auto; padding: 1rem 0">
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
</div>
</body>

<script>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/check_data.js');
	?>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/paging.js');
	?>

	var pageCount = 0;

	if (sessionStorage.getItem("pageNum") == null) {
		sessionStorage.setItem("pageNum", 0);
	}
	var pageNum = sessionStorage.getItem("pageNum");

	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");
	userData.pageNum = pageNum;

	searchInformation(pageNum);

	//페이징-숫자클릭
	function searchInformation(index) {
		pageNum = index;
		drawTable();
	}

	function drawTable() {
		pageNum = parseInt(pageNum);
		sessionStorage.setItem("pageNum", pageNum);

		userData.pageNum = pageNum;

		instance.post('CU0901', userData).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 12) {
				pageCount++;
			}
			setEncyclopediaList(res.data.healthContentDTOList, pageNum);
		}).catch(function (error) {
			alert("잘못된 접근입니다.")
		});
	}

	//질병백과 테이블 셋팅
	function setEncyclopediaList(data, index) {
		setPaging(index);

		$("#encyclopediaCards").empty();

		if (data.length == 0) {
			$("#paging").empty();
			return false;
		}

		var html = '<tr>';
		for (i = 0; i < data.length; i++) {
			html += '<td>' +
					'<div class="card" onclick="detailPage(' + data[i].id + ')">' +
					'<div style="height: 17rem;background-size: 150% auto;background-position: center;' +
					'background-image: url(https://file.dualhealth.kr/healthContent/images/' + data[i].fileName + ')"></div>' +
					'<div class="card-body">' +
					'<p class="card-text">' + data[i].title + '</p>' +
					'</div>' +
					'</div>' +
					'</td>';

			if (i == data.length - 1) {
				if (data.length % 3 != 0) {
					for (j = 0; j < data.length % 3 - 1; j++) {
						html += '<td></td>';
					}
				}
				html += '</tr>';
			} else if (i % 3 == 2) {
				html += '</tr><tr>';
			}
		}

		$("#encyclopediaCards").append(html);
	}

	//다음 페이지에 id 값 넘기기
	function detailPage(id) {
		location.href = "health_encyclopedia_detail?id=" + id;
	}

</script>

</html>
