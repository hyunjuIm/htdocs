<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:건강검진안내</title>

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

		.nav-item {
			width: calc(100%/3);
		}

		.nav-item:hover {
			border-left: 1px solid black;
			border-right: 1px solid black;
			border-top: 2px solid #5645ED;
			border-bottom:white;
		}

		.nav-item .active {
			border-left: 1px solid black;
			border-right: 1px solid black;
			border-top: 2px solid #5645ED;
			border-bottom:white;
		}

		.nav-item .active:hover {
			border : none;
		}

		.nav-link {
			color: black;
			padding: 1rem;
			border-bottom: 1px solid black;
		}

		.nav-link:hover, .nav-link .active {
			font-weight: bolder;
			color: black;
			border-bottom: none;
		}

		.order-table {
			margin: 6rem auto 0 auto;
		}

		.order-table td {
			width: fit-content;
			vertical-align: middle;
			padding: 0 2rem;
		}

		.order {
			width: 20rem;
		}

		.order img {
			width: 156px;
			height: 156px;
		}

		.order-title {
			font-weight: bolder;
			line-height: 5rem;
		}

		.order-content {
			height: 12rem;
			color: #444444;
			font-size: 1.4rem;
			line-height: 1.7rem;
		}

		.item-table {
			width: 100%;
			margin-top: 6rem;
		}

		.item-table img {
			width: 88px;
			height: 88px;
		}

		.item-table td {
			text-align: center;
			width: calc(120rem/4);
			height: calc(120rem/4);
			font-weight: bolder;
			font-size: 1.7rem;
		}

		.item {
			align-items: center;
			cursor: pointer;
		}

		.item-content {
			margin-top: 2rem;
		}

		input {
			width: 100%;
			border: 1px solid #d5d5d5;
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
					 style="background-image: url(../../asset/images/title1.jpg); height: 30rem">
					<div class="row" style="min-width:inherit; height: 3.5rem;border-bottom:1px solid #9a9a9a">
					</div>
					<div class="row wrap" style="height: 22rem">
						<div class="inner" style="margin: 0 auto; ">
							<span style="font-size: 3.2rem">이용안내<br></span>
							Information on Use
						</div>
					</div>
					<div class="row" style="height: 4.5rem">
						<div style="margin: 0 auto; display: flex">
							<a href="/customer/notice_list">
								<div class="title-menu" style="border-right: #828282 1px solid">
									공지사항
								</div>
							</a>
							<a href="/customer/comparison_hospital">
								<div class="title-menu" style="border-right: #828282 1px solid">
									병원별검진항목비교
								</div>
							</a>
							<a href="#">
								<div class="title-menu-select">
									건강검진안내
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
							<p style="font-size: 3.2rem">건강검진안내</p>
						</div>
					</div>
					<div class="row" style="display: block;margin-top: 6rem">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tab1">검사진행안내</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab2">주의사항(전날/당일)</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab3">항목안내</a>
							</li>
						</ul>
						<div class="tab-content">
							<!--검사진행안내-->
							<div class="tab-pane fade show active" id="tab1">
								<table class="order-table">
									<tr>
										<td>
											<div class="order">
												<img src="/asset/images/icon7.png">
											</div>
										</td>
										<td>
											<img src="/asset/images/next_button.png">
										</td>
										<td>
											<div class="order">
												<img src="/asset/images/icon8.png">
											</div>
										</td>
										<td>
											<img src="/asset/images/next_button.png">
										</td>
										<td>
											<div class="order">
												<img src="/asset/images/icon9.png">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="order">
												<div class="order-title">검진예약</div>
												<div class="order-content">
													인터넷, 전화를 통해<br>
													실시간 예약이 가능합니다.<br>
													추가 검사는 사전에 검진기관에서<br>
													별도 예약하셔야 합니다.
												</div>
											</div>
										</td>
										<td></td>
										<td>
											<div class="order">
												<div class="order-title">예약일자확정</div>
												<div class="order-content">
													검진 신청 후 3일 이내에<br>
													검진기관에서 확정일자를<br>
													통보합니다.
												</div>
											</div>
										</td>
										<td></td>
										<td>
											<div class="order">
												<div class="order-title">준비물 우송 및 예약안내</div>
												<div class="order-content">
													검진기관에서 검진 관련 준비물<br>
													우송 및 안내전화를 드립니다.
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="order">
												<img src="/asset/images/icon10.png">
											</div>
										</td>
										<td>
											<img src="/asset/images/next_button.png">
										</td>
										<td>
											<div class="order">
												<img src="/asset/images/icon11.png">
											</div>
										</td>
										<td colspan="2"></td>
									</tr>
									<tr>
										<td>
											<div class="order">
												<div class="order-title">검강검진시행</div>
												<div class="order-content">
													정해진 병원에서<br>
													건강검진을 시행합니다.
												</div>
											</div>
										</td>
										<td></td>
										<td>
											<div class="order">
												<div class="order-title">결과상담</div>
												<div class="order-content">
													건강검진 종료 후 결과를<br>
													바탕으로 상담을 진행합니다.
												</div>
											</div>
										</td>
										<td colspan="2"></td>
									</tr>
								</table>
							</div>
							<!--주의사항-->
							<div class="tab-pane fade" id="tab2">
								<img src="/asset/images/precautions.jpg" style="width: 120rem;margin-top: 6rem">
							</div>
							<!--항목안내-->
							<div class="tab-pane fade" id="tab3">
								<table class="table-bordered item-table">
									<tr>
										<td colspan="2">
											<div style="font-size: 2.8rem;line-height: 6rem">검진항목에 대한 안내</div>
											<div style="color: #666666;">궁금하신 항목을 클릭해주세요.</div>
										</td>
										<td>
											<div class="item">
												<img src="/asset/images/icon12.png">
												<div class="item-content">
													기본계측
												</div>
											</div>
											<!--TODO:겹치기-->
											<div class="item">
												<img src="/asset/images/icon12.png">
												<div class="item-content">
													기본계측
												</div>
											</div>
										</td>
										<td>
											<div class="item">
												<img src="/asset/images/icon13.png">
												<div class="item-content">
													혈액검사
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="item">
												<img src="/asset/images/icon14.png">
												<div class="item-content">
													비뇨생식계 및<br>
													성병질환검사
												</div>
											</div>
										</td>
										<td>
											<div class="item">
												<img src="/asset/images/icon15.png">
												<div class="item-content">
													간기능/당뇨검사
												</div>
											</div>
										</td>
										<td>
											<div class="item">
												<img src="/asset/images/icon16.png">
												<div class="item-content">
													심혈관/고지혈증 검사
												</div>
											</div>
										</td>
										<td>
											<div class="item">
												<img src="/asset/images/icon17.png">
												<div class="item-content">
													갑상선/관절염/통풍
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="item">
												<img src="/asset/images/icon18.png">
												<div class="item-content">
													방사선검사
												</div>
											</div>
										</td>
										<td>
											<div class="item">
												<img src="/asset/images/icon19.png">
												<div class="item-content">
													초음파검사
												</div>
											</div>
										</td>
										<td>
											<div class="item">
												<img src="/asset/images/icon20.png">
												<div class="item-content">
													소화기계검사
												</div>
											</div>
										</td>
										<td>
											<div class="item">
												<img src="/asset/images/icon21.png">
												<div class="item-content">
													기타검사
												</div>
											</div>
										</td>
									</tr>
								</table>
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

</script>

</html>
