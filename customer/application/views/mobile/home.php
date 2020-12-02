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
		}

		.main-menu {
			width: 100%;
			color: white;
		}

		.main-menu td {
			width: 50%;
			height: 250px;
			padding: 25px;
			text-align: left;
			vertical-align: top;
			font-weight: 100;
		}

		.menu {
			font-size: 2.2rem;
			font-weight: bolder;
		}

		.notice-box {
			width: 100%;
			padding: 20px;
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
			display:inline-block;
			width: 75%;
			font-size: 1.5rem;
			cursor: pointer;
			white-space:nowrap;
			overflow:hidden;
			text-overflow: ellipsis;
		}

		#mainNoticeInfos .title:hover {
			color: #5645ED;
		}

		#mainNoticeInfos .date {
			width: 25%;
			display:inline-block;
			font-size: 1.3rem;
			color: #adadad;
			text-align: right;
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
	<div style="background: url(../../../asset/images/mobile/bg_main.jpg);height: 500px;">
		<div class="container">
			<div class="row" style="display: table;height: 400px;font-weight: 400;color: white">
				<div style="display: table-cell; vertical-align: middle">
					<span style="font-size: 3rem">건강관리서비스</span><br>
					활기차고 건강한 삶을 위해<br>
					듀얼헬스케어는 항상 곁에 있겠습니다.
				</div>
			</div>

			<div class="row">
				<table class="main-menu">
					<tr>
						<td style="background: url(../../../asset/images/title1.jpg)">
							<span class="menu">내예약</span><br>
							My Reservation
						</td>
						<td style="background: url(../../../asset/images/title1.jpg)">
							<span class="menu">검진예약</span><br>
							Reservation
						</td>
					</tr>
					<tr>
						<td style="background: url(../../../asset/images/title1.jpg)">
							<span class="menu">검진결과</span><br>
							Result
						</td>
						<td style="background: url(../../../asset/images/title2.jpg)">
							<span class="menu">병원별 비교</span><br>
							Compare Hospital
						</td>
					</tr>
					<tr>
						<td style="background: url(../../../asset/images/title3.jpg)">
							<span class="menu">건강 컨텐츠</span><br>
							Health Contents
						</td>
						<td style="background: url(../../../asset/images/title4.jpg)">
							<span class="menu">고객센터</span><br>
							Customer Center
						</td>
					</tr>
				</table>
			</div>

			<div class="row" style="border: 1px solid #e5e5e5;margin-top: 30px;">
				<div class="notice-box">
					<div class="row" style="font-size: 1.4rem;color: #5645ED">
						NOTICE
					</div>
					<div class="row" style="font-size: 2rem;color: black;padding-bottom: 1rem">
						공지사항
					</div>
					<div class="row" style="padding: 5px 10px">
						<table id="mainNoticeInfos">
						</table>
					</div>
				</div>
				<div class="row" style="display: block">
					<div style="float: right;margin-right: -0.5px">
						<img src="/asset/images/btn_plus.png"
							 onclick="location.href='/customer/notice_list'">
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
			html += '<td class="title" onclick="moveNoticeDetail(\'' + data[i].id + '\')">' + "· " + data[i].title + '</td>';
			html += '<td class="date">' + data[i].createDate + '</td>';
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
