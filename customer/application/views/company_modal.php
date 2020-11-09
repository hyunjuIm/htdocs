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
									<th>기업명</th>
									<td id="com-companyName"
									="true" ></td>
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
										<input type="text" id="com-reservationStartDate" placeholder=""
											   style="width:87px ;border:none;text-align: center;font-size: 13px">
										<script>
											$(function () {
												$("#com-reservationStartDate").datepicker({
													changeMonth: true,
													changeYear: true,
													dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'],
													dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
													monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
													monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
													dateFormat: "yy-mm-dd",
												});
											});
										</script>
										<span style="font-size: 13px">~</span>
										<input type="text" id="com-reservationEndDate" placeholder=""
											   style="width: 87px ;border:none;text-align: center;font-size: 13px">
										<script>
											$(function () {
												$("#com-reservationEndDate").datepicker({
													changeMonth: true,
													changeYear: true,
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
									<th>검진기간</th>
									<td>
										<input type="text" id="com-inspectionStartDate" placeholder=""
											   style="width:87px ;border:none;text-align: center;font-size: 13px">
										<script>
											$(function () {
												$("#com-inspectionStartDate").datepicker({
													changeMonth: true,
													changeYear: true,
													dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'],
													dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
													monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
													monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
													dateFormat: "yy-mm-dd",
												});
											});
										</script>
										<span style="font-size: 13px">~</span>
										<input type="text" id="com-inspectionEndDate" placeholder=""
											   style="width:87px ;border:none;text-align: center;font-size: 13px">
										<script>
											$(function () {
												$("#com-inspectionEndDate").datepicker({
													changeMonth: true,
													changeYear: true,
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
									<th>기업명</th>
									<td id="add-com-name" contentEditable="true"></td>
								</tr>
								<tr>
									<th>사업장</th>
									<td id="add-com-branch" contentEditable="true"></td>
								</tr>
								<tr>
									<th>시스템오픈</th>
									<td id="add-com-systemOpen">
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="add-systemOpenYes">YES&nbsp</label>
											<input class="form-check-input" type="checkbox" id="add-systemOpenYes"
												   name="add-com-systemOpen" value="true" onclick="onlyCheck(this, name)">
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="add-systemOpenNo">NO&nbsp</label>
											<input class="form-check-input" type="checkbox" id="add-systemOpenNo"
												   name="add-com-systemOpen" value="false" onclick="onlyCheck(this, name)">
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
												   name="add-com-contract" value="false" onclick="onlyCheck(this, name)">
										</div>
									</td>
								</tr>
								<tr>
									<th>예약기간</th>
									<td>
										<input type="text" id="add-com-reservationStartDate" placeholder=""
											   style="width:87px ;border:none;text-align: center;font-size: 13px">
										<script>
											$(function () {
												$("#add-com-reservationStartDate").datepicker({
													changeMonth: true,
													changeYear: true,
													dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'],
													dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
													monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
													monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
													dateFormat: "yy-mm-dd",
												});
											});
										</script>
										<span style="font-size: 13px">~</span>
										<input type="text" id="add-com-reservationEndDate" placeholder=""
											   style="width: 87px ;border:none;text-align: center;font-size: 13px">
										<script>
											$(function () {
												$("#add-com-reservationEndDate").datepicker({
													changeMonth: true,
													changeYear: true,
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
									<th>검진기간</th>
									<td>
										<input type="text" id="add-com-inspectionStartDate" placeholder=""
											   style="width:87px ;border:none;text-align: center;font-size: 13px">
										<script>
											$(function () {
												$("#add-com-inspectionStartDate").datepicker({
													changeMonth: true,
													changeYear: true,
													dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'],
													dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
													monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
													monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
													dateFormat: "yy-mm-dd",
												});
											});
										</script>
										<span style="font-size: 13px">~</span>
										<input type="text" id="add-com-inspectionEndDate" placeholder=""
											   style="width:87px ;border:none;text-align: center;font-size: 13px">
										<script>
											$(function () {
												$("#add-com-inspectionEndDate").datepicker({
													changeMonth: true,
													changeYear: true,
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
									<td id="add-com-pcDiscount">
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="add-pcDiscountYes">YES&nbsp</label>
											<input class="form-check-input" type="checkbox" id="add-pcDiscountYes"
												   name="add-com-pcDiscount" value="true" onclick="onlyCheck(this, name)">
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="add-pcDiscountNo">NO&nbsp</label>
											<input class="form-check-input" type="checkbox" id="add-pcDiscountNo"
												   name="add-com-pcDiscount" value="false" onclick="onlyCheck(this, name)">
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
									<td id="add-com-license" contentEditable="true"></td>
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
												<label class="form-check-label" for="add-com-paymentCode1">월별&nbsp</label>
												<input class="form-check-input" type="checkbox" id="add-com-paymentCode1"
													   name="add-com-paymentCode" value="월별"
													   onclick="onlyCheck(this, name)">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label" for="add-com-paymentCode2">분기&nbsp</label>
												<input class="form-check-input" type="checkbox" id="add-com-paymentCode2"
													   name="add-com-paymentCode" value="분기"
													   onclick="onlyCheck(this, name)">
											</div>
											<br>
											<div class="form-check form-check-inline">
												<label class="form-check-label" for="add-com-paymentCode3">연별&nbsp</label>
												<input class="form-check-input" type="checkbox" id="add-com-paymentCode3"
													   name="add-com-paymentCode" value="연별"
													   onclick="onlyCheck(this, name)">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label" for="add-com-paymentCode4">기타&nbsp</label>
												<input class="form-check-input" type="checkbox" id="add-com-paymentCode4"
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
												<label class="form-check-label" for="add-com-balanceCode1">현장결제&nbsp</label>
												<input class="form-check-input" type="checkbox" id="add-com-balanceCode1"
													   name="add-com-balanceCode" value="현장결제"
													   onclick="onlyCheck(this, name)">
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label" for="add-com-balanceCode2">PG&nbsp</label>
												<input class="form-check-input" type="checkbox" id="add-com-balanceCode2"
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
										<td id="add-com-memo" contentEditable="true"></td>
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
		console.log(data);

		//ComInfoTable1 기업정보
		document.getElementById('com-companyName').innerHTML = data.companyName;
		document.getElementById('com-companyBranch').innerHTML = data.companyBranch;

		if (data.systemOpen) {
			$("input:checkbox[id='systemOpenYes']").prop("checked", true);
			$("input:checkbox[id='systemOpenNo']").prop("checked", false);
		} else {
			$("input:checkbox[id='systemOpenYes']").prop("checked", false);
			$("input:checkbox[id='systemOpenNo']").prop("checked", true);
		}

		document.getElementById('com-serviceName').innerHTML = regExp(data.serviceName);

		if (data.contract) {
			$("input:checkbox[id='contractYes']").prop("checked", true);
			$("input:checkbox[id='contractNo']").prop("checked", false);
		} else {
			$("input:checkbox[id='contractYes']").prop("checked", false);
			$("input:checkbox[id='contractNo']").prop("checked", true);
		}

		document.getElementById('com-reservationStartDate').value = data.reservationStartDate;
		document.getElementById('com-reservationEndDate').value = data.reservationEndDate;
		document.getElementById('com-inspectionStartDate').value = data.inspectionStartDate;
		document.getElementById('com-inspectionEndDate').value = data.inspectionEndDate;
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
		document.getElementById('com-memo').innerHTML = data.memo;

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
		document.getElementById('com-fpackagePriceList').innerHTML = fpackagePrice.join(" / ");
		var fsupportPrice = Array();
		for (i = 0; i < data.fsupportPriceList.length; i++) {
			fsupportPrice[i] = parseInt(data.fsupportPriceList[i]).toLocaleString();
		}
		document.getElementById('com-fsupportPriceList').innerHTML = fsupportPrice.join(" / ");

		//담당자 추가 입력폼 초기화
		document.getElementById('com-email').innerHTML = "";
		document.getElementById('com-password').innerHTML = "";
		document.getElementById('com-name').innerHTML = "";
		document.getElementById('com-phone').innerHTML = "";

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

		//입력된 정보 검사
		if (saveItems.email == "") {
			alert("이메일을 입력해주세요.");
		} else if (saveItems.password == "") {
			alert("비밀번호을 입력해주세요.");
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
	}

	//수정된 정보로 저장
	function saveCompanyInformation() {
		var saveItems = new Object();

		saveItems.companyId = cmnId.companyId;
		saveItems.companyName = document.getElementById('com-companyName').innerText;
		saveItems.companyBranch = document.getElementById('com-companyBranch').innerText;
		saveItems.systemOpen = booleanData("com-systemOpen");
		saveItems.contract = booleanData("com-contract");
		saveItems.reservationStartDate = document.getElementById('com-reservationStartDate').value;
		saveItems.reservationEndDate = document.getElementById('com-reservationEndDate').value;
		saveItems.inspectionStartDate = document.getElementById('com-inspectionStartDate').value;
		saveItems.inspectionEndDate = document.getElementById('com-inspectionEndDate').value;
		saveItems.rebatePrice = savePrice('com-rebatePrice');
		saveItems.pcDiscount = booleanData("com-pcDiscount");
		saveItems.familySupport = booleanData("com-familySupport");
		saveItems.memo = document.getElementById('com-memo').innerText;
		saveItems.paymentCode = booleanData('com-paymentCode');
		saveItems.supportFundCode = booleanData('com-supportFundCode');
		saveItems.balanceCode = booleanData('com-balanceCode');

		console.log(saveItems);

		//입력된 정보 검사
		if (saveItems.companyName == "") {
			alert("기업명을 입력해주세요.");
		} else if (saveItems.companyBranch == "") {
			alert("사업장을 입력해주세요.");
		} else if (saveItems.reservationStartDate == "" || saveItems.reservationEndDate == "") {
			alert("예약기간을 선택해주세요.");
		} else if (saveItems.inspectionStartDate == "" || saveItems.inspectionEndDate == "") {
			alert("검진기간을 선택해주세요.");
		} else if (saveItems.paymentCode == null || saveItems.paymentCode == "") {
			alert("청구방식을 선택해주세요.");
		} else if (saveItems.supportFundCode == null ||  saveItems.supportFundCode == "") {
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

		saveItems.name = document.getElementById('add-com-name').innerText;
		saveItems.branch = document.getElementById('add-com-branch').innerText;
		saveItems.systemOpen = booleanData('add-com-systemOpen');
		saveItems.contract = booleanData('add-com-contract');
		saveItems.address = document.getElementById('add-com-address').innerText;
		saveItems.email = document.getElementById('add-com-email').innerText;
		saveItems.rebatePrice = savePrice('add-com-rebatePrice');
		saveItems.pcDiscount = booleanData('add-com-pcDiscount');
		saveItems.paymentCode = booleanData('add-com-paymentCode');
		saveItems.supportFundCode = booleanData('add-com-supportFundCode');
		saveItems.balanceCode = booleanData('add-com-balanceCode');
		saveItems.familySupport = booleanData('add-com-familySupport');
		saveItems.license = document.getElementById('add-com-license').innerText;
		saveItems.memo = document.getElementById('add-com-memo').innerText;
		saveItems.reservationStartDate = document.getElementById('add-com-reservationStartDate').value;
		saveItems.reservationEndDate = document.getElementById('add-com-reservationEndDate').value;
		saveItems.inspectionStartDate = document.getElementById('add-com-inspectionStartDate').value;
		saveItems.inspectionEndDate = document.getElementById('add-com-inspectionEndDate').value;

		console.log(saveItems);

		//입력된 정보 검사
		if (saveItems.name == "") {
			alert("기업명을 입력해주세요.");
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
		} else if (saveItems.supportFundCode == null ||  saveItems.supportFundCode == "") {
			alert("지원금방식을 선택해주세요.");
		} else if (saveItems.balanceCode == null || saveItems.balanceCode == "") {
			alert("추가금액 정산방식을 선택해주세요.");
		} else {
			if (confirm("저장하시겠습니까?") == true) {
				instance.post('M004006_REQ', saveItems).then(res => {
					console.log(res.data.message);
					alert("저장되었습니다.");
				});
			} else {
				return false;
			}
		}
	}

</script>
