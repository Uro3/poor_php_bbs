<?php
if(isset($_POST["delete"]) && isset($_POST["post_id"])) {
    $id = $_POST["post_id"];
    $filePath = __DIR__."/post.txt";
    $postData = file($filePath);
    unset($postData[$id]);
    file_put_contents($filePath, $postData);
    header("Location: " . $_SERVER['PHP_SELF']);
}
?>
