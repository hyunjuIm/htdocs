<!-- Modal -->
<div class="modal fade" id="billDetailModal" tabindex="-1" aria-labelledby="billDetailModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" style="max-width: fit-content; min-width: 130rem; display: table">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="padding: 5rem">
				<div class="box-title">
					<img src="/asset/images/icon_title.png">
					<h2 style="font-weight: 300;font-size: 2.3rem">청구상세내역</h2>
				</div>
				<table class="basic-table" id="billDetailTable">
					<thead>
					<th>NO</th>
					<th>상태</th>
					<th>고객사</th>
					<th>사업장</th>
					<th>아이디(사번)</th>
					<th>성명</th>
					<th>관계</th>
					<th>검진완료일</th>
					<th>기업청구금</th>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
	function clickBillDetail(billingId, hosId) {
		$('#billDetailTable > tbody').empty();

		var searchItems = new Object();

		searchItems.billingId = billingId;
		searchItems.hosId = hosId;

		console.log(searchItems)

		instance.post('C0503', searchItems).then(res => {
			console.log(res.data);
			setBillDetailData(res.data);
		});
	}

	function setBillDetailData(data) {
		var html = '';

		for (i = 0; i < data.length; i++) {
			var no = i + 1;
			html += '<tr>' +
					'<td>' + no + '</td>' +
					'<td>' + data[i].status + '</td>' +
					'<td>' + data[i].coName + '</td>' +
					'<td>' + data[i].coBranch + '</td>' +
					'<td>' + data[i].cuId + '</td>' +
					'<td>' + data[i].famName + '</td>' +
					'<td>' + data[i].famGrade + '</td>' +
					'<td>' + data[i].ipDate + '</td>' +
					'<td>' + data[i].coCharge.toLocaleString() + '</td>' +
					'</tr>';
		}
		$("#billDetailTable > tbody").append(html);
	}
</script>
