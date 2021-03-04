<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:검진예약</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="../asset/css/mobile/sub_page.css?ver=1.1"/>

	<style>
		table {
			width: 100%;
		}

		table td {
			min-width: calc(100% / 2);
			max-width: calc(100% / 2);
			width: calc(100% / 2);
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

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/menu/side.php');
	?>
</header>

<div id="main">
	<div class="sub-title-height"
		 style="background-image: url(../../../../asset/images/mobile/bg_sub6.png);
		 background-size: 100%;background-position: center">
		<div class="container">

			<div class="row sub-title">
				<div style="margin: 0 auto">
					<span class="sub-title-name">건강정보</span><br>
					듀얼헬스케어를 통해 믿을 수 있고<br>
					이해하기 쉬운 건강정보를 확인해보세요.
				</div>
			</div>

			<div class="row" style="position: relative">
				<?php
				$parentDir = dirname(__DIR__ . '..');
				require($parentDir . '/common/sub_drop_down.php');
				?>
			</div>

			<!--본문-->
			<div class="row" style="display: block;margin-top: 9rem">
				<img src="/asset/images/mobile/icon_sub_title_bar.png">
				<h1>질병백과</h1>
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

		<?php
		$parentDir = dirname(__DIR__ . '..');
		require($parentDir . '/common/footer.php');
		?>
	</div>

</div>

</body>

<script>
	$('#menu1 .nav-button').text('건강정보');
	var menu2 = '질병백과';

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/sub_drop_down.js');
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

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/paging.js');
	?>

	//질병백과 테이블 셋팅
	function setEncyclopediaList(data, index) {
		setPaging(index);

		$("#encyclopediaCards").empty();

		if (data.length == 0) {
			$("#paging").empty();
			return false;
		}

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr><td>' +
				'<div class="card" onclick="detailPage(' + data[i].id + ')">' +
				'<div style="height: 17rem;background-size: auto 100%;background-position: center;' +
				'background-image: url(https://file.dualhealth.kr/healthContent/images/' + data[i].fileName + ')"></div>' +
				'<div class="card-body">' +
				'<p class="card-text">' + data[i].title + '</p>' +
				'</div>' +
				'</div>' +
				'</td></tr>';
			$("#encyclopediaCards").append(html);
		}
	}

	//다음 페이지에 id 값 넘기기
	function detailPage(id) {
		location.href = "health_encyclopedia_detail?id=" + id;
	}

</script>

</html>
