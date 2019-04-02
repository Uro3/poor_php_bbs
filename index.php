<?php
require_once("post.php");
require_once("delete.php");
require_once("load.php");
?>

<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>掲示板</title>
</head>
<body>
    <h1>掲示板</h1>
    <h2>投稿フォーム</h2>
    <form action="" method="post">
        <label class="form-label">名前</label>
        <input type="text" name="name" class="form-control">
        <label class="form-label">投稿テキスト</label>
        <textarea name="content" class="form-control" cols="30" rows="5"></textarea>
        <input type="submit" name="submit" class="form-button" value="投稿">
    </form>

    <?php if ($err_msg !== ""): ?>
        <p class="error-text"><?php echo $err_msg; ?></p>
    <?php endif; ?>

    <h2>投稿一覧</h2>
    <hr>
    <?php foreach( $dataArr as $key => $data ): ?>
        <p>投稿者：<?php echo $data["name"]; ?></p>
        <p><?php echo $data["content"]; ?></p>
        <form action="" method="post">
            <input type="hidden" name="post_id" value=<?php echo $key; ?>>
            <input type="submit" name="delete" class="form-control" value="削除">
        </form>
        <hr>
    <?php endforeach; ?>
</body>
</html>
