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
				공지사항 - 글수정
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
						<textarea class="form-control" id="ntContent" style="height: inherit; min-height: inherit ; max-height: inherit"></textarea>
					</td>
				</tr>
				</tbody>
			</table>
		</form>
	</div>

	<div class="row">
		<div style="margin: 0 auto">
			<div class="btn-save-square" style="font-size: 18px; padding: 7px 40px; margin-right: 20px"
				 onclick="saveNoticeUpdate()">
				저장
			</div>
			<div class="btn-cancel-square" style="font-size: 18px; padding: 7px 40px;" onclick="cancelNoticeUpdate()">
				취소
			</div>
		</div>
	</div>
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
	//nID 값 받기
	var nId = new Object();
	$(document).ready(function () {
		var val = location.href.substr(
			location.href.lastIndexOf('=') + 1
		);
		nId.id = val;

		instance.post('M013003_REQ_RES', nId).then(res => {
			setNoticeUpdateData(res.data);
		});
	})

	var noticeData;
	function setNoticeUpdateData(data){
		document.getElementById('ntTitle').value = data.title;
		document.getElementById('ntContent').value = data.content;

		noticeData = data;

		if(data.target == "기업") {
			$("input:checkbox[id='ntTargetCus']").prop("checked", true);
			targetCheck('ntTargetCus');
		} else if (data.target == "고객") {
			$("input:checkbox[id='ntTargetCom']").prop("checked", true);
			targetCheck('ntTargetCom');
		} else if (data.target == "병원") {
			$("input:checkbox[id='ntTargetHos']").prop("checked", true);
			targetCheck('ntTargetHos');
		}
	}
	
	function targetCheck(id) {
		$("#target").empty();
		if ($("#" + id + "").is(':checked')) {
			if (id == 'ntTargetCus' || id == 'ntTargetCom') {
				$("#target").append(
					'<select id="ntComName" class="form-control" style="margin-right: 10px"' +
					'onchange="setNoticeCompanyBranchOption(this,\'' + 'ntComBranch' + '\')">' +
					'<option selected>-선택-</option>' +
					'</select>' +
					'<select id="ntComBranch" class="form-control">' +
					'<option selected>-선택-</option>' +
					'</select>'
				);
			} else if (id == 'ntTargetHos') {
				$("#target").append(
					'<select id="ntHosName" class="form-control" style="margin-right: 10px">' +
					'<option selected>-선택-</option>' +
					'</select>'
				);
			}
		}

		setNoticeTargetOption(noticeData, id);
	}

	var companySelect;
	var target;
	
	//읽기대상 selector
	function setNoticeTargetOption(data, id) {
		target = data.targetName.split('-');

		if (id == 'ntTargetCus' || id == 'ntTargetCom') {
			//회사
			var name = [];
			var nameSize = 0;

			for (i = 0; i < data.targetNameList[1].length; i++) {
				var check = 0;

				//회사명 - 지점있을때
				var jbSplit = data.targetNameList[1][i].split('-');
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
				if(name[i] == target[0]) {
					html += '<option value=\'' + name[i] + '\' selected>' + name[i] + '</option>'
				} else {
					html += '<option value=\'' + name[i] + '\'>' + name[i] + '</option>'
				}
				$("#ntComName").append(html);
			}

			companySelect = data.targetNameList[1];

			setNoticeCompanyBranchOption(document.getElementById('ntComName'),'ntComBranch');

		} else if (id == 'ntTargetHos') {
			for (i = 0; i < data.targetNameList[0].length; i++) {
				var html = '';
				if(data.targetNameList[0][i] == target[0]) {
					html += '<option value=\'' + data.targetNameList[0][i] + '\' selected>' + data.targetNameList[0][i] + '</option>'
				} else {
					html += '<option value=\'' + data.targetNameList[0][i] + '\'>' + data.targetNameList[0][i] + '</option>'
				}
				$("#ntHosName").append(html);
			}
			
		}
	}

	//사업장 리스트 셋팅
	function setNoticeCompanyBranchOption(selectCompany, targetBranch) {
		var branch = document.getElementById(targetBranch);

		var opt = document.createElement("option");
		branch.appendChild(opt);

		removeAll(branch);

		for (i = 0; i < companySelect.length; i++) {
			var jbSplit = companySelect[i].split('-');
			var branchName = jbSplit[jbSplit.length - 1];

			if(selectCompany.value == jbSplit[0]) {
				var html = '';
				if(branchName == target[1]) {
					html += '<option value=\'' + branchName + '\' selected>' + branchName + '</option>'
				} else {
					html += '<option value=\'' + branchName + '\'>' +branchName + '</option>'
				}
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
	
	//수정 저장
	function saveNoticeUpdate() {
		var saveItems = new Object();

		saveItems.id = nId.id;
		saveItems.title = document.getElementById('ntTitle').value;
		saveItems.fileName = "파일이름";
		saveItems.author = "임현주";
		saveItems.content = document.getElementById('ntContent').value;

		var check_count = document.getElementsByName("ntTarget").length;

		for (var i=0; i<check_count; i++) {
			if (document.getElementsByName("ntTarget")[i].checked == true) {
				saveItems.target = document.getElementsByName("ntTarget")[i].value;
			}
		}

		var name = "";
		if(saveItems.target == "고객" || saveItems.target == "기업") {
			name += $("#ntComName option:selected").val();
			name += "-";
			name += $("#ntComBranch option:selected").val();
		} else if(saveItems.target == "병원") {
			name += $("#ntHosName option:selected").val();
		}
		saveItems.targetName = name;

		console.log(saveItems);

		if (saveItems.target == "" || saveItems.target == null || saveItems.target.indexOf("-선택-") > -1 ) {
			alert("읽기대상을 선택해주세요.")
		} else {
			if (confirm("저장하시겠습니까?") == true){
				instance.post('M013004_REQ', saveItems).then(res => {
					if(res.data.message == "success") {
						alert("저장되었습니다.");
						history.back();
					}
				});
			}else{
				return false;
			}
		}
	}

	//취소 - 되돌아가기
	function cancelNoticeUpdate() {
		history.back();
	}
</script>
