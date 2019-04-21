<?php
require_once("../lib/session.php");
checkSession(true);
require_once("../post.php");
?>

<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>掲示板</title>
</head>
<body>
    <h1>掲示板</h1>
    <p><a href="/logout">ログアウト</a></p>
    <h2>投稿フォーム</h2>
    <form action="" method="post">
        <label class="form-label">投稿テキスト</label>
        <textarea name="content" class="form-control" cols="30" rows="5"></textarea>
        <input type="submit" name="submit" class="form-button" value="投稿">
    </form>

    <?php foreach( $errors as $error ): ?>
        <p class="error-text"><?php echo $error; ?></p>
    <?php endforeach; ?>

    <h2>投稿一覧</h2>
    <hr>
    <?php foreach( $dataArr as $data ): ?>
        <p>
            <span>投稿者：<?php echo $data["name"]; ?></span>
            &emsp;&emsp;
            <span>投稿日時：<?php echo $data["created_at"]; ?></span>
        </p>
        <p><?php echo $data["text"]; ?></p>
        <?php if ($data["user_id"] === $_SESSION["userId"]): ?>
            <form action="" method="post">
                <input type="hidden" name="post_id" value=<?php echo $data["id"]; ?>>
                <input type="submit" name="delete" class="form-control" value="削除">
            </form>
        <?php endif; ?>
        <hr>
    <?php endforeach; ?>
</body>
</html>
