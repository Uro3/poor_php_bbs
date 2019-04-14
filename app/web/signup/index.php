<?php
require_once("../../register.php");
?>

<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style.css">
    <title>掲示板</title>
</head>
<body>
    <h1>掲示板</h1>
    <h2>ユーザー登録</h2>
    <form action="" method="post">
        <label class="form-label">名前</label>
        <input type="text" name="name" class="form-control">
        <label class="form-label">メールアドレス</label>
        <input type="email" name="email" class="form-control">
        <label class="form-label">パスワード</label>
        <input type="password" name="password" class="form-control">
        <input type="submit" name="register" class="form-button" value="登録">
    </form>

    <?php foreach( $errors as $error ): ?>
        <p class="error-text"><?php echo $error; ?></p>
    <?php endforeach; ?>

</body>
</html>
