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

<!-- 병원 전송 Modal -->
<div class="modal fade" id="hospitalSendModal" tabindex="-1" aria-labelledby="hospitalSendModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog " style="max-width: fit-content; min-width: 1500px; display: table;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div style="font-size: 22px; display: grid; text-align: center; margin-top: 30px">
					<img src="/asset/images/bg_h2_tit_top.png" style="margin: auto">
					<p style="margin: 10px">병원전송</p>

					<div style="margin: auto; padding: 30px">
						<ul class="img-circle" style="display: flex">
							<label class="col-form-label" style="font-size: 17px; min-width: auto">
								<li>지역</li>
							</label>
							<div class="form-group" style="width: 100px; margin: 0 10px">
								<select id="place" class="form-control">
									<option>-선택-</option>
								</select>
							</div>

							<div>
								<div class="search" style="width: 300px">
									<input type="text" class="search-input" id="hosNameSearch"
										   placeholder="병원명으로 검색하세요" onkeyup="packageEnterKey();">
									<div class="search-icon" onclick="searchPackageInformation()"></div>
								</div>
							</div>
						</ul>
					</div>
				</div>
				<div style="margin-top: 30px; padding: 10px">
					<div class="row">
						<div class="col">
							<table class="table" id="pacInfoTable1">
								<thead>
								<tr>
									<th style="width: 5%"><input type="checkbox" id="packageHosCheck"
																 name="packageHosCheck" onclick="clickAll(id, name)">
									</th>
									<th style="width: 10%">NO</th>
									<th style="width: 40%">병원명</th>
									<th style="width: 20%">등급</th>
									<th>공단대상유무</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div class="col">
							<table class="table" id="pacInfoTable2">
								<thead>
								<tr>
									<th style="width: 7%"><input type="checkbox" id="packageReadyCheck"
																 name="packageReadyCheck" onclick="clickAll(id, name)">
									</th>
									<th style="width: 5%">NO</th>
									<th>패키지명</th>
									<th>고객사명</th>
									<th>사업장명</th>
									<th style="width: 15%">직원수</th>
									<th>공단대상유무</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<div class="btn-purple-square" style="margin: 0 auto" onclick="sendPackageHospital()">전송하기</div>
			</div>
		</div>
	</div>
</div>

<!-- 패키지 신규 생성 Modal -->
<div class="modal fade" id="packageCreateModal" tabindex="-1" aria-labelledby="packageCreateModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog " style="max-width: fit-content; min-width: 600px; display: table;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div style="font-size: 22px; display: grid; text-align: center; margin-top: 30px">
					<img src="/asset/images/bg_h2_tit_top.png" style="margin: auto">
					<p style="margin: 10px">신규생성</p>
				</div>
				<div class="container" style="margin-top: 30px">
					<div class="row">
						<div class="col">
							<table class="table" id="ComInfoTable1">
								<tbody>
								<tr>
									<th>고객사명</th>
									<td>
										<select id="companyName" class="form-control"
												onchange="setPackageModalCompanySelectOption(this, 'companyBranch')">
											<option>-선택-</option>
										</select>
									</td>
								</tr>
								<tr>
									<th>사업장명</th>
									<td>
										<select id="companyBranch" class="form-control">
											<option>-선택-</option>
										</select>
									</td>
								</tr>
								<tr>
									<th>패키지명</th>
									<td id="add-pac-name" contentEditable="true"></td>
								</tr>
								<tr>
									<th>단가</th>
									<td id="add-pac-price" contentEditable="true"></td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="btn-save-square" style="margin: auto" onclick="createPackageData()">저장</div>
			</div>
		</div>
	</div>
</div>

<!-- 검사항목 엑셀 업로드 Modal -->
<div class="modal fade" id="packageUploadModal" tabindex="-1" aria-labelledby="packageUploadModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog " style="max-width: fit-content; min-width: 600px; display: table;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div style="font-size: 22px; display: grid; text-align: center; margin-top: 30px">
					<img src="/asset/images/bg_h2_tit_top.png" style="margin: auto">
					<p style="margin: 10px">검사항목 엑셀 업로드</p>
				</div>
				<div class="container" style="margin: 40px 0 30px 0">
					<form method="post" enctype="multipart/form-data" action=""
						  style="margin: 0 auto; width: fit-content">
						<span id="filename">엑셀 파일을 선택해주세요.</span>
						<label for="excelUploadFile">파일선택<input type="file" id="excelUploadFile"></label>
					</form>
				</div>

			</div>
			<div class="modal-footer">
				<div class="btn-save-square" style="margin: auto" onclick="uploadPackageFile()">업로드</div>
			</div>
		</div>
	</div>
</div>

<script>

	//검색항목리스트
	instance.post('M007001_RES').then(res => {
		setPackageModalSelectData(res.data);
	});

	var packageCompanySelect;

	//검색 selector
	function setPackageModalSelectData(data) {

		var name = [];
		var nameSize = 0;

		//회사
		for (var i = 0; i < data.length; i++) {
			var check = 0;

			//회사명 - 지점있을때
			var jbSplit = data[i].coNameBranch.split('-');
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
			$("#companyName").append(html);
		}

		packageCompanySelect = data;
	}

	//사업장 리스트 셋팅
	function setPackageModalCompanySelectOption(selectCompany, targetBranch) {
		console.log(packageCompanySelect);
		var branch = document.getElementById(targetBranch);

		var opt = document.createElement("option");
		branch.appendChild(opt);

		removeAll(branch);

		for (i = 0; i < packageCompanySelect.length; i++) {
			var jbSplit = packageCompanySelect[i].coNameBranch.split('-');
			var arr = jbSplit[jbSplit.length - 1];

			if (selectCompany.value == jbSplit[0]) {
				var opt = document.createElement("option");
				opt.value = packageCompanySelect[i].coId;
				opt.innerHTML = arr;
				branch.appendChild(opt);
			}
		}
	}

	//옵션 삭제
	function removeAll(e) {
		for (var i = 0, limit = e.options.length; i < limit - 1; ++i) {
			e.remove(1);
		}
	}

	//패키지 신규 등록
	function createPackageData() {
		var saveItems = new Object();

		saveItems.coId = $("#companyBranch").val();
		saveItems.pkgName = document.getElementById('add-pac-name').innerText;
		saveItems.price = document.getElementById('add-pac-price').innerText;

		console.log(saveItems);

		if ($("#companyName").val() == "-선택-") {
			alert("고객사를 선택해주세요.")
		} else if ($("#companyBranch").val() == "-선택-") {
			alert("사업장을 선택해주세요.")
		} else if (saveItems.pkgName=="") {
			alert("패키지명을 입력해주세요.")
		} else if (saveItems.price=="") {
			alert("단가를 입력해주세요.")
		} else {
			if (confirm("저장하시겠습니까?") == true) {
				instance.post('M007002_REQ', saveItems).then(res => {
					console.log(res.data.message);
					alert("저장되었습니다.");
					location.reload();
				});
			} else {
				return false;
			}
		}
	}

	//지역항목리스트
	instance.post('M007003_RES').then(res => {
		setPlaceModalSelectData(res.data);
	});

	//지역 selector
	function setPlaceModalSelectData(data) {
		for (i = 0; i < data.placeList.length; i++) {
			var html = '';
			html += '<option>' + data.placeList[i] + '</option>'
			$("#place").append(html);
		}
	}

	//검색 - 엔터키
	function packageEnterKey() {
		if (window.event.keyCode == 13) {
			searchPackageInformation();
		}
	}

	$("#place").change( function(){
		searchPackageInformation(); // 셀렉트 박스 선택이 바뀔때 "셀렉트박스 요소" 를 함수로 전달
	});

	//검색
	function searchPackageInformation() {
		var searchItems = new Object();

		$('#pacInfoTable1 > tbody').empty();

		searchItems.place = $("#place option:selected").val();
		searchItems.searchWord = $("#hosNameSearch").val();

		if ($("#place").val() == "-선택-") {
			alert("지역을 선택해주세요.")
		} else {
			instance.post('M007004_REQ_RES', searchItems).then(res => {
				setHospitalPackageData(res.data);
			});
		}
	}

	//패키지 병원 할당 테이블
	function setHospitalPackageData(data) {
		$("input[name=hospitalNo]").prop("checked", false);

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>"';
			html += '<td><input type="checkbox" name="packageHosCheck" value=\'' + data[i].hosId + '\' onclick="clickOne(name)"></td>';

			var no = i + 1;
			html += '<td>' + no + '</td>';

			html += '<td>' + data[i].hosName + '</td>';
			html += '<td>' + data[i].hosGrade + '</td>';
			if (data[i].pc) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}
			html += '</tr>';

			$("#pacInfoTable1").append(html);
		}
	}

	//병원 미할탕 패키지 불러오기
	instance.post('M007005_RES').then(res => {
		setPackageData(res.data);
	});

	//병원 미할당 패키지 테이블
	function setPackageData(data) {
		$("#pacInfoTable2 > tbody").empty();

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';
			html += '<td><input type="checkbox" name="packageReadyCheck" value=\'' + data[i].pid + '\' onclick="clickOne(name)"></td>';

			var no = i + 1;
			html += '<td>' + no + '</td>';

			html += '<td>' + data[i].pname + '</td>';
			html += '<td>' + data[i].coName + '</td>';
			html += '<td>' + data[i].coBranch + '</td>';
			html += '<td>' + data[i].coCusCount + '</td>';
			if (data[i].coPc) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}
			html += '</tr>';

			$("#pacInfoTable2").append(html);
		}
	}

	//병원 전송
	function sendPackageHospital() {
		var hos = [];
		var hosSize = 0;

		$("input:checkbox[name=packageHosCheck]:checked").each(function (index) {
			if ($(this).val() != "on") {
				hos[hosSize] = $(this).val();
				hosSize++;
			}
		});

		var pac = [];
		var pacSize = 0;

		$("input:checkbox[name=packageReadyCheck]:checked").each(function (index) {
			if ($(this).val() != "on") {
				pac[pacSize] = $(this).val();
				pacSize++;
			}
		});

		var sendItems = new Object();

		sendItems.hId = hos;
		sendItems.pId = pac;

		if (sendItems.hId.length < 1) {
			alert("할당할 병원을 선택해주세요.")
		}
		if (sendItems.pId.length < 1) {
			alert("패키지를 선택해주세요.")
		} else if (sendItems.hId.length > 0 && sendItems.pId.length > 0) {
			if (confirm("전송하시겠습니까?") == true) {
				instance.post('M007006_REQ', sendItems).then(res => {
					if(res.data.message == "success") {
						alert("전송되었습니다.");
						//병원 미할탕 패키지 불러오기
						instance.post('M007005_RES').then(res => {
							setPackageData(res.data);
						});
					}
				});
			} else {
				return false;
			}
		}
	}

	//패키지 엑셀 업로드
	function uploadPackageFile(){
		var file = document.getElementById('excelUploadFile');

		if (file.files[0] == null) {
			alert("업로드할 파일이 없습니다.");
			return false;
		}

		var params = new FormData();
		params.append("file", file.files[0]);
		params.append("pkgId", pkgId.pkgId);

		fileURL.post('uploadExcel/inputPackageInspectionItemList', params, {
			headers: {
				'Content-Type': 'multipart/form-data'
			}
		}).then(res => {
			console.log(res.data);
			alert(res.data);
			location.reload();
		});
	}

</script>
