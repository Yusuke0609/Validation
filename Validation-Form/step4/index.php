<?php
// エラー情報を表示する
// https://www.php.net/manual/ja/errorfunc.configuration.php#ini.error-reporting
ini_set('display_errors', "On");

// 出力する PHP エラーの種類を設定する
// https://www.php.net/manual/ja/function.error-reporting.php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

//エラーを格納する配列
$errors = [];

$result = false;

//データが送信されてきた場合
if(!empty($_POST)) {
    //ユーザー名空の場合
    if(empty($_POST['user_name'])) {
        $errors['user_name'] = '名前を入力してください。';
    }
    if(empty($_POST['email'])) {
        $errors['email'] = 'メールアドレスを入力してください。';
    }
    if(empty($_POST['password'])) {
        $errors['password'] = 'パスワードを入力してください。';
    }
    if(empty($errors)) {
        $result = true;
    }
}
?>
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
    <h1>validation_form</h1>

    <?php if(!empty($errors)): ?>
        <ul class="error-box">
            <?php foreach($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>

    <?php if($result): ?>
        <p class="success">処理が完了しました。</p>
    <?php else: ?>
<div class="bg-example">
      <form action="./index.php" method="post">
        <div class="form-group">
          <label for="exampleInputName">名前</label>
          <input type="text" name="user_name" id="exampleInputName" placeholder="名前">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail">メールアドレス</label>
          <input type="email" name="email" id="exampleInputEmail" placeholder="メールアドレス">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword">パスワード</label>
          <input type="password" name="password" id="exampleInputPassword" placeholder="パスワード">
        </div>
        <button type="submit">登録</button>
      </form>
    </div>
    <?php endif ?>
</body>
</html>