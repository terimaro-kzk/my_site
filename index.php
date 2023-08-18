<?php $title = "自己紹介";?>
<?php $descript = "自己紹介ページになります。";?>
<?php include ("./assets/_inc/header.php");?>
    <div class ="contents">
        <h2 class="contents_title">
            自己紹介
        </h2>
        <section class ="intoroduce">
            <div class ="content-item">
                <div class="text">
                    <p>私の名前はてりまろです。</p>
                    <p>よろしくお願い致します。</p>
                </div>
            </div>
            <div class= "image-container"> 
                <img src ="./assets/img/profile.jpg" class ="profile_image">
            </div>
        </section>
        <!-- お問い合わせフォーム -->
        <section class="inquiry">
                <div class="inqury_form">
                    <h2 class ="inqury_title">お問い合わせ</h2>
                    <form action="confirm.php" method="post">
                        名前：<br/>
                        <input type="text" name="name" size="50" value =""/><br/>

                        メールアドレス:<br/>
                        <input type="text" name="email" size="50" value=""><br/>

                        お問い合わせ内容:<br/>
                        <textarea name ="content" cols="50" rows="5"></textarea><br/>
                        
                        <input type="submit" name="submit" value="送信">

                    </form>
                </div>

        </section>
    </div> 

<?php include ("./assets/_inc/fotter.php");?>