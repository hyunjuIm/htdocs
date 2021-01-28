<style>
	table input[type=date] {
		width: 90px;
		border: none;
		text-align: center;
		font-size: 13px;
		outline: none;
	}

	table input[type="date"]::-webkit-calendar-picker-indicator {
		padding: 0;
		margin-left: 3px;
	}

	table input[type=text] {
		width: 100%;
		background: none;
		outline: none;
		border: none;
		text-align: center;
	}

	table textarea {
		width: 100%;
		height: 150px;
		background: none;
		outline: none;
		border: none;
		font-weight: 300;
	}

	.manage-head {
		padding: 3px 0 0 0 !important;
		border: none !important;
	}

	.manage-head:not(:first-child) {
		padding-top: 10px !important;
	}

	.btn {
		font-size: 12px;
		margin-left: 2px;
	}
</style>

<!-- 기업 상세 정보 Modal -->
<div class="modal fade" id="companyDetailModal" tabindex="-1" aria-labelledby="companyDetailModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog " style="max-width: fit-content; min-width: 1200px; display: table;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container company" style="margin-top: 30px">
					<div class="row">
						<div class="col">
							<div class="menu-title" style="font-size: 22px; margin-bottom: 20px">
								<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
								기업정보
							</div>
							<table class="table" id="ComInfoTable1">
								<tbody>
								<tr>
									<th>고객사</th>
									<td>
										<input type="text" id="com-companyName">
									</td>
								</tr>
								<tr>
									<th>사업장</th>
									<td>
										<input type="text" id="com-companyBranch">
									</td>
								</tr>
								<tr>
									<th>시스템오픈</th>
									<td id="com-systemOpen">
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="systemOpenYes">YES&nbsp</label>
											<input class="form-check-input" type="checkbox" id="systemOpenYes"
												   name="com-systemOpen" value="true" onclick="onlyCheck(this, name)">
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="systemOpenNo">NO&nbsp</label>
											<input class="form-check-input" type="checkbox" id="systemOpenNo"
												   name="com-systemOpen" value="false" onclick="onlyCheck(this, name)">
										</div>
									</td>
								</tr>
								<tr>
									<th>서비스</th>
									<td id="com-serviceName"></td>
								</tr>
								<tr>
									<th>계약유무</th>
									<td id="com-contract">
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="contractYes">YES&nbsp</label>
											<input class="form-check-input" type="checkbox" id="contractYes"
												   name="com-contract" value="true" onclick="onlyCheck(this, name)">
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="contractNo">NO&nbsp</label>
											<input class="form-check-input" type="checkbox" id="contractNo"
												   name="com-contract" value="false" onclick="onlyCheck(this, name)">
										</div>
									</td>
								</tr>
								<tr>
									<th>예약기간</th>
									<td>
										<input type="date" id="com-reservationStartDate">
										<span style="font-size: 13px">~</span>
										<input type="date" id="com-reservationEndDate">
									</td>
								</tr>
								<tr>
									<th>검진기간</th>
									<td>
										<input type="date" id="com-inspectionStartDate">
										<span style="font-size: 13px">~</span>
										<input type="date" id="com-inspectionEndDate">
									</td>
								</tr>
								<tr>
									<th>서비스이용료</th>
									<td>
										<input type="text" id="com-rebatePrice" onkeyup="setComma(id, value)">
									</td>
								</tr>
								<tr>
									<th>패키지</th>
									<td id="com-packagePriceList"></td>
								</tr>
								<tr>
									<th>지원금</th>
									<td id="com-supportPriceList"></td>
								</tr>
								<tr>
									<th>공단대상</th>
									<td id="com-pcDiscount">
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="pcDiscountYes">YES&nbsp</label>
											<input class="form-check-input" type="checkbox" id="pcDiscountYes"
												   name="com-pcDiscount" value="true" onclick="onlyCheck(this, name)">
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="pcDiscountNo">NO&nbsp</label>
											<input class="form-check-input" type="checkbox" id="pcDiscountNo"
												   name="com-pcDiscount" value="false" onclick="onlyCheck(this, name)">
										</div>
									</td>
								</tr>
								<tr>
									<th>가족지원</th>
									<td id="com-familySupport">
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="familySupportYes">YES&nbsp</label>
											<input class="form-check-input" type="checkbox" id="familySupportYes"
												   name="com-familySupport" value="true"
												   onclick="onlyCheck(this, name)">
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="familySupportNo">NO&nbsp</label>
											<input class="form-check-input" type="checkbox" id="familySupportNo"
												   name="com-familySupport" value="false"
												   onclick="onlyCheck(this, name)">
										</div>
									</td>
								</tr>
								</tbody>
							</table>
							<table class="table" id="ComInfoTable2">
								<tbody>
								<tr style="height: 200px">
									<th>관리자메모</th>
									<td>
										<textarea id="com-memo"></textarea>
									</td>
								</tr>
								</tbody>
							</table>
						</div>
						<div class="col">
							<div style="margin-bottom: 50px">
								<div class="menu-title" style="font-size: 22px; margin-bottom: 20px">
									<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
									담당자추가
									<div class="btn-save-square"
										 style="padding: 2px 6px; font-size: 13px; margin-left: 10px"
										 onclick="setCompanyManagerData()">저장
									</div>
								</div>
								<table class="table" id="ComManagerAddTable">
									<tbody>
									<tr>
										<th>이메일</th>
										<td>
											<input type="text" id="com-email">
										</td>
									</tr>
									<tr>
										<th>이름</th>
										<td>
											<input type="text" id="com-name">
										</td>
									</tr>
									<tr>
										<th>연락처</th>
										<td>
											<input type="text" id="com-phone" onkeyup="setPhoneHyphen(this)">
										</td>
									</tr>
									</tbody>
								</table>
							</div>

							<div style="margin-bottom: 50px;">
								<div class="menu-title" style="font-size: 22px; margin-bottom: 20px">
									<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
									청구정보
								</div>
								<table class="table" id="ComClaimTable">
									<tbody>
									<tr>
										<th>청구방식</th>
										<td id="com-paymentCode">
											<div class="form-check form-check-inline">
												<label class="form-check-label" for="com-paymentCode1">월별&nbsp</label>
												<input class="form-check-input" type="checkbox" id="com-paymentCode1"
													   name="com-paymentCode" value="월별"
													   onclick="onlyCheck(this, name)">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label" for="com-paymentCode2">분기&nbsp</label>
												<input class="form-check-input" type="checkbox" id="com-paymentCode2"
													   name="com-paymentCode" value="분기"
													   onclick="onlyCheck(this, name)">
											</div>
											<br>
											<div class="form-check form-check-inline">
												<label class="form-check-label" for="com-paymentCode3">연별&nbsp</label>
												<input class="form-check-input" type="checkbox" id="com-paymentCode3"
													   name="com-paymentCode" value="연별"
													   onclick="onlyCheck(this, name)">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label" for="com-paymentCode4">기타&nbsp</label>
												<input class="form-check-input" type="checkbox" id="com-paymentCode4"
													   name="com-paymentCode" value="기타"
													   onclick="onlyCheck(this, name)">
											</div>
										</td>
									</tr>
									<tr>
										<th>지원금방식</th>
										<td id="com-supportFundCode">
											<div class="form-check form-check-inline">
												<label class="form-check-label"
													   for="com-supportFundCode1">계산서&nbsp</label>
												<input class="form-check-input" type="checkbox"
													   id="com-supportFundCode1"
													   name="com-supportFundCode" value="계산서"
													   onclick="onlyCheck(this, name)">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label"
													   for="com-supportFundCode2">법인카드&nbsp</label>
												<input class="form-check-input" type="checkbox"
													   id="com-supportFundCode2"
													   name="com-supportFundCode" value="법인카드"
													   onclick="onlyCheck(this, name)">
											</div>
										</td>
									</tr>
									<tr>
										<th>추가금액<br>정산방식</th>
										<td id="com-balanceCode">
											<div class="form-check form-check-inline">
												<label class="form-check-label" for="com-balanceCode1">현장결제&nbsp</label>
												<input class="form-check-input" type="checkbox" id="com-balanceCode1"
													   name="com-balanceCode" value="현장결제"
													   onclick="onlyCheck(this, name)">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label" for="com-balanceCode2">PG&nbsp</label>
												<input class="form-check-input" type="checkbox" id="com-balanceCode2"
													   name="com-balanceCode" value="PG"
													   onclick="onlyCheck(this, name)">
											</div>
										</td>
									</tr>
									</tbody>
								</table>
							</div>

							<div>
								<div class="menu-title" style="font-size: 22px; margin-bottom: 20px">
									<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
									가족미지원
								</div>
								<table class="table" id="ComFamilyTable">
									<tbody>
									<tr>
										<th>패키지</th>
										<td id="com-fpackagePriceList"></td>
									</tr>
									<tr>
										<th>지원금</th>
										<td id="com-fsupportPriceList"></td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col">
							<div class="menu-title" style="font-size: 22px; margin-bottom: 20px">
								<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
								담당자정보
							</div>
							<div style="height: 890px; overflow-y: scroll">
								<table class="table" id="ComManagerTable">
									<tbody>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<div class="btn-save-square" style="float: right;" onclick="saveCompanyInformation()">저장</div>
			</div>
		</div>
	</div>
</div>

<!-- 기업 신규 생성 Modal -->
<div class="modal fade" id="companyCreateModal" tabindex="-1" aria-labelledby="companyCreateModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog " style="max-width: fit-content; min-width: 800px; display: table;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container company" style="margin-top: 30px">
					<div class="row">
						<div class="col">
							<div class="menu-title" style="font-size: 22px; margin-bottom: 20px">
								<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
								기업정보
							</div>
							<table class="table" id="ComInfoTable1">
								<tbody>
								<tr>
									<th>고객사</th>
									<td>
										<input type="text" id="add-com-name">
									</td>
								</tr>
								<tr>
									<th>사업장</th>
									<td>
										<input type="text" id="add-com-branch">
									</td>
								</tr>
								<tr>
									<th>시스템오픈</th>
									<td id="add-com-systemOpen">
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="add-systemOpenYes">YES&nbsp</label>
											<input class="form-check-input" type="checkbox" id="add-systemOpenYes"
												   name="add-com-systemOpen" value="true"
												   onclick="onlyCheck(this, name)">
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="add-systemOpenNo">NO&nbsp</label>
											<input class="form-check-input" type="checkbox" id="add-systemOpenNo"
												   name="add-com-systemOpen" value="false"
												   onclick="onlyCheck(this, name)">
										</div>
									</td>
								</tr>
								<tr>
									<th>계약유무</th>
									<td id="add-com-contract">
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="add-contractYes">YES&nbsp</label>
											<input class="form-check-input" type="checkbox" id="add-contractYes"
												   name="add-com-contract" value="true" onclick="onlyCheck(this, name)">
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="add-contractNo">NO&nbsp</label>
											<input class="form-check-input" type="checkbox" id="add-contractNo"
												   name="add-com-contract" value="false"
												   onclick="onlyCheck(this, name)">
										</div>
									</td>
								</tr>
								<tr>
									<th>예약기간</th>
									<td>
										<input type="date" id="add-com-reservationStartDate">
										<span style="font-size: 13px">~</span>
										<input type="date" id="add-com-reservationEndDate">
									</td>
								</tr>
								<tr>
									<th>검진기간</th>
									<td>
										<input type="date" id="add-com-inspectionStartDate">
										<span style="font-size: 13px">~</span>
										<input type="date" id="add-com-inspectionEndDate">
									</td>
								</tr>
								<tr>
									<th>주소</th>
									<td>
										<input type="text" id="add-com-address">
									</td>
								</tr>
								<tr>
									<th>이메일</th>
									<td>
										<input type="text" id="add-com-email">
									</td>
								</tr>
								<tr>
									<th>서비스이용료</th>
									<td>
										<input type="text" id="add-com-rebatePrice" onkeyup="setComma(id, value)">
									</td>
								</tr>
								<tr>
									<th>공단대상</th>
									<td id="add-com-pcDiscount">
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="add-pcDiscountYes">YES&nbsp</label>
											<input class="form-check-input" type="checkbox" id="add-pcDiscountYes"
												   name="add-com-pcDiscount" value="true"
												   onclick="onlyCheck(this, name)">
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="add-pcDiscountNo">NO&nbsp</label>
											<input class="form-check-input" type="checkbox" id="add-pcDiscountNo"
												   name="add-com-pcDiscount" value="false"
												   onclick="onlyCheck(this, name)">
										</div>
									</td>
								</tr>
								<tr>
									<th>가족지원</th>
									<td id="add-com-familySupport">
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="add-familySupportYes">YES&nbsp</label>
											<input class="form-check-input" type="checkbox" id="add-familySupportYes"
												   name="add-com-familySupport" value="true"
												   onclick="onlyCheck(this, name)">
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="add-familySupportNo">NO&nbsp</label>
											<input class="form-check-input" type="checkbox" id="add-familySupportNo"
												   name="add-com-familySupport" value="false"
												   onclick="onlyCheck(this, name)">
										</div>
									</td>
								</tr>
								<tr>
									<th>사업자<br>등록번호</th>
									<td>
										<input type="text" id="add-com-license">
									</td>
								</tr>
								</tbody>
							</table>
						</div>
						<div class="col">
							<div style="margin-bottom: 50px;">
								<div class="menu-title" style="font-size: 22px; margin-bottom: 20px">
									<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
									청구정보
								</div>
								<table class="table" id="ComClaimTable">
									<tbody>
									<tr>
										<th>청구방식</th>
										<td id="add-com-paymentCode">
											<div class="form-check form-check-inline">
												<label class="form-check-label"
													   for="add-com-paymentCode1">월별&nbsp</label>
												<input class="form-check-input" type="checkbox"
													   id="add-com-paymentCode1"
													   name="add-com-paymentCode" value="월별"
													   onclick="onlyCheck(this, name)">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label"
													   for="add-com-paymentCode2">분기&nbsp</label>
												<input class="form-check-input" type="checkbox"
													   id="add-com-paymentCode2"
													   name="add-com-paymentCode" value="분기"
													   onclick="onlyCheck(this, name)">
											</div>
											<br>
											<div class="form-check form-check-inline">
												<label class="form-check-label"
													   for="add-com-paymentCode3">연별&nbsp</label>
												<input class="form-check-input" type="checkbox"
													   id="add-com-paymentCode3"
													   name="add-com-paymentCode" value="연별"
													   onclick="onlyCheck(this, name)">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label"
													   for="add-com-paymentCode4">기타&nbsp</label>
												<input class="form-check-input" type="checkbox"
													   id="add-com-paymentCode4"
													   name="add-com-paymentCode" value="기타"
													   onclick="onlyCheck(this, name)">
											</div>
										</td>
									</tr>
									<tr>
										<th>지원금방식</th>
										<td id="add-com-supportFundCode">
											<div class="form-check form-check-inline">
												<label class="form-check-label"
													   for="add-com-supportFundCode1">계산서&nbsp</label>
												<input class="form-check-input" type="checkbox"
													   id="add-com-supportFundCode1"
													   name="add-com-supportFundCode" value="계산서"
													   onclick="onlyCheck(this, name)">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label"
													   for="add-com-supportFundCode2">법인카드&nbsp</label>
												<input class="form-check-input" type="checkbox"
													   id="add-com-supportFundCode2"
													   name="add-com-supportFundCode" value="법인카드"
													   onclick="onlyCheck(this, name)">
											</div>
										</td>
									</tr>
									<tr>
										<th>추가금액<br>정산방식</th>
										<td id="add-com-balanceCode">
											<div class="form-check form-check-inline">
												<label class="form-check-label"
													   for="add-com-balanceCode1">현장결제&nbsp</label>
												<input class="form-check-input" type="checkbox"
													   id="add-com-balanceCode1"
													   name="add-com-balanceCode" value="현장결제"
													   onclick="onlyCheck(this, name)">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label"
													   for="add-com-balanceCode2">PG&nbsp</label>
												<input class="form-check-input" type="checkbox"
													   id="add-com-balanceCode2"
													   name="add-com-balanceCode" value="PG"
													   onclick="onlyCheck(this, name)">
											</div>
										</td>
									</tr>
									</tbody>
								</table>
								<table class="table" id="ComInfoTable2">
									<tbody>
									<tr style="height: 200px">
										<th>관리자메모</th>
										<td>
											<textarea id="add-com-memo"></textarea>
										</td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="btn-save-square" style="float: right;" onclick="createCompanyData()">저장</div>
			</div>
		</div>
	</div>
</div>


<script>
	//기업 정보 상세
	var cmnId = Object();

	function clickCompanyDetail(data) {
		cmnId.companyId = data;
		instance.post('M004003_REQ_RES', cmnId).then(res => {
			setDetailCompanyData(res.data);
		});
	}

	//클릭시 기업정보
	function setDetailCompanyData(data) {
		//ComInfoTable1 기업정보
		$('#com-companyName').val(data.companyName);
		$('#com-companyBranch').val(data.companyBranch);

		if (data.systemOpen) {
			$("input:checkbox[id='systemOpenYes']").prop("checked", true);
			$("input:checkbox[id='systemOpenNo']").prop("checked", false);
		} else {
			$("input:checkbox[id='systemOpenYes']").prop("checked", false);
			$("input:checkbox[id='systemOpenNo']").prop("checked", true);
		}

		$('#com-serviceName').text(regExp(data.serviceName));

		if (data.contract) {
			$("input:checkbox[id='contractYes']").prop("checked", true);
			$("input:checkbox[id='contractNo']").prop("checked", false);
		} else {
			$("input:checkbox[id='contractYes']").prop("checked", false);
			$("input:checkbox[id='contractNo']").prop("checked", true);
		}

		$('#com-reservationStartDate').val(data.reservationStartDate);
		$('#com-reservationEndDate').val(data.reservationEndDate);
		$('#com-inspectionStartDate').val(data.inspectionStartDate);
		$('#com-inspectionEndDate').val(data.inspectionEndDate);

		$('#com-rebatePrice').val(data.rebatePrice.toLocaleString());

		var packagePrice = Array();
		for (i = 0; i < data.packagePriceList.length; i++) {
			packagePrice[i] = parseInt(data.packagePriceList[i]).toLocaleString();
		}
		$('#com-packagePriceList').html(packagePrice.join("<br>"));

		var supportPrice = Array();
		for (i = 0; i < data.supportPriceList.length; i++) {
			supportPrice[i] = parseInt(data.supportPriceList[i]).toLocaleString();
		}
		$('#com-supportPriceList').html(supportPrice.join("<br>"));

		if (data.pcDiscount) {
			$("input:checkbox[id='pcDiscountYes']").prop("checked", true);
			$("input:checkbox[id='pcDiscountNo']").prop("checked", false);
		} else {
			$("input:checkbox[id='pcDiscountYes']").prop("checked", false);
			$("input:checkbox[id='pcDiscountNo']").prop("checked", true);
		}

		if (data.familySupport) {
			$("input:checkbox[id='familySupportYes']").prop("checked", true);
			$("input:checkbox[id='familySupportNo']").prop("checked", false);
		} else {
			$("input:checkbox[id='familySupportYes']").prop("checked", false);
			$("input:checkbox[id='familySupportNo']").prop("checked", true);
		}

		//ComInfoTable2 관리자메모
		$('#com-memo').html(data.memo);

		//ComClaimTable 청구정보
		var chk = document.getElementsByName('com-paymentCode');
		for (var i = 0; i < chk.length; i++) {
			if (chk[i].value == data.paymentCode) {
				chk[i].checked = true;
			} else {
				chk[i].checked = false;
			}
		}
		var chk = document.getElementsByName('com-supportFundCode');
		for (var i = 0; i < chk.length; i++) {
			if (chk[i].value == data.supportFundCode) {
				chk[i].checked = true;
			} else {
				chk[i].checked = false;
			}
		}
		var chk = document.getElementsByName('com-balanceCode');
		for (var i = 0; i < chk.length; i++) {
			if (chk[i].value == data.balanceCode) {
				chk[i].checked = true;
			} else {
				chk[i].checked = false;
			}
		}

		//ComFamilyTable 가족미지원
		var fpackagePrice = Array();
		for (i = 0; i < data.fpackagePriceList.length; i++) {
			fpackagePrice[i] = parseInt(data.fpackagePriceList[i]).toLocaleString();
		}
		$('#com-fpackagePriceList').html(fpackagePrice.join("<br>"));

		var fsupportPrice = Array();
		for (i = 0; i < data.fsupportPriceList.length; i++) {
			fsupportPrice[i] = parseInt(data.fsupportPriceList[i]).toLocaleString();
		}
		$('#com-fsupportPriceList').html(fsupportPrice.join("<br>"));

		//담당자 추가 입력폼 초기화
		$('#com-email').val('');
		$('#com-name').val('');
		$('#com-phone').val('');

		//ComManagerTable 담당자정보
		$("#ComManagerTable").empty();
		for (i = 0; i < data.companyManagerDTOList.length; i++) {
			var id = data.companyManagerDTOList[i].id.replace('#', '');

			var html = '';
			html += '<tr>';
			html += '<td class="manage-head">' +
					'<div style="float: left"><h2>' + (i + 1) + '</h2></div>' +
					'</td>' +
					'<td class="manage-head">' +
					'<div style="display: block;float: right;vertical-align: bottom">' +
					'<div class="btn btn-dark" onclick="updateCompanyManagerData(\'' + data.companyManagerDTOList[i].id + '\')">수정</div>' +
					'<div class="btn btn-danger" onclick="deleteCompanyManagerData(\'' + data.companyManagerDTOList[i].id + '\')">삭제</div>' +
					'</div></td>';
			html += '</tr>';
			html += '<tr style="border-top: 2px solid #424242">';
			html += '<th>이름</th>';
			html += '<td>' +
					'<input type="text" id=\'' + id + 'Name' + '\' value=\'' + data.companyManagerDTOList[i].name + '\'>' +
					'</td>';
			html += '</tr>';
			html += '<tr>';
			html += '<th>연락처</th>';
			html += '<td>' +
					'<input type="text" id=\'' + id + 'Phone' + '\' value=\'' + data.companyManagerDTOList[i].phone + '\' onkeyup="setPhoneHyphen(this)">' +
					'</td>';
			html += '</tr>';
			html += '<tr style="border-bottom: 1px solid #DCDCDC">';
			html += '<th>이메일</th>';
			html += '<td>' +
					'<input type="text" id=\'' + id + 'Email' + '\' value=\'' + data.companyManagerDTOList[i].email + '\'>' +
					'</td>';
			html += '</tr>';

			$("#ComManagerTable").append(html);
		}
	}

	//담당자 추가
	function setCompanyManagerData() {
		var saveItems = new Object();

		saveItems.companyId = cmnId.companyId;
		saveItems.email = $('#com-email').val();
		saveItems.name = $('#com-name').val();
		saveItems.phone = $('#com-phone').val();

		console.log(saveItems);

		//입력된 정보 검사
		if (saveItems.email == "") {
			alert("이메일을 입력해주세요.");
		} else if (saveItems.name == "") {
			alert("이름을 입력해주세요.");
		} else if (saveItems.phone == "") {
			alert("연락처를 입력해주세요.");
		} else if (!isPhoneNum(saveItems.phone)) {
			alert("올바른 연락처를 입력해주세요.");
		} else if (!isEmail(saveItems.email)) {
			alert("올바른 이메일을 입력해주세요.");
		} else {
			if (confirm("저장하시겠습니까?") == true) {
				instance.post('M004004_REQ', saveItems).then(res => {
					console.log(res.data.message);
					if (res.data.message == "success") {
						alert("저장되었습니다.");
						clickCompanyDetail(saveItems.companyId);
						$('#com-email').val('');
						$('#com-name').val('');
						$('#com-phone').val('');
					} else {
						alert('저장에 실패했습니다.');
					}
				});
			} else {
				return false;
			}
		}
	}

	//담당자 수정
	function updateCompanyManagerData(id) {
		var saveItems = new Object();
		saveItems.id = id;

		id = id.replace('#', '');
		saveItems.name = $('#' + id + 'Name').val();
		saveItems.email = $('#' + id + 'Email').val();
		saveItems.phone = $('#' + id + 'Phone').val();

		console.log(saveItems);

		if (confirm("수정된 내용으로 저장하시겠습니까?") == true) {
			instance.post('M0407', saveItems).then(res => {
				console.log(res.data.message);
				if (res.data.message == "success") {
					alert("저장되었습니다.");
					clickCompanyDetail(cmnId.companyId);
				} else {
					alert('저장에 실패하였습니다.');
				}
			});
		} else {
			return false;
		}
	}

	//담당자 삭제
	function deleteCompanyManagerData(id) {
		var sendItems = new Object();
		sendItems.id = id;

		if (confirm("수정된 내용으로 저장하시겠습니까?") == true) {
			instance.post('M0408', sendItems).then(res => {
				console.log(res.data.message);
				if (res.data.message == "success") {
					alert("삭제되었습니다.");
					clickCompanyDetail(cmnId.companyId);
				}
			});
		} else {
			return false;
		}
	}

	//수정된 정보로 저장
	function saveCompanyInformation() {
		var saveItems = new Object();

		saveItems.companyId = cmnId.companyId;
		saveItems.companyName = $('#com-companyName').val();
		saveItems.companyBranch = $('#com-companyBranch').val();
		saveItems.systemOpen = booleanData("com-systemOpen");
		saveItems.contract = booleanData("com-contract");
		saveItems.reservationStartDate = $('#com-reservationStartDate').val();
		saveItems.reservationEndDate = $('#com-reservationEndDate').val();
		saveItems.inspectionStartDate = $('#com-inspectionStartDate').val();
		saveItems.inspectionEndDate = $('#com-inspectionEndDate').val();
		saveItems.rebatePrice = savePrice1('com-rebatePrice');
		saveItems.pcDiscount = booleanData("com-pcDiscount");
		saveItems.familySupport = booleanData("com-familySupport");
		saveItems.memo = $('#com-memo').val();
		saveItems.paymentCode = booleanData('com-paymentCode');
		saveItems.supportFundCode = booleanData('com-supportFundCode');
		saveItems.balanceCode = booleanData('com-balanceCode');

		console.log(saveItems);

		//입력된 정보 검사
		if (saveItems.companyName == "") {
			alert("고객사를 입력해주세요.");
		} else if (saveItems.companyBranch == "") {
			alert("사업장을 입력해주세요.");
		} else if (saveItems.reservationStartDate == "" || saveItems.reservationEndDate == "") {
			alert("예약기간을 선택해주세요.");
		} else if (saveItems.inspectionStartDate == "" || saveItems.inspectionEndDate == "") {
			alert("검진기간을 선택해주세요.");
		} else if (saveItems.paymentCode == null || saveItems.paymentCode == "") {
			alert("청구방식을 선택해주세요.");
		} else if (saveItems.supportFundCode == null || saveItems.supportFundCode == "") {
			alert("지원금방식을 선택해주세요.");
		} else if (saveItems.balanceCode == null || saveItems.balanceCode == "") {
			alert("추가금액 정산방식을 선택해주세요.");
		} else {
			if (confirm("저장하시겠습니까?") == true) {
				instance.post('M004005_REQ', saveItems).then(res => {
					console.log(res.data.message);
					alert("저장되었습니다.");
					clickCompanyDetail(saveItems.companyId);
				});
			} else {
				return false;
			}
		}
	}

	//기업 신규 등록
	function createCompanyData() {
		var saveItems = new Object();

		saveItems.name = $('#add-com-name').val();
		saveItems.branch = $('#add-com-branch').val();
		saveItems.systemOpen = booleanData('add-com-systemOpen');
		saveItems.contract = booleanData('add-com-contract');
		saveItems.address = $('#add-com-address').val();
		saveItems.email = $('#add-com-email').val();
		saveItems.rebatePrice = savePrice1('add-com-rebatePrice');
		saveItems.pcDiscount = booleanData('add-com-pcDiscount');
		saveItems.paymentCode = booleanData('add-com-paymentCode');
		saveItems.supportFundCode = booleanData('add-com-supportFundCode');
		saveItems.balanceCode = booleanData('add-com-balanceCode');
		saveItems.familySupport = booleanData('add-com-familySupport');
		saveItems.license = $('#add-com-license').val();
		saveItems.memo = $('#add-com-memo').val();
		saveItems.reservationStartDate = $('#add-com-reservationStartDate').val();
		saveItems.reservationEndDate = $('#add-com-reservationEndDate').val();
		saveItems.inspectionStartDate = $('#add-com-inspectionStartDate').val();
		saveItems.inspectionEndDate = $('#add-com-inspectionEndDate').val();

		console.log(saveItems);

		//입력된 정보 검사
		if (saveItems.name == "") {
			alert("고객사를 입력해주세요.");
		} else if (saveItems.branch == "") {
			alert("사업장을 입력해주세요.");
		} else if (saveItems.reservationStartDate == "" || saveItems.reservationEndDate == "") {
			alert("예약기간을 선택해주세요.");
		} else if (saveItems.inspectionStartDate == "" || saveItems.inspectionEndDate == "") {
			alert("검진기간을 선택해주세요.");
		} else if (saveItems.address == "") {
			alert("주소를 입력해주세요.");
		} else if (saveItems.email == "") {
			alert("이메일을 입력해주세요.");
		} else if (!isEmail(saveItems.email)) {
			alert("올바른 이메일을 입력해주세요.");
		} else if (saveItems.license == "") {
			alert("사업자등록번호를 입력해주세요.");
		} else if (saveItems.paymentCode == null || saveItems.paymentCode == "") {
			alert("청구방식을 선택해주세요.");
		} else if (saveItems.supportFundCode == null || saveItems.supportFundCode == "") {
			alert("지원금방식을 선택해주세요.");
		} else if (saveItems.balanceCode == null || saveItems.balanceCode == "") {
			alert("추가금액 정산방식을 선택해주세요.");
		} else {
			if (confirm("저장하시겠습니까?") == true) {
				instance.post('M004006_REQ', saveItems).then(res => {
					console.log(res.data.message);
					alert("저장되었습니다.");
					location.reload();
				});
			} else {
				return false;
			}
		}
	}

</script>
