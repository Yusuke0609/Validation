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

//POSTデータは$data変数に入れる
$data = [];
//user_name入力値が空でなければ、値を$data配列に代入する
//user_nameが入力されていなければ空('')を$data配列に代入する
$data['user_name'] = !empty($_POST['user_name'])? $_POST['user_name'] : '';
$data['email'] = !empty($_POST['email'])? $_POST['email'] : '';
$data['password'] = !empty($_POST['email'])? $_POST['email'] : '';

//POSTリクエスト(データが送信)されてきた場合、バリエーション(内容を検証)
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
    <title>ユーザー認証機能</title>
</head>

<body>
    <h1>ユーザー登録</h1>

    <?php if($result): ?>
        <p class="success">処理が完了しました。</p>
    <?php else: ?>
<div class="bg-example">
      <form action="./index.php" method="post">
        <div class="form-group">
          <label for="exampleInputName">名前</label>
          <!-- L77: $errorsのuser_nameが空でなければ errorが表示されます -->
          <!-- L77: $errorsのuser_nameが空であれば okが表示されます。 -->
          <input 
            type="text" 
            name="user_name" 
            id="exampleInputName" 
            placeholder="名前" 
            class="<?php echo !empty($errors['user_name'])? 'error' : 'ok'?>"
            value="<?php echo $data['user_name'] ?>"
          >
        </div>
        <div class="form-group">
          <label for="exampleInputEmail">メールアドレス</label>
          <input 
            type="email" 
            name="email" 
            id="exampleInputEmail" 
            placeholder="メールアドレス"
            class="<?php echo !empty($errors['email'])? 'error' : 'ok'?>"
            value="<?php echo $data['email'] ?>"
          >
        </div>
        <div class="form-group">
          <label for="exampleInputPassword">パスワード</label>
          <input 
            type="password" 
            name="password" 
            id="exampleInputPassword" 
            placeholder="パスワード"
            class="<?php echo !empty($errors['password'])? 'error' : 'ok'?>"
            value="<?php echo $data['password'] ?>"
          >
        </div>
        <button type="submit">登録</button>
      </form>
    </div>
    <?php endif ?>
</body>
</html>