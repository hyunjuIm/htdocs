<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:내정보관리</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

	<link rel="stylesheet" type="text/css" href="../asset/css/mobile/sub_page.css?ver=1.1"/>

	<style>
		.sub-top-item {
			background: #2e2392;
			font-size: 1.4rem;
			color: white;
		}

		.sub-top-item td {
			width: 50%;
			padding: 10px 20px;
		}

		.sub-top-item td:hover {
			background: #5645ED;
		}

		.policy {
			margin-top: 5rem;
			padding: 1rem;
		}

		.policy h2 {
			text-align: left !important;
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
		 style="background-image: url(../../../../asset/images/mobile/bg_sub1.jpg);
		 background-size: 100%;background-position: center">
		<div class="container">

			<div class="row sub-title">
				<div style="margin: 0 auto">
					<span class="sub-title-name">이용안내</span><br>
					편리한 이용을 위해<br>
					듀얼헬스케어의 정보를 확인해주세요.
				</div>
			</div>

			<div class="row">
				<table class="sub-top-item">
					<tr>
						<td onclick="location.href='/m/policy1'">
							서비스이용약관
						</td>
						<td style="background: #5645ED"  onclick="location.href='/m/policy2'">
							개인정보처리방침
						</td>
					</tr>
				</table>
			</div>

			<div class="row policy" style="display: block;text-align: justify;">
				<h1>개인정보 처리방침</h1>
				<p style="text-align: justify;">&nbsp;</p>
				<p style="text-align: justify;">&nbsp;</p>
				<h2>개인정보의 수집 및 이용의 목적ㆍ항목ㆍ보유기간</h2></p>
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
					</li>
				</ol>
				<div style="overflow-x: auto">
					<table class="table table-bordered" style="text-align: center;margin-top: 2rem;width: 60rem">
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
				</div>

				<p>&nbsp;</p>
				<p>
				<h2>개인정보의 수집 방법</h2></p>
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

		</div>

		<?php
		$parentDir = dirname(__DIR__ . '..');
		require($parentDir . '/common/footer.php');
		?>

	</div>
</div>

</body>

<script>

</script>

</html>
