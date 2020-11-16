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
							<img src="/asset/images/bg_h2_tit_top.png" style="margin: auto">
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
									 onclick="saveInformation()">
									저장
								</div>
								<div class="btn btn-danger" style="margin: 30px auto 0 auto"
									 onclick="saveInformation()">
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
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#"
									   onclick="clickFamilyTab('FAM#1')">본인</a>
								</li>
							</ul>

							<div class="tab-content" style="border: 1px solid #E6E6E6">
								<div class="tab-pane fade show active" id="packageTab">
									<div class="container" style="margin-top: 20px;font-size: 15px">
										<div class="row" style="width: 800px;padding: 20px">
											<div class="col">
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
														<td id="phone" contentEditable="true"></td>
													</tr>
													<tr>
														<th rowspan="3">주소</th>
														<td>
															<input class="info-input" type="text"
																   id="zipCode" placeholder="우편번호" readonly>
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
											<div class="col">
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
																   id="supportPercent">
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
									 onclick="saveInformation()">저장
								</div>
							</div>
						</div>
					</div>
				</div>
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
		console.log(data);

		$("#customerId").val(data.cusEmail);
		$("#customerName").val(data.name);
		$("#customerCompanyName").val(data.coName);
		$("#customerCompanyBranch").val(data.coBranch);

		for (i = 1; i < data.familyDTOList.length; i++) {
			var html = "";
			html += '<li class="nav-item">' +
					'<a class="nav-link" data-toggle="tab" href="#" onclick="clickFamilyTab(\'' + data.familyDTOList[i].famId + '\')">' +
					data.familyDTOList[i].grade + '</a>' + '</li>';
			$("#customerTabMenu").append(html);
		}

		clickFamilyTab(data.familyDTOList[0].famId);

		familyData = data.familyDTOList;
		console.log(familyData);
	}

	function clickFamilyTab(id) {
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
					$("input:checkbox[id='psInfoCheckHospitaltNo']").prop("checked", true);
				}

				$("#supportPercent").val(familyData[i].supportPercent);
				$("#supportPrice").val(familyData[i].supportPrice);
			}
		}
	}

</script>
