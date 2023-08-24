<?php
session_start();    

// セッション変数が存在しない場合は初期化
if (!isset($_SESSION['errors'])) {
    $_SESSION['errors'] = [];
}

// 送信ボタンが押されたら処理を実行
if (isset($_POST['submit'])){
    // POSTされたデータをエスケープ処理で変数に格納
    $kinds =htmlspecialchars($_POST['kinds'],ENT_QUOTES,'UTF-8',ENT_HTML5);
    $name =htmlspecialchars($_POST['name'],ENT_QUOTES,'UTF-8',ENT_HTML5);
    $email =htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8',ENT_HTML5);
    $content =htmlspecialchars($_POST['content'],ENT_QUOTES,'UTF-8',ENT_HTML5);

    // エラー格納用
    $errors =[];
    $errors =array();

    // もしメールアドレス以外の項目が空白で入ってきた場合エラーで返す・

    if (empty($name) === true){
        $errors['name'] = '※名前を入力してください';
    }

    if(strlen($name) >= 50){
        $errors['name'] = '※名前が長すぎます。正しい名前を入力してください';
    }

    if(empty($content) === true){
        $errors['content'] = '※お問い合わせ内容を入力してください';
    }

    // エラー配列に値がない場合はエラー表示せず、ある場合はエラーを表示する。
    if(count($errors)===0){
        $_SESSION['errors'] = [];
        // 変数に格納してた値をSESSIONに入れる
        $_SESSION['kinds'] =$kinds;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['content'] = $content;

        echo '入力値に問題はありませんでした';
        header('Location:http://localhost:8888/mysite/confirm.php');
    }else{
        $_SESSION['errors'] = $errors;
        foreach($errors as $error){
            echo $error.'</br>';
        }
    }
}

// confirm.phpで戻るボタンが押されたとき、値を保持
if(isset($_GET) && isset($_GET['action']) && isset($_GET['action']) === 'edit'){
    $kinds = $_SESSION['kinds'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $content = $_SESSION['content'];
}
?>

<!-- ヘッダーにデータを受けわたす処理 -->
<?php $title = "自己紹介";?>
<?php $descript = "自己紹介ページになります。";?>
<?php include ("./assets/_inc/header.php");?>
    <div class ="contents">
        <section class ="main_visual">
            <div class ="container">
                <div class ="title">
                    <h1>こつこつと制作中</h1>
                    <p>これからいろいろなもの作っていきます！</p>
                </div>
            </div>
        </section>
    
        <h2 class="contents_title">
            自己紹介
        </h2>
        <section class ="intoroduce">
            <div class ="content-item">
                <div class="text">
                    <p>私の名前は〇〇です。</p>
                    <p>よろしくお願い致します。</p>
                    <p>※ここは今後追加予定</p>
                </div>
            </div>
            <div class= "image-container"> 
                <img src ="./assets/img/profile.jpg" class ="profile_image">
            </div>
        </section>
        <!-- お問い合わせフォーム -->
        <section class="inquiry">
            <h2 class ="inqury_title">お問い合わせ</h2>
                <div class="inqury_form">
                    <form action="index.php" method="post">
                        <div>
                                <input type="radio" name="kinds" value="質問"<?php if(isset($kinds) && $kinds ==="質問") {echo "checked";} else {echo "checked";}?> <label>質問</label>
                                <input type="radio" name="kinds" value="依頼"<?php if(isset($kinds) && $kinds ==="依頼") {echo "checked";}?>><label>依頼</label>
                                <input type="radio" name="kinds" value="その他"<?php if(isset($kinds) && $kinds ==="その他") {echo "cheked";}?>><label>その他</label>
                        </div>
                        <p>お名前</p>
                        <input type="text" name="name" value="<?php if(isset($name)){echo $name;}?>" placeholder="お名前" required>
                        <?php if(isset($errors['name'])) { echo '<p class ="error_message">'.$errors['name'].'</p>'; } ?>
                        <p>メールアドレス</p>
                        <input type="email" name="email" value="<?php if(isset($email)){echo $email;}?>" placeholder="メールアドレス" required>
                        <?php if(isset($errors['email'])) { echo '<p class ="error_message">'.$errors['email'].'</p>'; } ?>
                        <p>お問い合わせ内容</p>
                        <textarea type="text" name="content" placeholder="お問い合わせ内容" rows="5" required><?php if(isset($content)){echo $content;}?></textarea></br>    
                        <?php if(isset($errors['content'])) { echo '<p class="error_message">'.$errors['content'].'</p>'; } ?>
                        <button type="submit" name="submit" value="確認">確認</button>
                    </form>
                </div>

        </section>
    </div> 
<!-- fotterの処理 -->
<?php include ("./assets/_inc/fotter.php");?>