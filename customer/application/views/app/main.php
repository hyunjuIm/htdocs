<!DOCTYPE HTML>
<html>
<head>
    <title>듀얼헬스케어:건강콘텐츠</title>

    <?php
    require('head.php');
    ?>

    <style>
        @font-face {
            font-family: 'S-CoreDream-3Light';
            src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_six@1.2/S-CoreDream-3Light.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'S-CoreDream-5Medium';
            src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_six@1.2/S-CoreDream-5Medium.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        .image {
            width: 100%;
            max-width: 75rem;
            max-height: 60rem;
            position: relative;
        }

        .image img {
            width: 100%;
            height: auto;
        }

        .image span {
            color: #7b1fe2;
            font-family: 'S-CoreDream-5Medium';
        }

        .image .text {
            position: absolute;
            top: 50%;
            left: 10%;
            transform: translate(-10%, -50%);
            font-size: 3rem;
            line-height: 4rem;
            font-family: 'S-CoreDream-3Light';
        }
    </style>

</head>
<body>

<div class="row">
    <div class="image">
        <img src="../../asset/images/main_content.jpg">
        <div class="text">
            <span>나를 위한<br>
                맞춤형<br></span>
            건강콘텐츠
        </div>
    </div>
</div>

<!--xx님을 위한 맞춤 건강정보-->
<div class="row" style="border-bottom: 1.5rem solid whitesmoke">
    <div class="row-padding">
        <div class="row" style="display: inline-block">
            <div class="title1" style="float: left">
                <span id="name">민주</span>님을 위한 맞춤 건강정보
            </div>
            <div style="float: right;margin-top: 0.8rem;padding-right: 2rem">
                <a class="more" href="/app/custom">
                    more
                    <span style="font-size: 1.1rem">
                        <i class="ri-arrow-right-s-line"></i>
                    </span>
                </a>
            </div>
        </div>

        <div class="row title2">
            카드뉴스
        </div>
        <div class="row">
            <div class="contents" id="customCardView">
                <div class="item">
                    <div class="card">
                        <img src="http://placeimg.com/640/480/any" class="card-img-top">
                        <div class="card-body">
                            카드뉴스 제목
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row title2">
            동영상
        </div>
        <div class="row">
            <div class="contents" id="customVideoView">
                <div class="item">
                    <div class="video"
                         onclick="location.href='https://www.youtube.com/watch?v=CPJXRRr4Q5c&feature=share'">
                        <img src="https://www.mangoboard.net/bbs/attachments/5625">
                        <div class="black-layer">
                            <img class="ico-play" src="../../asset/images/ico_play.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 알아두면 쓸모있는 건강정보-->
<div class="row">
    <div class="row-padding" style="padding-bottom: 7rem">
        <div class="row" style="display: inline-block">
            <div class="title1" style="float: left">
                알아두면 쓸모있는 건강정보
            </div>
            <div style="float: right;margin-top: 0.8rem;padding-right: 2rem">
                <a class="more" href="/app/all">
                    more
                    <span style="font-size: 1.1rem">
                        <i class="ri-arrow-right-s-line"></i>
                    </span>
                </a>
            </div>
        </div>


        <div class="row title2" style="padding: 2rem 0 0.5rem 0;font-weight: 400">
            카드뉴스
        </div>
        <div class="row">
            <div class="contents" id="allCardView">
                <div class="item">
                    <div class="card">
                        <img src="http://placeimg.com/640/480/any" class="card-img-top">
                        <div class="card-body">
                            카드뉴스 제목
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row title2">
            동영상
        </div>
        <div class="row">
            <div class="contents" id="allVideoView">
                <div class="item">
                    <div class="video"
                         onclick="location.href='https://www.youtube.com/watch?v=CPJXRRr4Q5c&feature=share'">
                        <img src="https://i.ytimg.com/vi/2fpHY0ACkaE/original.jpg">
                        <div class="black-layer">
                            <img class="ico-play" src="../../asset/images/ico_play.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row title2">
            질병사전
        </div>

        <div style="padding-right: 2rem">
            <div style="width: 100%;padding: 1rem 0">
                <div class="encyclopedia-btn">#식도암</div>
                <div class="encyclopedia-btn">#심근경색</div>
                <div class="encyclopedia-btn">#골다공증</div>
                <div class="encyclopedia-btn">#알츠하이머</div>
                <div class="encyclopedia-btn">#위염</div>
            </div>
            <div style="background-image: url(https://file.dualhealth.kr/healthContent/images/39_image.jpg);
                        background-size: auto 100%; background-position: center;width: 100%;height: 17rem">
            </div>
        </div>
    </div>
</div>
</div>
</div>

<script>

    $(document).ready(function () {
        setCustomContentView();
        setAllContentView();
    });

    function setCustomContentView() {
        $('#customCardView').empty();
        $('#customVideoView').empty();

        for (i = 0; i < 6; i++) {
            var html = '';
            html += '<div class="item">' +
                '<div class="card" onclick="location.href=\'/app/card\'">' +
                '<img src="http://placeimg.com/640/480/any" class="card-img-top">' +
                '<div class="card-body">' +
                '카드뉴스 제목' +
                '</div>' +
                '</div>' +
                '</div>';
            $('#customCardView').append(html);

            var html = '';
            html += '<div class="item">' +
                '<div class="video"' +
                'onclick="location.href=\'https://www.youtube.com/watch?v=CPJXRRr4Q5c&feature=share\'">' +
                '<img src="https://i.ytimg.com/vi/2fpHY0ACkaE/maxresdefault.jpg">' +
                '<div class="black-layer">' +
                '<img class="ico-play" src="../../asset/images/ico_play.png">' +
                '</div>' +
                '</div>' +
                '</div>'
            $('#customVideoView').append(html);
        }
    }

    function setAllContentView() {
        $('#allCardView').empty();
        $('#allVideoView').empty();

        for (i = 0; i < 6; i++) {
            var html = '';
            html += '<div class="item">' +
                '<div class="card" onclick="location.href=\'/app/card\'">' +
                '<img src="http://placeimg.com/640/480/any" class="card-img-top">' +
                '<div class="card-body">' +
                '카드뉴스 제목' +
                '</div>' +
                '</div>' +
                '</div>';
            $('#allCardView').append(html);

            var html = '';
            html += '<div class="item">' +
                '<div class="video"' +
                'onclick="location.href=\'https://www.youtube.com/watch?v=CPJXRRr4Q5c&feature=share\'">' +
                '<img src="https://i.ytimg.com/vi/2fpHY0ACkaE/maxresdefault.jpg">' +
                '<div class="black-layer">' +
                '<img class="ico-play" src="../../asset/images/ico_play.png">' +
                '</div>' +
                '</div>' +
                '</div>'
            $('#allVideoView').append(html);
        }
    }

	sessionStorage.setItem('category', 0);
	sessionStorage.setItem('cardIndex', 0);
	sessionStorage.setItem('videoIndex', 0);
	sessionStorage.setItem('encyclopediaIndex', 0);
</script>

</body>
</html>
