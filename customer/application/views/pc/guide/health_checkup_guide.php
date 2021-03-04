<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:건강검진 안내</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="/asset/css/sub-page.css"/>

	<style>
		.nav-item {
			width: calc(100% / 3);
		}

		.nav-item:hover, .nav-item .active {
			border-left: 1px solid black;
			border-right: 1px solid black;
			border-top: 2px solid #5645ED;
			border-bottom: white;
		}

		.nav-item .active:hover {
			border: none;
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
			width: 25rem;
		}

		.order img {
			width: 156px;
			height: 156px;
		}

		.order-title {
			font-weight: bolder;
			font-size: 1.8rem;
			line-height: 5rem;
		}

		.order-content {
			height: 12rem;
			color: #444444;
			font-size: 1.6rem;
			line-height: 1.9rem;
		}

		.item-table {
			width: 100%;
			margin-top: 6rem;
		}

		.item-table img {
			width: 72px;
			height: 72px;
		}

		.item-table td {
			text-align: center;
			width: calc(120rem / 4);
			height: calc(120rem / 4);
			font-weight: bolder;
			font-size: 1.7rem;
		}

		.item {
			align-items: center;
			cursor: default;
			font-size: 1.6rem;
		}

		.item-hover {
			display: none;
			background: white;
			cursor: default;
			padding: 2rem;
			font-size: 1.5rem;
			font-weight: 300;
		}

		.item-hover span {
			font-size: 1.6rem;
			font-weight: 500;
			vertical-align: middle;
			color: #5645ed;
		}

		.item-content {
			margin-top: 2rem;
		}
	</style>

</head>
<body>

<header>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/header.php');
	?>
</header>

<div class="container-fluid">
	<div class="row" style="display: table">
		<!-- 좌측 사이드바 -->
		<?php
		$parentDir = dirname(__DIR__ . '..');
		require($parentDir . '/menu/side_bar_light.php');
		?>
		<!-- 우측 컨텐츠 -->
		<div class="col"
			 style="display: table-cell;min-width: fit-content;margin: 0;padding: 0;color: white;vertical-align: top;">
			<div style="height:100vh; overflow-y: auto;min-height: 90rem;">
				<!-- 상단 메뉴 -->
				<div class="container top-menu"
					 style="background-image: url(../../../../asset/images/title4.jpg)">
					<div class="row line">
						<div class="line-content">
							<img src="/asset/images/icon_home.png">
							<span>｜</span>
							<span>이용안내</span>
							<span>｜</span>
							<span>건강검진 안내</span>
						</div>
					</div>
					<div class="row wrap" style="height: 22rem">
						<div class="inner " style="margin: 0 auto; ">
							<span class="title">이용안내<br></span>
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
									병원별 검진 항목 비교
								</div>
							</a>
							<a href="#">
								<div class="title-menu-select">
									건강검진 안내
								</div>
							</a>
						</div>
					</div>
				</div>


				<!-- 컨텐츠내용 -->
				<div style="margin:0 10rem">
					<div class="container content-view">
						<div class="row" style="padding-top: 3rem">
							<div class="sub-title">건강검진 안내</div>
						</div>
						<div class="row" style="display: block;margin-top: 6rem;">
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
														검진기관에서 검진 관련<br>
														준비물 우송 및<br>
														안내전화를 드립니다.
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
											<td>
												<div style="font-size: 2.5rem;line-height: 4rem">검진항목에 대한 안내</div>
												<div style="font-size: 1.5rem;color: #666666;">궁금하신 항목을 선택해주세요.</div>
											</td>
											<td>
												<div class="item">
													<img src="/asset/images/icon_inspection1_1.png">
													<div class="item-content">
														기본검사
													</div>
												</div>
												<div class="item-hover">
													신체계측을 포함한 기본 순환기계, 호흡기계, 안과 검사 등을 포함한 검사로 우리몸의 기초적 기능을 알아보는 검사입니다.
												</div>
											</td>
											<td>
												<div class="item">
													<img src="/asset/images/icon_inspection2_1.png">
													<div class="item-content">
														신장검사
													</div>
												</div>
												<div class="item-hover">
													신장은 우리 몸에서 대사산물의 노폐물 제거, 수분과 염분의 양 조절, 내분비계 조절 등 많은 역할을 합니다. 이 검사는 크레아티닌, 신사구체여과율, 요단백, 요비중 등으로 이뤄져있으며 혈액 및 소변 검사로 진행 됩니다. 이 검사를 통해 신장의 손상 정도를 알아볼 수 있습니다.
												</div>
											</td>
											<td>
												<div class="item">
													<img src="/asset/images/icon_inspection3_1.png">
													<div class="item-content">
														일반혈액검사
													</div>
												</div>
												<div class="item-hover">
													백혈구, 적혈구, 헤모글로빈 등 항목으로 이뤄진 일반 혈액검사는 전반적인 건강 상태를 알아보는 검사로 특정 질병을 선별하거나 진단을 확인하고 치료하는데 이용되는 기본 검사입니다.
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="item">
													<img src="/asset/images/icon_inspection4_1.png">
													<div class="item-content">
														심혈관계검사
													</div>
												</div>
												<div class="item-hover">
													심혈관은 심장과 혈관으로 구성되고 심장으로 나온 혈액을 온몸에 공급하여 산소, 영양소, 수분 등을 필요한 곳으로 공급하는 역할을 합니다. 심혈관계 검사는 전해질, 심장효소, 지질검사 등으로 이뤄져 있습니다.
												</div>
											</td>
											<td>
												<div class="item">
													<img src="/asset/images/icon_inspection5_1.png">
													<div class="item-content">
														간기능/간염검사
													</div>
												</div>
												<div class="item-hover">
													간은 우리 몸의 대사과정에 중요한 장기로 섭취한 음식물을 우리 몸에 필요한 영양소 형태로 변화 및 대사 후 노폐물을 처리하는 기능을 합니다. 간 효소(ALT, AST) 등을 검사하며 간의 손상 여부를 확인하며 간염검사는 간의 바이러스 감염여부를 확인합니다.
												</div>
											</td>
											<td>
												<div class="item">
													<img src="/asset/images/icon_inspection6_1.png">
													<div class="item-content">
														당뇨/췌장/빈혈검사
													</div>
												</div>
												<div class="item-hover">
													공복혈당,  당화색소, 인슐린 검사 등을 통해 당뇨 여부를 확인하고 췌장 효소 검사로 췌장의 기능 검사를 합니다. 철, 페르틴 검사 등으로 빈혈 여부를 확인합니다.
												</div>
											</td>
											<td>
												<div class="item">
													<img src="/asset/images/icon_inspection7_1.png">
													<div class="item-content">
														갑상선/류마티스/통풍검사
													</div>
												</div>
												<div class="item-hover">
													갑상선 호르몬은 우리 몸의 대사 속도를 조절하는 역할을 하며 이 검사는 갑상선 호르몬 수치를 통해 갑상선 기능 이상 유무를 확인합니다.
													류마티스 인자와 요산의 수치를 통해 류마티스와 통풍의 여부를 각각 확인할 수 있는 검사입니다.
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="item">
													<img src="/asset/images/icon_inspection8_1.png">
													<div class="item-content">
														종양검사
													</div>
												</div>
												<div class="item-hover">
													이 검사는 우리몸의 종양 여부를 확인하는 혈액 검사로 난소암, 전립선암, 폐암 등을 확인 할 수 있습니다.
												</div>
											</td>
											<td>
												<div class="item">
													<img src="/asset/images/icon_inspection9_1.png">
													<div class="item-content">
														비뇨생식계 및 성별 질환
													</div>
												</div>
												<div class="item-hover">
													이 검사는 남/여 호르몬 수치를 확인하여 비뇨생식계 기능을 확인하는 검사와 성병 여부를 확인 할 수 있는 혈액검사입니다.
												</div>
											</td>
											<td>
												<div class="item">
													<img src="/asset/images/icon_inspection10_1.png">
													<div class="item-content">
														장비검사
													</div>
												</div>
												<div class="item-hover">
													장비검사는 검사 장비를 이용하여 질병을 정밀히 검사하는 것으로 초음파검사, CT, MRI/MRA 검사를 말합니다.
												</div>
											</td>
											<td>
												<div class="item">
													<img src="/asset/images/icon_inspection11_1.png">
													<div class="item-content">
														기타검사
													</div>
												</div>
												<div class="item-hover">
													선택형 정밀검사에 속하는 검사들로 예를 들어 유전자검사, 건강나이, 중금속 검사 등 입니다.
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
</div>

</body>

<script>

	$(document).ready(function () {
		$('.item-table td').hover(
				function () {
					$(this).children('.item').hide();
					$(this).children('.item-hover').show();
				}, function () {
					$(this).children('.item').show();
					$(this).children('.item-hover').hide();
				}
		);
	});

</script>

</html>
