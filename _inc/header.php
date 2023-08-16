<!-- ヘッダー -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name ="description" content ="<?php echo $description?>"><!-- 各ページのdescriptionを表示する -->
    <title><?php echo $title ?></title> <!--各ページのタイトルを反映させる。 -->
    <link rel ="stylesheet" href="./css/reset.css">
    <link rel ="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="header_flex">
        <header>
            <h1>
                <a href =""><img src ="./img/logo.png"></a>
            </h1>
            <nav class ="pc-nav">
                <ul>
                    <li><a href ="index.php">ホームページ</a></li>
                    <li><a href ="index.php">自己紹介</a></li>
                    <li><a href ="index.php">実績紹介</a></li>
                    <li><a href ="index.php">お問い合わせ</a></li>
                </ul>
            </nav>
        </header>
    </div>