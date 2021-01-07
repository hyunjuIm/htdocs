<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:패키지승인</title>

	<?php
	require('head.php');
	?>

	<style>
		#packageConfirmInfos tr {
			cursor: pointer;
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
						패키지승인
					</div>
					<hr>
					<div class="form-row row">
						<label class="col-form-label">
							<li>고객사</li>
						</label>
						<div class="form-group col" style="display: flex">
							<select id="coName" class="form-control" style="margin-right: 10px"
									onchange="setCompanySelectOption(this, 'coBranch')">
								<option selected>-전체-</option>
							</select>
							<select id="coBranch" class="form-control">
								<option selected>-선택-</option>
							</select>
						</div>

						<label class="col-form-label" style="margin-left: 20px">
							<li>병원명</li>
						</label>
						<div class="form-group col">
							<select id="hoName" class="form-control">
								<option selected>-전체-</option>
							</select>
						</div>
					</div>
					<div class="form-row row">
						<label class="col-form-label">
							<li>듀얼승인</li>
						</label>
						<div class="form-group col">
							<select id="dualApproval" class="form-control">
								<option selected>-전체-</option>
								<option value="true">Y</option>
								<option value="false">N</option>
							</select>
						</div>
						<label class="col-form-label" style="margin-left: 20px">
							<li>기업승인</li>
						</label>
						<div class="form-group col">
							<select id="coApproval" class="form-control">
								<option selected>-전체-</option>
								<option value="true">Y</option>
								<option value="false">N</option>
							</select>
						</div>
					</div>
					<hr>
					<div style="float: right">
						<div class="btn-save-square" onclick="searchInformation(0)">
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
			<table id="packageConfirmInfos" class="table table-hover" style="margin-top: 45px">
				<thead>
				<tr>
					<th style="width: 5%">NO</th>
					<th>병원</th>
					<th>고객사</th>
					<th >사업장</th>
					<th style="width: 10%">병원제안</th>
					<th style="width: 10%">듀얼승인</th>
					<th style="width: 10%">기업승인</th>
					<th >단가</th>
					<th style="width: 15%">운영기간</th>
				</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</form>
	</div>

	<div class="row" style="margin-top: 3rem">
		<form style="margin: 0 auto; width: 85%; padding: 1rem">
			<div class="page_wrap">
				<div class="page_nation" id="paging">
				</div>
			</div>
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
	var pagingNum = 0;
	var pageCount = 0;

	//검색항목리스트
	instance.post('M016001').then(res => {
		setPackageConfirmSelectData(res.data);
	});

	var companySelect;
	//검색 selector
	function setPackageConfirmSelectData(data) {
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
			$("#coName").append(html);
		}

		companySelect = data.coNameBranch;

		//병원명
		for (i = 0; i < data.hoName.length; i++) {
			var html = '';
			html += '<option>' + data.hoName[i] + '</option>'
			$("#hoName").append(html);
		}

		//로딩 되자마자 초기 셋팅
		searchInformation(0);
	}

	//페이징-숫자클릭
	function searchInformation(index) {
		pageNum = index;
		drawTable();
	}

	//검색
	function drawTable() {
		pageNum = parseInt(pageNum);
		var searchItems = new Object();

		searchItems.coName = $("#coName option:selected").val();
		searchItems.coBranch = $("#coBranch option:selected").val();
		searchItems.hoName = $("#hoName option:selected").val();
		searchItems.dualApproval= $("#hoName option:selected").val();
		searchItems.coApproval= $("#coApproval option:selected").val();

		searchItems.pageNum = pageNum;

		if (searchItems.coName == "-전체-") {
			searchItems.coName = "all";
		} else if (searchItems.coBranch == "-선택-") {
			alert('사업장을 선택해주세요.');
			return false;
		}
		if (searchItems.pkgName == "-전체-") {
			searchItems.pkgName = "all";
		}
		if (searchItems.hoName == "-전체-") {
			searchItems.hoName = "all";
		}
		if (searchItems.dualApproval == "-전체-") {
			searchItems.dualApproval = "all";
		}
		if (searchItems.coApproval == "-전체-") {
			searchItems.coApproval = "all";
		}

		instance.post('M016002', searchItems).then(res => {
			pageCount = 0;
			for (i = 0; i < res.data.count; i += 10) {
				pageCount++;
			}
			setPackageConfirmData(res.data.packageListDTOList, pageNum);
			console.log(res.data);
		});
	}

	<?php
	require('paging.js');
	?>

	//패키지 생성 테이블
	function setPackageConfirmData(data, index) {
		setPaging(index);

		$('#packageConfirmInfos > tbody').empty();

		if(data.length == 0) {
			var html = '';
			html += '<tr>';
			html += '<td colspan="10">해당하는 검색 결과가 없습니다.</td>';
			html += '</tr>';
			$("#packageConfirmInfos").append(html);
			$("#paging").empty();
			return false;
		}

		for (i = 0; i < data.length; i++) {
			var html = '';

			var dual = data[i].dualApproval ? 'Y' : 'N';
			var company = data[i].coApproval ? 'Y' : 'N';

			html += '<tr onclick="sendPackageID(\'' + data[i].pkgId + '\', \'' + dual + '\', \'' + company + '\')">';

			var no = 0;
			if (index == 0) {
				no = (index + 1) + i;
			} else {
				no = index * 10 + (i+1);
			}
			html += '<td>' + no + '</td>';

			html += '<td>' + data[i].hoName + '</td>';
			html += '<td>' + data[i].coName + '</td>';
			html += '<td>' + data[i].coBranch + '</td>';

			if (data[i].hoSuggest) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}

			html += '<td>' + dual + '</td>';
			html += '<td>' + company + '</td>';
			html += '<td>' + data[i].price.toLocaleString() + '</td>';
			html += '<td>' + data[i].reservationStartDate + " ~ " + data[i].reservationEndDate + '</td>';
			html += '</tr>';

			$("#packageConfirmInfos").append(html);
		}
	}

	//세부항목 설정에 pkgID 값 던지기
	function sendPackageID(index, dual, company) {
		var state = '';
		state += dual;
		state += company;

		location.href = "confirm_package_detail?pkgID=" + index + "?state=" + state;
	}
</script>
