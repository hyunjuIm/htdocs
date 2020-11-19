<!-- 병원 상세 정보 Modal -->
<div class="modal fade" id="hospitalDetailModal" tabindex="-1" aria-labelledby="hospitalDetailModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog " style="max-width: fit-content; min-width: 1000px; display: table;">
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
						병원정보
					</div>
					<div class="row">
						<div class="col">
							<table class="table" id="HosInfoTable1">
								<tbody>
								<tr>
									<th>병원명</th>
									<td>
										<input class="info-input" type="text" id="hos-name">
									</td>
								</tr>
								<tr>
									<th>지역</th>
									<td>
										<input class="info-input" type="text" id="hos-region" readonly>
									</td>
								</tr>
								<tr>
									<th rowspan="3">주소</th>
									<td>
										<input class="info-input" type="text" id="hos-zipCode" readonly
											   style="background: lightgray;border-radius: 5px"
											   onclick="openAddressSearch('hos-zipCode','hos-address','hos-buildingNum')">
									</td>
								</tr>
								<tr>
									<td style="border: none">
										<input class="info-input" type="text" id="hos-address" readonly>
									</td>
								</tr>
								<tr>
									<td style="border: none">
										<input class="info-input" type="text" id="hos-buildingNum">
									</td>
								</tr>
								<tr>
									<th>등급</th>
									<td>
										<input class="info-input" type="text" id="hos-grade">
									</td>
								</tr>
								<tr>
									<th>대표번호</th>
									<td>
										<input class="info-input" type="text" id="hos-phone">
									</td>
								</tr>
								<tr>
									<th>사업자번호</th>
									<td>
										<input class="info-input" type="text" id="hos-licenseNum">
									</td>
								</tr>
								<tr>
									<th>URL</th>
									<td>
										<input class="info-input" type="text" id="hos-url">
									</td>
								</tr>
								<tr>
									<th>공단차감</th>
									<td id="hos-pcDiscount">
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="pcDiscountYes">YES&nbsp</label>
											<input class="form-check-input" type="checkbox" id="pcDiscountYes"
												   name="hos-pcDiscount" value="true" onclick="onlyCheck(this, name)">
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="pcDiscountNo">NO&nbsp</label>
											<input class="form-check-input" type="checkbox" id="pcDiscountNo"
												   name="hos-pcDiscount" value="false" onclick="onlyCheck(this, name)">
										</div>
									</td>
								</tr>
								<tr>
									<th>공단금액</th>
									<td>
										<input class="info-input" type="text" id="hos-pcPrice">
									</td>
								</tr>
								<tr>
									<th>시스템오픈</th>
									<td id="hos-systemOpen">
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="systemOpenYes">YES&nbsp</label>
											<input class="form-check-input" type="checkbox" id="systemOpenYes"
												   name="hos-systemOpen" value="true" onclick="onlyCheck(this, name)">
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="systemOpenNo">NO&nbsp</label>
											<input class="form-check-input" type="checkbox" id="systemOpenNo"
												   name="hos-systemOpen" value="false" onclick="onlyCheck(this, name)">
										</div>
									</td>
								</tr>
								<tr>
									<th>가능서비스</th>
									<td>
										<input class="info-input" type="text" id="hos-services">
									</td>
								</tr>
								<tr>
									<th>계약유무</th>
									<td id="hos-contract">
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="contractYes">YES&nbsp</label>
											<input class="form-check-input" type="checkbox" id="contractYes"
												   name="hos-contract" value="true" onclick="onlyCheck(this, name)">
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="contractNo">NO&nbsp</label>
											<input class="form-check-input" type="checkbox" id="contractNo"
												   name="hos-contract" value="false" onclick="onlyCheck(this, name)">
										</div>
									</td>
								</tr>
								</tbody>
							</table>
						</div>
						<div class="col">
							<table class="table" id="HosInfoTable2">
								<tbody>
								<tr>
									<th>검사항목</th>
									<td>
										<input class="info-input-num" type="number" min="0" max="10" id="hos-onePoint">점
									</td>
								</tr>
								<tr>
									<th>접근성</th>
									<td>
										<input class="info-input-num" type="number" min="0" max="10" id="hos-twoPoint">점
									</td>
								</tr>
								<tr>
									<th>전문성</th>
									<td>
										<input class="info-input-num" type="number" min="0" max="10" id="hos-threePoint">점
									</td>
								</tr>
								<tr>
									<th>시설</th>
									<td>
										<input class="info-input-num" type="number" min="0" max="10" id="hos-fourPoint">점
									</td>
								</tr>
								</tbody>
							</table>

							<table class="table" id="HosInfoTable3" style="margin-bottom: 60px">
								<tbody>
								<tr>
									<th>공지사항</th>
									<td>
										<input class="info-input" type="text" id="hos-notice">
									</td>
								</tr>
								<tr>
									<th>운영시간</th>
									<td>
										<input class="info-input" type="text" id="hos-operatingHours">
									</td>
								</tr>
								<tr>
									<th>기관정보</th>
									<td>
										<input class="info-input" type="text" id="hos-plusInfo">
									</td>
								</tr>
								</tbody>
							</table>

							<div class="menu-title" style="font-size: 22px;margin-bottom: 20px">
								<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px">
								첨부서식
							</div>

							<div class="fileBox">
								<ul class="img-circle">
									<form id="FILE_FORM" method="post" enctype="multipart/form-data" action="">
										<div style="margin-bottom: 5px">
											<li style="margin-bottom: 5px">
												대표이미지
												<div class="btn-purple-square"
													 onclick="uploadFile('hosImgFile', 'hospital', 'image', hosId.hospitalId)"
													 style="padding: 2px 6px; font-size: 12px; border-radius: 20px">업로드
												</div>
												<div class="btn-light-purple-square"
													 onclick="downloadFile('hosImgFileName', 'hospital', 'image', hosId.hospitalId)"
													 style="padding: 2px 6px; font-size: 12px; border-radius: 20px">다운로드
												</div>
											</li>
											<input type="file" id="hosImgFile" name="hosImgFile"
												   onchange="viewFile(this, 'hosImgFileName')">
											<input id="hosImgFileName" class="upload-name" value="파일선택"
												   disabled="disabled">
											<label for="hosImgFile">파일선택</label>
										</div>

										<div style="margin-bottom: 5px">
											<li style="margin-bottom: 5px">
												사업자등록증
												<div class="btn-purple-square"
													 onclick="uploadFile('hosLicenseFile', 'hospital', 'license', hosId.hospitalId)"
													 style="padding: 2px 6px; font-size: 12px; border-radius: 20px">업로드
												</div>
												<div class="btn-light-purple-square"
													 onclick="downloadFile('hosLicenseFileName', 'hospital', 'license', hosId.hospitalId)"
													 style="padding: 2px 6px; font-size: 12px; border-radius: 20px">다운로드
												</div>
											</li>
											<input type="file" id="hosLicenseFile" name="hosLicenseFile"
												   onchange="viewFile(this, 'hosLicenseFileName')">
											<input id="hosLicenseFileName" class="upload-name" value="파일선택"
												   disabled="disabled">
											<label for="hosLicenseFile">파일선택</label>
										</div>

										<div>
											<li style="margin-bottom: 5px">
												통장사본
												<div class="btn-purple-square"
													 onclick="uploadFile('hosBankFile', 'hospital', 'bankbook', hosId.hospitalId)"
													 style="padding: 2px 6px; font-size: 12px; border-radius: 20px">업로드
												</div>
												<div class="btn-light-purple-square"
													 onclick="downloadFile('hosBankFileName', 'hospital', 'bankbook', hosId.hospitalId)"
													 style="padding: 2px 6px; font-size: 12px; border-radius: 20px">다운로드
												</div>
											</li>
											<input type="file" id="hosBankFile" name="hosBankFile"
												   onchange="viewFile(this, 'hosBankFileName')">
											<input id="hosBankFileName" class="upload-name" value="파일선택"
												   disabled="disabled">
											<label for="hosBankFile">파일선택</label>
										</div>
									</form>
								</ul>
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
	<div class="modal-dialog " style="max-width: fit-content; min-width: 1000px; display: table;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container hospital" style="margin-top: 30px">
					<div class="menu-title" style="font-size: 22px; margin-bottom: 20px">
						<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
						병원정보
					</div>
					<div class="row">
						<div class="col">
							<table class="table" id="HosInfoTable1" style="margin-bottom: 40px">
								<tbody>
								<tr>
									<th>병원명</th>
									<td>
										<input class="info-input" type="text" id="create-hos-name">
									</td>
								</tr>
								<tr>
									<th rowspan="3">주소</th>
									<td>
										<input class="info-input" type="text" id="create-hos-zipCode" placeholder="우편 번호 찾기 클릭" readonly
											   style="background: lightgray;border-radius: 5px"
											   onclick="openAddressSearch('create-hos-zipCode','create-hos-address','create-hos-buildingNum')">
									</td>
								</tr>
								<tr>
									<td style="border: none">
										<input class="info-input" type="text" id="create-hos-address" readonly>
									</td>
								</tr>
								<tr>
									<td style="border: none">
										<input class="info-input" type="text" id="create-hos-buildingNum">
									</td>
								</tr>
								<tr>
									<th>등급</th>
									<td>
										<input class="info-input" type="text" id="create-hos-grade">
									</td>
								</tr>
								<tr>
									<th>대표번호</th>
									<td>
										<input class="info-input" type="text" id="create-hos-phone">
									</td>
								</tr>
								<tr>
									<th>사업자번호</th>
									<td>
										<input class="info-input" type="text" id="create-hos-licenseNum">
									</td>
								</tr>
								<tr>
									<th>URL</th>
									<td>
										<input class="info-input" type="text" id="create-hos-url">
									</td>
								</tr>
								<tr>
									<th>공단차감</th>
									<td id="create-hos-pcDiscount">
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="pcDiscountYes">YES&nbsp</label>
											<input class="form-check-input" type="checkbox" id="pcDiscountYes"
												   name="create-hos-pcDiscount" value="true"
												   onclick="onlyCheck(this, name)">
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="pcDiscountNo">NO&nbsp</label>
											<input class="form-check-input" type="checkbox" id="pcDiscountNo"
												   name="create-hos-pcDiscount" value="false"
												   onclick="onlyCheck(this, name)">
										</div>
									</td>
								</tr>
								<tr>
									<th>공단금액</th>
									<td>
										<input class="info-input" type="text" id="create-hos-pcPrice">
									</td>
								</tr>
								<tr>
									<th>시스템오픈</th>
									<td id="create-hos-systemOpen">
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="systemOpenYes">YES&nbsp</label>
											<input class="form-check-input" type="checkbox" id="systemOpenYes"
												   name="create-hos-systemOpen" value="true"
												   onclick="onlyCheck(this, name)">
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="systemOpenNo">NO&nbsp</label>
											<input class="form-check-input" type="checkbox" id="systemOpenNo"
												   name="create-hos-systemOpen" value="false"
												   onclick="onlyCheck(this, name)">
										</div>
									</td>
								</tr>
								<tr>
									<th>계약유무</th>
									<td id="create-hos-contract">
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="contractYes">YES&nbsp</label>
											<input class="form-check-input" type="checkbox" id="contractYes"
												   name="create-hos-contract" value="true"
												   onclick="onlyCheck(this, name)">
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label" for="contractNo">NO&nbsp</label>
											<input class="form-check-input" type="checkbox" id="contractNo"
												   name="create-hos-contract" value="false"
												   onclick="onlyCheck(this, name)">
										</div>
									</td>
								</tr>
								</tbody>
							</table>
						</div>
						<div class="col">
							<table class="table" id="HosInfoTable2">
								<tbody>
								<tr>
									<th>검사항목</th>
									<td>
										<input class="info-input-num" type="number" min="0" max="10" id="create-hos-onePoint">점
									</td>
								</tr>
								<tr>
									<th>접근성</th>
									<td>
										<input class="info-input-num" type="number" min="0" max="10" id="create-hos-twoPoint">점
									</td>
								</tr>
								<tr>
									<th>전문성</th>
									<td>
										<input class="info-input-num" type="number" min="0" max="10" id="create-hos-threePoint">점
									</td>
								</tr>
								<tr>
									<th>시설</th>
									<td>
										<input class="info-input-num" type="number" min="0" max="10" id="create-hos-fourPoint">점
									</td>
								</tr>
								</tbody>
							</table>

							<table class="table" id="HosInfoTable3" style="margin-bottom: 60px">
								<tbody>
								<tr>
									<th>공지사항</th>
									<td>
										<input class="info-input" type="text" id="create-hos-notice">
									</td>
								</tr>
								<tr>
									<th>운영시간</th>
									<td>
										<input class="info-input" type="text" id="create-hos-operatingHours">
									</td>
								</tr>
								<tr>
									<th>기관정보</th>
									<td>
										<input class="info-input" type="text" id="create-hos-plusInfo">
									</td>
								</tr>
								</tbody>
							</table>
							
							<div class="fileBox" style="margin-bottom: 40px;">
								<div class="menu-title" style="font-size: 22px;margin-bottom: 20px">
									<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
									첨부서식
								</div>
								<ul class="img-circle">
									<form id="ADD-FILE_FORM" method="post" enctype="multipart/form-data" action="">
										<div style="margin-bottom: 5px">
											<li style="margin-bottom: 5px">
												대표이미지
												<div class="btn-purple-square"
													 onclick="uploadFile('create-hosImgFile')"
													 style="padding: 2px 6px; font-size: 12px; border-radius: 20px">
													업로드
												</div>
												<div class="btn-light-purple-square"
													 onclick="downloadFile('create-hosImgFileName')"
													 style="padding: 2px 6px; font-size: 12px; border-radius: 20px">
													다운로드
												</div>
											</li>
											<input type="file" id="create-hosImgFile" name="create-hosImgFile"
												   onchange="viewFile(this, 'create-hosImgFileName')">
											<input id="create-hosImgFileName" class="upload-name" value="파일선택"
												   disabled="disabled">
											<label for="create-hosImgFile">파일선택</label>
										</div>

										<div style="margin-bottom: 5px">
											<li style="margin-bottom: 5px">
												사업자등록증
												<div class="btn-purple-square"
													 onclick="uploadFile('create-hosLicenseFile')"
													 style="padding: 2px 6px; font-size: 12px; border-radius: 20px">
													업로드
												</div>
												<div class="btn-light-purple-square"
													 onclick="downloadFile('create-hosLicenseFileName')"
													 style="padding: 2px 6px; font-size: 12px; border-radius: 20px">
													다운로드
												</div>
											</li>
											<input type="file" id="create-hosLicenseFile"
												   name="create-hosLicenseFile"
												   onchange="viewFile(this, 'create-hosLicenseFileName')">
											<input id="create-hosLicenseFileName" class="upload-name" value="파일선택"
												   disabled="disabled">
											<label for="create-hosLicenseFile">파일선택</label>
										</div>

										<div>
											<li style="margin-bottom: 5px">
												통장사본
												<div class="btn-purple-square"
													 onclick="uploadFile('create-hosBankFile')"
													 style="padding: 2px 6px; font-size: 12px; border-radius: 20px">
													업로드
												</div>
												<div class="btn-light-purple-square"
													 onclick="downloadFile('create-hosBankFileName')"
													 style="padding: 2px 6px; font-size: 12px; border-radius: 20px">
													다운로드
												</div>
											</li>
											<input type="file" id="create-hosBankFile" name="create-hosBankFile"
												   onchange="viewFile(this, 'create-hosBankFileName')">
											<input id="create-hosBankFileName" class="upload-name" value="파일선택"
												   disabled="disabled">
											<label for="create-hosBankFile">파일선택</label>
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

<!-- 병원 담당자 정보 Modal -->
<div class="modal fade" id="hospitalManagerModal" tabindex="-1" aria-labelledby="hospitalManagerModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog " style="max-width: fit-content; min-width: 1100px; display: table;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container hospital" style="margin-top: 30px;width: 95%">
					<div class="row" style="display: block">
						<div class="menu-title" style="font-size: 22px; margin-bottom: 20px">
							<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px;">
							담당자정보
						</div>

						<div style="height: 400px; overflow-y: scroll">
							<table id="HosManagerTable" class="table table-hover">
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
					<div class="row">
						<div class="menu-title" style="font-size: 22px; margin-bottom: 20px">
							<img src="/asset/images/bg_h2_tit.png" style="margin-right: 10px">
							담당자추가
							<div class="btn-save-square"
								 style="padding: 2px 6px; font-size: 13px; margin-left: 10px"
								 onclick="addHospitalManagerData()">저장
							</div>
						</div>
						<table class="table" id="HosManagerAddTable" style="margin-bottom: 30px">
							<tbody>
							<tr>
								<th>담당업무</th>
								<td>
									<input class="info-input" type="text" id="add-hos-department">
								</td>
								<th>직통번호</th>
								<td>
									<input class="info-input" type="text" id="add-hos-phone">
								</td>
							</tr>
							<tr>
								<th>이메일</th>
								<td>
									<input class="info-input" type="text" id="add-hos-email">
								</td>
								<th>개인연락처</th>
								<td>
									<input class="info-input" type="text" id="add-hos-directPhone">
								</td>
							</tr>
							<tr>
								<th>비밀번호</th>
								<td>
									<input class="info-input" type="password" id="add-hos-password">
								</td>
								<th>직함</th>
								<td>
									<input class="info-input" type="text" id="add-hos-position">
								</td>
							</tr>
							<tr>
								<th>이름</th>
								<td>
									<input class="info-input" type="text" id="add-hos-name">
								</td>
								<th>SMS수신</th>
								<td id="add-hos-receiveSMS" style="width: 35%">
									<div class="form-check form-check-inline">
										<label class="form-check-label" for="receiveSMSYes">YES&nbsp</label>
										<input class="form-check-input" type="checkbox" id="receiveSMSYes"
											   name="add-hos-receiveSMS" value="true"
											   onclick="onlyCheck(this, name)">
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label" for="receiveSMSNo">NO&nbsp</label>
										<input class="form-check-input" type="checkbox" id="receiveSMSNo"
											   name="add-hos-receiveSMS" value="false"
											   onclick="onlyCheck(this, name)">
									</div>
								</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- 장비현황 Modal -->
<div class="modal fade" id="hospitalEquipmentModal" tabindex="-1" aria-labelledby="hospitalEquipmentModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog " style="max-width: fit-content; min-width: 1300px; display: table;">
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

	//클릭시 병원정보
	function clickHospitalDetail(data) {
		hosId.hospitalId = data;
		instance.post('M005003_REQ_RES', hosId).then(res => {
			setDetailHospitalData(res.data);
		});
	}

	//클릭시 병원정보
	function setDetailHospitalData(data) {
		console.log(data);

		//HosInfoTable1 병원정보
		$("#hos-name").val(data.name);
		$("#hos-region").val(data.region);
		$("#hos-zipCode").val(data.zipCode);
		$("#hos-address").val(data.address);
		$("#hos-buildingNum").val(data.buildingNum);
		$("#hos-phone").val(data.phone);
		$("#hos-licenseNum").val(data.licenseNum);

		if (data.pcDiscount) {
			$("input:checkbox[id='pcDiscountYes']").prop("checked", true);
			$("input:checkbox[id='pcDiscountNo']").prop("checked", false);
		} else {
			$("input:checkbox[id='pcDiscountYes']").prop("checked", false);
			$("input:checkbox[id='pcDiscountNo']").prop("checked", true);
		}

		$("#hos-pcPrice").val(parseInt(data.pcPrice).toLocaleString());

		if (data.systemOpen) {
			$("input:checkbox[id='systemOpenYes']").prop("checked", true);
			$("input:checkbox[id='systemOpenNo']").prop("checked", false);
		} else {
			$("input:checkbox[id='systemOpenYes']").prop("checked", false);
			$("input:checkbox[id='systemOpenNo']").prop("checked", true);
		}

		$("#hos-services").val(regExp(data.services));

		if (data.contract) {
			$("input:checkbox[id='contractYes']").prop("checked", true);
			$("input:checkbox[id='contractNo']").prop("checked", false);
		} else {
			$("input:checkbox[id='contractYes']").prop("checked", false);
			$("input:checkbox[id='contractNo']").prop("checked", true);
		}

		$("#hos-url").val(data.url);
		$("#hosImgFileName").val(data.image);
		$("#hosLicenseFileName").val(data.license);
		$("#hosBankFileName").val(data.bankbook);
		$("#hos-grade").val(data.grade);

		$("#hos-onePoint").val(data.onePoint);
		$("#hos-twoPoint").val(data.twoPoint);
		$("#hos-threePoint").val(data.threePoint);
		$("#hos-fourPoint").val(data.fourPoint);

		$("#hos-notice").val(data.notice);
		$("#hos-operatingHours").val(data.operatingHours);
		$("#hos-plusInfo").val(data.plusInfo);
	}

	//수정된 정보로 저장
	function saveHospitalInformation() {
		var saveItems = new Object();

		saveItems.hospitalId = hosId.hospitalId;
		saveItems.name = $("#hos-name").val();
		saveItems.zipCode = $("#hos-zipCode").val();
		saveItems.address = $("#hos-address").val();
		saveItems.buildingNum = $("#hos-buildingNum").val();
		saveItems.phone = $("#hos-phone").val();
		saveItems.license_num = $("#hos-licenseNum").val();
		saveItems.pcDiscount = booleanData('hos-pcDiscount');
		saveItems.pcPrice = savePrice1('hos-pcPrice');
		saveItems.systemOpen = booleanData('hos-systemOpen');
		saveItems.contract = booleanData('hos-contract');
		saveItems.url = $("#hos-url").val();
		saveItems.grade = $("#hos-grade").val();
		saveItems.image = $("#hosImgFileName").val();
		saveItems.license = $("#hosLicenseFileName").val();
		saveItems.bankbook = $("#hosBankFileName").val();
		saveItems.onePoint = $("#hos-onePoint").val();
		saveItems.twoPoint = $("#hos-twoPoint").val();
		saveItems.threePoint = $("#hos-threePoint").val();
		saveItems.fourPoint = $("#hos-fourPoint").val();
		saveItems.notice = $("#hos-notice").val();
		saveItems.operatingHours = $("#hos-operatingHours").val();
		var plusInfo = $("#hos-plusInfo").val();
		var plusInfoArr = new Array();
		plusInfoArr = plusInfo.split(",");
		saveItems.plusInfo = plusInfoArr;

		console.log(saveItems);

		//입력된 정보 검사
		if (saveItems.name == "") {
			alert("병원명을 입력해주세요.");
		} else if (saveItems.zipCode == "" || saveItems.address == "" || saveItems.buildingNum == "") {
			alert("주소를 입력해주세요.");
		} else if (saveItems.grade == "") {
			alert("등급을 입력해주세요.");
		} else if (saveItems.phone == "") {
			alert("대표번호를 입력해주세요.");
		} else if (saveItems.license_num == "") {
			alert("사업자번호를 입력해주세요.");
		} else if (saveItems.url == "") {
			alert("URL을 입력해주세요.");
		} else if (saveItems.pcPrice == "") {
			alert("공단금액을 입력해주세요.");
		} else {
			if (confirm("저장하시겠습니까?") == true) {
				instance.post('M005005_REQ', saveItems).then(res => {
					console.log(res.data.message);
					alert("저장되었습니다.");
					clickHospitalDetail(saveItems.hospitalId);
				});
			} else {
				return false;
			}
		}
	}

	//클릭시 담당자정보
	function clickHospitalManagerDetail(data) {
		hosId.hospitalId = data;
		instance.post('M005003_2_REQ_RES', hosId).then(res => {
			setHospitalManagerData(res.data);
		});
	}

	//클릭시 담당자정보
	function setHospitalManagerData(data) {
		console.log(data);
		$("#HosManagerTable tbody").empty();

		for (i = 0; i < data.length; i++) {
			var html = '';
			html += '<tr>';
			html += '<td>' + data[i].department + '</td>';
			html += '<td>' + data[i].name + '</td>';
			html += '<td>' + data[i].position + '</td>';
			html += '<td>' + data[i].directPhone + '</td>';
			html += '<td>' + data[i].phone + '</td>';
			html += '<td>' + data[i].email + '</td>';
			if (data[i].receiveSMS) {
				html += '<td>Y</td>';
			} else {
				html += '<td>N</td>';
			}
			html += '</tr>';
			$("#HosManagerTable").append(html);
		}
	}

	//담당자 추가
	function addHospitalManagerData() {
		var saveItems = new Object();

		saveItems.hospitalId = hosId.hospitalId;
		saveItems.department = $("#add-hos-name").val();
		saveItems.email = $("#add-hos-email").val();
		saveItems.password = $("#add-hos-password").val();
		saveItems.name = $("#add-hos-name").val();
		saveItems.phone = $("#add-hos-phone").val();
		saveItems.directPhone = $("#add-hos-directPhone").val();
		saveItems.position = $("#add-hos-position").val();
		saveItems.receiveSMS = booleanData('add-hos-receiveSMS');

		//입력된 정보 검사
		if (saveItems.department == "") {
			alert("사업장을 입력해주세요.");
		} else if (saveItems.email == "") {
			alert("이메일을 입력해주세요.");
		} else if (saveItems.password == "") {
			alert("비밀번호를 입력해주세요.");
		} else if (saveItems.name == "") {
			alert("이름을 입력해주세요.");
		} else if (saveItems.phone == "") {
			alert("직통번호를 입력해주세요.");
		} else if (saveItems.directPhone == "") {
			alert("개인연락처를 입력해주세요.");
		} else if (saveItems.position == "") {
			alert("직함을 입력해주세요.");
		} else if (!isEmail(saveItems.email)) {
			alert("올바른 이메일을 입력해주세요.");
		} else if (!isPhoneNum(saveItems.directPhone)) {
			alert("올바른 연락처를 입력해주세요.");
		} else {
			if (confirm("저장하시겠습니까?") == true) {
				instance.post('M005004_REQ', saveItems).then(res => {
					console.log(res.data.message);
					if (res.data.message == "success") {
						alert("저장되었습니다.");
						clickHospitalManagerDetail(saveItems.hospitalId);
						$("#HosManagerAddTable").find('input').each(function () {
							this.value = '';
						});
					}
				});
			} else {
				return false;
			}
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

		if (confirm("저장하시겠습니까?") == true) {
			instance.post('M005007_REQ', hosEQList).then(res => {
				console.log(res.data.message);
				alert("저장되었습니다.");
			});
		} else {
			return false;
		}
	}

	//병원 신규 등록
	function createHospitalData() {
		var saveItems = new Object();

		saveItems.name = $("#create-hos-name").val();
		saveItems.zipCode = $("#create-hos-zipCode").val();
		saveItems.address = $("#create-hos-address").val();
		saveItems.buildingNum = $("#create-hos-buildingNum").val();
		saveItems.phone = $("#create-hos-phone").val();
		saveItems.license_num = $("#create-hos-licenseNum").val();
		saveItems.pcDiscount = booleanData('create-hos-pcDiscount');
		saveItems.pcPrice = savePrice1('create-hos-pcPrice');
		saveItems.systemOpen = booleanData('create-hos-systemOpen');
		saveItems.contract = booleanData('create-hos-contract');
		saveItems.url = $("#create-hos-url").val();
		saveItems.grade = $("#create-hos-grade").val();
		saveItems.image = $("#create-hosImgFileName").val();
		saveItems.license = $("#create-hosLicenseFileName").val();
		saveItems.bankbook = $("#create-hosBankFileName").val();
		saveItems.onePoint = $("#create-hos-onePoint").val();
		saveItems.twoPoint = $("#create-hos-twoPoint").val();
		saveItems.threePoint = $("#create-hos-threePoint").val();
		saveItems.fourPoint = $("#create-hos-fourPoint").val();
		saveItems.notice = $("#create-hos-notice").val();
		saveItems.operatingHours = $("#create-hos-operatingHours").val();
		var plusInfo = $("#create-hos-plusInfo").val();
		var plusInfoArr = new Array();
		plusInfoArr = plusInfo.split(",");
		saveItems.plusInfo = plusInfoArr;

		console.log(saveItems);

		//입력된 정보 검사
		if (saveItems.name == "") {
			alert("병원명을 입력해주세요.");
		} else if (saveItems.zipCode == "" || saveItems.address == "" || saveItems.buildingNum == "") {
			alert("주소를 입력해주세요.");
		} else if (saveItems.grade == "") {
			alert("등급을 입력해주세요.");
		} else if (saveItems.phone == "") {
			alert("대표번호를 입력해주세요.");
		} else if (saveItems.license_num == "") {
			alert("사업자번호를 입력해주세요.");
		} else if (saveItems.url == "") {
			alert("URL을 입력해주세요.");
		} else if (saveItems.pcPrice == "") {
			alert("공단금액을 입력해주세요.");
		} else {
			if (confirm("저장하시겠습니까?") == true) {
				instance.post('M005006_REQ', saveItems).then(res => {
					console.log(res.data.message);
					if(res.data.message == "success"){
						alert("저장되었습니다.");
						setTimeout(function () {
							location.reload();
						}, 3000);
					}
				});
			} else {
				return false;
			}
		}
	}


</script>
