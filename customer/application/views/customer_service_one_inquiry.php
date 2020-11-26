<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:자주 묻는 질문</title>

	<?php
	require('head.php');
	?>

	<style>
		html {
			font-size: 10px;
		}

		body {
			font-size: 1.6rem;
			word-break: keep-all;
		}

		.container {
			width: 100%;
			max-width: none;
			text-align: center;
		}

		.wrap {
			display: flex;
			justify-content: center;
		}

		.inner {
			align-self: center;
			padding: 2rem;
		}

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
			padding: 1.2rem 4rem;
			vertical-align: top;
			font-size: 1.7rem;
		}

		td {
			padding: 1.2rem;
		}

		.title-menu, .title-menu-select {
			width: 30rem;
			height: 4.5rem;
			background-color: rgba(0, 0, 0, 0.5);
			color: white;
			line-height: 4.5rem;
			cursor: pointer;
			align-self: flex-end;
		}

		.title-menu:hover, .title-menu-select {
			background: #5645ED;
		}

		input {
			width: 100%;
			border: 1px solid #d5d5d5;
		}

		textarea {
			width: 100%;
			border: 1px solid #d5d5d5;
			height: 22rem;
			min-height: 22rem;
			max-height: 22rem;
		}

		@media only screen and (max-width: 1700px) {
			html {
				font-size: 8px;
			}
		}

		@media only screen and (max-device-width: 480px) {
			html {
				font-size: 7px;
			}
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
				<div class="container"
					 style="background-image: url(../../asset/images/title_customer_service.jpg); height: 30rem">
					<div class="row" style="min-width:inherit; height: 3.5rem;border-bottom:1px solid #9a9a9a">
					</div>
					<div class="row wrap" style="height: 22rem">
						<div class="inner" style="margin: 0 auto; ">
							<span style="font-size: 3.2rem">고객센터<br></span>
							Customer Center
						</div>
					</div>
					<div class="row" style="height: 4.5rem">
						<div style="margin: 0 auto; display: flex">
							<a href="/customer/customer_service_faq">
								<div class="title-menu" style="border-right: #828282 1px solid">
									자주 묻는 질문
								</div>
							</a>
							<a href="#">
								<div class="title-menu-select" style="border-right: #828282 1px solid">
									1:1 문의
								</div>
							</a>
							<a href="/customer/customer_service_inquiry_list">
								<div class="title-menu">
									내 문의 내역
								</div>
							</a>
						</div>
					</div>
				</div>


				<!-- 컨텐츠내용 -->
				<div class="container" style="text-align: center;color: black;width: 130rem;padding: 6rem;">
					<div class="row" style="padding-top: 3rem">
						<div style="margin: 0 auto; font-weight: bolder">
							<img src="/asset/images/title_bar.png">
							<p style="font-size: 3.2rem">1:1 문의하기</p>
						</div>
					</div>
					<div class="row" style="display: block;margin-top: 6rem">
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
					<div class="row" style="margin-top: 3rem;display: block">
						<div class="btn-cancel-square" onclick="sendInquiry()"
							 style="float:right;color: black;border-color: black">저장
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>

<script>

	function sendInquiry() {
		var sendItems = new Object();
		sendItems.cusId = sessionStorage.getItem("userCusID");
		sendItems.title = $("#title").val();
		sendItems.question = $("#question").val();

		console.log(sendItems);

		if (confirm("저장하시겠습니까?") == true) {
			instance.post('CU_008_002', sendItems).then(res => {
				console.log(res.data.message);
				if (res.data.message == "success") {
					alert("저장되었습니다.");
					location.href = '/customer/customer_service_inquiry_list';
				}
			}).catch(function (error) {
				alert("잘못된 접근입니다.")
				console.log(error);
			});
		} else {
			return false;
		}
	}

</script>

</html>
