<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:1:1 문의</title>

	<?php
	require('head.php');
	?>

	<link rel="stylesheet" type="text/css" href="/asset/css/sub-page.css"/>

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
			padding: 1.2rem 4rem;
			vertical-align: top;
			font-size: 1.7rem;
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
					 style="background-image: url(../../asset/images/title4.jpg)">
					<div class="row line">
						<div class="line-content">
							<img src="/asset/images/icon_home.png">
							<span>｜</span>
							<span>고객센터</span>
							<span>｜</span>
							<span>1:1 문의</span>
						</div>
					</div>
					<div class="row wrap" style="height: 22rem">
						<div class="inner " style="margin: 0 auto; ">
							<span class="title">고객센터<br></span>
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
				<div style="margin:0 10rem">
					<div class="container content-view">
						<div class="row" style="padding-top: 3rem">
							<div class="sub-title">1:1 문의하기</div>
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
