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

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/menu/side.php');
	?>
</header>

<div id="main">
	<div class="sub-title-height"
		 style="background-image: url(../../../../asset/images/mobile/bg_sub4.jpg);
		 background-size: 100%;background-position: center">
		<div class="container">

			<div class="row sub-title">
				<div style="margin: 0 auto">
					<span class="sub-title-name">이용안내</span><br>
					편리한 이용을 위해<br>
					듀얼헬스케어의 정보를 확인해주세요.
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
				<div id="title" style="font-size: 2rem;color:#3529b1;font-weight: 500;line-height: 3.5rem"></div>
				<div id="createDate" style="color:grey;margin-bottom: 2rem"></div>

				<div id="content" style="padding: 3rem;border-top: 2px solid black">
				</div>

				<hr>

				<div style="text-align: left;padding: 0 3rem;">
					<span style="font-weight: 400">첨부파일 : </span>
					<span id="fileName" onclick="downloadFile()"></span>
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

</body>

<script>
	$('#menu1 .nav-button').text('이용안내');
	var menu2 = '공지사항';

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/check_data.js');
	?>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/sub_drop_down.js');
	?>

	var sendItems = new Object();
	sendItems.noticeId = location.href.substr(
			location.href.lastIndexOf('=') + 1
	);

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

</html>
