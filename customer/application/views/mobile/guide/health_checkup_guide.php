<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:건강검진안내</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="../asset/css/mobile/sub_page.css?ver=1.1"/>

	<style>
		.nav {
			width: 100%;
			height: 100%;
			display: table;
		}

		.nav-item {
			width: calc(100% / 3);
			display: table-cell;
			vertical-align: middle;
			border-top: 1px solid #d5d5d5;
			border-left: 1px solid #d5d5d5;
			border-right: 1px solid #d5d5d5;
			border-top-left-radius: 7px;
			border-top-right-radius: 7px;
		}

		.nav-item .active {
			font-weight: 500;
			font-size: 1.6rem;
			color: #3529b1;
		}

		.nav-link {
			color: black;
		}

		.nav-link:hover, .nav-link .active {
			font-weight: 500;
		}

		table {
			text-align: left;
		}

		td {
			vertical-align: middle !important;
		}

		.order-table {
			margin: 6rem auto 0 auto;
		}

		.order-table td {
			padding: 2rem 0;
		}

		.order-next {
			-ms-transform: rotate(90deg); /* IE 9 */
			-webkit-transform: rotate(90deg); /* Chrome, Safari, Opera */
			transform: rotate(90deg);
		}

		.order-box {
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.order-comment {
			width: 27rem;
			height: fit-content;
		}

		.order-img {
			text-align: right;
		}

		.order-title {
			width: 80%;
			font-size: 1.8rem;
			font-weight: bolder;
			padding: 0 1.5rem;
		}

		.order-content {
			width: 80%;
			padding: 0.5rem 1.5rem;
		}

		.item-table {
			width: 100%;
			margin-top: 3rem;
		}

		.item-table img {
			width: 88px;
			height: 88px;
		}

		.item-table td {
			text-align: center;
		}

		.item {
			align-items: center;
			cursor: default;
			font-size: 1.5rem;
		}

		.item img {
			width: fit-content;
			height: fit-content;
		}

		.item-hover {
			background: white;
			cursor: default;
			padding: 2rem;
			font-size: 1.4rem;
			font-weight: 300;
			text-align: justify;
		}

		.item-hover span {
			font-size: 1.5rem;
			font-weight: 500;
			vertical-align: middle;
			color: #5645ed;
		}

		.item-content {
			font-weight: bolder;
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
				<img src="/asset/images/mobile/icon_sub_title_bar.png">
				<h1>건강검진 안내</h1>
			</div>

			<div class="row" style="display: block;margin-top: 5rem">
				<ul class="nav">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#tab1">검사진행안내</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#tab2">
							주의사항<br>(전날/당일)
						</a>
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
								<td style="display: block">
									<div class="order-box">
										<img src="/asset/images/icon7.png" width="130px">
										<div class="order-comment">
											<div class="order-title" style="vertical-align: middle">검진예약</div>
											<div class="order-content" style="vertical-align: middle">
												인터넷, 전화를 통해 실시간 예약이 가능합니다.
												추가 검사는 사전에 검진기관에서 별도 예약하셔야 합니다.
											</div>
										</div>
									</div>
								</td>
							<tr>
								<td style="text-align: center;">
									<img src="/asset/images/next_button.png" class="order-next">
								</td>
							</tr>
							<tr>
								<td>
									<div class="order-box">
										<img src="/asset/images/icon8.png" width="130px">
										<div class="order-comment">
											<div class="order-title">예약일자확정</div>
											<div class="order-content">
												검진 신청 후 3일 이내에 검진기관에서 확정일자를 통보합니다.
											</div>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td style="text-align: center;">
									<img src="/asset/images/next_button.png" class="order-next">
								</td>
							</tr>
							<tr>
								<td>
									<div class="order-box">
										<img src="/asset/images/icon9.png" width="130px">
										<div class="order-comment">
											<div class="order-title">준비물 우송 및 예약안내</div>
											<div class="order-content">
												검진기관에서 검진 관련 준비물 우송 및 안내전화를 드립니다.
											</div>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td style="text-align: center;">
									<img src="/asset/images/next_button.png" class="order-next">
								</td>
							</tr>
							<tr>
								<td>
									<div class="order-box">
										<img src="/asset/images/icon10.png" width="130px">
										<div class="order-comment">
											<div class="order-title">검강검진시행</div>
											<div class="order-content">
												정해진 병원에서 건강검진을 시행합니다.
											</div>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td style="text-align: center;">
									<img src="/asset/images/next_button.png" class="order-next">
								</td>
							</tr>
							<tr>
								<td>
									<div class="order-box">
										<img src="/asset/images/icon11.png" width="130px">
										<div class="order-comment">
											<div class="order-title">결과상담</div>
											<div class="order-content">
												건강검진 종료 후 결과를 바탕으로 상담을 진행합니다.
											</div>
										</div>
									</div>
								</td>
							</tr>
						</table>
					</div>
					<!--주의사항-->
					<div class="tab-pane fade" id="tab2">
						<img src="/asset/images/precautions.jpg" style="width: 100%;margin-top: 6rem">
					</div>
					<!--항목안내-->
					<div class="tab-pane fade" id="tab3">
						<div style="margin-top: 6rem;font-weight: bolder">
							<div style="font-size: 2.3rem;line-height: 4rem">검진항목에 대한 안내</div>
							<div style="color: #666666;">궁금하신 항목을 선택해주세요.</div>
						</div>

						<table class="table-bordered item-table">
							<tr>
								<td>
									<div class="item" data-toggle="modal" data-target="#inspectionModal"
										 onclick="setItemContent('기본검사')">
										<img src="/asset/images/icon_inspection1_1.png">
										<div class="item-content">
											기본검사
										</div>
									</div>
								</td>
								<td>
									<div class="item" data-toggle="modal" data-target="#inspectionModal"
										 onclick="setItemContent('신장검사')">
										<img src="/asset/images/icon_inspection2_1.png">
										<div class="item-content">
											신장검사
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="item" data-toggle="modal" data-target="#inspectionModal"
										 onclick="setItemContent('일반혈액검사')">
										<img src="/asset/images/icon_inspection3_1.png">
										<div class="item-content">
											일반혈액검사
										</div>
									</div>
								</td>
								<td>
									<div class="item" data-toggle="modal" data-target="#inspectionModal"
										 onclick="setItemContent('심혈관계검사')">
										<img src="/asset/images/icon_inspection4_1.png">
										<div class="item-content">
											심혈관계검사
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="item" data-toggle="modal" data-target="#inspectionModal"
										 onclick="setItemContent('간기능/간염검사')">
										<img src="/asset/images/icon_inspection5_1.png">
										<div class="item-content">
											간기능/간염검사
										</div>
									</div>
								</td>
								<td>
									<div class="item" data-toggle="modal" data-target="#inspectionModal"
										 onclick="setItemContent('당뇨/췌장/빈혈검사')">
										<img src="/asset/images/icon_inspection6_1.png">
										<div class="item-content">
											당뇨/췌장/빈혈검사
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="item" data-toggle="modal" data-target="#inspectionModal"
										 onclick="setItemContent('갑상선/류마티스/통풍검사')">
										<img src="/asset/images/icon_inspection7_1.png">
										<div class="item-content">
											갑상선/류마티스/통풍검사
										</div>
									</div>
								</td>
								<td>
									<div class="item" data-toggle="modal" data-target="#inspectionModal"
										 onclick="setItemContent('종양검사')">
										<img src="/asset/images/icon_inspection8_1.png">
										<div class="item-content">
											종양검사
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="item" data-toggle="modal" data-target="#inspectionModal"
										 onclick="setItemContent('비뇨생식계 및 성별 질환')">
										<img src="/asset/images/icon_inspection9_1.png">
										<div class="item-content">
											비뇨생식계 및 성별 질환
										</div>
									</div>
								</td>
								<td>
									<div class="item" data-toggle="modal" data-target="#inspectionModal"
										 onclick="setItemContent('장비검사')">
										<img src="/asset/images/icon_inspection10_1.png">
										<div class="item-content">
											장비검사
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="item" data-toggle="modal" data-target="#inspectionModal"
										 onclick="setItemContent('기타검사')">
										<img src="/asset/images/icon_inspection11_1.png">
										<div class="item-content">
											기타검사
										</div>
									</div>
								</td>
								<td>
									<!--									<div class="item" data-toggle="modal" data-target="#inspectionModal"-->
									<!--										 onclick="setItemContent('기타검사')">-->
									<!--										<img src="/asset/images/icon21.png">-->
									<!--										<div class="item-content">-->
									<!--											장비검사-->
									<!--										</div>-->
									<!--									</div>-->
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="inspectionModal" tabindex="-1" aria-labelledby="inspectionModalLabel"
			 aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" id="inspectionModalLabel">Modal title</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div id="itemContent" class="item-hover">

						</div>
					</div>
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
	var menu2 = '건강검진 안내';

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/check_data.js');
	?>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/sub_drop_down.js');
	?>

	$(".item-table td").width($('.tab-content').width() / 2);
	$(".item-table td").height($(".item-table td").width());

	function setItemContent(name) {
		$('#itemContent').empty();
		$('#inspectionModalLabel').text(name);

		if (name == '기본검사') {
			$('#itemContent').append(
					'신체계측을 포함한 기본 순환기계, 호흡기계, 안과 검사 등을 포함한 검사로 우리몸의 기초적 기능을 알아보는 검사입니다.'
			);
		} else if (name == '신장검사') {
			$('#itemContent').append(
					'신장은 우리 몸에서 대사산물의 노폐물 제거, 수분과 염분의 양 조절, 내분비계 조절 등 많은 역할을 합니다. 이 검사는 크레아티닌, 신사구체여과율, 요단백, 요비중 등으로 이뤄져있으며 혈액 및 소변 검사로 진행 됩니다. 이 검사를 통해 신장의 손상 정도를 알아볼 수 있습니다.'
			);
		} else if (name == '일반혈액검사') {
			$('#itemContent').append(
					'백혈구, 적혈구, 헤모글로빈 등 항목으로 이뤄진 일반 혈액검사는 전반적인 건강 상태를 알아보는 검사로 특정 질병을 선별하거나 진단을 확인하고 치료하는데 이용되는 기본 검사입니다.'
			);
		} else if (name == '심혈관계검사') {
			$('#itemContent').append(
					'심혈관은 심장과 혈관으로 구성되고 심장으로 나온 혈액을 온몸에 공급하여 산소, 영양소, 수분 등을 필요한 곳으로 공급하는 역할을 합니다. 심혈관계 검사는 전해질, 심장효소, 지질검사 등으로 이뤄져 있습니다.'
			);
		} else if (name == '간기능/간염검사') {
			$('#itemContent').append(
					'간은 우리 몸의 대사과정에 중요한 장기로 섭취한 음식물을 우리 몸에 필요한 영양소 형태로 변화 및 대사 후 노폐물을 처리하는 기능을 합니다. 간 효소(ALT, AST) 등을 검사하며 간의 손상 여부를 확인하며 간염검사는 간의 바이러스 감염여부를 확인합니다.'
			);
		} else if (name == '당뇨/췌장/빈혈검사') {
			$('#itemContent').append(
					'공복혈당,  당화색소, 인슐린 검사 등을 통해 당뇨 여부를 확인하고 췌장 효소 검사로 췌장의 기능 검사를 합니다. 철, 페르틴 검사 등으로 빈혈 여부를 확인합니다.'
			);
		} else if (name == '갑상선/류마티스/통풍검사') {
			$('#itemContent').append(
					'갑상선 호르몬은 우리 몸의 대사 속도를 조절하는 역할을 하며 이 검사는 갑상선 호르몬 수치를 통해 갑상선 기능 이상 유무를 확인합니다. 류마티스 인자와 요산의 수치를 통해 류마티스와 통풍의 여부를 각각 확인할 수 있는 검사입니다.'
			);
		} else if (name == '종양검사') {
			$('#itemContent').append(
					'이 검사는 우리몸의 종양 여부를 확인하는 혈액 검사로 난소암, 전립선암, 폐암 등을 확인 할 수 있습니다.'
			);
		} else if (name == '비뇨생식계 및 성별 질환') {
			$('#itemContent').append(
					'이 검사는 남/여 호르몬 수치를 확인하여 비뇨생식계 기능을 확인하는 검사와 성병 여부를 확인 할 수 있는 혈액검사입니다.'
			);
		} else if (name == '장비검사') {
			$('#itemContent').append(
					'장비검사는 검사 장비를 이용하여 질병을 정밀히 검사하는 것으로 초음파검사, CT, MRI/MRA 검사를 말합니다.'
			);
		} else if (name == '기타검사') {
			$('#itemContent').append(
					'선택형 정밀검사에 속하는 검사들로 예를 들어 유전자검사, 건강나이, 중금속 검사 등 입니다.'
			);
		}
	}
</script>

</html>
