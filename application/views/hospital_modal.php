<!-- 병원 상세 정보 Modal -->
<div class="modal fade" id="hospitalDetailModal" tabindex="-1" aria-labelledby="hospitalDetailModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog " style="max-width: fit-content; width: 900px; display: table;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container hospital" style="margin-top: 30px">
					<div class="row">
						<div class="col">
							<div class="menu-title" style="font-size: 22px; margin-bottom: 20px">
								<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
								병원정보
							</div>
							<table class="table" id="HosInfoTable">
								<tbody>
								<tr>
									<th>병원명</th>
									<td id="hos-name" contentEditable="true"></td>
								</tr>
								<tr>
									<th>지역</th>
									<td id="hos-place"></td>
								</tr>
								<tr>
									<th>주소</th>
									<td id="hos-address" contentEditable="true"></td>
								</tr>
								<tr>
									<th>등급</th>
									<td id="hos-grade" contentEditable="true"></td>
								</tr>
								<tr>
									<th>대표번호</th>
									<td id="hos-phone" contentEditable="true"></td>
								</tr>
								<tr>
									<th>사업자번호</th>
									<td id="hos-licenseNum" contentEditable="true"></td>
								</tr>
								<tr>
									<th>URL</th>
									<td id="hos-url" contentEditable="true"></td>
								</tr>
								<tr>
									<th>공단차감</th>
									<td id="hos-pcDiscount" contentEditable="true"></td>
								</tr>
								<tr>
									<th>공단금액</th>
									<td id="hos-pcPrice" contentEditable="true"></td>
								</tr>
								<tr>
									<th>시스템오픈</th>
									<td id="hos-systemOpen" contentEditable="true"></td>
								</tr>
								<tr>
									<th>가능서비스</th>
									<td id="hos-services"></td>
								</tr>
								<tr>
									<th>계약유무</th>
									<td id="hos-contract" contentEditable="true"></td>
								</tr>
								</tbody>
							</table>
						</div>
						<div class="col">
							<div class="filebox" style="margin-bottom: 85px;">
								<div class="menu-title" style="font-size: 22px;margin-bottom: 20px">
									<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px">
									첨부서식
								</div>

								<ul class="img-circle">
									<form id="FILE_FORM" method="post" enctype="multipart/form-data" action="">
										<li>대표이미지</li>
										<input type="file" id="FILE_TAG" name="FILE_TAG">
										<input class="upload-name" value="파일선택" disabled="disabled">
										<label for="FILE_TAG">파일선택</label>

										<div class="btn-purple-square" id="hosLicenseFile" onclick="uploadFile()"
											 style="padding: 2px 6px; font-size: 12px; border-radius: 20px">업로드
										</div>
										<div class="btn-light-purple-square" onclick="downloadFile()"
											 style="padding: 2px 6px; font-size: 12px; border-radius: 20px">다운로드
										</div>
									</form>
								</ul>

							</div>

							<div class="menu-title" style="font-size: 22px; margin-bottom: 20px">
								<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px">
								담당자추가
								<div class="btn-save-square"
									 style="padding: 2px 6px; font-size: 13px; margin-left: 10px"
									 onclick="setHospitalManagerData()">저장
								</div>
							</div>
							<table class="table" id="HosManagerTable">
								<tbody>
								<tr>
									<th>부서</th>
									<td id="add-hos-res-department" contentEditable="true"></td>
								</tr>
								<tr>
									<th>이메일</th>
									<td id="add-hos-res-email" contentEditable="true"></td>
								</tr>
								<tr>
									<th>비밀번호</th>
									<td id="add-hos-res-password" contentEditable="true"></td>
								</tr>
								<tr>
									<th>이름</th>
									<td id="add-hos-res-name" contentEditable="true"></td>
								</tr>
								<tr>
									<th>직통번호</th>
									<td id="add-hos-res-phone" contentEditable="true"></td>
								</tr>
								<tr>
									<th>개인연락처</th>
									<td id="add-hos-res-directPhone" contentEditable="true"></td>
								</tr>
								<tr>
									<th>직함</th>
									<td id="add-hos-res-position" contentEditable="true"></td>
								</tr>
								<tr>
									<th>SMS수신</th>
									<td id="add-hos-res-receiveSMS" contentEditable="true"></td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col" aria-colspan="2">
							<div class="menu-title" style="font-size: 22px; margin-bottom: 20px; margin-top: 20px">
								<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
								담당자정보
							</div>

							<div style="height: 250px; overflow-y: scroll">
								<table id="HosManagerAddTable" class="table table-hover">
									<thead>
									<tr>
										<th style="width: 15%">담당자 정보</th>
										<th style="">이름</th>
										<th style="">직함</th>
										<th style="width: 18%">직통번호</th>
										<th style="width: 18%">연락처</th>
										<th style="width: 18%">이메일</th>
										<th style="width: 11%">SMS수신</th>
									</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="btn-save-square" style="float: right;" onclick="saveHospitalInformation()">저장</div>
			</div>
		</div>
	</div>
</div>

<!-- 병원 신규 생성 Modal -->
<div class="modal fade" id="hospitalCreateModal" tabindex="-1" aria-labelledby="hospitalCreateModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog " style="max-width: fit-content; width: 800px; display: table;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container hospital" style="margin-top: 30px">
					<div class="row">
						<div class="col">
							<div class="menu-title" style="font-size: 22px; margin-bottom: 20px">
								<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
								병원정보
							</div>
							<table class="table" id="HosInfoTable">
								<tbody>
								<tr>
									<th>병원명</th>
									<td id="add-hos-name" contentEditable="true"></td>
								</tr>
								<tr>
									<th>주소</th>
									<td id="add-hos-address" contentEditable="true"></td>
								</tr>
								<tr>
									<th>등급</th>
									<td id="add-hos-grade" contentEditable="true"></td>
								</tr>
								<tr>
									<th>대표번호</th>
									<td id="add-hos-phone" contentEditable="true"></td>
								</tr>
								<tr>
									<th>사업자번호</th>
									<td id="add-hos-licenseNum" contentEditable="true"></td>
								</tr>
								<tr>
									<th>URL</th>
									<td id="add-hos-url" contentEditable="true"></td>
								</tr>
								<tr>
									<th>공단차감</th>
									<td id="add-hos-pcDiscount" contentEditable="true"></td>
								</tr>
								<tr>
									<th>공단금액</th>
									<td id="add-hos-pcPrice" contentEditable="true"></td>
								</tr>
								<tr>
									<th>시스템오픈</th>
									<td id="add-hos-systemOpen" contentEditable="true"></td>
								</tr>
								<tr>
									<th>계약유무</th>
									<td id="add-hos-contract" contentEditable="true"></td>
								</tr>
								</tbody>
							</table>
						</div>
						<div class="col">
							<div style="margin-bottom: 40px;">
								<div class="menu-title" style="font-size: 22px;">
									<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
									첨부서식
								</div>
								<ul class="img-circle">
									<form action="/post" method="post" enctype="multipart/form-data"
										  style="height: 33px">
										<div class="form-group row">
											<div class="custom-file" id="inputFile">
												<input name="file" type="file" class="custom-file-input"
													   id="add-hosImgFile">
												<label for="add-hosImgFile">
													<li>대표이미지</li>
												</label>
												<input type="submit" value="upload" class="btn-light-purple-square"
													   style="padding: 2px 6px; font-size: 12px; margin-left: 10px; border-radius: 20px"
													   onclick="">
											</div>
										</div>
									</form>
									<form action="/post" method="post" enctype="multipart/form-data"
										  style="height: 33px">
										<div class="form-group row">
											<div class="custom-file" id="inputFile">
												<input name="file" type="file" class="custom-file-input"
													   id="add-hosLicenseFile">
												<label for="add-hosLicenseFile">
													<li>사업자등록증</li>
												</label>
												<input type="submit" value="upload" class="btn-light-purple-square"
													   style="padding: 2px 6px; font-size: 12px; margin-left: 10px; border-radius: 20px"
													   onclick="">
											</div>
										</div>
									</form>
									<form action="/post" method="post" enctype="multipart/form-data"
										  style="height: 33px">
										<div class="form-group row">
											<div class="custom-file" id="inputFile">
												<input name="file" type="file" class="custom-file-input"
													   id="add-hosBankFile">
												<label for="add-hosBankFile">
													<li>통장사본</li>
												</label>
												<input type="submit" value="upload" class="btn-light-purple-square"
													   style="padding: 2px 6px; font-size: 12px; margin-left: 10px; border-radius: 20px"
													   onclick="">
											</div>
										</div>
									</form>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="btn-save-square" style="float: right;" onclick="createHospitalData()">저장</div>
			</div>
		</div>
	</div>
</div>

<!-- 장비현황 Modal -->
<div class="modal fade" id="hospitalEquipmentModal" tabindex="-1" aria-labelledby="hospitalEquipmentModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog " style="max-width: fit-content; width: 1300px; display: table;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table id="hospitalEquipmentInfo" class="table table-hover table-bordered">
					<thead>
					<tr style="width: 100%">
						<th style="width: 20%">의료장비명</th>
						<th style="width: 20%">모델명</th>
						<th style="width: 20%">용도</th>
						<th style="width: 5%">수량</th>
						<th style="width: 10%">도입년도</th>
						<th style="width: 17%">비고</th>
						<th></th>
					</tr>
					<tr>
						<td><input type="text" placeholder="" id="eq-name"></td>
						<td><input type="text" placeholder="" id="eq-modelCode"></td>
						<td><input type="text" placeholder="" id="eq-uses"></td>
						<td><input size="2" type="text" placeholder="" id="eq-count"></td>
						<td><input size="6" type="text" placeholder="" id="eq-introductionYear"></td>
						<td><input type="text" placeholder="" id="eq-memo"></td>
						<td>
							<div class="btn-purple-square" style="padding: 0 6px; font-size: 13px; margin-left: 10px"
								 onclick="addHospitalEquipment()">추가
							</div>
						</td>
					</tr>
					</thead>
					<tbody>
					<tr>
					</tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<div class="btn-save-square" style="float: right;" onclick="saveEquipmentInformation()">저장</div>
			</div>
		</div>
	</div>
</div>

<?php
require('file_data.php');
?>

<script>
	//병원 정보 상세
	var hosId = Object();

	function clickHospitalDetail(data) {
		hosId.hospitalId = data;
		instance.post('M005003_REQ_RES', hosId).then(res => {
			setDetailHospitalData(res.data);
		});
	}

	//클릭시 병원정보
	function setDetailHospitalData(data) {
		console.log(data);

		//HosInfoTable 병원정보
		document.getElementById('hos-name').innerHTML = data.name;
		document.getElementById('hos-place').innerHTML = data.place;
		document.getElementById('hos-address').innerHTML = data.address;
		document.getElementById('hos-phone').innerHTML = data.phone;
		document.getElementById('hos-licenseNum').innerHTML = data.licenseNum;
		document.getElementById('hos-pcDiscount').innerHTML = data.pcDiscount;
		document.getElementById('hos-pcPrice').innerHTML = data.pcPrice;
		document.getElementById('hos-systemOpen').innerHTML = data.systemOpen;
		document.getElementById('hos-services').innerHTML = data.services;
		document.getElementById('hos-contract').innerHTML = data.contract;
		// document.getElementById('hos-image').innerHTML = data.image;
		// document.getElementById('hos-url').innerHTML = data.url;
		document.getElementById('hos-grade').innerHTML = data.grade;

		//HosManagerAddTable 담당자정보
		$("#HosManagerAddTable tbody").empty();
		console.log(data.hospitalManagerDTOList);
		for (i = 0; i < data.hospitalManagerDTOList.length; i++) {
			var html = '';
			html += '<tr>';
			html += '<td>' + data.hospitalManagerDTOList[i].department + '</td>';
			html += '<td>' + data.hospitalManagerDTOList[i].name + '</td>';
			html += '<td>' + data.hospitalManagerDTOList[i].position + '</td>';
			html += '<td>' + data.hospitalManagerDTOList[i].directPhone + '</td>';
			html += '<td>' + data.hospitalManagerDTOList[i].phone + '</td>';
			html += '<td>' + data.hospitalManagerDTOList[i].email + '</td>';
			html += '<td>' + data.hospitalManagerDTOList[i].receiveSMS + '</td>';
			html += '</tr>';
			$("#HosManagerAddTable").append(html);
		}

	}

	//담당자 추가
	function setHospitalManagerData() {
		var saveItems = new Object();

		saveItems.hospitalId = hosId.hospitalId;
		saveItems.department = document.getElementById('add-hos-res-department').innerText;
		saveItems.email = document.getElementById('add-hos-res-email').innerText;
		saveItems.password = document.getElementById('add-hos-res-password').innerText;
		saveItems.name = document.getElementById('add-hos-res-name').innerText;
		saveItems.phone = document.getElementById('add-hos-res-phone').innerText;
		saveItems.directPhone = document.getElementById('add-hos-res-directPhone').innerText;
		saveItems.position = document.getElementById('add-hos-res-position').innerText;
		saveItems.receiveSMS = document.getElementById('add-hos-res-receiveSMS').innerText;

		console.log(saveItems);

		if (confirm("저장하시겠습니까?") == true) {
			instance.post('M005004_REQ', saveItems).then(res => {
				console.log(res.data.message);
				if (res.data.message == "success") {
					alert("저장되었습니다.");
					clickHospitalDetail(saveItems.hospitalId);
					document.getElementById('add-hos-res-department').innerHTML = "";
					document.getElementById('add-hos-res-email').innerHTML = "";
					document.getElementById('add-hos-res-password').innerHTML = "";
					document.getElementById('add-hos-res-name').innerHTML = "";
					document.getElementById('add-hos-res-phone').innerHTML = "";
					document.getElementById('add-hos-res-directPhone').innerHTML = "";
					document.getElementById('add-hos-res-position').innerHTML = "";
					document.getElementById('add-hos-res-receiveSMS').innerHTML = "";
				}
			});
		} else {
			return false;
		}
	}

	//해당 병원 장비 정보 상세
	function setEquipmentData(data) {
		hosId.hospitalId = data;
		instance.post('M005008_REQ_RES', hosId).then(res => {
			setDetailEquipmentData(res.data);
		});
	}

	//장비 불러오기
	function setDetailEquipmentData(data) {
		$("#hospitalEquipmentInfo > tbody").empty();

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';
			html += '<td contentEditable="true">' + data[i].name + '</td>';
			html += '<td contentEditable="true">' + data[i].modelCode + '</td>';
			html += '<td contentEditable="true">' + data[i].uses + '</td>';
			html += '<td contentEditable="true">' + data[i].count + '</td>';
			html += '<td contentEditable="true">' + data[i].introductionYear;
			+'</td>';
			html += '<td contentEditable="true">' + data[i].memo;
			+'</td>';
			html += '<td><div class="btn-save-square" style="padding: 0 6px; font-size: 13px; margin-left: 10px" onclick="delHospitalEquipment(this)">삭제</div></td>'
			html += '</tr>';

			console.log(html);

			$("#hospitalEquipmentInfo").append(html);
		}
	}

	//장비 추가
	function addHospitalEquipment() {
		var html = '';

		var name = $("#eq-name").val();
		var modelCode = $("#eq-modelCode").val();
		var uses = $("#eq-uses").val();
		var count = $("#eq-count").val();
		var introductionYear = $("#eq-introductionYear").val();
		var memo = $("#eq-memo").val();

		html += '<tr>';
		html += '<td contentEditable="true">' + name + '</td>';
		html += '<td contentEditable="true">' + modelCode + '</td>';
		html += '<td contentEditable="true">' + uses + '</td>';
		html += '<td contentEditable="true">' + count + '</td>';
		html += '<td contentEditable="true">' + introductionYear + '</td>';
		html += '<td contentEditable="true">' + memo + '</td>';
		html += '<td><div class="btn-save-square" style="padding: 0 6px; font-size: 13px; margin-left: 10px" onclick="delHospitalEquipment(this)">삭제</div></td>'
		html += '</tr>';

		$("#hospitalEquipmentInfo > tbody:last").append(html);

		$("#eq-name").val('');
		$("#eq-modelCode").val('');
		$("#eq-uses").val('');
		$("#eq-count").val('');
		$("#eq-introductionYear").val('');
		$("#eq-memo").val('');
	}

	//장비 삭제
	function delHospitalEquipment(data) {
		$(data).parent().parent().remove();
	}

	//장비 (수정된 정보로) 저장
	function saveEquipmentInformation() {
		var hospitalEquipmentInfo = document.getElementById('hospitalEquipmentInfo');
		var size = document.getElementById('hospitalEquipmentInfo').rows.length;

		var hosEQList = Array();
		var hosEQListSize = 0;

		for (var i = 2; i < size; i++) {
			var hosEQ = Object();
			hosEQ.hospitalId = hosId.hospitalId;
			hosEQ.name = hospitalEquipmentInfo.rows[i].cells.item(0).innerText;
			hosEQ.modelCode = hospitalEquipmentInfo.rows[i].cells.item(1).innerText;
			hosEQ.uses = hospitalEquipmentInfo.rows[i].cells.item(2).innerText;
			hosEQ.count = hospitalEquipmentInfo.rows[i].cells.item(3).innerText;
			hosEQ.introductionYear = hospitalEquipmentInfo.rows[i].cells.item(4).innerText;
			hosEQ.memo = hospitalEquipmentInfo.rows[i].cells.item(5).innerText;

			hosEQList[hosEQListSize] = hosEQ;
			hosEQListSize += 1;
		}

		console.log(hosEQList);

		instance.post('M005007_REQ', hosEQList).then(res => {
			console.log(res.data);
		});
	}

	//병원 신규 등록
	function createHospitalData() {
		var saveItems = new Object();

		saveItems.name = document.getElementById('add-hos-name').innerText;
		saveItems.address = document.getElementById('add-hos-address').innerText;
		saveItems.phone = document.getElementById('add-hos-phone').innerText;
		saveItems.license_num = document.getElementById('add-hos-licenseNum').innerText;
		saveItems.pcDiscount = document.getElementById('add-hos-pcDiscount').innerText;
		saveItems.pcPrice = document.getElementById('add-hos-pcPrice').innerText;
		saveItems.systemOpen = document.getElementById('add-hos-systemOpen').innerText;
		saveItems.contract = document.getElementById('add-hos-contract').innerText;
		saveItems.license = document.getElementById('add-hos-license').innerText;
		saveItems.bankbook = document.getElementById('add-hos-bankbook').innerText;
		saveItems.image = 1423;//document.getElementById('add-hos-image').innerText;
		saveItems.url = document.getElementById('add-hos-url').innerText;
		saveItems.grade = document.getElementById('add-hos-grade').innerText;

		console.log(saveItems);

		if (confirm("저장하시겠습니까?") == true) {
			instance.post('M005006_REQ', saveItems).then(res => {
				console.log(res.data.message);
				alert("저장되었습니다.");
				setTimeout(function () {
					location.reload();
				}, 3000);
			});
		} else {
			return false;
		}
	}

	//수정된 정보로 저장
	function saveHospitalInformation() {
		var saveItems = new Object();

		saveItems.hospitalId = hosId.hospitalId;
		saveItems.name = document.getElementById('hos-name').innerText;
		saveItems.address = document.getElementById('hos-address').innerText;
		saveItems.phone = document.getElementById('hos-phone').innerText;
		saveItems.license_num = document.getElementById('hos-licenseNum').innerText;
		saveItems.pcDiscount = document.getElementById('hos-pcDiscount').innerText;
		saveItems.pcPrice = document.getElementById('hos-pcPrice').innerText;
		saveItems.systemOpen = document.getElementById('hos-systemOpen').innerText;
		saveItems.contract = document.getElementById('hos-contract').innerText;
		saveItems.license = document.getElementById('hos-license').innerText;
		saveItems.bankbook = document.getElementById('hos-bankbook').innerText;
		saveItems.image = document.getElementById('hos-image').innerText;
		saveItems.url = document.getElementById('hos-url').innerText;
		saveItems.grade = document.getElementById('hos-grade').innerText;

		console.log(saveItems);

		if (confirm("저장하시겠습니까?") == true) {
			instance.post('M005005_REQ', saveItems).then(res => {
				console.log(res.data.message);
				alert("저장되었습니다.");
			});
		} else {
			return false;
		}
	}

</script>
