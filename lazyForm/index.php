<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            list-style: none;
        }
        
        body {
            background-color: #fff;
        }
        
        .bg-header {
            width: 100%;
            display: block;
            border-bottom: 4px solid #fad312;
        }
        
        .main {
            width: 850px;
            margin: 0 auto;
        }
        
        .main__slogan {
            display: flex;
            font-size: 24px;
            font-weight: bold;
            align-items: flex-end;
        }
        
        .main__slogan__title {
            margin-bottom: 17px;
        }
        
        .main img {
            margin-left: 173px;
        }
        
        .main__paragraph {
            margin-top: 42px;
            line-height: 1.5em;
        }
        
        .hightlight {
            background-color: #fad312;
        }
        
        .cta {
            margin-top: 104px;
            height: 343px;
            background: url(./img/cta.jpg) center center /cover no-repeat;
            text-align: center;
        }
        
        .cta__wrap {
            z-index: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100%;
        }
        
        .cta__title {
            z-index: 1;
            font-size: 32px;
            font-weight: bold;
        }
        
        .cta__desc {
            margin-top: 34px;
            line-height: 1.5em;
        }
        
        .cta__btn {
            font-size: 14px;
            padding: 14px 77px;
            margin-top: 49px;
            border: 1px solid #000000;
            background-color: #707070;
            cursor: pointer;
            text-decoration: none;
            color: #000;
        }
        
        .cta__btn:hover {
            color: #fff;
        }
        
        footer {
            width: 100%;
            font-size: 13px;
            text-align: center;
            padding: 20px 0;
            background-color: #000;
            color: #999999;
        }
    </style>

</head>

<body>
    <img class="bg-header" src="./img/main_img.jpg" />
    <section class="main">
        <div class="main__slogan">
            <div class="main__slogan__title">
                你知道嗎?拖延...可以拯救世界喔
            </div>
            <img src="./img/main_img.jpg" />
        </div>
        <p class="main__paragraph">有拖延症的人很奇怪，不是所有的事都拖，只有 <span class="hightlight">重要的事才拖</span> 。偏偏就是那些最需要慢條斯理、按部就班的大計畫，才會拖泥帶水。這是為什麼?</p>
        <p class="main__paragraph">我們都<span class="hightlight">不需要戰勝拖延症，而是與之好好相處</span>，就如同我們的恐懼與黑暗面也是。只要理解背後對你的意義，與其【空性】，所有一切本身都是無害的。而且有時候(是有時候喔......)適時的小拖延，也不外乎是激發力醞釀靈感的方法。願各位與拖延症有更好的相處。
        </p>
    </section>
    <section class="cta">
        <div class="cta__wrap">
            <div class="cta__title">我要報名</div>
            <p class="cta__desc">還沒試過拖研究世界的快感嗎? <br> 快來一起參與吧，點以下連結拯救人生
            </p>


            <button onclick="window.location.href='./lazyform.php'" class="cta__btn">線上報名</button>
        </div>
    </section>
    <footer>&copy; 2020 &copy; Copyright. All rights Reserved.</footer>
</body>
<?php
if(isset($_GET['code'])&& $_GET['code'] == 1){
    echo '<script>alert("報名成功")</script>';
}

?>

</html>