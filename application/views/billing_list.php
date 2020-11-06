<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:청구관리</title>

	<?php
	require('head.php');
	?>

	<style>
		th, td {
			vertical-align: middle !important;
		}
	</style>


</head>

<body>

<!--상단 네비바-->
<header>
	<?php
	require('header.php');
	?>
</header>
<!--상단 네비바-->

<!--콘텐츠 내용-->
<div class="container" style="padding-top: 50px; max-width: none">
	<div class="row">
		<div class="col">
			<form style="margin: 0 auto; width: 95%; max-width: 1150px; padding: 20px">
				<ul class="img-circle">
					<div class="menu-title" style="font-size: 22px">
						<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
						청구관리
					</div>
					<hr>
					<div class="form-row row">
						<label class="col-form-label">
							<li>사업연도</li>
						</label>
						<div class="form-group col" style="display: flex">
							<select id="billYear" class="form-control">
								<option selected>-전체-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>고객사</li>
						</label>
						<div class="form-group col" style="display: flex">
							<select id="billComName" class="form-control" style="margin-right: 10px"
									onchange="setCompanySelectOption(this, 'billComBranch')">
								<option selected>-전체-</option>
							</select>
							<select id="billComBranch" class="form-control">
								<option selected>-전체-</option>
							</select>
						</div>
					</div>
					<div class="form-row row">
						<label class="col-form-label">
							<li>청구월</li>
						</label>
						<div class="form-group col">
							<select id="billMonth" class="form-control">
								<option selected>-전체-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
						</label>
						<div class="form-group col">
						</div>
					</div>

					<hr>
					<div style="float: right">
						<div class="btn-purple-square" data-toggle="modal" data-target="#billingCreateModal">
							신규등록
						</div>
						<div class="btn-save-square"  onclick="searchBillInformation()">
							검색
						</div>
					</div>
				</ul>
			</form>
		</div>
	</div>

	<div class="row " style="margin-left: 30px; margin-right: 30px; margin-top: 120px">
		<form class="table-responsive" style="margin: 0 auto">
			<div class="btn-default-small excel" style="float: right"></div>
			<table id="billInfos" class="table table-hover" style="margin-top: 45px">
				<thead>
				<tr>
					<th style="width: 5%"><input type="checkbox" id="billingCheck" name="billingCheck" onclick="clickAll(id, name)"></th>
					<th style="width: 5%">NO</th>
					<th style="width: 10%">고객사명</th>
					<th style="width: 10%">사업장명</th>
					<th>수검인원</th>
					<th>청구인원</th>
					<th>기업부담금</th>
					<th>공단부담금</th>
					<th>개인부담금</th>
					<th>계산일자</th>
					<th style="width: 15%">청구기간</th>
					<th style="width: 7%"></th>
				</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</form>
	</div>

</div>
<!--콘텐츠 내용-->

<!--Modal-->
<?php
require('billing_modal.php');
?>

</body>

<!--체크박스 검사-->
<?php
require('check_data.php');
?>

</html>

<script type="text/javascript">

	//검색항목리스트
	instance.post('M009003_RES').then(res => {
		setBillSelectData(res.data);
	});

	searchBillInformation();

	//검색
	function searchBillInformation() {
		var searchItems = new Object();

		$('#billInfos > tbody').empty();

		searchItems.year = $("#billYear option:selected").val();
		searchItems.coName = $("#billComName option:selected").val();
		searchItems.coBranch = $("#billComBranch option:selected").val();
		searchItems.month = $("#billMonth option:selected").val();

		if (searchItems.coName == "-전체-") {
			searchItems.coName = "all";
		}
		if (searchItems.coBranch == "-전체-") {
			searchItems.coBranch = "all";
		}
		if (searchItems.year == "-전체-") {
			searchItems.year = "all";
		}
		if (searchItems.month == "-전체-") {
			searchItems.month = "all";
		}

		console.log(searchItems);

		instance.post('M009004_REQ_RES', searchItems).then(res => {
			setBillData(res.data);
		});
	}

	//검색 selector
	function setBillSelectData(data) {
		console.log(data);
		//회사
		var name = [];
		var nameSize = 0;

		for (i = 0; i < data.coNameBranch.length; i++) {
			var check = 0;

			//회사명 - 지점있을때
			var jbSplit = data.coNameBranch[i].split('-');
			var companyName = jbSplit[0];

			for(var j=0; j<nameSize; j++) {
				if(name[j] == companyName) {
					check += 1;
				}
			}
			if(check < 1) {
				name[nameSize] = companyName;
				nameSize += 1;
			}
		}

		for(i=0; i<nameSize; i++) {
			var html = '';
			html += '<option value=\'' + name[i] + '\'>' + name[i] + '</option>'
			$("#billComName").append(html);
		}

		companySelect = data.coNameBranch;

		//사업연도
		for (i = 0; i < data.year.length; i++) {
			var html = '';
			html += '<option>' + data.year[i] + '</option>'
			$("#billYear").append(html);
		}
		//청구월
		for (i = 0; i < data.month.length; i++) {
			var html = '';
			html += '<option>' + data.month[i] + '</option>'
			$("#billMonth").append(html);
		}
	}

	//세부항목 설정에 bID 값 던지기
	function sendBillID(index) {
		location.href = "billing_detail?bID=" + index;
	}

	//패키지 생성 테이블
	function setBillData(data) {
		console.log(data);
		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>"';
			html += '<tr>';
			html += '<td><input type="checkbox" name="billingCheck" onclick="clickOne(name)"></td>';

			var no = i+1;
			html += '<td>' + no + '</td>';

			html += '<td>' + data[i].coName + '</td>';
			html += '<td>' + data[i].coBranch + '</td>';
			html += '<td>' + data[i].ipCount + '</td>';
			html += '<td>' + data[i].billCount + '</td>';
			html += '<td>' + data[i].coCharge + '</td>';
			html += '<td>' + data[i].pcCharge + '</td>';
			html += '<td>' + data[i].psnCharge + '</td>';
			html += '<td>' + data[i].calculateDate + '</td>';
			html += '<td>' + data[i].calculateStartDate + "~" +  data[i].calculateEndDate+'</td>';
			html += '<td> <a style="color: white" onclick="sendBillID(\'' + data[i].bid + '\')">' +
					'<div class="btn-purple-square" style="padding: 2px 8px; font-size: 13px">상세보기</div></a></td>';
			html += '</tr>';

			$("#billInfos").append(html);
		}
	}
</script>
