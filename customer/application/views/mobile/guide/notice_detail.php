<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:공지사항</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="../asset/css/mobile/sub_page.css?ver=1.1"/>

	<style>
		#content {
			text-align: left;
			white-space: pre-wrap;
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
	<div class="sub-title-height" style="background: url(../../../../asset/images/title3.jpg)">
		<div class="container">

			<div class="row sub-title">
				<div style="margin: 0 auto">
					<span class="sub-title-name">공지사항</span><br>
					편리한 이용을 위해<br>
					듀얼헬스케어의 정보를 확인해주세요.
				</div>
			</div>

			<div class="row">
				<?php
				$parentDir = dirname(__DIR__ . '..');
				require($parentDir . '/common/sub_drop_down.php');
				?>
			</div>

			<div class="row" style="display: block;margin-top: 5rem">
				<div id="title" style="font-size: 2rem;color:#3529b1;font-weight: 500;line-height: 3.5rem"></div>
				<div id="createDate" style="color:grey;margin-bottom: 2rem"></div>

				<div id="content" style="padding: 3rem;border-top: 2px solid black">
				</div>

				<hr>
			</div>

			<div class="row" style="margin: 3rem 0">
				<div class="btn-cancel-square" onclick="location.href = '/m/notice_list'"
					 style="margin: 0 auto;color: #2f2f2f;border-color: #2F2F2F;">목록으로
				</div>
			</div>
		</div>

		<?php
		$parentDir = dirname(__DIR__ . '..');
		require($parentDir . '/common/footer.php');
		?>
	</div>

</div>

<?php
$parentDir = dirname(__DIR__ . '..');
require($parentDir . '/common/check_data.php');
?>

</body>

<script>
	$('#menu1 .nav-button').text('이용안내');
	var menu2 = '공지사항';

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/sub_drop_down.js');
	?>

	//예약을 위한 id 가져오기
	var sendItems = new Object();
	sendItems.noticeId = location.href.substr(
			location.href.lastIndexOf('=') + 1
	);

	//선택한 병원 정보
	instance.post('CU_007_002', sendItems).then(res => {
		console.log(res.data)
		setNoticeContent(res.data);
	});

	function setNoticeContent(data) {
		$("#title").text(data.title);
		$("#author").text(data.author);
		$("#createDate").text(data.createDate);
		$("#content").html(data.content);
	}

	//뒤로가기
	function cancelBack() {
		history.back();
	}
</script>

</html>
