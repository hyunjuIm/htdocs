<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

    <?php
    require('common/head.php');
    ?>

	<style>
		html {
			font-size: 10px;
		}

		body {
			font-size: 1.6rem;
		}

		table {
			text-align: center;
		}

		.main-content {
			width: 46rem;
			height: 46rem;
			min-width: 46rem;
			min-height: 46rem;
			cursor: pointer;
			padding: 0;
		}

		.sub-content {
			width: 23rem;
			height: 23rem;
			min-width: 23rem;
			min-height: 23rem;
			color: white;
			font-size: 1.3rem;
			font-weight: bolder;
			cursor: pointer;
			border: white solid 1px;
		}

		.sub-content-title {
			font-size: 2rem;
		}

		@-webkit-keyframes fade-in-fwd {
			0% {
				-webkit-transform: translateZ(-8rem);
				transform: translateZ(-8rem);
				opacity: 0;
			}
			100% {
				-webkit-transform: translateZ(0);
				transform: translateZ(0);
				opacity: 1;
			}
		}

		@keyframes fade-in-fwd {
			0% {
				-webkit-transform: translateZ(-8rem);
				transform: translateZ(-8rem);
				opacity: 0;
			}
			100% {
				-webkit-transform: translateZ(0);
				transform: translateZ(0);
				opacity: 1;
			}
		}

		.menu1:hover {
			background-color: #6c0403 !important;
			-webkit-animation: fade-in-fwd 1s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
			animation: fade-in-fwd 1s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
		}

		.menu2:hover {
			background-color: #585345 !important;
			-webkit-animation: fade-in-fwd 1s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
			animation: fade-in-fwd 1s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
		}

		.menu3:hover {
			background-color: #000000 !important;
			-webkit-animation: fade-in-fwd 1s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
			animation: fade-in-fwd 1s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
		}

		.menu4:hover {
			background-color: #020a2b !important;
			-webkit-animation: fade-in-fwd 1s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
			animation: fade-in-fwd 1s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
		}

		.menu5:hover {
			background-color: #daa300 !important;
			-webkit-animation: fade-in-fwd 1s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
			animation: fade-in-fwd 1s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
		}

		.menu6:hover {
			background-color: #074b37 !important;
			-webkit-animation: fade-in-fwd 1s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
			animation: fade-in-fwd 1s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
		}

		.notice-div {
			text-align: left;
			cursor: default;
			font-size: 1.5rem;
			font-weight: bolder;
			padding: 2rem 4rem;
		}

		#mainNoticeInfos {
			margin: 0 auto;
			width: 100%;
			text-align: left;
			color: black;
		}

		#mainNoticeInfos tr {
			border-bottom: 1px solid #e5e5e5;
		}

		#mainNoticeInfos td {
			padding: 0.5rem;
			cursor: pointer;
		}

		#mainNoticeInfos .title {
			display: inline-block;
			width: 95%;
			font-size: 1.5rem;
			cursor: pointer;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
		}

		#mainNoticeInfos .title:hover {
			color: grey;
		}

		#mainNoticeInfos .date {
			width: 20%;
			font-size: 1.3rem;
			color: #adadad;
			text-align: right;
		}

		.wrap {
			display: flex;
			justify-content: center;
		}

		.inner {
			align-self: center;
			padding: 2rem;
		}

		@media only screen and (max-width: 1700px) {
			html {
				font-size: 8px;
			}

			.logo {
				content: url(../../../asset/images/s_dual_logo_w.png);
			}
		}

		@media only screen and (max-device-width: 480px) {
			html {
				font-size: 7px;
			}
		}

	</style>

</head>
<body background="../../../asset/images/bg_main.jpg">

<header>
	<?php
	require('common/header.php');
	?>
</header>

<div class="container-fluid">
	<div class="row" style="display: table">
		<!-- 좌측 사이드바 -->
		<?php
		require('menu/side_bar_dark.php');
		?>
		<!-- 우측 컨텐츠 -->
		<div class="col" style="display: table-cell;vertical-align: middle;">
			<table style="margin: 0 auto">
				<tr>
					<td class="main-content" rowspan="2" colspan="2">
						<img src="/asset/images/banner2.png" style="width: inherit;height: inherit">
					</td>
					<td class="sub-content" style="background-color: rgba( 108, 4, 3, 0.8)">
						<div class="menu1 wrap" style="width: inherit;height: inherit" onclick="location.href ='/customer/reservation_list'">
							<div class="inner">
								<img src="/asset/images/icon1.png" style="margin-bottom: 10px"><br>
								<span class="sub-content-title">내예약<br></span>
								RESERVATION DETAILS
							</div>
						</div>
					</td>
					<td class="sub-content" style="background-color: rgba( 88, 83, 69, 0.7)" onclick="location.href ='/customer/reservation_step1'">
						<div class="menu2 wrap" style="width: inherit;height: inherit">
							<div class="inner">
								<img src="/asset/images/icon2.png" style="margin-bottom: 10px"><br>
								<span class="sub-content-title">검진예약<br></span>
								RESERVATION
							</div>
						</div>
					</td>
					<td class="sub-content" style="background-color: rgba( 0, 0, 0, 0.75)" onclick="location.href ='/customer/result_final'">
						<div class="menu3 wrap" style="width: inherit;height: inherit">
							<div class="inner">
								<img src="/asset/images/icon3.png" style="margin-bottom: 10px"><br>
								<span class="sub-content-title">검진결과<br></span>
								RESULT
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td class="sub-content" style="background-color: rgba( 2, 10, 43, 0.85)" onclick="location.href ='/customer/comparison_hospital'">
						<div class="menu4 wrap" style="width: inherit;height: inherit">
							<div class="inner">
								<img src="/asset/images/icon4.png" style="margin-bottom: 10px"><br>
								<span class="sub-content-title">병원별 비교<br></span>
								TO COMPARE HOSPITALS
							</div>
						</div>
					</td>
					<td class="sub-content" style="background-color: rgba( 218, 163, 0, 0.7)">
						<div class="menu5 wrap" style="width: inherit;height: inherit" onclick="location.href ='/customer/health_encyclopedia_list'">
							<div class="inner">
								<img src="/asset/images/icon5.png" style="margin-bottom: 10px"><br>
								<span class="sub-content-title">건강 컨텐츠<br></span>
								HEALTH CONTENTS
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
					</td>
					<td colspan="2"
						style="background: white;border: white solid 1px;height: 100%">
						<div class="notice-div">
							<div class="row"
								 style="font-size: 1.4rem;color: #5645ED">
								NOTICE
							</div>
							<div class="row"
								 style="font-size: 2rem;color: black;padding-bottom: 1rem">
								공지사항
							</div>
							<div class="row" style="height: 9.3rem">
								<table id="mainNoticeInfos" style="vertical-align: top">
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
						<a href="/customer/notice_list">
							<img src="/asset/images/btn_plus.png" style="cursor: pointer;float:right;width: 3.5rem;height: 3.5rem">
						</a>
					</td>
					<td class="sub-content" style="background-color: rgba( 7, 75, 55, 0.8)" onclick="location.href ='/customer/customer_service_inquiry_list'">
						<div class="menu6 wrap" style="width: inherit;height: inherit">
							<div class="inner">
								<img src="/asset/images/icon6.png" style="margin-bottom: 10px"><br>
								<span class="sub-content-title">고객센터<br></span>
								CUSTOMER CENTER<br>
								<span style="font-size: 1.5rem;color: #FFBB00">평일 9:00~18:00<br>1661-2645</span>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>

</body>

<script>
	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");
	//공지사항
	instance.post('CU_001_001', userData).then(res => {
		setMainNotice(res.data);
	});

	function setMainNotice(data) {
		for (i = 0; i < 3; i++) {
			var html = '';
			html += '<tr>';

			if(i == 0) {
				html += '<td class="title point" ' +
						'onclick="moveNoticeDetail(\'' + data[i].id + '\')">' + data[i].title + '</td>';
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
		location.href = "/customer/notice_detail?noticeId=" + id;
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



