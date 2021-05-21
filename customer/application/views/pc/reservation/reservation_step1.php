<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:검진예약</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="/asset/css/sub-page.css"/>

	<style>
		.personal-info-agree {
			font-size: 1.4rem;
			text-align: left;
			padding: 2rem;
			background: #f6f6f6;
			border: 1px solid #d5d5d5;
			width: 100%;
			height: 25rem;
			overflow-y: scroll;
		}

		.form-check {
			text-align: left;
		}

		.form-check-label, .form-check-input {
			width: fit-content;
		}

		.personal-info-table {
			width: 100%;
			border-top: black 2px solid;
			margin: 0 auto;
		}

		.personal-info-table tr {
			border-bottom: 1px solid #a7a7a7;
		}

		.personal-info-table th {
			background: #f6f6f6;
			font-weight: normal !important;
			width: 16rem;
			text-align: right;
			padding: 1.3rem 3rem;
			vertical-align: middle;
		}

		.personal-info-table td {
			padding: 1rem 2rem;
			text-align: left;
		}

		.personal-info-table .name {
			width: 25rem;
			text-align: center;
			background: #fbfbfb;
			border-right: 1px solid #a7a7a7;
		}

		.name {
			font-size: 3rem;
			line-height: 2.7rem;
		}

		.name span {
			font-size: 1.6rem;
		}

		.personal-info-table .btn-ok {
			text-align: center;
			border-left: 1px solid #a7a7a7;
			width: 25rem;
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
					 style="background-image: url(../../../../asset/images/title3.jpg)">
					<div class="row line">
						<div class="line-content">
							<img src="/asset/images/icon_home.png">
							<span>｜</span>
							<span>예약서비스</span>
							<span>｜</span>
							<span>검진예약</span>
						</div>
					</div>
					<div class="row wrap" style="height: 22rem">
						<div class="inner" style="margin: 0 auto; ">
							<span class="title">예약서비스<br></span>
							Reservation service
						</div>
					</div>
					<div class="row" style="height: 4.5rem">
						<div style="margin: 0 auto; display: flex">
							<div class="title-menu-select" style="border-right: #828282 1px solid">
								검진예약
							</div>
							<a href="/customer/reservation_list">
								<div class="title-menu">
									예약현황
								</div>
							</a>
						</div>
					</div>
				</div>

				<!-- 컨텐츠내용 -->
				<div style="margin:0 10rem">
					<div class="container content-view">
						<div class="row" style="padding-top: 3rem">
							<div class="sub-title">예약</div>
						</div>
						<div class="row" id="policy" style="margin-top: 4rem">
						<span style="font-size: 2.4rem;font-weight: bolder;margin-bottom: 2rem">
							개인정보 수집이용 안내
						</span>
							<br>
							<div class="personal-info-agree">
								<p style="text-align: justify;">
								<h4>개인정보의 수집 및 이용의 목적ㆍ항목ㆍ보유기간</h4></p>
								<ol style="text-align: justify;">
									<li>회사는 적법하고 공정한 수단으로 회원님의 개인정보를 수집하고 있습니다.</li>
									<li>회사가 수집하는 개인정보는 서비스 제공에 필요한 최소한의 정보만 수집하고 있습니다.</li>
									<li>회사는 다음과 같은 이용목적을 위하여 개인정보를 수집하고 있으며, 보유기간 만료 시 지체 없이 파기합니다.
										<ul>
											<li style="list-style-type: none">※ 단, 관계 법령에 따라 보존사유 존재 시 해당기간에 따라 보존</li>
										</ul>
									</li>
									<li>회사는 서비스 개선 및 향상된 서비스의 제공을 위해 서비스 이용기록, 접속 빈도 등 비식별화된 개인정보 또는 비(非)개인정보를 이용합니다.</li>
									<li>개인정보를 수집하는 항목과 이용목적, 보유기간은 다음과 같습니다.
										<table class="table table-bordered" style="text-align: center;margin-top: 2rem;width: 95%">
											<tbody>
											<tr>
												<th width="20%">구분</th>
												<th width="40%">수집항목</th>
												<th width="20%">이용목적</th>
												<th width="20%">보유기간</th>
											</tr>
											<tr>
												<td>서비스이용</td>
												<td>성명, 생년월일, 성별, 사번(회사부여ID), 비밀번호, 이메일, 휴대폰번호, 소속정보, 주소(회사&amp;집), 전화번호(회사&amp;집)</td>
												<td>건강검진서비스, 예방접종 예약 및 상담 이용</td>
												<td>회원계약 종료 후 1년</td>
											</tr>
											</tbody>
										</table>
									</li>
								</ol>
								<p>&nbsp;</p>
								<p>
								<h4>개인정보의 수집 방법</h4></p>
								<ol>
									<li>회사는 본 서비스를 제공하는 홈페이지에서 입력받는 방법 등으로 개인정보를 수집합니다</li>
									<li>서비스 이용 과정에서 IP주소, 서비스이용기록 등의 개인정보 항목이 자동으로 생성되어 수집될 수 있습니다.</li>
								</ol>
								<p>&nbsp;</p>
								<ul>
									<li style="list-style-type: none">고객님은 개인정보 수집 및 이용 동의를 거부할 권리가 있습니다. 단, 동의를 거부할 경우 서비스
										제공 이행에 필수적인 정보 제공이 이뤄지지 않아 서비스 이행이 불가함을 알려 드립니다.
									</li>
								</ul>
							</div>
							<div style="margin-top: 2rem; width: 100%">
								<div style="float:left;">
									위의 개인정보 수집 이용안내에 대하여 동의하십니까?
								</div>
								<div style="float:right;">
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="agree" id="agreeYes"
											   value="true">
										<label class="form-check-label" for="agreeYes">
											&nbsp동의합니다. &nbsp
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row" style="margin-top: 8rem">
							<table class="personal-info-table" id="personalInfos">
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

<script>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/check_data.js');
	?>

	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");
	// 내정보
	instance.post('CU_003_001', userData).then(res => {
		setPersonalInfo(res.data);
	});

	function setPersonalInfo(data) {
		var resCount = 0;

		for (i = 0; i < data.length; i++) {
			var html = "";
			html += '<tbody>' +
					'<tr>' +
					'<th class="name" rowspan="4" style="border-bottom: 1px solid black">' + data[i].famName + '<br><span>(' + data[i].grade + ')</span></th>' +
					'<th>주소</th>' +
					'<td>(' + data[i].zipcode + ') ' + data[i].address + ' ' + data[i].buildingNum + '</td>' +
					'<td class="btn-ok" rowspan="3" style="border-bottom: 1px solid black">';

			if (data[i].reserved) {
				html += '<div class="btn-light-purple-square" onclick="doReservation(\'' + data[i].famId + '\')"> 예약하기 </div>';
				resCount++;
			} else {
				html += '<div class="btn-cancel-square" style="cursor: default"> 예약완료 </div>';
			}

			html += '</td>' +
					'</tr>' +
					'<tr>' +
					'<th> 연락처</th>' +
					'<td>' + data[i].phone + '</td>' +
					'</tr>' +
					'<tr>' +
					'<th style="border-bottom: 1px solid black"> 이메일</th>' +
					'<td style="border-bottom: 1px solid black">' + data[i].email + '</td>' +
					'</tr>' +
					'</tbody>';
			$("#personalInfos").append(html);
		}

		(resCount < 1) ? $("#policy").hide() : $("#policy").show();
	}

	function sendNoticeID() {
		location.href = "service_notice_update?id=" + nId.id;
	}

	function doReservation(famId) {
		if (booleanData('agree') == null || booleanData('agree') == 'false') {
			alert("개인정보 수집 동의 후, 예약이 가능합니다.");
			return false;
		}

		//다음 페이지에 가족 id 값 넘기기
		location.href = "reservation_step2?famId=" + famId;
	}

</script>

</html>
