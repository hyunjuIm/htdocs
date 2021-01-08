function enterKey() {
	if (window.event.keyCode == 13) {
		// 엔터키가 눌렸을 때 실행할 내용
		searchInformation(0);
	}
}

//페이징-화살표클릭
function pmPageNum(val) {//화살표클릭
	pageNum = Math.floor(parseInt(val) / 10) * 10;
	if (pageNum < 0) pageNum = 0;
	if (pageCount <= pageNum) pageNum = pageCount - 1;
	drawTable();
}

//페이징
function setPaging(index) {
	$("#paging").empty();

	var html = "";
	html += '<a class="arrow pprev" onclick= "searchInformation(\'' + 0 + '\')" href="#"></a>'
	html += '<a class="arrow prev" onclick= "pmPageNum(\'' + -10 + '\')" href="#"></a>'

	var start = index - Math.floor((index % 10)) + 1;

	for (i = start; i < (start + 10); i++) {
		if ((i - 1) < pageCount) {
			if (i == index + 1) {
				html += '<a onclick= "searchInformation(\'' + (i - 1) + '\')" class="active">' + i + '</a>';
			} else {
				html += '<a onclick= "searchInformation(\'' + (i - 1) + '\')" href="#">' + i + '</a>';
			}
		}
	}

	html += '<a class="arrow next" onclick= "pmPageNum(\'' + 10 + '\')" href="#"></a>'
	html += '<a class="arrow nnext" onclick= "searchInformation(\'' + (pageCount - 1) + '\')" href="#"></a>'
	$("#paging").append(html);
}
