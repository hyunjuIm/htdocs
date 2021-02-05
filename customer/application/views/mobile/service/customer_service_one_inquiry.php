<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:1:1 문의</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="../asset/css/mobile/sub_page.css?ver=1.1"/>

	<style>
		table {
			width: 100%;
			border-top: 2px solid black;
			text-align: left;
		}

		tr {
			border-bottom: 1px solid black;
		}

		th {
			font-weight: 400;
			padding: 1rem;
			font-size: 1.5rem;
			vertical-align: top;
		}

		td {
			padding: 1.2rem;
		}

		textarea {
			width: 100%;
			border: 1px solid #d5d5d5;
			height: 22rem;
			min-height: 22rem;
			max-height: 22rem;
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
		 style="background-image: url(../../../../asset/images/mobile/bg_sub5.jpg);
		 background-size: 100%;">
		<div class="container">

			<div class="row sub-title">
				<div style="margin: 0 auto">
					<span class="sub-title-name">고객센터</span><br>
					듀얼헬스케어는 항상<br>
					고객의 소리에 귀 기울이겠습니다.
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
				<h1>1:1 문의</h1>
			</div>

			<div class="row" style="display: block;margin-top: 5rem">
				<table>
					<tr>
						<th width="18%">제목</th>
						<td>
							<input type="text" id="title">
						</td>
					</tr>
					<tr>
						<th>문의내용</th>
						<td>
							<textarea id="question"></textarea>
						</td>
					</tr>
				</table>
			</div>
		</div>

		<div class="row" style="margin: 3rem 0">
			<div class="btn-cancel-square" onclick="sendInquiry()"
				 style="margin: 0 auto;color: #2f2f2f;border-color: #2F2F2F;">저장
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
	$('#menu1 .nav-button').text('고객센터');
	var menu2 = '1:1 문의';

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/sub_drop_down.js');
	?>

	function sendInquiry() {
		var sendItems = new Object();
		sendItems.cusId = sessionStorage.getItem("userCusID");
		sendItems.title = $("#title").val();
		sendItems.question = $("#question").val();



		if (confirm("저장하시겠습니까?") == true) {
			instance.post('CU_008_002', sendItems).then(res => {

				if (res.data.message == "success") {
					alert("저장되었습니다.");
					location.href = '/m/customer_service_inquiry_list';
				}
			}).catch(function (error) {
				alert("잘못된 접근입니다.")

			});
		} else {
			return false;
		}
	}

</script>

</html>
