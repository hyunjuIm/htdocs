<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:패키지등록</title>

	<?php
	require('head.php');
	?>

	<style>
		#excelUploadFile {
			position: absolute;
			display: none;
		}

		label[for="excelUploadFile"] {
			padding: 0.5em;
			display: inline-block;
			background: #5645ED;
			color: white;
			cursor: pointer;
		}

		label[for="excelUploadFile"]:hover {
			opacity: 0.9;
		}

		#filename {
			padding: 0.5em;
			float: left;
			width: 300px;
			white-space: nowrap;
			overflow: hidden;
			background: whitesmoke;
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
						패키지등록
					</div>
					<hr>
					<div class="form-row row">
						<label class="col-form-label">
							<li>고객사</li>
						</label>
						<div class="form-group col" style="display: flex">
							<select id="pacComName" class="form-control" style="margin-right: 10px"
									onchange="setCompanySelectOption(this, 'pacComBranch')">
								<option selected>-전체-</option>
							</select>
							<select id="pacComBranch" class="form-control">
								<option selected>-전체-</option>
							</select>
						</div>

						<label class="col-form-label" style="margin-left: 20px">
							<li>패키지</li>
						</label>
						<div class="form-group col">
							<select id="pkgName" class="form-control">
								<option selected>-전체-</option>
							</select>
						</div>
					</div>
					<div class="form-row row">
						<label class="col-form-label">
							<li>단가</li>
						</label>
						<div class="form-group col">
							<select id="price" class="form-control">
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
							<li>사용</li>
						</label>
						<div class="form-group col">
							<select id="coApprove" class="form-control">
								<option selected>-전체-</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>세부항목</li>
						</label>
						<div class="form-group col">
							<select id="ijSet" class="form-control">
								<option selected>-전체-</option>
							</select>
						</div>
					</div>
					<div class="form-row row">
						<label class="col-form-label">
							<li>상태</li>
						</label>
						<div class="form-group col">
							<select id="status" class="form-control">
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
						<div class="btn-purple-square" data-toggle="modal" data-target="#hospitalSendModal">
							병원전송
						</div>
						<div class="btn-light-purple-square" data-toggle="modal" data-target="#packageCreateModal">
							신규생성
						</div>
						<div class="btn-save-square" onclick="searchPackageCreateInformation()">
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
			<table id="packageCreateInfos" class="table table-hover" style="margin-top: 45px">
				<thead>
				<tr>
					<th style="width: 4%"><input type="checkbox" id="packageCheck" name="packageCheck"
												 onclick="clickAll(id, name)"></th>
					<th style="width: 5%">NO</th>
					<th style="width: 5%">사용</th>
					<th style="width: 10%">병원명</th>
					<th style="width: 10%">고객사명</th>
					<th style="width: 10%">사업장명</th>
					<th style="width: 10%">패키지</th>
					<th>패키지단가</th>
					<th>기업승인여부</th>
					<th style="width: 15%">기간</th>
					<th>세부항목 상태</th>
					<th>세부항목 설정</th>
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
	instance.post('M007007_RES').then(res => {
		setPackageCreateSelectData(res.data);
	});

	searchPackageCreateInformation();

	//검색
	function searchPackageCreateInformation() {
		var searchItems = new Object();

		$('#packageCreateInfos > tbody').empty();

		searchItems.coName = $("#pacComName option:selected").val();
		searchItems.coBranch = $("#pacComBranch option:selected").val();
		searchItems.pkgName = $("#pkgName option:selected").val();
		searchItems.price = $("#price option:selected").val();
		searchItems.hosName = $("#hosName option:selected").val();
		searchItems.coApprove = $("#coApprove option:selected").val();
		searchItems.ijSet = $("#ijSet option:selected").val();
		searchItems.status = $("#status option:selected").val();

		if (searchItems.coName == "-전체-") {
			searchItems.coName = "all";
		}
		if (searchItems.coBranch == "-전체-") {
			searchItems.coBranch = "all";
		}
		if (searchItems.pkgName == "-전체-") {
			searchItems.pkgName = "all";
		}
		if (searchItems.price == "-전체-") {
			searchItems.price = "all";
		}
		if (searchItems.hosName == "-전체-") {
			searchItems.hosName = "all";
		}
		if (searchItems.coApprove == "-전체-") {
			searchItems.coApprove = "all";
		}
		if (searchItems.ijSet == "-전체-") {
			searchItems.ijSet = "all";
		}
		if (searchItems.status == "-전체-") {
			searchItems.status = "all";
		}

		console.log(searchItems);

		instance.post('M007008_REQ_RES', searchItems).then(res => {
			setPackageCreateData(res.data);
		});
	}

	//검색 selector
	function setPackageCreateSelectData(data) {
		//회사
		var name = [];
		var nameSize = 0;

		for (i = 0; i < data.coNameBranch.length; i++) {
			var check = 0;

			//회사명 - 지점있을때
			var jbSplit = data.coNameBranch[i].split('-');
			var companyName = jbSplit[0];

			for (var j = 0; j < nameSize; j++) {
				if (name[j] == companyName) {
					check += 1;
				}
			}
			if (check < 1) {
				name[nameSize] = companyName;
				nameSize += 1;
			}
		}

		for (i = 0; i < nameSize; i++) {
			var html = '';
			html += '<option value=\'' + name[i] + '\'>' + name[i] + '</option>'
			$("#pacComName").append(html);
		}

		companySelect = data.coNameBranch;

		//패키지
		for (i = 0; i < data.pkgName.length; i++) {
			var html = '';
			html += '<option>' + data.pkgName[i] + '</option>'
			$("#pkgName").append(html);
		}
		//단가
		for (i = 0; i < data.price.length; i++) {
			var html = '';
			var price = parseInt(data.price[i]).toLocaleString();
			html += '<option value=\'' + data.price[i] + '\'>' + price + '</option>'
			$("#price").append(html);
		}
		//병원명
		for (i = 0; i < data.hosName.length; i++) {
			var html = '';
			html += '<option>' + data.hosName[i] + '</option>'
			$("#hosName").append(html);
		}
		//사용
		for (i = 0; i < data.coApprove.length; i++) {
			var html = '';
			if(data.coApprove[i] == "true") {
				html += '<option value="true">Y</option>'
			} else {
				html += '<option value="false">N</option>'
			}
			$("#coApprove").append(html);
		}
		//세부항목
		for (i = 0; i < data.ijSet.length; i++) {
			var html = '';
			if(data.ijSet[i] == "true") {
				html += '<option value="true">설정완료</option>'
			} else {
				html += '<option value="false">미완료</option>'
			}
			$("#ijSet").append(html);
		}
		//상태
		for (i = 0; i < data.status.length; i++) {
			var html = '';
			if(data.status[i] == "true") {
				html += '<option value="true">승인</option>'
			} else {
				html += '<option value="false">미승인</option>'
			}
			$("#status").append(html);
		}

	}

	//세부항목 설정에 pkgID 값 던지기
	function sendPackageID(index) {
		location.href = "package_injection_item?pkgID=" + index;
	}

	//패키지 생성 테이블
	function setPackageCreateData(data) {

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';
			html += '<td><input type="checkbox" name="packageCheck" onclick="clickOne(name)"></td>';

			var no = i+1;
			html += '<td>' + no + '</td>';

			if (data[i].status) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}
			html += '<td>' + data[i].hoName + '</td>';
			html += '<td>' + data[i].coName + '</td>';
			html += '<td>' + data[i].coBranch + '</td>';
			html += '<td>' + data[i].pkgName + '</td>';
			html += '<td>' + data[i].price.toLocaleString() + '</td>';
			if (data[i].coApprove) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}
			html += '<td style="width: 15%">' + data[i].reservationStartDate + "~" + data[i].reservationEndDate + '</td>';
			if (data[i].ijSet) {
				html += '<td>설정완료</td>';
			} else {
				html += '<td>미완료</td>';
			}
			html += '<td><a style="color: white" onclick="sendPackageID(\'' + data[i].pkgId + '\')">' +
				'<div class="btn-purple-square" style="padding: 2px 8px; font-size: 13px">설정</div></a></td>';
			html += '</tr>';

			$("#packageCreateInfos").append(html);
		}
	}
</script>
