//페이징 - 화살표클릭
function pmPageNum(val) {//화살표클릭
	pagingNum += parseInt(val);
	if (pagingNum < 0) pagingNum = 0;
	if (pageCount <= pagingNum) pagingNum = pageCount - 1;

	searchNoticeData(pagingNum);
}
