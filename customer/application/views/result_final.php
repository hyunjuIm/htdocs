<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:검진결과</title>

	<?php
	require('head.php');
	?>

	<link rel="stylesheet" type="text/css" href="/asset/css/sub-page.css"/>

	<style>
		.result-table {
			width: 100%;
			border-top: black 2px solid;
			text-align: left;
		}

		.result-table tr {
			border-bottom: 1px solid #a7a7a7;
		}

		.result-table th {
			background: #f6f6f6;
			text-align: left;
			padding: 1.3rem 3rem;
			vertical-align: middle;
			font-weight: 400;
		}

		.result-table td {
			vertical-align: middle;
			padding: 1.3rem 3rem;
			max-width: 30%;
		}

		.result-table td div {
			padding: 0.5rem;
		}

		.item-table {
			width: 100%;
			margin-top: 1rem;
		}

		.item-table img {
			width: 88px;
			height: 88px;
		}

		.item-table td {
			text-align: center;
			width: calc(120rem / 6);
			height: calc(120rem / 6);
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
			cursor: pointer;
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

		#resultCarousel .carousel-control-prev,
		#resultCarousel .carousel-control-next {
			position: relative;
			width: fit-content;
			height: fit-content;
			padding-left: 1rem;
		}

		select {
			width: 15rem;
			padding: 0 0.5rem;
			border-color: #d5d5d5;
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
					 style="background-image: url(../../asset/images/title2.jpg)">
					<div class="row line">
						<div class="line-content">
							<img src="/asset/images/icon_home.png">
							<span>｜</span>
							<span>검진결과</span>
							<span>｜</span>
							<span>종합결과</span>
						</div>
					</div>
					<div class="row wrap" style="height: 22rem">
						<div class="inner" style="margin: 0 auto; ">
							<span class="title">검진결과<br></span>
							Examination Results
						</div>
					</div>
					<div class="row" style="height: 4.5rem">
						<div style="margin: 0 auto; display: flex">
							<div class="title-menu-select" style="border-right: #828282 1px solid">
								종합결과
							</div>
							<a href="/customer/result_main">
								<div class="title-menu">
									주요결과
								</div>
							</a>
						</div>
					</div>
				</div>

				<!-- 컨텐츠내용 -->
				<div style="margin:0 10rem">
					<div class="container content-view">
						<div class="row" style="padding-top: 3rem">
							<div class="sub-title">종합결과</div>
						</div>

						<div class="row" style="margin-top: 2.5rem;">
							<div style="margin-bottom: 0.6rem;display: inline-block;width: 100%">
								<div style="float:left;">
									<select id="familySelect" onchange="setDataSelectOption()">
										<option value="ch">- 수검자 선택 -</option>
									</select>
								</div>
								<div style="float:right;">
									검진결과선택
									<select id="dateSelect" onchange="setChoiceFamilyData()">
									</select>
								</div>
							</div>


							<table class="result-table">
								<tr>
									<th width="10%">검진종류</th>
									<td width="20%" id="service"></td>
									<th width="10%">검진센터</th>
									<td width="20%" id="hospitalName"></td>
									<th width="10%">검진일</th>
									<td width="20%" id="year"></td>
								</tr>
								<tr>
									<th style="vertical-align: top">종합소견</th>
									<td colspan="5" id="totalResult"
										style="height: 30rem;min-height: 30rem;max-height: 30rem;vertical-align: top">
									</td>
								</tr>
							</table>
						</div>

						<div class="row" style="display:block; margin-top: 5rem">
							<div style=" text-align: left;font-size: 2rem;font-weight: bolder">
								주요결과
							</div>
							<div id="resultCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
								<div style="float: left">
									항목을 클릭하면 세부 내용을 확인할 수 있습니다.
								</div>
								<div style="display: flex;float: right">
									<a class="carousel-control-prev" href="#resultCarousel" role="button"
									   data-slide="prev"><img src="/asset/images/icon_prev.png">
									</a>
									<a class="carousel-control-next" href="#resultCarousel" role="button"
									   data-slide="next"><img src="/asset/images/icon_next.png">
									</a>
								</div>

								<!--TODO:검진결과 종합결과 타입별로 셋팅-->
								<div class="carousel-inner">
									<div class="carousel-item active">
										<table class="table-bordered item-table">
											<tr>
												<td>
													<div class="item">
														<img src="/asset/images/icon12.png">
														<div class="item-content">
															기본계측검사
														</div>
													</div>
													<div class="item-hover">
														<span>신체계측, 순환기계검사, 안과, 청력, 치과검사, 호흡기계검사</span>
													</div>
												</td>
												<td>
													<div class="item">
														<img src="/asset/images/icon13.png">
														<div class="item-content">
															혈액검사
														</div>
													</div>
													<div class="item-hover">
														<span>일반혈액검사, 혈액형검사, 빈혈검사, 종양표지자검사</span>
													</div>
												</td>
												<td>
													<div class="item">
														<img src="/asset/images/icon14.png">
														<div class="item-content" style="margin-top: 0.5rem;">
															비뇨생식계 및<br>
															성병질환검사
														</div>
													</div>
													<div class="item-hover">
														<span>신장기능검사, 요검사, 성병검사, 호르몬검사, 부인과검사</span>
													</div>
												</td>
												<td>
													<div class="item">
														<img src="/asset/images/icon15.png">
														<div class="item-content">
															간기능/당뇨검사
														</div>
													</div>
													<div class="item-hover">
														<span>간기능검사, 당뇨검사, 간염검사, 췌장기능검사</span>
													</div>
												</td>
												<td>
													<div class="item">
														<img src="/asset/images/icon16.png">
														<div class="item-content">
															심혈관/고지혈증 검사
														</div>
													</div>
													<div class="item-hover">
														<span>심혈관계검사, 심전도검사, 지질검사, 전해질검사</span>
													</div>
												</td>
												<td>
													<div class="item">
														<img src="/asset/images/icon17.png">
														<div class="item-content">
															갑상선/관절염/통풍
														</div>
													</div>
													<div class="item-hover">
														<span>갑상선검사, 통풍 및 류마티스관절염검사, 분변검사</span>
													</div>
												</td>
											</tr>
										</table>
									</div>
									<div class="carousel-item">
										<table class="table-bordered item-table">
											<tr>
												<td>
													<div class="item">
														<img src="/asset/images/icon18.png">
														<div class="item-content">
															방사선검사
														</div>
													</div>
													<div class="item-hover">
														<span>방사선검사</span>
													</div>
												</td>
												<td>
													<div class="item">
														<img src="/asset/images/icon19.png">
														<div class="item-content">
															초음파검사
														</div>
													</div>
													<div class="item-hover">
														<span>초음파검사</span>
													</div>
												</td>
												<td>
													<div class="item">
														<img src="/asset/images/icon20.png">
														<div class="item-content">
															소화기계검사
														</div>
													</div>
													<div class="item-hover">
														<span>위내시경, 대장내시경</span>
													</div>
												</td>
												<td>
													<div class="item">
														<img src="/asset/images/icon21.png">
														<div class="item-content">
															기타검사
														</div>
													</div>
													<div class="item-hover">
														<span>유전자검사, MRI</span>
													</div>
												</td>
												<td></td>
												<td></td>
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
</div>
</body>

<?php
require('check_data.php');
?>

<script>

	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");
	// 결과 업로드 된 가족 목록
	instance.post('CU_005_001', userData).then(res => {
		setFamilySelectOption(res.data);
	});

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

	//수검자 이름 셀렉트 셋팅
	function setFamilySelectOption(data) {
		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<option value=\'' + data[i].famId + '\'>' + data[i].famName + '</option>'
			$("#familySelect").append(html);
		}
	}

	var resultData = new Object();

	//수검자 선택 데이터 받기
	function setDataSelectOption() {
		$("#dateSelect").empty();

		var val = $("#familySelect option:selected").val();
		if (val == 'ch') {
			return;
		}

		var sendItems = new Object();
		sendItems.famId = val;

		instance.post('CU_005_002', sendItems).then(res => {
			resultData = res.data;
			console.log(resultData);

			$("#dateSelect").append('<option value="ch">날짜 선택</option>');
			for (i = 0; i < resultData.length; i++) {
				var html = '';
				html += '<option>' + resultData[i].year + '</option>'
				$("#dateSelect").append(html);
			}
		});
	}

	//선택한 날짜 종합결과 데이터 셋팅
	function setChoiceFamilyData() {
		var date = $("#dateSelect option:selected").val();

		if (date == 'ch') {
			return;
		}

		for (i = 0; i < resultData.length; i++) {
			if (date == resultData[i].year) {
				$("#service").html(resultData[i].service);
				$("#hospitalName").html(resultData[i].hospitalName);
				$("#year").html(resultData[i].year);
				$("#totalResult").html(resultData[i].totalResult);
			}
		}
	}

	function setResultTable(type) {

	}


</script>

</html>
