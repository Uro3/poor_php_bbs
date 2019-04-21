<?php
require_once("../../lib/session.php");
checkSession(false);
require_once("../../login.php");
?>

<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style.css">
    <title>掲示板</title>
</head>
<body>
    <h1>掲示板</h1>
    <h2>ログイン</h2>
    <form action="" method="post">
        <label class="form-label">メールアドレス</label>
        <input type="email" name="email" class="form-control">
        <label class="form-label">パスワード</label>
        <input type="password" name="password" class="form-control">
        <input type="submit" name="login" class="form-button" value="ログイン">
    </form>

    <?php foreach( $errors as $error ): ?>
        <p class="error-text"><?php echo $error; ?></p>
    <?php endforeach; ?>

    <p><a href="/signup">新規登録はこちら</a></p>
</body>
</html>
