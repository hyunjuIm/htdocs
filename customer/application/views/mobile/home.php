<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	require('common/head.php');
	?>

	<style>
		.container {
			padding: 20px;
		}

		table {
			width: 100%;
			text-align: left;
			margin: 0 auto;
		}

		.home-menu {
			width: 100%;
			color: white;
			font-size: 1.2rem;
		}

		.home-menu td {
			width: 50%;
			padding: 5px;
			text-align: left;
			vertical-align: top;
			font-weight: bolder;
			cursor: pointer;
		}

		.home-menu td div {
			padding: 15px;
		}

		.home-menu td img {
			float: right;
		}

		.menu {
			font-size: 2rem;
		}

		.notice-box {
			width: 100%;
		}

		#mainNoticeInfos {
			color: #000000;
		}

		#mainNoticeInfos td {
			vertical-align: middle;
		}

		#mainNoticeInfos tr {
			border-bottom: 1px solid #e5e5e5;
		}

		#mainNoticeInfos .title {
			display: inline-block;
			width: 70%;
			font-size: 1.4rem;
			cursor: pointer;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
		}

		#mainNoticeInfos .title:hover {
			color: grey;
		}

		#mainNoticeInfos .date {
			width: 30%;
			display: inline-block;
			font-size: 1.2rem;
			color: #adadad;
			text-align: right;
		}

		/* ANIMATIONS */
		/* Simple CSS3 Fade-in-down Animation */
		.fadeInDown {
			-webkit-animation-name: fadeInDown;
			animation-name: fadeInDown;
			-webkit-animation-duration: 1s;
			animation-duration: 1s;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
		}

		@-webkit-keyframes fadeInDown {
			0% {
				opacity: 0;
				-webkit-transform: translate3d(0, -100%, 0);
				transform: translate3d(0, -100%, 0);
			}
			100% {
				opacity: 1;
				-webkit-transform: none;
				transform: none;
			}
		}

		@keyframes fadeInDown {
			0% {
				opacity: 0;
				-webkit-transform: translate3d(0, -100%, 0);
				transform: translate3d(0, -100%, 0);
			}
			100% {
				opacity: 1;
				-webkit-transform: none;
				transform: none;
			}
		}

		/* Simple CSS3 Fade-in Animation */
		@-webkit-keyframes fadeIn {
			from {
				opacity: 0;
			}
			to {
				opacity: 1;
			}
		}

		@-moz-keyframes fadeIn {
			from {
				opacity: 0;
			}
			to {
				opacity: 1;
			}
		}

		@keyframes fadeIn {
			from {
				opacity: 0;
			}
			to {
				opacity: 1;
			}
		}

		.fadeIn {
			opacity: 0;
			-webkit-animation: fadeIn ease-in 1;
			-moz-animation: fadeIn ease-in 1;
			animation: fadeIn ease-in 1;

			-webkit-animation-fill-mode: forwards;
			-moz-animation-fill-mode: forwards;
			animation-fill-mode: forwards;

			-webkit-animation-duration: 1s;
			-moz-animation-duration: 1s;
			animation-duration: 1s;
		}

		.fadeIn.second {
			-webkit-animation-delay: 0.6s;
			-moz-animation-delay: 0.6s;
			animation-delay: 0.6s;
		}

		.fadeIn.third {
			-webkit-animation-delay: 0.8s;
			-moz-animation-delay: 0.8s;
			animation-delay: 0.8s;
		}

		/* OTHERS */
		*:focus {
			outline: none;
		}

	</style>

</head>
<body>

<header>
	<?php
	require('common/header.php');
	?>

	<?php
	require('menu/side.php');
	?>
</header>

<div id="main">
	<div style="background: url(../../../asset/images/mobile/bg_main.jpg);height: 500px;background-size: 100%">
		<div class="container">
			<div class="row" style="display: table;margin: 150px 0;font-weight: 300;color: white">
				<div class="fadeInDown" style="display: table-cell; vertical-align: middle">
					<div class="fadeIn second" style="font-size: 3.5rem;margin-bottom: 1rem;font-weight: bolder">
						건강관리서비스
					</div>
					<div class="fadeIn third">
						활기차고 건강한 삶을 위해<br>
						듀얼헬스케어는 항상 곁에 있겠습니다.
					</div>
				</div>
			</div>

			<div class="row">
				<table class="home-menu">
					<tr>
						<td style="background: url(../../../asset/images/mobile/main1.jpg);background-size: 100%"
							onclick="location.href='/m/reservation_list'">
							<div>
								<span class="menu">내예약</span><br>
								MY RESERVATION
							</div>
							<img src="../../../asset/images/mobile/m_icon1.png" width="50%">
						</td>
						<td style="background: url(../../../asset/images/mobile/main2.jpg);background-size: 100%"
							onclick="location.href='/m/reservation_step1'">
							<div>
								<span class="menu">검진예약</span><br>
								RESERVATION
							</div>
							<img src="../../../asset/images/mobile/m_icon2.png" width="50%">
						</td>
					</tr>
					<tr>
						<td style="background: url(../../../asset/images/mobile/main3.jpg);background-size: 100%"
							onclick="location.href='/m/result_final'">
							<div>
								<span class="menu">검진결과</span><br>
								RESULT
							</div>
							<img src="../../../asset/images/mobile/m_icon3.png" width="50%">
						</td>
						<td style="background: url(../../../asset/images/mobile/main4.jpg);background-size: 100%"
							onclick="location.href='/m/comparison_hospital'">
							<div>
								<span class="menu">병원별비교</span><br>
								COMPARE HOSPITALS
							</div>
							<img src="../../../asset/images/mobile/m_icon4.png" width="50%" style="padding-right: 10px">
						</td>
					</tr>
					<tr>
						<td style="background: url(../../../asset/images/mobile/main5.jpg);background-size: 100%"
							onclick="location.href='/m/health_encyclopedia_list';resetPaging()">
							<div>
								<span class="menu">건강컨텐츠</span><br>
								HEALTH CONTENTS
							</div>
							<img src="../../../asset/images/mobile/m_icon5.png" width="50%">
						</td>
						<td style="background: url(../../../asset/images/mobile/main6.jpg);background-size: 100%"
							onclick="location.href='/m/customer_service_faq';resetPaging()">
							<div>
								<span class="menu">고객센터</span><br>
								CUSTOMER CENTER
							</div>
							<img src="../../../asset/images/mobile/m_icon6.png" width="50%">
						</td>
					</tr>
				</table>
			</div>

			<div class="row" style="margin-top: 50px;">
				<div class="notice-box">
					<div class="row" style="display: block;font-weight: bolder">
						<div style="font-size: 1.6rem;color: #5645ED;margin: 0 auto"
							 onclick="location.href='/m/notice_list';resetPaging()">NOTICE
						</div>
						<div style="font-size: 2.3rem;color: black;padding-bottom: 1rem;margin: 0 auto">공지사항</div>
					</div>
					<div class="row" style="margin-top: 5px;border: 1px solid #e3e3e3;padding: 3rem 2rem;">
						<table id="mainNoticeInfos">
						</table>
					</div>
				</div>
			</div>
		</div>

		<?php
		require('common/footer.php');
		?>
	</div>


</div>


</body>

<script>
	//홈 메인메뉴 크기 계산
	$(".home-menu td").height($(".home-menu td").width() * 1.129);
	var a = $(".home-menu td").height() - 95;
	var b = $(".home-menu td img").height();
	var top = (a - b);
	$(".home-menu td img").css('margin-top', a - b);

	//유저 데이터
	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");

	//공지사항
	instance.post('CU_001_001', userData).then(res => {
		setMainNotice(res.data);
	});

	function setMainNotice(data) {
		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';
			if (i == 0) {
				html += '<td class="title point" onclick="moveNoticeDetail(\'' + data[i].id + '\')">' + data[i].title + '</td>';
			} else {
				html += '<td class="title" onclick="moveNoticeDetail(\'' + data[i].id + '\')">' + data[i].title + '</td>';
			}
			if (data[i].createDate.indexOf('9999') != -1) {
				html += '<td class="date">2020.12.22</td>';
			} else {
				html += '<td class="date">' + data[i].createDate.replaceAll('-', '.') + '</td>';
			}
			html += '</tr>';

			$("#mainNoticeInfos").append(html);
		}
	}

	function moveNoticeDetail(id) {
		location.href = "/m/notice_detail?noticeId=" + id;
	}

</script>

<!--챗봇-->
<script
		botId="B1j0vo"
		data-name="test_user_NAME"
		data-user-id="test_user_ID"
		data-email="test_user_email@TESTADDRESS.GG"
		src="https://www.closer.ai/js/webchat.min.js">
</script>

</html>
