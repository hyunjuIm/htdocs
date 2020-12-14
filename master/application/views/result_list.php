<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:검진결과</title>

	<?php
	require('head.php');
	?>

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
						검진결과
					</div>
					<hr>
					<div class="form-row row">
						<label class="col-form-label">
							<li>고객사</li>
						</label>
						<div class="form-group col" style="display: flex">
							<select id="resComName" class="form-control" style="margin-right: 10px"
									onchange="setCompanySelectOption(this, 'resComBranch')">
								<option selected>-전체-</option>
							</select>
							<select id="resComBranch" class="form-control">
								<option selected>-전체-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>병원명</li>
						</label>
						<div class="form-group col">
							<select id="hosName" class="form-control">
								<option selected>-전체-</option>
							</select>
						</div>
					</div>
					<div class="form-row row">
						<label class="col-form-label">
							<li>결과등록</li>
						</label>
						<div class="form-group col">
							<select id="resultUpload" class="form-control">
								<option selected>-전체-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>수검일</li>
						</label>
						<div class="form-group col" style="display: flex">
							<input class="form-control" type="text" id="ipStartDate" style="margin-right: 10px" placeholder="시작일">
							<script>
								$(function () {
									$("#ipStartDate").datepicker({
										changeMonth: true,
										changeYear: true,
										dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'],
										dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
										monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
										monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
										dateFormat: "yy-mm-dd",
									});
								});
							</script>
							<input class="form-control" type="text" id="ipEndDate" placeholder="종료일">
							<script>
								$(function () {
									$("#ipEndDate").datepicker({
										changeMonth: true,
										changeYear: true,
										dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'],
										dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
										monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
										monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
										dateFormat: "yy-mm-dd",
									});
								});
							</script>
						</div>
					</div>
					<hr>
					<div style="float: right">
						<div class="btn-save-square"  onclick="searchResultInformation()">
							검색
						</div>
					</div>
				</ul>
			</form>
		</div>
	</div>


	<div class="row " style="margin-left: 30px; margin-right: 30px; margin-top: 120px">
		<form class="table-responsive" style="margin: 0 auto">
			<div
				class="btn-default-small excel" style="float: right"></div>
			<table id="resultInfos" class="table table-hover" style="margin-top: 45px">
				<thead>
				<tr>
					<th style="width: 5%"><input type="checkbox" id="resultCheck" name="resultCheck" onclick="clickAll(id, name)"></th>
					<th style="width: 5%">NO</th>
					<th>병원명</th>
					<th>서비스</th>
					<th>고객사</th>
					<th>사업장</th>
					<th>아이디</th>
					<th>성명</th>
					<th>등급</th>
					<th>검진완료일</th>
					<th>결과등록</th>
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
require('package_modal.php');
?>

</body>
<!--체크박스 검사-->
<?php
require('check_data.php');
?>
</html>

<script type="text/javascript">

	//검색항목리스트
	instance.post('M010003_RES').then(res => {
		setResultOptionData(res.data);
	});

	searchResultInformation();

	//검색
	function searchResultInformation() {
		var searchItems = new Object();

		$('#resultInfos > tbody').empty();

		searchItems.coName = $("#resComName option:selected").val();
		searchItems.coBranch = $("#resComBranch option:selected").val();
		searchItems.hoName = $("#hosName option:selected").val();
		searchItems.resultUpload = $("#resultUpload option:selected").val();
		searchItems.ipStartDate = $("#ipStartDate").val();
		searchItems.ipEndDate = $("#ipEndDate").val();

		if (searchItems.coName == "-전체-") {
			searchItems.coName = "all";
		}
		if (searchItems.coBranch == "-전체-") {
			searchItems.coBranch = "all";
		}
		if (searchItems.hoName == "-전체-") {
			searchItems.hoName = "all";
		}
		if (searchItems.resultUpload == "-전체-") {
			searchItems.resultUpload = "all";
		}
		//TODO: 수검일 데이터 넣기
		if (searchItems.ipStartDate == "") {
			searchItems.ipStartDate = "2020-01-01";
		}
		if (searchItems.ipEndDate == "") {
			searchItems.ipEndDate = "2025-01-01";
		}

		console.log(searchItems);

		instance.post('M010004_REQ_RES', searchItems).then(res => {
			setResultData(res.data);
		});
	}

	//검색 selector
	function setResultOptionData(data) {
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
			$("#resComName").append(html);
		}

		companySelect = data.coNameBranch;

		//병원명
		for (i = 0; i < data.hoName.length; i++) {
			var html = '';
			html += '<option>' + data.hoName[i] + '</option>'
			$("#hosName").append(html);
		}
		//사용
		for (i = 0; i < data.resultUpload.length; i++) {
			var html = '';
			if(data.resultUpload[i] == "true") {
				html += '<option value="true">Y</option>'
			} else {
				html += '<option value="false">N</option>'
			}
			$("#resultUpload").append(html);
		}

	}

	//패키지 생성 테이블
	function setResultData(data) {


		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';
			html += '<td><input type="checkbox" name="resultCheck" onclick="clickOne(name)"></td>';

			var no = i+1;
			html += '<td>' + no + '</td>';

			html += '<td>' + data[i].hoName + '</td>';
			html += '<td>' + data[i].serviceName + '</td>';
			html += '<td>' + data[i].coName + '</td>';
			html += '<td>' + data[i].coBranch + '</td>';
			html += '<td>' + data[i].cusId + '</td>';
			html += '<td>' + data[i].famName + '</td>';
			html += '<td>' + data[i].famGrade + '</td>';
			html += '<td>' + data[i].ipDate + '</td>';
			if (data[i].resultUpload) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}

			html += '</tr>';

			$("#resultInfos").append(html);
		}
	}
</script>
