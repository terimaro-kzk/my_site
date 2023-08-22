<?php
session_start();
if($_SESSION ['token'] ===$_POST['token']){
    // echo '正常なアクセスです';
    if (isset($_SESSION['kinds'])){
        $kinds = $_SESSION['kinds'];
        $name = $_SESSION['name'];
        $email = str_replace(array("\r","\n"),'',$_SESSION['email']);
        $content = $_SESSION['content'];
    }
    $to = $email;
    $title = $name."様よりお問い合わせがありました";
    $contents = <<<EOD

    ・種別
    {$kinds}

    ・名前
    {$name}

    ・メールアドレス
    {$mail}

    ・内容
    {$content}

    EOD;

    // メール送信の際にきれいに送る為に必要
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");

    $param = "-f" .$to;

    if(mb_send_mail($to,$title,$content,'',$to)){
        $message = '<p>お問い合わせが完了致しました。通常3日以内にお返事致します。ご連絡ありがとうございました</p>';
        // 終了処理とセッションの破棄
        $_SESSION = [];
        if(isset($_COOKIE[session_name()])){
            $params = session_get_cookie_params();
            setcookie(session_name(),'', time() -4200,$params["path"],$params["domain"],$params["secure"],$params['httponly']);
        }
        session_destroy();
    }else{
        $message = '<p>何らかの原因で送信エラーが発生致しました</br>
        しばらく待ってから再度送信してください。</p>';
    }
}else{
    // 直接send.phpにアクセスしてきた場合index.phpに戻す
    header('Location:http://localhost:8888/mysite/index.php');
}
?>
<!-- ヘッダーにデータを受けわたす処理 -->
<?php $title = "自己紹介";?>
<?php $descript = "自己紹介ページになります。";?>
<?php include ("./assets/_inc/header.php");?>
    <div>
        <?php
            if($message !==''){
                echo $message;
            }
        ?>
    <a href ="index.php">ホームに戻る</a>
    
    </div>
<!-- fotterの処理 -->
<?php include ("./assets/_inc/fotter.php");?>