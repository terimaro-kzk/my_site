<?php

// POSTから来てない場合、index.phpに戻す
if($_SERVER["REQUEST_METHOD"] != "POST"){
    header("Locatin : index.php");
}

$errors = [];

if(isset($_POST['submit'])){
    $name = isset($_POST["name"])? $_POST["name"]:"";
    $email = isset($_POST["email"])? $_POST["email"]:"";
    $content = isset($_POST["content"])? $_POST["content"]:"";

    if(trim($name)===''){
        $errors['name'] ="名前を入力してください";
    }

    if(trim($email)===''){
        $errors['email'] ="メールアドレスを入力してください";
    }

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error['email'] ="正しいメールアドレスを指定してください。";
    }

    if(trim($content)===''){
        $errors['content'] ="お問い合わせ内容を入力してください";
    }

    $errors_count = count($errors);

    if($errors_count !==0){
        foreach($errors as $error){
            echo $error.'<br>';
        }
    }
}


$errors_count = count($errors);



?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ内容確認</title>
</head>
<body>
    <h2>問い合わせ内容の確認</h2>
    <form action="sendmail.php" method="post">
        <input type="hidden" name ="name" value="<?php echo htmlspecialchars($name,ENT_QUOTES,'UTF-8');?>">
        <input type="hidden" name ="email" value="<?php echo htmlspecialchars($email,ENT_QUOTES,'UTF-8');?>">
        <input type="hidden" name ="content" value="<?php echo htmlspecialchars($content,ENT_QUOTES,'UTF-8');?>">
        <p>お問い合わせ内容は下記の内容でお間違いないでしょうか？</p>
        <dl>
            <dt>お名前</dt>
            <dd><?php echo htmlspecialchars($name,ENT_QUOTES,'UTF-8')?></dd>
            <dt>メールアドレス</dt>
            <dd><?php echo htmlspecialchars($email  ,ENT_QUOTES,'UTF-8')?></dd>
            <dt>お問い合わせ内容</dt>
            <dd><?php echo htmlspecialchars($content,ENT_QUOTES,'UTF-8')?></dd>
        </dl>
    
        <input type="button" value="戻る" onClick="window.history.back()">
        <input type="submit" value="送信">

    </form>
</body>
</html>