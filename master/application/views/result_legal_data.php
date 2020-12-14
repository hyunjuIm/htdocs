<!DOCTYPE HTML>
<html>
<head>
	<title>듀얼헬스케어:법적자료</title>

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
	<div class="row" style="margin: 30px; padding: 20px">
		<form class="table-box" style="margin: 0 auto; padding: 30px; width: 85%; max-width: 1500px">
			<div class="menu-title" style="font-size: 22px">
				<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
				법적자료
			</div>
			<div class="btn-default-small excel" style="float: right; margin-bottom: 5px"></div>
			<table id="legalInfos" class="table table-hover" style="margin-top: 10px">
				<thead>
				<tr>
					<th style="width: 5%"><input type="checkbox" id="legalCheck" name="legalCheck" onclick="clickAll(id, name)"></th>
					<th style="width: 5%">NO</th>
					<th style="">병원명</th>
					<th style="">고객사명</th>
					<th style="">사업장명</th>
					<th style="">서비스</th>
					<th style="width: 25%">자료구분</th>
					<th style="width: 10%">상태</th>
				</tr>
				</thead>
				<tbody align="center">
				</tbody>
			</table>
		</form>
	</div>
	<hr>
	<div class="row" style="padding: 20px">
		<div class="btn-save-square" style="font-size: 18px; padding: 7px 40px; margin: 0 auto"
			 onclick="saveLegalData()">
			저장
		</div>
	</div>
</div>
<!--콘텐츠 내용-->
</body>
</html>

<!--체크박스 검사-->
<?php
require('check_data.php');
?>

<script>
	//법적자료 리스트 불러오기
	instance.post('M010001_RES').then(res => {
		setLegalData(res.data);
	});

	var legalData = new Array();
	var stateItems = ["등록", "미등록"];

	//법적자료 테이블
	function setLegalData(data) {

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';
			html += '<td><input type="checkbox" name="legalCheck" onclick="clickOne(name)"></td>';

			var no = i+1;
			html += '<td id= "\'' + data[i].pkgId + '\'">' + no + '</td>';

			html += '<td>' + data[i].hosName + '</td>';
			html += '<td>' + data[i].coName + '</td>';
			html += '<td>' + data[i].coBranch + '</td>';
			html += '<td>' + data[i].serviceName + '</td>';

			html += '<td contentEditable="true" id= "\'' + data[i].pkgId + "Comment" + '\'"' +
				'onkeyup="changeComment(\'' + data[i].pkgId + '\', this)">' + data[i].resultComment + '</td>';

			//상태
			var state = '<td><select class="form-control" id= "\'' + data[i].pkgId + "State" + '\'"' +
				'onchange="changeState(\'' + data[i].pkgId + '\', value)\">';
			for (j = 0; j < stateItems.length; j++) {
				var tmpState;
				if (stateItems[j] == "미등록") {
					tmpState = false;
				} else if (stateItems[j] == "등록") {
					tmpState = true;
				}

				if (tmpState == data[i].status) {
					state += '<option selected>' + stateItems[j] + '</option>';
				} else {
					state += '<option>' + stateItems[j] + '</option>';
				}
			}
			state += '</select></td>';
			html += state;

			html += '</tr>';

			$("#legalInfos").append(html);

			var legal = new Object();
			legal.pkgId = data[i].pkgId;
			legal.resultComment = data[i].resultComment;
			legal.status = data[i].status;
			legalData.push(legal);
		}
	}

	//자료구분 변경
	function changeComment(pkgId, value) {
		var tmpComment = value.innerHTML;

		var comment = tmpComment.split(",");

		for (i = 0; i < legalData.length; i++) {
			if (legalData[i].pkgId == pkgId) {
				legalData[i].resultComment = comment;
			}
		}
	}

	//상태 변경
	function changeState(pkgId, value) {
		var state = true;

		if (value == "등록") {
			state = true;
		} else if (value == "미등록") {
			state = false;
		}

		for (i = 0; i < legalData.length; i++) {
			if (legalData[i].pkgId == pkgId) {
				legalData[i].status = state;
			}
		}
	}


	//법적자료 저장
	function saveLegalData() {
		console.log(legalData);

		if (confirm("저장하시겠습니까?") == true) {
			instance.post('M010002_REQ', legalData).then(res => {
				console.log(res.data.message);
				if (res.data.message == "success") {
					alert("저장되었습니다.");
				}
			});
		} else {
			return false;
		}
	}
</script>
