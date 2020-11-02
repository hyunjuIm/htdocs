<!-- 기업 상세 정보 Modal -->
<div class="modal fade" id="companyDetailModal" tabindex="-1" aria-labelledby="companyDetailModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog " style="max-width: fit-content; width: 1200px; display: table;">
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
									<th>기업명</th>
									<td id="com-companyName" contentEditable="true"></td>
								</tr>
								<tr>
									<th>사업장명</th>
									<td id="com-companyBranch" contentEditable="true"></td>
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
										<span id="com-reservationStartDate" contentEditable="true"></span>
										~
										<span id="com-reservationEndDate" contentEditable="true"></span>
									</td>
								</tr>
								<tr>
									<th>검진기간</th>
									<td>
										<span id="com-inspectionStartDate" contentEditable="true"></span>
										~
										<span id="com-inspectionEndDate" contentEditable="true"></span>
									</td>
								</tr>
								<tr>
									<th>서비스이용료</th>
									<td id="com-rebatePrice" contentEditable="true"></td>
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
									<th>공단차감</th>
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
												   name="com-familySupport" value="true" onclick="onlyCheck(this, name)">
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="familySupportNo">NO&nbsp</label>
											<input class="form-check-input" type="checkbox" id="familySupportNo"
												   name="com-familySupport" value="false" onclick="onlyCheck(this, name)">
										</div>
									</td>
								</tr>
								</tbody>
							</table>
							<table class="table" id="ComInfoTable2">
								<tbody>
								<tr style="height: 200px">
									<th>관리자메모</th>
									<td id="com-memo" contentEditable="true"></td>
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
										<td id="com-email" contentEditable="true"></td>
									</tr>
									<tr>
										<th>비밀번호</th>
										<td id="com-password" contentEditable="true"></td>
									</tr>
									<tr>
										<th>이름</th>
										<td id="com-name" contentEditable="true"></td>
									</tr>
									<tr>
										<th>연락처</th>
										<td id="com-phone" contentEditable="true"></td>
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
										<td id="com-paymentCode" contentEditable="true"></td>
									</tr>
									<tr>
										<th>지원금방식</th>
										<td id="com-supportFundCode" contentEditable="true"></td>
									</tr>
									<tr>
										<th>추가금액<br>정산방식</th>
										<td id="com-balanceCode" contentEditable="true"></td>
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
	<div class="modal-dialog " style="max-width: fit-content; width: 800px; display: table;">
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
									<th>기업명</th>
									<td id="add-com-name" contentEditable="true"></td>
								</tr>
								<tr>
									<th>사업장</th>
									<td id="add-com-branch" contentEditable="true"></td>
								</tr>
								<tr>
									<th>시스템오픈</th>
									<td id="add-com-systemOpen" contentEditable="true"></td>
								</tr>
								<tr>
									<th>듀얼(동의)</th>
									<td id="cus-familyPsInfoDual">
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="familyPsInfoDualYes">YES&nbsp</label>
											<input class="form-check-input" type="checkbox" id="familyPsInfoDualYes"
												   name="cus-familyPsInfoDual" value="true" onclick="onlyCheck(this, name)">
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="familyPsInfoDualNo">NO&nbsp</label>
											<input class="form-check-input" type="checkbox" id="familyPsInfoDualNo"
												   name="cus-familyPsInfoDual" value="false" onclick="onlyCheck(this, name)">
										</div>
									</td>
								</tr>
								<tr>
									<th>계약유무</th>
									<td id="add-com-contract" contentEditable="true"></td>
								</tr>
								<tr>
									<th>예약기간</th>
									<td>
										<span id="add-com-reservationStartDate" contentEditable="true"></span>
										~
										<span id="add-com-reservationEndDate" contentEditable="true"></span>
									</td>
								</tr>
								<tr>
									<th>검진기간</th>
									<td>
										<span id="add-com-inspectionStartDate" contentEditable="true"></span>
										~
										<span id="add-com-inspectionEndDate" contentEditable="true"></span>
									</td>
								</tr>
								<tr>
									<th>주소</th>
									<td id="add-com-address" contentEditable="true"></td>
								</tr>
								<tr>
									<th>이메일</th>
									<td id="add-com-email" contentEditable="true"></td>
								</tr>
								<tr>
									<th>서비스이용료</th>
									<td id="add-com-rebatePrice" contentEditable="true"></td>
								</tr>
								<tr>
									<th>공단차감</th>
									<td id="add-com-pcDiscount" contentEditable="true"></td>
								</tr>
								<tr>
									<th>가족지원</th>
									<td id="add-com-familySupport" contentEditable="true"></td>
								</tr>
								<tr>
									<th>사업자등록</th>
									<td id="add-com-license" contentEditable="true"></td>
								</tr>
								</tbody>
							</table>
							<table class="table" id="ComInfoTable2">
								<tbody>
								<tr style="height: 200px">
									<th>관리자메모</th>
									<td id="add-com-memo" contentEditable="true"></td>
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
										<td id="add-com-paymentCode" contentEditable="true"></td>
									</tr>
									<tr>
										<th>지원금방식</th>
										<td id="add-com-supportFundCode" contentEditable="true"></td>
									</tr>
									<tr>
										<th>추가금액<br>정산방식</th>
										<td id="add-com-balanceCode" contentEditable="true"></td>
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

	/*
	기업
	 */
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
		console.log(data);

		//ComInfoTable1 기업정보
		document.getElementById('com-companyName').innerHTML = data.companyName;
		document.getElementById('com-companyBranch').innerHTML = data.companyBranch;

		if(data.systemOpen) {
			$("input:checkbox[id='systemOpenYes']").prop("checked", true);
			$("input:checkbox[id='systemOpenNo']").prop("checked", false);
		} else {
			$("input:checkbox[id='systemOpenYes']").prop("checked", false);
			$("input:checkbox[id='systemOpenNo']").prop("checked", true);
		}

		document.getElementById('com-serviceName').innerHTML = regExp(data.serviceName);

		if(data.contract) {
			$("input:checkbox[id='contractYes']").prop("checked", true);
			$("input:checkbox[id='contractNo']").prop("checked", false);
		} else {
			$("input:checkbox[id='contractYes']").prop("checked", false);
			$("input:checkbox[id='contractNo']").prop("checked", true);
		}

		document.getElementById('com-reservationStartDate').innerHTML = data.reservationStartDate;
		document.getElementById('com-reservationEndDate').innerHTML = data.reservationEndDate;
		document.getElementById('com-inspectionStartDate').innerHTML = data.inspectionStartDate;
		document.getElementById('com-inspectionEndDate').innerHTML = data.inspectionEndDate;
		document.getElementById('com-rebatePrice').innerHTML = data.rebatePrice.toLocaleString();

		var packagePrice = Array();
		for (i = 0; i < data.packagePriceList.length; i++) {
			packagePrice[i] = parseInt(data.packagePriceList[i]).toLocaleString();
		}
		document.getElementById('com-packagePriceList').innerHTML = packagePrice.join(" / ");

		var supportPrice = Array();
		for (i = 0; i < data.supportPriceList.length; i++) {
			supportPrice[i] = parseInt(data.supportPriceList[i]).toLocaleString();
		}
		document.getElementById('com-supportPriceList').innerHTML = supportPrice.join(" / ");

		if(data.pcDiscount) {
			$("input:checkbox[id='pcDiscountYes']").prop("checked", true);
			$("input:checkbox[id='pcDiscountNo']").prop("checked", false);
		} else {
			$("input:checkbox[id='pcDiscountYes']").prop("checked", false);
			$("input:checkbox[id='pcDiscountNo']").prop("checked", true);
		}

		if(data.familySupport) {
			$("input:checkbox[id='familySupportYes']").prop("checked", true);
			$("input:checkbox[id='familySupportNo']").prop("checked", false);
		} else {
			$("input:checkbox[id='familySupportYes']").prop("checked", false);
			$("input:checkbox[id='familySupportNo']").prop("checked", true);
		}

		//ComInfoTable2 관리자메모
		document.getElementById('com-memo').innerHTML = data.memo;

		//ComClaimTable 청구정보
		document.getElementById('com-paymentCode').innerHTML = data.paymentCode;
		document.getElementById('com-supportFundCode').innerHTML = data.supportFundCode;
		document.getElementById('com-balanceCode').innerHTML = data.balanceCode;

		//ComFamilyTable 가족미지원
		var fpackagePrice = Array();
		for (i = 0; i < data.fpackagePriceList.length; i++) {
			fpackagePrice[i] = parseInt(data.fpackagePriceList[i]).toLocaleString();
		}
		document.getElementById('com-fpackagePriceList').innerHTML = fpackagePrice.join(" / ");
		var fsupportPrice = Array();
		for (i = 0; i < data.fsupportPriceList.length; i++) {
			fsupportPrice[i] = parseInt(data.fsupportPriceList[i]).toLocaleString();
		}
		document.getElementById('com-fsupportPriceList').innerHTML = fsupportPrice.join(" / ");

		//ComManagerTable 담당자정보
		$("#ComManagerTable").empty();
		for (i = 0; i < data.companyManagerDTOList.length; i++) {
			var html = '';
			html += '<tr style="border-top: 2px solid #424242">';
			html += '<th>이름</th>';
			html += '<td>' + data.companyManagerDTOList[i].name + '</td>';
			html += '</tr>';
			html += '<tr>';
			html += '<th>연락처</th>';
			html += '<td>' + data.companyManagerDTOList[i].phone + '</td>';
			html += '</tr>';
			html += '<tr>';
			html += '<th>이메일</th>';
			html += '<td>' + data.companyManagerDTOList[i].email + '</td>';
			html += '</tr>';

			$("#ComManagerTable").append(html);
		}
	}

	//담당자 추가
	function setCompanyManagerData() {
		var saveItems = new Object();

		saveItems.companyId = cmnId.companyId;
		saveItems.email = document.getElementById('com-email').innerText;
		saveItems.password = document.getElementById('com-password').innerText;
		saveItems.name = document.getElementById('com-name').innerText;
		saveItems.phone = document.getElementById('com-phone').innerText;

		console.log(saveItems);

		if (confirm("저장하시겠습니까?") == true) {
			instance.post('M004004_REQ', saveItems).then(res => {
				console.log(res.data.message);
				if (res.data.message == "success") {
					alert("저장되었습니다.");
					clickCompanyDetail(saveItems.companyId);
					document.getElementById('com-email').innerHTML = "";
					document.getElementById('com-password').innerHTML = "";
					document.getElementById('com-name').innerHTML = "";
					document.getElementById('com-phone').innerHTML = "";
				}
			});
		} else {
			return false;
		}
	}

	//기업 신규 등록
	function createCompanyData() {
		var saveItems = new Object();

		saveItems.name = document.getElementById('add-com-name').innerText;
		saveItems.branch = document.getElementById('add-com-branch').innerText;
		saveItems.systemOpen = document.getElementById('add-com-systemOpen').innerText;
		saveItems.contract = document.getElementById('add-com-contract').innerText;
		saveItems.address = document.getElementById('add-com-address').innerText;
		saveItems.email = document.getElementById('add-com-email').innerText;
		saveItems.rebatePrice = document.getElementById('add-com-rebatePrice').innerText;
		saveItems.pcDiscount = document.getElementById('add-com-pcDiscount').innerText;
		saveItems.paymentCode = document.getElementById('add-com-paymentCode').innerText;
		saveItems.supportFundCode = document.getElementById('add-com-supportFundCode').innerText;
		saveItems.balanceCode = document.getElementById('add-com-balanceCode').innerText;
		saveItems.familySupport = document.getElementById('add-com-familySupport').innerText;
		saveItems.license = document.getElementById('add-com-license').innerText;
		saveItems.memo = document.getElementById('add-com-memo').innerText;
		saveItems.reservationStartDate = document.getElementById('add-com-reservationStartDate').innerText;
		saveItems.reservationEndDate = document.getElementById('add-com-reservationEndDate').innerText;
		saveItems.inspectionStartDate = document.getElementById('add-com-inspectionStartDate').innerText;
		saveItems.inspectionEndDate = document.getElementById('add-com-inspectionEndDate').innerText;


		console.log(saveItems);

		if (confirm("저장하시겠습니까?") == true) {
			instance.post('M004006_REQ', saveItems).then(res => {
				console.log(res.data.message);
				alert("저장되었습니다.");
			});
		} else {
			return false;
		}
	}

	//수정된 정보로 저장
	function saveCompanyInformation() {
		var saveItems = new Object();

		saveItems.companyId = cmnId.companyId;
		saveItems.companyName = document.getElementById('com-companyName').innerText;
		saveItems.companyBranch = document.getElementById('com-companyBranch').innerText;
		saveItems.systemOpen = booleanData("com-systemOpen");
		saveItems.contract = booleanData("com-contract");
		saveItems.reservationStartDate = document.getElementById('com-reservationStartDate').innerText;
		saveItems.reservationEndDate = document.getElementById('com-reservationEndDate').innerText;
		saveItems.inspectionStartDate = document.getElementById('com-inspectionStartDate').innerText;
		saveItems.inspectionEndDate = document.getElementById('com-inspectionEndDate').innerText;
		saveItems.rebatePrice = savePrice('com-rebatePrice');
		saveItems.pcDiscount = booleanData("com-pcDiscount");
		saveItems.familySupport = booleanData("com-familySupport");
		saveItems.memo = document.getElementById('com-memo').innerText;
		saveItems.paymentCode = document.getElementById('com-paymentCode').innerText;
		saveItems.supportFundCode = document.getElementById('com-supportFundCode').innerText;
		saveItems.balanceCode = document.getElementById('com-balanceCode').innerText;

		console.log(saveItems);

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

</script>
