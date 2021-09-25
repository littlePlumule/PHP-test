<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog 部落格</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="nav">
        <h1>Blog</h1>
        <a href="./index.php">首頁</a>
        <a class="active" href="./about.php">關於我</a>
    </nav>
    <div class="wrap">
        <div class="articles">
        <div class="about">
            為什麼是 eleventy？
            我一開始知道這套，是從這篇得知的：為什麼我離開 Medium 用 eleventy 做一個 blog，從文中可以看出 eleventy 的優勢之一就是簡單輕便，而這是我覺得部落格滿重要的一部分。
            
            像是 hexo 這種倒是還好，大部分的 theme 效能都不會到太差，頂多是肥了一點，以我目前的 huli blog 來說，首頁的 lighthouse 跑分在效能上是 81 分，First Contentful Paint 是 3.4 秒，沒有到很差，但有進步空間，而且我這個部落格看起來明明就很簡潔卻花了這麼多時間，代表有很多地方可以改進。
            
            但我看過一些自己建的部落格效能有夠差，跑個好幾秒才有內容出來，這種就完全無法接受。
            
            在上面的文中有介紹了一套 Google AMP tech lead 開發的 eleventy-high-performance-blog，既然標題都已經這樣取了，就代表是以效能為導向。
            
            前陣子我剛好要幫以前的學生們架一個技術共筆部落格，就想到了這套解決方案，並且實際試了一下，結果一鳴驚人，用了之後馬上愛上這一套，整體的滿意度我給五星好評。
            
            如果你對我講到的這個部落格有興趣，連結在這邊：ErrorBaker 技術共筆部落格
            
            eleventy-high-performance-blog 這個模板的好處在於效能真的很快，有幫你處理過很多東西，包括：
            
            圖片的最佳化，自動壓縮、轉換格式以及用 載入，還有原生 lazyload
            幾乎沒有太多 CSS 跟 JS，所以檔案大小很小
            基本的 SEO 都有做
            a11y 有考量進去
            版面簡潔，檔案少，要修改很容易
            除了模板的好處以外，eleventy（以下簡稱 11ty）這一套 SSG 也有些好處，包括：
            
            語法簡單容易上手
            客製化容易
            文件滿詳細的
            值得一提的是這些部落格其實都是給一個人用的，而我要架的部落格預設就是多人共筆，所以會有多個作者，因此本來就需要客製化修改一些東西。而這些修改我大概花了半天到一天左右就搞定了，就把單人部落格變成多人共筆部落格。
            
            eleventy-high-performance-blog 這個模板 + 11ty 這兩套都很簡潔，所以客製化非常容易，檔案少的好處就是你不用花太多時間去找要改哪裡。
            
            身為前端工程師，我覺得有個可以輕鬆客製化的部落格是很不錯的一件事，因為你想嘗試什麼新技術或是做效能最佳化都會容易許多，很快就可以找到要怎麼改。
            
            原本架的那個共筆部落格搞一個段落之後，剛好公司的部落格想要搬家，因此我就拿之前弄好的來改，版面調整一下就有了一個新的部落格：Cymetrics Tech Blog
            
            總結一下，基本上我覺得 11ty 跟 eleventy-high-performance-blog 的優點是：
            
            版面簡潔，適合不喜歡太多東西的人
            修改容易，比較方便做客製化
            部落格效能不錯，載入快速
        </div>
        </div>
    </div>
</body>
</html>