<!-- 청구 신규 등록 Modal -->
<div class="modal fade" id="billingCreateModal" tabindex="-1" aria-labelledby="billingCreateModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog " style="max-width: fit-content; min-width: 500px; display: table;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div style="font-size: 22px; display: grid; text-align: center; margin-top: 30px">
					<img src="/asset/images/bg_h2_tit_top.png" style="margin: auto">
					<p style="margin: 10px">신규등록</p>
				</div>
				<div class="container" style="margin-top: 30px">
					<div class="row">
						<div class="col">
							<table class="table" id="billCreateInfoTable">
								<tbody>
								<tr>
									<th>고객사명</th>
									<td colspan="2">
										<select id="billingCompanyName" class="form-control"
												onchange="setBillingModalCompanySelectOption(this, 'billingCompanyBranch')">
											<option>-선택-</option>
										</select>
									</td>
								</tr>
								<tr>
									<th>사업장명</th>
									<td colspan="2">
										<select id="billingCompanyBranch" class="form-control">
											<option>-선택-</option>
										</select>
									</td>
								</tr>
								<tr>
									<th>청구월</th>
									<td colspan="2">
										<select id="billingMonth" class="form-control">
											<option value="2020-01-01">1월</option>
											<option value="2020-02-01">2월</option>
											<option value="2020-03-01">3월</option>
											<option value="2020-04-01">4월</option>
											<option value="2020-05-01">5월</option>
											<option value="2020-06-01">6월</option>
											<option value="2020-07-01">7월</option>
											<option value="2020-08-01">8월</option>
											<option value="2020-09-01">9월</option>
											<option value="2020-10-01">10월</option>
											<option value="2020-11-01">11월</option>
											<option value="2020-12-01">12월</option>
										</select>
									</td>
								</tr>
								<tr>
									<th>기준일</th>
									<td colspan="2" id="billingStandard">
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="billingStandard1">수검일&nbsp</label>
											<input class="form-check-input" type="checkbox" id="billingStandard1"
												   name="billingStandard" value="true"
												   onclick="onlyCheck(this, name)">
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="billingStandard2">결과등록일&nbsp</label>
											<input class="form-check-input" type="checkbox" id="billingStandard2"
												   name="billingStandard" value="false"
												   onclick="onlyCheck(this, name)">
										</div>
									</td>
								</tr>
								<tr>
									<th>기준날짜</th>
									<td>
										<input type="text" id="billingCalculationStartDate" placeholder=""
											   style="border:none;text-align: center;width: 110px">
										<script>
											$(function () {
												$("#billingCalculationStartDate").datepicker({
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
										~
										<input type="text" id="billingCalculationEndDate" placeholder=""
											   style="border:none;text-align: center;width: 110px">
										<script>
											$(function () {
												$("#billingCalculationEndDate").datepicker({
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
									<th>계산서날짜</th>
									<td>
										<input type="text" id="billingCalculationDate" placeholder=""
											   style="border:none;text-align: center">
										<script>
											$(function () {
												$("#billingCalculationDate").datepicker({
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
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="btn-save-square" style="float: right;" onclick="createBillingData()">저장</div>
			</div>
		</div>
	</div>
</div>

<!-- 청구 상세 Modal -->
<div class="modal fade" id="billingDetailModal" tabindex="-1" aria-labelledby="billingDetailModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog " style="max-width: fit-content; min-width: 1500px; display: table;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div style="margin-top: 30px; padding: 20px">
					<div class="menu-title" style="font-size: 22px; margin-bottom: 20px">
						<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
						청구상세
					</div>
					<table id="billDetailModalInfos" class="table table-hover" style="margin-top: 30px">
						<thead>
						<tr>
							<th style="width: 5%">NO</th>
							<th>상태</th>
							<th>서비스</th>
							<th style="width: 10%">고객사</th>
							<th style="width: 10%">사업장</th>
							<th>아이디(사번)</th>
							<th>성명</th>
							<th>관계</th>
							<th>검진완료일</th>
							<th>기업청구금</th>
							<th>공단청구금</th>
							<th>개인부담금</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>

<script>

	//검색항목 리스트
	instance.post('M009001_RES').then(res => {
		setBillingModalSelectData(res.data);
	});

	var billingCompanySelect;

	//검색 selector
	function setBillingModalSelectData(data) {

		var name = [];
		var nameSize = 0;

		//회사
		for (var i = 0; i < data.length; i++) {
			var check = 0;

			//회사명 - 지점있을때
			for (var j = 0; j < nameSize; j++) {
				if (name[j] == data[i].coName) {
					check += 1;
				}
			}
			if (check < 1) {
				name[nameSize] = data[i].coName;
				nameSize += 1;
			}
		}

		for (i = 0; i < nameSize; i++) {
			var html = '';
			html += '<option value=\'' + name[i] + '\'>' + name[i] + '</option>'
			$("#billingCompanyName").append(html);
		}

		billingCompanySelect = data;
	}

	//사업장 리스트 셋팅
	function setBillingModalCompanySelectOption(selectCompany, targetBranch) {
		var branch = document.getElementById(targetBranch);

		var opt = document.createElement("option");
		branch.appendChild(opt);

		removeAll(branch);

		for (i = 0; i < billingCompanySelect.length; i++) {
			if (selectCompany.value == billingCompanySelect[i].coName) {
				var opt = document.createElement("option");
				opt.value = billingCompanySelect[i].coId;
				opt.innerHTML = billingCompanySelect[i].coBranch;
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

	//청구 신규 등록
	function createBillingData() {
		var saveItems = new Object();

		saveItems.coId = $("#billingCompanyBranch").val();
		saveItems.billingMonth = $("#billingMonth option:selected").val();
		saveItems.standard = booleanData('billingStandard');
		saveItems.calculationStartDate = document.getElementById('billingCalculationStartDate').value;
		saveItems.calculationEndDate = document.getElementById('billingCalculationEndDate').value;
		saveItems.calculationDate = document.getElementById('billingCalculationDate').value;

		var chkCount = 0;
		var obj = document.getElementsByName('billingStandard');
		for(i=0; i<obj.length; i++){
			if(obj[i].checked){
				chkCount++;
			}
		}

		if ($("#billingCompanyName").val() == "-선택-") {
			alert("고객사를 선택해주세요.")
		} else if ($("#billingCompanyBranch").val() == "-선택-") {
			alert("사업장을 선택해주세요.")
		} else if (chkCount == 0) {
			alert("기준일을 선택해주세요.")
		} else if (saveItems.calculationStartDate == "" || saveItems.calculationEndDate == "") {
			alert("기준날짜를 선택해주세요.");
		} else if (saveItems.calculationDate == "-선택-") {
			alert("계산서날짜를 선택해주세요.")
		} else {
			if (confirm("저장하시겠습니까?") == true) {
				instance.post('M009002_REQ_RES', saveItems).then(res => {
					if (res.data.message == "success") {
						alert("저장되었습니다.");
						location.reload();
					}
				});
			} else {
				return false;
			}
		}
	}

	//청구상세 리스트 api 호출
	function clickBillingDetail(bId, hosId) {
		var sendID = new Object();

		sendID.bId = bId;
		sendID.hosId = hosId;


		instance.post('M009008_REQ_RES', sendID).then(res => {
			setBillingModalDetailData(res.data);
		});
	}

	//청구상세 리스트 셋팅
	function setBillingModalDetailData(data) {
		$("#billDetailModalInfos tbody").empty();

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';

			var no = i + 1;
			html += '<td>' + no + '</td>';

			html += '<td>' + data[i].status + '</td>';
			html += '<td>' + data[i].serviceName + '</td>';
			html += '<td>' + data[i].coName + '</td>';
			html += '<td>' + data[i].coBranch + '</td>';
			html += '<td>' + data[i].cuId + '</td>';
			html += '<td>' + data[i].famName + '</td>';
			html += '<td>' + data[i].famGrade + '</td>';
			html += '<td>' + data[i].ipDate + '</td>';
			html += '<td>' + data[i].coCharge + '</td>';
			html += '<td>' + data[i].pcCharge + '</td>';
			html += '<td>' + data[i].psnCharge + '</td>';
			html += '</tr>';

			$("#billDetailModalInfos").append(html);
		}
	}

</script>
