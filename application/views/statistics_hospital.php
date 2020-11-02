<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:병원통계</title>

	<?php
	require('head.php');
	?>

	<!--그래프-->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.min.js"></script>

	<style>
		.table {
			font-size: 15px;
		}

		th {
			vertical-align: middle !important;
			background: #e6e6e6;
		}

		td {
			background: white;
		}

		.sum-td {
			font-weight: bold;
			color: red;
		}

		.table-bordered > thead > tr > th,
		.table-bordered > tbody > tr > th,
		.table-bordered > tfoot > tr > th,
		.table-bordered > thead > tr > td,
		.table-bordered > tbody > tr > td,
		.table-bordered > tfoot > tr > td {
			padding: 5px;
			border: 0.5px solid #b6b6b6;
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
			<form style="margin: 0 auto; width: 95%; padding: 0px 10px">
				<ul class="img-circle">
					<div class="menu-title" style="font-size: 22px">
						<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
						병원통계
					</div>
					<div class="form-row row" style="margin: 0 auto;width: 80%">
						<label class="col-form-label">
							<li>병원명</li>
						</label>
						<div class="form-group col" style="display: flex">
							<select id="stHosName" class="form-control">
								<option selected>-선택-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>고객사</li>
						</label>
						<div class="form-group col" style="display: flex">
							<select id="stComName" class="form-control" onchange="setCompanySelectOption(this, 'stComBranch')">
								<option selected>-선택-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>사업장</li>
						</label>
						<div class="form-group col">
							<select id="stComBranch" class="form-control">
								<option selected>-선택-</option>
							</select>
						</div>
						<div style="margin-left: 50px">
							<div class="btn-save-square" style="visibility:hidden">
								검색
							</div>
						</div>
					</div>
					<div class="form-row row" style="margin: 0 auto;width: 80%">
						<label class="col-form-label">
						</label>
						<div class="form-group col" style="display: flex">
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>서비스</li>
						</label>
						<div class="form-group col">
							<select id="stService" class="form-control">
								<option selected>-선택-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>사업연도</li>
						</label>
						<div class="form-group col">
							<select id="stYear" class="form-control">
							</select>
						</div>
						<div style="margin-left: 50px">
							<div class="btn-save-square" onclick="searchStaticsHospitalData()">
								검색
							</div>
						</div>
					</div>
				</ul>
			</form>
			<hr>
		</div>
	</div>

	<div class="row" style="margin: 0 auto;padding: 50px">
		<canvas id="hospitalChart" width="90%" height="15%"></canvas>
	</div>

	<div class="row " style="margin: 0px 30px">
		<form class="table-responsive" style="margin: 0 auto">
			<div
				class="btn-default-small excel" style="float: right"></div>
			<table id="statisticsHospitalInfos" class="table table-bordered" style="margin-top: 45px">
				<thead>
				<tr>
					<th>예약</th>
					<th>수진</th>
					<th>결과</th>
				</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</form>
	</div>

</div>
<!--콘텐츠 내용-->

</body>
<!--체크박스 검사-->
<?php
require('check_data.php');
?>
</html>

<script type="text/javascript">

	//검색항목리스트
	instance.post('M012001_RES').then(res => {
		setStaticsHospitalOption(res.data);
	});

	//검색
	function searchStaticsHospitalData() {
		var searchItems = new Object();

		searchItems.hoName = $("#stHosName option:selected").val();
		searchItems.coName = $("#stComName option:selected").val();
		searchItems.coBranch = $("#stComBranch option:selected").val();
		searchItems.service = $("#stService option:selected").val();
		searchItems.year = $("#stYear option:selected").val();

		if (searchItems.hoName == "-선택-") {
			alert("병원명을 선택해주세요.");
		} else if (searchItems.coName == "-선택-") {
			alert("고객사명을 선택해주세요.");
		} else if (searchItems.coBranch == "-선택-") {
			alert("사업장명을 선택해주세요.");
		} else if (searchItems.service == "-선택-") {
			alert("서비스명을 선택해주세요.");
		} else {
			instance.post('M012002_REQ_RES', searchItems).then(res => {
				setStaticsHospitalData(res.data);
			});
		}

		console.log(searchItems);
	}

	//검색 selector
	function setStaticsHospitalOption(data) {
		console.log(data);

		//병원명
		for (i = 0; i < data.hoName.length; i++) {
			var html = '';
			html += '<option>' + data.hoName[i] + '</option>'
			$("#stHosName").append(html);
		}

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
			$("#stComName").append(html);
		}

		companySelect = data.coNameBranch;

		//서비스
		for (i = 0; i < data.service.length; i++) {
			var html = '';
			html += '<option>' + data.service[i] + '</option>'
			$("#stService").append(html);
		}

		//사업연도
		for (i = 0; i < data.year.length; i++) {
			var html = '';
			html += '<option>' + data.year[i] + '</option>'
			$("#stYear").append(html);
		}

	}

	//사업장 리스트 셋팅
	function setCompanySelectOption(selectCompany, targetBranch) {
		var branch = document.getElementById(targetBranch);

		var opt = document.createElement("option");
		branch.appendChild(opt);

		removeAll(branch);

		for (i = 0; i < companySelect.length; i++) {
			var jbSplit = companySelect[i].split('-');
			var branchName = jbSplit[jbSplit.length - 1];

			//TODO: 고객사 수정완료
			if(selectCompany.value == jbSplit[0]) {
				var html = '';
				html += '<option>' + branchName + '</option>'
				$("#"+targetBranch+"").append(html);
			}
		}
	}

	//옵션 삭제
	function removeAll(e){
		for(var i = 0, limit = e.options.length; i < limit - 1; ++i){
			e.remove(1);
		}
	}

	//병원 통계 테이블
	function setStaticsHospitalData(data) {
		console.log(data);

		$('#statisticsHospitalInfos > tbody > tr > td').remove();

		//그래프를 위한 월별 통계
		var rsvCount = new Array();
		var ispCount = new Array();
		var resultCount = new Array();

		//월별 통계
		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';
			html += '<td>' + data[i].rsvCount + '</td>';
			html += '<td>' + data[i].ispCount + '</td>';
			html += '<td>' + data[i].resultCount + '</td>';
			html += '</tr>';
			$("#statisticsHospitalInfos").append(html);
			
			rsvCount.push(data[i].rsvCount);
			ispCount.push(data[i].ispCount);
			resultCount.push(data[i].resultCount);
		}

		//기업 통계 그래프 그리기
		var ctx = document.getElementById("hospitalChart");
		var hospitalChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["1월", "2월", "3월", "4월", "5월", "6월", "7월", "8월", "9월", "10월", "11월", "12월"],
				datasets: [{
					label: '예약자수',
					data: rsvCount,
					backgroundColor: '#3529b1'
				}, {
					label: '수진자수',
					data: ispCount,
					backgroundColor: '#5645ED'
				}, {
					label: '결과자수',
					data: resultCount,
					backgroundColor: '#FBC805'
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});
	}

</script>
