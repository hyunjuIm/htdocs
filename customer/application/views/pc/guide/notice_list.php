<!DOCTYPE HTML>
<html>
<head>
    <title>듀얼헬스케어:공지사항</title>

	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/head.php');
	?>

    <link rel="stylesheet" type="text/css" href="/asset/css/sub-page.css"/>

    <style>
        .notice-table {
            width: 100%;
            font-size: 1.7rem;
            border-top: 2px black solid;
        }

        .notice-table th {
            padding: 1.6rem;
            font-weight: bolder;
        }

        .notice-table tbody {
            border-top: 1px black solid;
        }

        .notice-table tbody tr {
            border-bottom: 1px solid #a7a7a7;
        }

        .notice-table tbody tr:hover {
            background: #f9f9f9;
        }

        .notice-table td {
            padding: 1.3rem;
        }

        .notice-table .title {
            cursor: pointer;
            text-align: left;

			display: inline-block;
			width: 100%;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
        }

        .btn {
            font-size: 1.4rem;
            padding: 0.3rem 1rem;
            cursor: default !important;
        }
    </style>

</head>
<body>

<header>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/header.php');
	?>
</header>

<div class="container-fluid">
    <div class="row" style="display: table">
        <!-- 좌측 사이드바 -->
		<?php
		$parentDir = dirname(__DIR__ . '..');
		require($parentDir . '/menu/side_bar_light.php');
		?>

        <!-- 우측 컨텐츠 -->
        <div class="col"
             style="display: table-cell;min-width: fit-content;margin: 0;padding: 0;color: white;vertical-align: top;">
            <div style="height:100vh; overflow-y: auto;min-height: 90rem;">
                <!-- 상단 메뉴 -->
                <div class="container top-menu"
                     style="background-image: url(../../../../asset/images/title4.jpg)">
                    <div class="row line">
                        <div class="line-content">
                            <img src="/asset/images/icon_home.png">
                            <span>｜</span>
                            <span>이용안내</span>
                            <span>｜</span>
                            <span>공지사항</span>
                        </div>
                    </div>
                    <div class="row wrap" style="height: 22rem">
                        <div class="inner " style="margin: 0 auto; ">
                            <span class="title">이용안내<br></span>
                            Information on Use
                        </div>
                    </div>
                    <div class="row" style="height: 4.5rem">
                        <div style="margin: 0 auto; display: flex">
                            <a href="/customer/notice_list">
                                <div class="title-menu-select" style="border-right: #828282 1px solid">
                                    공지사항
                                </div>
                            </a>
                            <a href="/customer/comparison_hospital">
                                <div class="title-menu" style="border-right: #828282 1px solid">
                                    병원별 검진 항목 비교
                                </div>
                            </a>
                            <a href="/customer/health_checkup_guide">
                                <div class="title-menu">
                                    건강검진 안내
                                </div>
                            </a>
                        </div>
                    </div>
                </div>


                <!-- 컨텐츠내용 -->
                <div style="margin:0 10rem">
                    <div class="container content-view">
                        <div class="row" style="padding-top: 3rem">
                            <div class="sub-title">공지사항</div>
                        </div>
                        <div class="row" style="display: block;margin-top: 5rem">
                            <div style="display: flex; float:right;margin-bottom: 2rem">
                                <input type="text" id="searchWord" class="search-input" placeholder="검색어를 입력하세요"
                                       onkeyup="enterKey()">
                                <div class="search-btn" onclick="searchInformation(0)">
                                    <img src="/asset/images/icon_search.png">
                                </div>
                            </div>
                            <table class="notice-table" id="noticeTable">
                                <thead>
                                <tr>
                                    <th width="10%">NO</th>
                                    <th width="70%">제목</th>
                                    <th>작성자</th>
                                    <th width="15%">작성일</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="row" style="margin-top: 5rem">
                            <form style="margin: 0 auto; width: 85%; padding: 1rem">
                                <div class="page_wrap">
                                    <div class="page_nation" id="paging">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<script>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/check_data.js');
	?>
	<?php
	$parentDir = dirname(__DIR__ . '..');
	require($parentDir . '/common/paging.js');
	?>

    var pageNum = 0;
    var pageCount = 0;

    var userData = new Object();
    userData.cusId = sessionStorage.getItem("userCusID");
    userData.pageNum = pageNum;

    searchInformation(0);

    //페이징-숫자클릭
    function searchInformation(index) {
        if ($("#searchWord").val().length == 1) {
            alert('두 글자 이상 검색어로 입력주세요.');
            return false;
        }

        pageNum = index;
        drawTable();
    }

    //공지 검색
    function drawTable() {
        pageNum = parseInt(pageNum);

        userData.pageNum = pageNum;
        userData.searchWord = $("#searchWord").val();

        instance.post('CU_007_001', userData).then(res => {
            pageCount = 0;
            for (i = 0; i < res.data.count; i += 10) {
                pageCount++;
            }
            setNoticeList(res.data.noticeList, pageNum);

        }).catch(function (error) {
            alert("잘못된 접근입니다.")
        });
    }

    //공지 테이블 셋팅
    function setNoticeList(data, index) {
        setPaging(index);

        $("#noticeTable > tbody").empty();

        if (data.length == 0) {
            var html = '';
            html += '<tr>';
            html += '<td colspan="20">해당하는 결과가 없습니다.</td>';
            html += '</tr>';
            $("#noticeTable > tbody").append(html);
            $("#paging").empty();
            return false;
        }

        for (i = 0; i < data.length; i++) {
            var no = 0;
            if (index == 0) {
                no = index + i;
            } else {
                no = index * 10 + (i + 1);
            }

            var tbody = "";
			if (data[i].createDate.indexOf('9999') != -1) {
				tbody += '<tr style="background: #fdf7f7">' +
						'<td><div class="btn btn-danger">공지</div></td>' +
						'<td class="title point"' +
						'onclick="detailNoticePage(\'' + data[i].id + '\')">' + data[i].title + '</td>';
			} else {
                tbody += '<tr>' +
                    '<td>' + no + '</td>' +
                    '<td class="title" onclick="detailNoticePage(\'' + data[i].id + '\')">' + data[i].title + '</td>';
            }

			if(data[i].createDate.indexOf('9999') != -1) {
				data[i].createDate = '2020-12-22';
			}

            tbody += '<td>' + data[i].author + '</td>' +
                '<td>' + data[i].createDate + '</td>' +
                '<tr>';

            $("#noticeTable").append(tbody);
        }
    }

    //다음 페이지에 공지 id 값 넘기기
    function detailNoticePage(noticeId) {
        location.href = "notice_detail?noticeId=" + noticeId;
    }

</script>

</html>
