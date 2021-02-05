<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:검진예약</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="../asset/css/mobile/sub_page.css?ver=1.1"/>

	<style>
		.personal-info-agree {
			font-size: 1.2rem;
			text-align: left;
			padding: 1.3rem;
			background: #f6f6f6;
			border: 1px solid #d5d5d5;
			width: 100%;
			height: 18rem;
			overflow-y: scroll;
		}

		.form-check {
			text-align: left;
		}

		.form-check-label, .form-check-input {
			width: fit-content;
		}

		.personal-info-table {
			margin-top: 50px;
			text-align: left;
			font-size: 1.4rem;
		}

		.personal-info-table tr {
			border-bottom: 1px solid #e5e5e5;
		}

		.personal-info-table th {
			width: 22%;
			background: #f6f6f6;
			font-weight: 300;
		}

		.personal-info-table td:not(.name), .personal-info-table th {
			padding: 8px 15px;
			vertical-align: middle;
		}

		.personal-info-table .name {
			font-size: 2.8rem;
			font-weight: 500;
			padding: 30px 3px 5px 3px;
		}

		.personal-info-table .name span {
			font-size: 1.4rem;
			font-weight: 300;
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
		 style="background-image: url(../../../../asset/images/mobile/bg_sub2.jpg);
		 background-size: 100%;background-position: center">
		<div class="container">

			<div class="row sub-title">
				<div style="margin: 0 auto">
					<span class="sub-title-name">예약서비스</span><br>
					원하시는 검진 프로그램을<br>
					편리하게 예약하실 수 있습니다.
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
				<h1>예약하기</h1>
			</div>

			<div class="row" style="display: block;margin-top: 5rem">
				<div style="font-size: 1.6rem;font-weight: bolder;text-align:left;line-height:4rem">
					개인정보 수집이용 안내
				</div>
				<div class="personal-info-agree">
					<p style="text-align: justify;">
					<p>개인정보의 수집 및 이용의 목적ㆍ항목ㆍ보유기간</p></p>
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
									<td>성명, 생년월일, 성별, 사번(회사부여ID), 비밀번호, 이메일, 휴대폰번호, 소속정보, 주소(회사&amp;집), 전화번호(회사&amp;집)
									</td>
									<td>건강검진서비스, 예방접종 예약 및 상담 이용</td>
									<td>회원계약 종료 후 1년</td>
								</tr>
								</tbody>
							</table>
						</li>
					</ol>
					<p>&nbsp;</p>
					<p>
					<p>개인정보의 수집 방법</p></p>
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
				<div style="width: 100%;font-size: 1.3rem;line-height: 3rem">
					<div style="float: right">
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

			<div class="row" style="margin-top: 3rem">
				<table class="personal-info-table" id="personalInfos">

				</table>
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
	$('#menu1 .nav-button').text('예약서비스');
	var menu2 = '검진예약';

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/check_data.js');
	?>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/sub_drop_down.js');
	?>

	var userData = new Object();
	userData.cusId = sessionStorage.getItem("userCusID");
	// 내정보
	instance.post('CU_003_001', userData).then(res => {
		setPersonalInfo(res.data)
	});

	function setPersonalInfo(data) {

		for (i = 0; i < data.length; i++) {
			var html = "";

			html += '<tr>' +
					'<td class="name" colspan="2">' +
					'<div style="float:left;">' + data[i].famName +
					'<span> (' + data[i].grade + ')</span>' +
					'</div>' +
					'<div style="float:right;">';

			if (data[i].reserved) {
				html += '<div class="btn-light-purple-square" onclick="doReservation(\'' + data[i].famId + '\')"> 예약하기 </div>';
			} else {
				html += '<div class="btn-cancel-square" style="cursor: default"> 예약완료 </div>';
			}

			html += '</div>' +
					'</td>' +
					'</tr>' +
					'<tr>' +
					'<th>주소</th>' +
					'<td>(' + data[i].zipcode + ') ' + data[i].address + ' ' + data[i].buildingNum + '</td>' +
					'</tr>' +
					'<tr>' +
					'<th>연락처</th>' +
					'<td>' + data[i].phone + '</td>' +
					'</tr>' +
					'<tr>' +
					'<th>이메일</th>' +
					'<td>' + data[i].email + '</td>' +
					'</tr>'

			$("#personalInfos").append(html);
		}
	}

	function sendNoticeID() {
		location.href = "service_notice_update?id=" + nId.id;
	}

	function doReservation(famId) {
		if (booleanData('agree') == null || booleanData('agree') == 'false') {
			alert("개인정보 수집 동의 후, 예약이 가능합니다.");
			return;
		}

		//다음 페이지에 가족 id 값 넘기기
		location.href = "reservation_step2?famId=" + famId;
	}

</script>

</html>
