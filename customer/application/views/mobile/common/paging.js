//페이징 - 화살표클릭
function pmPageNum(val) {//화살표클릭
	console.log("before: pagingNum: " + pagingNum + ", pageCount: " + pageCount + ", val: " + val);

	pagingNum += parseInt(val);
	if (pagingNum < 0) pagingNum = 0;
	if (pageCount <= pagingNum) pagingNum = pageCount - 1;

	console.log("after: pageNum: " + pagingNum + ", pageCount: " + pageCount + ", val: " + val);
	searchNoticeData(pagingNum);
}
