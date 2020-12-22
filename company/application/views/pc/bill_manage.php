<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어</title>

	<?php
	require('common/head.php');
	?>

	<style>
		.btn {
			font-size: 1.4rem;
		}

		.basic-table .sum td {
			background: #555555;
			color: white;
		}
	</style>
</head>
<body>

<!--상단 메뉴-->
<header>
	<?php
	require('common/header.php');
	?>
</header>

<!--콘텐츠 내용-->

<div class="main">
	<div class="container" style="width:80%;margin: 0 auto">
		<div class="row">
			<div class="box-title">
				<img src="/asset/images/icon_title.png">
				<h2 style="font-weight: 300;font-size: 2.3rem">청구관리</h2>
			</div>
		</div>

		<div class="row" style="display: block">
			<div class="select-list" style="width: 20rem;height: 3rem">
				<div style="margin-right: 1rem;line-height: 3rem">
					사업연도
				</div>
				<select>
					<option>- 선택 -</option>
				</select>
			</div>

			<table class="basic-table" style="margin-top: 1rem">
				<thead>
				<tr>
					<th width="15%">기업 ID</th>
					<th width="15%">기업명</th>
					<th width="14%">청구년월(회차)</th>
					<th width="14%">청구조건</th>
					<th width="14%">기준일자</th>
					<th width="14%">계산서일자</th>
					<th width="14%">출력여부</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>hyundai</td>
					<td>현대자동차</td>
					<td>2020-04, 1차</td>
					<td>결과입력일</td>
					<td>2020-03-31</td>
					<td>2020-04-01</td>
					<td>N</td>
				</tr>
				</tbody>
			</table>
		</div>

		<div class="row" style="display: block;margin-top: 3rem">
			<div >월별청구리스트</div>
			
			<table class="basic-table" style="margin-top: 1rem">
				<thead>
				<tr>
					<th width="7%">순번</th>
					<th width="11%">병원 ID</th>
					<th width="12%">병원</th>
					<th width="5%">인원</th>
					<th width="11%">검진비용 총합</th>
					<th width="11%" style="line-height: 1.5rem">
						청구금액<br>
						<span style="font-size: 1.3rem">(급여+기업+포인트<br>선택검사회사분)</span>
					</th>
					<th width="11%">계산서금액</th>
					<th width="11%">정보이용료</th>
					<th width="5%">수신여부</th>
					<th width="16%">청구서 및 계산서 출력</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>1</td>
					<td>OMCD36</td>
					<td>21세기좋은병원</td>
					<td>6</td>
					<td>2,000,000</td>
					<td>1,880,000</td>
					<td>1,700,000</td>
					<td>1,700,000</td>
					<td>Y</td>
					<td>
						<div>
							<div class="btn btn-primary">청구서</div>
							<div class="btn btn-secondary">계산서</div>
						</div>
					</td>
				</tr>
				<tr class="sum">
					<td colspan="2"></td>
					<td>계</td>
					<td>187</td>
					<td>56,230,000</td>
					<td>51,464,400</td>
					<td>42,884,400</td>
					<td>42,884,400</td>
					<td colspan="2"></td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>

<?php
require('bill_modal.php');
?>

<script>
	//상단바 선택된 메뉴
	$('#topMenu4').addClass('active');
	$('#topMenu4').before('<div class="menu-select-line"></div>');
</script>

