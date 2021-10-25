<?php
require_once('./connect.php');
$result=$conn->query("SELECT * FROM lazyform ORDER BY id ASC");
if(!$result){
    die($conn->error);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        body {
            background-color: rgba(0, 0, 0, .3);
        }
        .wrap {
            box-sizing: border-box;
            max-width: 1440px;
            margin: 10% auto;
            background-color: #fff;
            box-shadow: 1.8px 2.4px 5px 0 rgba(0, 0, 0, .3);
            border-top: 8px solid #fad312;
            padding: 40px 100px;
            min-height:calc(100vh - 357px);
        }
        table {
        border-collapse: collapse;
        width: 100%;
        }
        th{
            background-color: #e5e5e5;
        }
        table, th, td {
        border: 1px solid #d0d0d0;
        }
        th, td{
            padding: 12px 32px;
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

    <div class="wrap">

<h1 class="title">
    新拖延運動報名結果預覽
</h1>
<table>
    <tr>
        <th>#</th>
        <th>暱稱</th>
        <th>電子郵件</th>
        <th>手機號碼</th>
        <th>報名類型</th>
        <th>怎麼知道這個活動的</th>
        <th>其他</th>
    </tr>
    <?php
    while($row=$result->fetch_assoc()){
    ?>
    <tr>
        <td><?= $row['id']?></td>
        <td><?= $row['name']?></td>
        <td><?= $row['email']?></td>
        <td><?= $row['phone']?></td>
        <td><?= $row['choose'] === "1" ? '躺在床上用想像力實作':'趴在地上滑手機找現成的'?></td>
        <td><?= $row['how']?></td>
        <td><?= $row['other']?></td>
    </tr>
    <?php }?>

</table>
    </div>
    <footer>&copy; 2020 &copy; Copyright. All rights Reserved.</footer>


</body>

</html>