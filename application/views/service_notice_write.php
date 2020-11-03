<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:공지사항</title>

	<?php
	require('head.php');
	?>

	<style>
		td {
			text-align: left;
			vertical-align: middle !important;
		}

		th {
			text-align: center;
			vertical-align: middle !important;
			width: 200px;
			background: #f1f1f1;
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
		<form style="margin: 0 auto; width: 70%">
			<div class="menu-title" style="font-size: 22px">
				<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px">
				공지사항 - 글쓰기
			</div>

			<table id="noticeInfos" class="table" style="margin-top: 30px">
				<tbody>
				<tr>
					<th>제목</th>
					<td>
						<input class="form-control" type="text" id="ntTitle" placeholder="">
					</td>
				</tr>
				<tr>
					<th>파일</th>
					<td>
						<input type="file" class="form-control-file" id="ntFile">
					</td>
				</tr>
				<tr>
					<th style="height: 65px">읽기대상</th>
					<td>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="ntTargetCus"
								   name="ntTarget" value="고객" onclick="onlyCheck(this, name); targetCheck(id);">
							<label class="form-check-label" for="ntTargetCus">고객&nbsp</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="ntTargetCom"
								   name="ntTarget" value="기업" onclick="onlyCheck(this, name); targetCheck(id);">
							<label class="form-check-label" for="ntTargetCom">기업&nbsp</label>

						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="ntTargetHos"
								   name="ntTarget" value="병원" onclick="onlyCheck(this, name); targetCheck(id);">
							<label class="form-check-label" for="ntTargetHos">병원&nbsp</label>
						</div>
						<div class="form-check form-check-inline" id="target" style="width: 350px"></div>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="height: 400px; min-height: 400px ; max-height: 400px; background: white">
						<textarea class="form-control" id="ntContent"
								  style="height: inherit; min-height: inherit ; max-height: inherit"></textarea>
					</td>
				</tr>
				</tbody>
			</table>
		</form>
	</div>

	<div class="row">
	</div>

	<!--페이징-->
	<div class="row"
	<form style="margin: 0 auto; width: 70%; padding: 10px">
		<div class="page_wrap">
			<div class="page_nation" id="paging">
			</div>
		</div>
	</form>
</div>
</div>
<!--콘텐츠 내용-->
</body>

<?php
require('check_data.php');
?>

</html>

<!--체크박스 검사-->
<?php
require('check_data.php');
?>

<script>
	function targetCheck(id) {
		$("#target").empty();
		if ($("#" + id + "").is(':checked')) {
			if (id == 'ntTargetCus' || id == 'ntTargetCom') {
				$("#target").append(
						'<select id="stComName" class="form-control" style="margin-right: 10px"' +
						'onchange="setCompanySelectOption(this,111)">' +
						'<option selected>-선택-</option>' +
						'</select>' +
						'<select id="stComBranch" class="form-control">' +
						'<option selected>-선택-</option>' +
						'</select>'
				);
			} else if (id == 'ntTargetHos') {
				$("#target").append(
						'<select id="hosName" class="form-control" style="margin-right: 10px">' +
						'<option selected>-선택-</option>' +
						'</select>'
				);
			}
		}
	}
</script>
