<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <div class="wrap">
        <form class="apply" method="POST" action="./add.php">
            <h1 class="apply__title">
                新拖延運動報名表單
            </h1>
            <p class="apply__text text1">活動日期：2020/12/10 ~ 2020/12/11</p>
            <p class="apply__text text2">活動地點：台北市大安區新生南路二店1號</p>
            <p class="apply__must ">* 必填</p>
            <div class="write write__must write__hideError">
                <div class="write__title ">暱稱</div>
                <div class="write__rtg">
                    <input type="text" name="name" placeholder="您的回答" />
                </div>
                <div class="write__error">
                    請輸入暱稱
                </div>
            </div>
            <div class="write write__must write__hideError">
                <div class="write__title ">電子郵件</div>
                <div class="write__rtg">
                    <input type="email" name="email" placeholder="您的電子郵件" />
                </div>
                <div class="write__error">
                    請輸入電子郵件
                </div>
            </div>
            <div class="write write__must write__hideError">
                <div class="write__title ">手機號碼</div>
                <div class="write__rtg">
                    <input type="tel" name="phone" placeholder="您的手機號碼" />
                </div>
                <div class="write__error">
                    請輸入手機號碼
                </div>
            </div>
            <div class="write write__must write__hideError">
                <div class="write__title ">報名類型</div>
                <div class="write__cir write__firstCir">
                    <label for="first">
                            <input type="radio" name="choose" id="first" value="1"/>
                            躺在床上用想像力實作
                        </label>
                </div>
                <div class="write__cir ">
                    <label for="second">
                            <input type="radio" name="choose" id="second" value="2"/>
                            趴在地上滑手機找現成的
                        </label>
                </div>
                <div class="write__error">
                    請勾選報名類型
                </div>
            </div>
            <div class="write write__must write__hideError">
                <div class="write__title ">怎麼知道這個活動的?</div>
                <div class="write__rtg">
                    <input type="text" name="how" placeholder="您的回答" />
                </div>
                <div class="write__error">
                    請輸入您的回答
                </div>
            </div>
            <div class="write">
                <div class="write__title">其他</div>
                <p class="write__desc">對活動的一些建議</p>
                <div class="write__rtg">
                    <input type="text" name="other" placeholder="您的回答" />
                </div>
            </div>

            <input class="apply__submit" type="submit" />
            <p class="apply__desc">請勿透過表單送出您的密碼。</p>

        </form>

    </div>
    <footer>&copy; 2020 &copy; Copyright. All rights Reserved.</footer>



    <script src="./lazy.js"></script>
</body>

</html>