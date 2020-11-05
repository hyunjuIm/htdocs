<!-- 고객 상세 정보 Modal -->
<div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
	<div class="modal-dialog " style="max-width: 100%; width: auto; display: table;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container" style="margin-top: 20px">
					<div class="menu-title" style="font-size: 22px; margin-bottom: 20px">
						<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
						고객정보
					</div>
					<div class="row" style="width: 800px">
						<div class="col">
							<table class="table" id="info1">
								<tbody>
								<tr>
									<th>소속</th>
									<td id="cus-companyName"></td>
								</tr>
								<tr>
									<th>부서</th>
									<td id="cus-companyBranch"></td>
								</tr>
								<tr>
									<th>성명</th>
									<td id="cus-familyName" contentEditable="true"></td>
								</tr>
								<tr>
									<th>생년월일</th>
									<td>
										<input type="text" id="cus-familyBirthDate" placeholder="" style="border:none;text-align: center">
										<script>
											$(function () {
												$("#cus-familyBirthDate").datepicker({
													changeMonth: true,
													changeYear: true,
													maxDate: 0,
													dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'],
													dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
													monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
													monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
													dateFormat: "yy-mm-dd",
												});
											});
										</script>
									</td>
								</tr>
								<tr>
									<th>연락처</th>
									<td id="cus-familyPhone" contentEditable="true"></td>
								</tr>
								<tr>
									<th>주소</th>
									<td id="cus-familyAddress" contentEditable="true"></td>
								</tr>
								<tr>
									<th>이메일</th>
									<td id="cus-familyEmail" contentEditable="true"></td>
								</tr>
								<tr>
									<th>공단대상</th>
									<td id="cus-familyPcDiscount">
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="familyPcDiscountYes">YES&nbsp</label>
											<input class="form-check-input" type="checkbox" id="familyPcDiscountYes"
												   name="cus-familyPcDiscount" value="true"
												   onclick="onlyCheck(this, name)">
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="familyPcDiscountNo">NO&nbsp</label>
											<input class="form-check-input" type="checkbox" id="familyPcDiscountNo"
												   name="cus-familyPcDiscount" value="false"
												   onclick="onlyCheck(this, name)">
										</div>
									</td>
								</tr>
								<tr>
									<th>듀얼(동의)</th>
									<td id="cus-familyPsInfoDual">
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="familyPsInfoDualYes">YES&nbsp</label>
											<input class="form-check-input" type="checkbox" id="familyPsInfoDualYes"
												   name="cus-familyPsInfoDual" value="true"
												   onclick="onlyCheck(this, name)">
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="familyPsInfoDualNo">NO&nbsp</label>
											<input class="form-check-input" type="checkbox" id="familyPsInfoDualNo"
												   name="cus-familyPsInfoDual" value="false"
												   onclick="onlyCheck(this, name)">
										</div>
									</td>
								</tr>
								<tr>
									<th>병원(동의)</th>
									<td id="cus-familyPsInfoHos">
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="familyPsInfoHosYes">YES&nbsp</label>
											<input class="form-check-input" type="checkbox" id="familyPsInfoHosYes"
												   name="cus-familyPsInfoHos" value="true"
												   onclick="onlyCheck(this, name)">
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="familyPsInfoHosNo">NO&nbsp</label>
											<input class="form-check-input" type="checkbox" id="familyPsInfoHosNo"
												   name="cus-familyPsInfoHos" value="false"
												   onclick="onlyCheck(this, name)">
										</div>
									</td>
								</tr>
								</tbody>
							</table>

							<div id="cus-packageReservation" style="font-size:14px; color: #5645ed"></div>
							<div id="cus-packageInspection" style="font-size:14px; color: #5645ed"></div>

							<table class="table" id="info2">
								<tbody>
								<tr>
									<th>1차 예약일</th>
									<td>
										<input type="text" id="cus-reservationFirstWishDate" placeholder="" style="width: 100px ;border:none;text-align: center">
										<script>
											$(function () {
												$("#cus-reservationFirstWishDate").datepicker({
													changeMonth: true,
													changeYear: true,
													dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'],
													dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
													monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
													monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
													dateFormat: "yy-mm-dd",
												});
											});
										</script>
									</td>
									<td style="width: 60px">
										<div
												class="btn-save-square"
												style="padding: 0; width: inherit; font-size: 13px"
												onclick="setIpDate(1)"> 확정
										</div>
									</td>
								</tr>
								<tr>
									<th>2차 예약일</th>
									<td>
										<input type="text" id="cus-reservationSecondWishDate" placeholder="" style="width: 100px ;border:none;text-align: center">
										<script>
											$(function () {
												$("#cus-reservationSecondWishDate").datepicker({
													changeMonth: true,
													changeYear: true,
													dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'],
													dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
													monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
													monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
													dateFormat: "yy-mm-dd",
												});
											});
										</script>
									</td>
									</td>
									<td style="width: 60px">
										<div
												class="btn-save-square"
												style="padding: 0; width: inherit; font-size: 13px"
												onclick="setIpDate(2)"> 확정
										</div>
									</td>
								</tr>
								<tr>
									<th>예약 확정일</th>
									<td colspan="2" id="cus-ipDate" contentEditable="true"></td>
								</tr>
								</tbody>
							</table>
						</div>
						<div class="col">
							<table class="table" id="info3">
								<tbody>
								<tr>
									<th>예약서비스</th>
									<td id="cus-packageServiceName"></td>
								</tr>
								<tr>
									<th>병원</th>
									<td id="cus-packageHospitalName"></td>
								</tr>
								<tr>
									<th>패키지</th>
									<td id="cus-packageName"></td>
								</tr>
								</tbody>
							</table>

							<table class="table" id="info6">
								<tbody>
								</tbody>
							</table>

							<table class="table" id="info4">
								<tbody>
								<tr>
									<th>패키지금액</th>
									<td id="cus-packagePrice"></td>
								</tr>
								<tr>
									<th>회사지원금</th>
									<td id="cus-companySupportPrice" contentEditable="true"></td>
								</tr>
								<tr>
									<th>본인부담금</th>
									<td id="cus-customerPayedPrice"></td>
								</tr>
								</tbody>
							</table>
							<table class="table" id="info5">
								<tbody>
								<tr>
									<th>메모</th>
									<td id="cus-memo" contentEditable="true"></td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<div class="btn-save-square" style="float: right;" onclick="saveInformation()">저장</div>
			</div>
		</div>
	</div>
</div>

<script>
	//고객정보상세
	var rsvId = Object();

	function clickDetail(data) {
		rsvId.reservationId = data;
		instance.post('M003003_REQ_RES', rsvId).then(res => {
			setDetailCustomerData(res.data);
		});
	}

	//클릭시 고객정보
	function setDetailCustomerData(data) {
		console.log(data);

		$("#info6").empty();

		//info1 고객세부정보
		document.getElementById('cus-companyName').innerHTML = data.companyName;
		document.getElementById('cus-companyBranch').innerHTML = data.companyBranch;
		document.getElementById('cus-familyName').innerHTML = data.familyName;
		document.getElementById('cus-familyBirthDate').value = data.familyBirthDate;
		document.getElementById('cus-familyPhone').innerHTML = data.familyPhone;
		document.getElementById('cus-familyAddress').innerHTML = data.familyAddress;
		document.getElementById('cus-familyEmail').innerHTML = data.familyEmail;

		if (data.familyPcDiscount) {
			$("input:checkbox[id='familyPcDiscountYes']").prop("checked", true);
			$("input:checkbox[id='familyPcDiscountNo']").prop("checked", false);
		} else {
			$("input:checkbox[id='familyPcDiscountYes']").prop("checked", false);
			$("input:checkbox[id='familyPcDiscountNo']").prop("checked", true);
		}
		if (data.familyPsInfoDual) {
			$("input:checkbox[id='familyPsInfoDualYes']").prop("checked", true);
			$("input:checkbox[id='familyPsInfoDualNo']").prop("checked", false);
		} else {
			$("input:checkbox[id='familyPsInfoDualYes']").prop("checked", false);
			$("input:checkbox[id='familyPsInfoDualNo']").prop("checked", true);
		}
		if (data.familyPsInfoHos) {
			$("input:checkbox[id='familyPsInfoHosYes']").prop("checked", true);
			$("input:checkbox[id='familyPsInfoHosNo']").prop("checked", false);
		} else {
			$("input:checkbox[id='familyPsInfoHosYes']").prop("checked", false);
			$("input:checkbox[id='familyPsInfoHosNo']").prop("checked", true);
		}

		//info2 예약일
		document.getElementById('cus-packageReservation').innerHTML
				= "예약기간 : " + data.packageReservationStartDate + " ~ " + data.packageReservationEndDate;
		document.getElementById('cus-packageInspection').innerHTML
				= "검진기간 : " + data.packageInspectionStartDate + " ~ " + data.packageInspectionEndDate;
		document.getElementById('cus-reservationFirstWishDate').value = data.reservationFirstWishDate;
		document.getElementById('cus-reservationSecondWishDate').value = data.reservationSecondWishDate;
		document.getElementById('cus-ipDate').innerHTML = data.ipDate;

		//info3 패키지 및 병원
		document.getElementById('cus-packageServiceName').innerHTML = data.packageServiceName;
		document.getElementById('cus-packageHospitalName').innerHTML = data.packageHospitalName;
		document.getElementById('cus-packageName').innerHTML = data.packageName;

		//info6 선택한 패키지 검사 항목
		for (i = 0; i < data.piiList.length; i++) {
			var html = "";
			html += '<tr>';
			html += '<th>' + data.piiList[i].ipClass + '</th>';
			html += '<td>' + data.piiList[i].ipName + '</td>';
			html += '</tr>'
			$("#info6").append(html);
		}

		//info4 금액정보
		document.getElementById('cus-packagePrice').innerHTML = data.packagePrice.toLocaleString();
		document.getElementById('cus-companySupportPrice').innerHTML = data.companySupportPrice.toLocaleString();
		document.getElementById('cus-customerPayedPrice').innerHTML = data.customerPayedPrice.toLocaleString();

		//info5 메모
		document.getElementById('cus-memo').innerHTML = data.memo;
	}

	//예약확정일
	function setIpDate(num) {
		if (num == 1) {
			document.getElementById('cus-ipDate').innerHTML = document.getElementById('cus-reservationFirstWishDate').value;
		} else if (num == 2) {
			document.getElementById('cus-ipDate').innerHTML = document.getElementById('cus-reservationSecondWishDate').value;
		}
	}

	//수정된 정보로 저장
	function saveInformation() {
		var saveItems = new Object();

		saveItems.reservationId = rsvId.reservationId;
		saveItems.familyName = document.getElementById('cus-familyName').innerText;
		saveItems.familyBirthDate = document.getElementById('cus-familyBirthDate').value;
		saveItems.familyPhone = document.getElementById('cus-familyPhone').innerText;
		saveItems.familyAddress = document.getElementById('cus-familyAddress').innerText;
		saveItems.familyEmail = document.getElementById('cus-familyEmail').innerText;

		saveItems.familyPcDiscount = booleanData("cus-familyPcDiscount");
		saveItems.familyPsInfoDual = booleanData("cus-familyPsInfoDual");
		saveItems.familyPsInfoHos = booleanData("cus-familyPsInfoHos");

		saveItems.reservationFirstWishDate = document.getElementById('cus-reservationFirstWishDate').value;
		saveItems.reservationSecondWishDate = document.getElementById('cus-reservationSecondWishDate').value;
		saveItems.ipDate = document.getElementById('cus-ipDate').innerText;
		saveItems.companySupportPrice = savePrice('cus-companySupportPrice');
		saveItems.memo = document.getElementById('cus-memo').innerText;

		console.log(saveItems);

		//입력된 정보 검사
		if (saveItems.familyName == "") {
			alert("성명을 입력해주세요.");
		} else if (saveItems.familyBirthDate == "") {
			alert("생년월일을 입력해주세요.");
		} else if (saveItems.familyPhone == "") {
			alert("연락처를 입력해주세요.");
		} else if (saveItems.familyAddress == "") {
			alert("주소를 입력해주세요.");
		} else if (saveItems.familyEmail == "") {
			alert("이메일을 입력해주세요.");
		} else if (saveItems.reservationFirstWishDate == "") {
			alert("1차 예약일을 입력해주세요.");
		} else if (saveItems.reservationSecondWishDate == "") {
			alert("2차 예약일을 입력해주세요.");
		} else if (!isPhoneNum(saveItems.familyPhone)) {
			alert("올바른 연락처를 입력해주세요.");
		} else if (!isEmail(saveItems.familyEmail)) {
			alert("올바른 이메일을 입력해주세요.");
		} else {
			if (confirm("저장하시겠습니까?") == true) {
				instance.post('M003004_REQ_RES', saveItems).then(res => {
					console.log(res.data.message);
					alert("저장되었습니다.");
					clickDetail(saveItems.reservationId);
				});
			} else {
				return false;
			}
		}
	}
</script>
