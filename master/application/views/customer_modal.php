<!-- 고객 상세 정보 Modal -->
<div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
	<div class="modal-dialog " style="max-width: 100%; min-width: auto; display: table;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row" style="min-width: 1300px">
					<div class="col">
						<div style="font-size: 22px; display: grid; text-align: center; margin-top: 30px;padding: 0 30px">
							<img src="/asset/images/bg_h2_tit_top.png" style="margin: 0 auto">
							<p style="margin: 10px">고객정보</p>
							<table class="table table-bordered" id="customerInfo"
								   style="margin-top:45px;font-size: 15px">
								<tbody>
								<tr>
									<th>이름</th>
									<td>
										<input class="info-input" type="text" id="customerName">
									</td>
								</tr>
								<tr>
									<th>아이디</th>
									<td>
										<input class="info-input" type="text" id="customerId">
									</td>
								</tr>
								<tr>
									<th>소속</th>
									<td>
										<input class="info-input" type="text" id="customerCompanyName">
									</td>
								</tr>
								<tr>
									<th>사업장</th>
									<td>
										<input class="info-input" type="text" id="customerCompanyBranch">
									</td>
								</tr>
								<tr>
									<th>비밀번호</th>
									<td>
										<input class="info-input" type="password" id="customerPassword">
									</td>
								</tr>
								<tr>
									<th>비밀번호 확인</th>
									<td>
										<input class="info-input" type="password" id="customerPasswordCheck">
									</td>
								</tr>
								</tbody>
							</table>
							<div style="width: 100%">
								<div class="btn btn-dark" style="margin: 30px auto 0 auto"
									 onclick="saveCustomerInformation()">
									저장
								</div>
								<div class="btn btn-danger" style="margin: 30px auto 0 auto"
									 onclick="deleteCustomerInformation()">
									삭제
								</div>
							</div>
						</div>
					</div>

					<div class="col">
						<div style="display: grid; text-align: center; margin-top: 30px;width: fit-content">
							<img src="/asset/images/bg_h2_tit_top.png" style="margin: auto">
							<p style="margin: 10px;font-size: 22px;">가족정보</p>

							<ul class="nav nav-tabs" id="customerTabMenu">
							</ul>

							<div class="tab-content" style="border: 1px solid #E6E6E6">
								<div class="tab-pane fade show active">
									<div class="container" id="customerTab"
										 style="margin-top: 20px;font-size: 15px;visibility: hidden">
										<div class="row" style="width: 850px;padding: 20px">
											<div class="col-7">
												<table class="table" name="info1">
													<tbody>
													<tr>
														<th>관계</th>
														<td>
															<input class="info-input" type="text"
																   id="grade">
														</td>
													</tr>
													<tr>
														<th>이름</th>
														<td>
															<input class="info-input" type="text"
																   id="name">
														</td>
													</tr>
													<tr>
														<th>성별</th>
														<td id="sex">
															<div class="form-check form-check-inline">
																<label class="form-check-label"
																	   for="man">남&nbsp</label>
																<input class="form-check-input" type="checkbox"
																	   id="man"
																	   name="sex" value="true"
																	   onclick="onlyCheck(this, name)">
															</div>
															<div class="form-check form-check-inline">
																<label class="form-check-label"
																	   for="woman">여&nbsp</label>
																<input class="form-check-input" type="checkbox"
																	   id="woman"
																	   name="sex" value="false"
																	   onclick="onlyCheck(this, name)">
															</div>
														</td>
													</tr>
													<tr>
														<th>생년월일</th>
														<td>
															<input class="info-input" type="text"
																   id="birthDate" readonly>
															<script>
																$(function () {
																	$("#birthDate").datepicker({
																		changeMonth: true,
																		changeYear: true,
																		maxDate: 0,
																		dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'],
																		dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
																		monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
																		monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
																		dateFormat: "yy-mm-dd",
																	});
																});
															</script>
														</td>
													</tr>
													<tr>
														<th>연락처</th>
														<td>
															<input class="info-input" type="text"
																   id="phone">
														</td>
													</tr>
													<tr>
														<th rowspan="3">주소</th>
														<td>
															<input class="info-input" type="text"
																   id="zipCode" placeholder="우편번호"
																   onclick="openAddressSearch()" readonly>
														</td>
													</tr>
													<tr>
														<td>
															<input class="info-input" type="text"
																   id="address"
																   readonly>
														</td>
													</tr>
													<tr>
														<td>
															<input class="info-input" type="text"
																   id="buildingNum" placeholder="상세주소">
														</td>
													</tr>
													<tr>
														<th>이메일</th>
														<td>
															<input class="info-input" type="text"
																   id="email">
														</td>
													</tr>
													</tbody>
												</table>
											</div>
											<div class="col-5">
												<table class="table" id="info2">
													<tbody>
													<tr>
														<th>공단대상</th>
														<td id="pcDiscount">
															<div class="form-check form-check-inline">
																<label class="form-check-label"
																	   for="pcDiscountYes">YES&nbsp</label>
																<input class="form-check-input" type="checkbox"
																	   id="pcDiscountYes"
																	   name="pcDiscount" value="true"
																	   onclick="onlyCheck(this, name)">
															</div>
															<div class="form-check form-check-inline">
																<label class="form-check-label"
																	   for="pcDiscountNo">NO&nbsp</label>
																<input class="form-check-input" type="checkbox"
																	   id="pcDiscountNo"
																	   name="pcDiscount" value="false"
																	   onclick="onlyCheck(this, name)">
															</div>
														</td>
													</tr>
													<tr>
														<th>듀얼(동의)</th>
														<td id="psInfoCheckDual">
															<div class="form-check form-check-inline">
																<label class="form-check-label"
																	   for="psInfoCheckDualYes">YES&nbsp</label>
																<input class="form-check-input" type="checkbox"
																	   id="psInfoCheckDualYes"
																	   name="psInfoCheckDual" value="true"
																	   onclick="onlyCheck(this, name)">
															</div>
															<div class="form-check form-check-inline">
																<label class="form-check-label"
																	   for="psInfoCheckDualNo">NO&nbsp</label>
																<input class="form-check-input" type="checkbox"
																	   id="psInfoCheckDualNo"
																	   name="psInfoCheckDual" value="false"
																	   onclick="onlyCheck(this, name)">
															</div>
														</td>
													</tr>
													<tr>
														<th>병원(동의)</th>
														<td id="psInfoCheckHospital">
															<div class="form-check form-check-inline">
																<label class="form-check-label"
																	   for="psInfoCheckHospitalYes">YES&nbsp</label>
																<input class="form-check-input" type="checkbox"
																	   id="psInfoCheckHospitalYes"
																	   name="psInfoCheckHospital" value="true"
																	   onclick="onlyCheck(this, name)">
															</div>
															<div class="form-check form-check-inline">
																<label class="form-check-label"
																	   for="psInfoCheckHospitalNo">NO&nbsp</label>
																<input class="form-check-input" type="checkbox"
																	   id="psInfoCheckHospitalNo"
																	   name="psInfoCheckHospital" value="false"
																	   onclick="onlyCheck(this, name)">
															</div>
														</td>
													</tr>
													</tbody>
												</table>

												<table class="table" id="info3">
													<tbody>
													<tr>
														<th>지원금비율</th>
														<td>
															<input class="info-input" type="number"
																   style="width: 60px" id="supportPercent">%
														</td>
													</tr>
													<tr>
														<th>지원금</th>
														<td>
															<input class="info-input" type="text"
																   id="supportPrice">
														</td>
													</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div style="width: 100%">
								<div class="btn btn-dark" style="margin-top: 15px; float: right"
									 onclick="saveFamilyInformation()">저장
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- 패키지 신규 생성 Modal -->
<div class="modal fade" id="customerUploadModal" tabindex="-1" aria-labelledby="customerUploadModalLabel"
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
					<p style="margin: 10px">신규회원 엑셀 업로드</p>
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
				<div class="btn-save-square" style="margin: auto" onclick="uploadCustomerFile()">업로드</div>
			</div>
		</div>
	</div>
</div>


<script>
	//고객정보상세
	var cusId = Object();

	function clickDetail(data) {
		cusId.cusId = data;
		instance.post('M001003_REQ_RES', cusId).then(res => {
			setDetailCustomerData(res.data);
		});
	}

	var familyData = new Array();

	//클릭시 고객정보
	function setDetailCustomerData(data) {
		$("#customerTabMenu").empty();

		$("#customerId").val(data.cusEmail);
		$("#customerName").val(data.name);
		$("#customerCompanyName").val(data.coName);
		$("#customerCompanyBranch").val(data.coBranch);

		$("#customerTab").css("visibility", "hidden");

		for (i = 0; i < data.familyDTOList.length; i++) {
			var html = "";
			html += '<li class="nav-item">' +
					'<a class="nav-link" data-toggle="tab" href="#" onclick="clickFamilyTab(\'' + data.familyDTOList[i].famId + '\')">' +
					data.familyDTOList[i].grade + '</a>' + '</li>';
			$("#customerTabMenu").append(html);
		}

		familyData = data.familyDTOList;
	}

	var famId;

	//가족 정보 탭 전환
	function clickFamilyTab(id) {
		$("#customerTab").css("visibility", "visible");

		famId = id;

		for (i = 0; i < familyData.length; i++) {
			if (id == familyData[i].famId) {
				$("#grade").val(familyData[i].grade);
				$("#name").val(familyData[i].name);

				if (familyData[i].sex) {
					$("input:checkbox[id='man']").prop("checked", true);
					$("input:checkbox[id='woman']").prop("checked", false);
				} else {
					$("input:checkbox[id='man']").prop("checked", false);
					$("input:checkbox[id='woman']").prop("checked", true);
				}

				$("#birthDate").val(familyData[i].birthDate);
				$("#phone").val(familyData[i].phone);
				$("#zipCode").val(familyData[i].zipCode);
				$("#address").val(familyData[i].address);
				$("#buildingNum").val(familyData[i].buildingNum);
				$("#email").val(familyData[i].email);

				if (familyData[i].pcDiscount) {
					$("input:checkbox[id='pcDiscountYes']").prop("checked", true);
					$("input:checkbox[id='pcDiscountNo']").prop("checked", false);
				} else {
					$("input:checkbox[id='pcDiscountYes']").prop("checked", false);
					$("input:checkbox[id='pcDiscountNo']").prop("checked", true);
				}
				if (familyData[i].psInfoCheckDual) {
					$("input:checkbox[id='psInfoCheckDualYes']").prop("checked", true);
					$("input:checkbox[id='psInfoCheckDualNo']").prop("checked", false);
				} else {
					$("input:checkbox[id='psInfoCheckDualYes']").prop("checked", false);
					$("input:checkbox[id='psInfoCheckDualNo']").prop("checked", true);
				}
				if (familyData[i].psInfoCheckHospital) {
					$("input:checkbox[id='psInfoCheckHospitalYes']").prop("checked", true);
					$("input:checkbox[id='psInfoCheckHospitalNo']").prop("checked", false);
				} else {
					$("input:checkbox[id='psInfoCheckHospitalYes']").prop("checked", false);
					$("input:checkbox[id='psInfoCheckHospitalNo']").prop("checked", true);
				}

				$("#supportPercent").val(familyData[i].supportPercent);
				$("#supportPrice").val(familyData[i].supportPrice.toLocaleString());
			}
		}
	}

	//주소검색
	function openAddressSearch() {
		new daum.Postcode({
			oncomplete: function (data) {
				$("#zipCode").val(data.zonecode); // 우편번호 (5자리)
				$("#address").val(data.address);
				$("#buildingNum").val(data.buildingName);
				$("#buildingNum").focus();
			}
		}).open();
	}

	//고객정보 수정
	function saveCustomerInformation() {
		if ($("#customerName").val() == "") {
			alert("이름을 입력해주세요.");
			$("#customerName").focus();
			return;
		} else if ($("#customerId").val() == "") {
			alert("아이디를 입력해주세요.");
			$("#customerId").focus();
			return;
		} else if ($("#customerCompanyName").val() == "") {
			alert("소속을 입력해주세요.");
			$("#customerCompanyName").focus();
			return;
		} else if ($("#customerCompanyBranch").val() == "") {
			alert("사업장을 입력해주세요.");
			$("#customerCompanyBranch").focus();
			return;
		} else if ($("#customerPassword").val() != $("#customerPasswordCheck").val()) {
			alert("비밀번호를 다시 확인해주세요.");
			return;
		} else if (($("#customerPassword").val()).length > 0 && ($("#customerPasswordCheck").val()).length > 0) {
			if (($("#customerPassword").val()).length < 8 || ($("#customerPasswordCheck").val()).length < 8) {
				alert("비밀번호는 8자 이상으로 입력해주세요.");
				return;
			}
		}

		var sendItems = new Object();

		sendItems.cusId = cusId.cusId;
		sendItems.name = $("#customerName").val();
		sendItems.email = $("#customerId").val();
		sendItems.coName = $("#customerCompanyName").val();
		sendItems.coBranch = $("#customerCompanyBranch").val();
		sendItems.password = $("#customerPassword").val();
		sendItems.passwordCheck = $("#customerPasswordCheck").val();

		if (confirm("저장하시겠습니까?") == true) {
			instance.post('M001004_REQ_RES', sendItems).then(res => {
				if (res.data.message == "success") {
					alert("저장되었습니다.");
				} else if (res.data.message == "companyFailed") {
					alert("소속과 사업장을 다시 확인해주세요.");
				} else if (res.data.message == "customerFailed") {
					alert("이름과 아이디를 다시 확인해주세요.");
				} else if (res.data.message == "passwordFailed") {
					alert("비밀번호를 다시 확인해주세요.");
				}
			});
		} else {
			return false;
		}
	}

	//고객정보 삭제
	function deleteCustomerInformation() {
		if (confirm("삭제하시겠습니까?") == true) {
			instance.post('M001006_REQ', cusId).then(res => {
				if (res.data.message == "success") {
					alert("삭제되었습니다.");
					location.reload();
				}
			});
		} else {
			return false;
		}
	}

	//가족정보 수정
	function saveFamilyInformation() {
		if ($("#grade").val() == "") {
			alert("관계를 입력해주세요.");
			$("#grade").focus();
			return;
		} else if ($("#name").val() == "") {
			alert("이름을 입력해주세요.");
			$("#name").focus();
			return;
		} else if ($("#birthDate").val() == "") {
			alert("생년월일을 선택해주세요.");
			$("#birthDate").focus();
			return;
		} else if ($("#phone").val() == "") {
			alert("연락처를 입력해주세요.");
			$("#phone").focus();
			return;
		} else if (!isPhoneNum($("#phone").val())) {
			alert("올바른 연락처를 입력해주세요.");
			$("#phone").focus();
			return;
		} else if ($("#zipCode").val() == "" || $("#address").val() == "" || $("#buildingNum").val() == "") {
			alert("주소를 입력해주세요.");
			return;
		} else if ($("#email").val() == "") {
			alert("이메일을 입력해주세요.");
			$("#email").focus();
			return;
		} else if (!isEmail($("#email").val())) {
			alert("올바른 이메일를 입력해주세요.");
			$("#email").focus();
			return;
		} else if ($("#supportPercent").val() == "") {
			alert("지원금 비율을 입력해주세요.");
			$("#supportPercent").focus();
			return;
		} else if ($("#supportPrice").val() == "") {
			alert("지원금을 입력해주세요.");
			$("#supportPrice").focus();
			return;
		}

		var sendItems = new Object();

		sendItems.famId = famId;
		sendItems.grade = $("#grade").val();
		sendItems.name = $("#name").val();
		sendItems.sex = booleanData('sex');
		sendItems.birthDate = $("#birthDate").val();
		sendItems.zipCode = $("#zipCode").val();
		sendItems.address = $("#address").val();
		sendItems.buildingNum = $("#buildingNum").val();
		sendItems.phone = $("#phone").val();
		sendItems.email = $("#email").val();
		sendItems.pcDiscount = booleanData('pcDiscount');
		sendItems.psInfoCheckDual = booleanData('psInfoCheckDual');
		sendItems.psInfoCheckHospital = booleanData('psInfoCheckHospital');
		sendItems.supportPercent = $("#supportPercent").val();
		sendItems.supportPrice = saveSupportPrice('supportPrice');

		console.log(sendItems);

		if (confirm("저장하시겠습니까?") == true) {
			instance.post('M001005_REQ_RES', sendItems).then(res => {
				if (res.data.message == "success") {
					alert("저장되었습니다.");
					instance.post('M001003_REQ_RES', cusId).then(res => {
						familyData = res.data.familyDTOList;
					});
				}
			});
		} else {
			return false;
		}
	}

	//저장할 때 - 금액에서 천단위 , 쉼표 제거
	function saveSupportPrice(price) {
		var result = $("#" + price + "").val();
		var reg = /[,]/gi
		if (reg.test(result)) {
			return result.replace(reg, "");
		} else {
			return result;
		}
	}

	//신규 회원 엑셀 업로드
	function uploadCustomerFile() {
		var file = document.getElementById('excelUploadFile');

		if (file.files[0] == null) {
			alert("업로드할 파일이 없습니다.");
			return false;
		}

		var params = new FormData();
		params.append("file", file.files[0]);

		fileURL.post('uploadExcel/inputCustomerList', params, {
			headers: {
				'Content-Type': 'multipart/form-data'
			}
		}).then(res => {
			console.log(res.data);
			alert(res.data);
			location.reload();
		});
	}

	//파일 업로드 이름
	$('#excelUploadFile').change(function () {
		var filepath = this.value;
		var m = filepath.match(/([^\/\\]+)$/);
		if (m) {
			var filename = m[1];
			$('#filename').text(filename);
		}
	});
</script>
