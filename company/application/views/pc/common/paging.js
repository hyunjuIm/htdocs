//페이징 - 화살표클릭
function pmPageNum(val) {//화살표클릭
	pagingNum += parseInt(val);
	if (pagingNum < 0) pagingNum = 0;
	if (pageCount <= pagingNum) pagingNum = pageCount - 1;

	searchInformation(pagingNum);
}

//페이징 셋팅
function setPaging() {
	$("#paging").empty();

	var html = '';

	var pre = pagingNum - 1;
	if (pre < 0) {
		pre = 0;
	}
	html += '<a class="arrow pprev" onclick= "searchInformation(\'' + 0 + '\')" href="#"></a>'
	html += '<a class="arrow prev" onclick= "pmPageNum(\'' + -1 + '\')" href="#"></a>'
	$("#paging").append(html);

	for (i = 0; i < pageCount; i++) {
		var html = '';

		var num = i + 1;

		if (i == pagingNum) {
			html += '<a onclick= "searchInformation(\'' + i + '\')" class="active">' + num + '</a>';
		} else {
			html += '<a onclick= "searchInformation(\'' + i + '\')" href="#">' + num + '</a>';
		}

		$("#paging").append(html);
	}

	var html = '';
	html += '<a class="arrow next" onclick= "pmPageNum(\'' + 1 + '\')" href="#"></a>'
	html += '<a class="arrow nnext" onclick= "searchInformation(\'' + (pageCount - 1) + '\')" href="#"></a>'
	$("#paging").append(html);
}
