<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	require('head.php');
	?>

	<style>
		table {
			text-align: center;
		}

		.main-content {
			width: 500px;
			height: 250px;
			min-width: 500px;
			min-height: 250px;
			background: rosybrown;
		}

		.sub-content {
			width: 250px;
			height: 250px;
			min-width: 250px;
			min-height: 250px;
			border: white 1px solid;
			color: white;
			font-size: 15px;
			font-weight: bolder;
			cursor: pointer;
			z-index: 1;
		}

		@-webkit-keyframes fade-in-fwd {
			0% {
				-webkit-transform: translateZ(-80px);
				transform: translateZ(-80px);
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
				-webkit-transform: translateZ(-80px);
				transform: translateZ(-80px);
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
			-webkit-animation: fade-in-fwd 1.7s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
			animation: fade-in-fwd 1.7s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
		}

		.menu2:hover {
			background-color: #585345 !important;
			-webkit-animation: fade-in-fwd 1.7s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
			animation: fade-in-fwd 1.7s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
		}

		.menu3:hover {
			background-color: #000000 !important;
			-webkit-animation: fade-in-fwd 1.7s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
			animation: fade-in-fwd 1.7s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
		}

		.menu4:hover {
			background-color: #020a2b !important;
			-webkit-animation: fade-in-fwd 1.7s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
			animation: fade-in-fwd 1.7s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
		}

		.menu5:hover {
			background-color: #daa300 !important;
			-webkit-animation: fade-in-fwd 1.7s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
			animation: fade-in-fwd 1.7s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
		}

		.menu6:hover {
			background-color: #074b37 !important;
			-webkit-animation: fade-in-fwd 1.7s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
			animation: fade-in-fwd 1.7s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
		}

		.notice-div {
			text-align: left;
			padding: 20px;
			cursor: default;
			vertical-align: top;
		}

		#mainNoticeInfos {
			margin: 0 auto;
			width: 100%;
			text-align: left;
			color: black;
			height: 100px
		}

		#mainNoticeInfos td {
			border-bottom: 1px solid #cbcbcb;
			padding: 5px;
			cursor: pointer;
		}

		#mainNoticeInfos td:hover {
			color: #5645ED;
		}


		#mainNoticeInfos .date {
			width: 20%;
			font-size: 13px;
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

	</style>

</head>
<body background="../../asset/images/bg_main.jpg">

<header>
	<?php
	require('header.php');
	?>
</header>

<div class="container-fluid">
	<div class="row" style="display: table">
		<!-- 좌측 사이드바 -->
		<?php
		require('side_bar.php');
		?>
		<!-- 우측 컨텐츠 -->
		<div class="col" style="display: table-cell;vertical-align: middle">
			<table style="margin: 0 auto">
				<tr>
					<td class="main-content" rowspan="2" colspan="2">건강관리서비스</td>
					<td class="sub-content" style="background-color: rgba( 108, 4, 3, 0.8)">
						<div class="menu1 wrap" style="width: inherit;height: inherit">
							<div class="inner">
								<img src="/asset/images/icon1.png" style="margin-bottom: 10px"><br>
								<span style="font-size: 22px">내예약<br></span>
								RESERVATION DETAILS
							</div>
						</div>
					</td>
					<td class="sub-content" style="background-color: rgba( 88, 83, 69, 0.7)">
						<div class="menu2 wrap" style="width: inherit;height: inherit">
							<div class="inner">
								<img src="/asset/images/icon2.png" style="margin-bottom: 10px"><br>
								<span style="font-size: 22px">검진예약<br></span>
								RESERVATION
							</div>
						</div>
					</td>
					<td class="sub-content" style="background-color: rgba( 0, 0, 0, 0.75)">
						<div class="menu3 wrap" style="width: inherit;height: inherit">
							<div class="inner">
								<img src="/asset/images/icon3.png" style="margin-bottom: 10px"><br>
								<span style="font-size: 22px">검진결과<br></span>
								RESULT
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td class="sub-content" style="background-color: rgba( 2, 10, 43, 0.85)">
						<div class="menu4 wrap" style="width: inherit;height: inherit">
							<div class="inner">
								<img src="/asset/images/icon4.png" style="margin-bottom: 10px"><br>
								<span style="font-size: 22px">병원별 비교<br></span>
								TO COMPARE HOSPITALS
							</div>
						</div>
					</td>
					<td class="sub-content" style="background-color: rgba( 218, 163, 0, 0.7)">
						<div class="menu5 wrap" style="width: inherit;height: inherit">
							<div class="inner">
								<img src="/asset/images/icon5.png" style="margin-bottom: 10px"><br>
								<span style="font-size: 22px">건강 컨텐츠<br></span>
								HEALTH CONTENTS
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2"></td>
					<td class="sub-content" colspan="2" style="background: white;">
						<div class="notice-div">
							<div style="margin-bottom: 20px">
								<span style="font-size: 14px;color: #5645ED">NOTICE<br></span>
								<span style="font-size: 20px;color: black">공지사항<br></span>
							</div>
							<table id="mainNoticeInfos">
								<tbody>
								</tbody>
							</table>
						</div>

						<!--TODO:+버튼-->
						<div style="float: right">
							<img src="/asset/images/btn_plus.png" style="padding: 0">
						</div>
					</td>
					<td class="sub-content" style="background-color: rgba( 7, 75, 55, 0.8)">
						<div class="menu6 wrap" style="width: inherit;height: inherit">
							<div class="inner">
								<img src="/asset/images/icon6.png" style="margin-bottom: 10px"><br>
								<span style="font-size: 22px">고객센터<br></span>
								CUSTOMER CENTER<br>
								<span style="font-size: 17px;color: #FFBB00">평일 9:00~18:00<br>1661-2654
						</span>
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
		console.log(data);
		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';
			html += '<td style="width: 80%">' + "· " + data[i].title + '</td>';
			html += '<td class="date">' + data[i].createDate + '</td>';
			html += '</tr>';

			$("#mainNoticeInfos").append(html);
		}
	}

</script>

</html>



