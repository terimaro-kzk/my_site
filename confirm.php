<?php
// sessionを起動する
session_start();

// index.phpで$_SESSIONに格納した値を取得する。
if (isset($_SESSION['kinds'])){
    $kinds = $_SESSION['kinds'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $content = $_SESSION['content'];
}

// トークンの作成
$token = sha1(uniqid(mt_rand(),true));
$_SESSION['token'] = $token;
?>

<!-- ヘッダーにデータを受けわたす処理 -->
<?php $title = "お問い合わせ内容確認";?>
<?php $descript = "お問い合わせ内容を確認するページです 。";?>
<?php include ("./assets/_inc/header.php");?>
    <div>
        <h2>お問い合わせ内容確認</h2>
        <table>
            <tr>
                <th>お問い合わせ種別</th>
                <td><?php echo $kinds; ?></td>
            </tr>
            <tr>
                <th>名前</th>
                <td><?php echo $name; ?></td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td><?php echo nl2br($content); ?></td>
            </tr>
        </table>
        <p>こちらの内容で送信してもよろしいでしょうか？</p>
        <form action="send.php" method="post">
            <input type ="hidden" name="token" value="<?php echo $token ?>">
            <button type="submit" name="send" value="送信">送信</button>
            <a href="index.php?action=edit">戻る</a>
        </form>
    </div>
<!-- fotterの処理 -->
<?php include ("./assets/_inc/fotter.php");?>