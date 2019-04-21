<?php

require_once(__DIR__."/model/Post.php");

$post = new Post();
$errors = array();
$dataArr = array();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["submit"])) {
        $content = $_POST["content"];
    
        if($content === "") {
            $errors[] = "投稿テキストを入力してください";
        }
    
        if(count($errors) === 0) {
            $result = $post->insert($_SESSION["userId"] ,$content);
            if ($result) {
                header("Location: /board");
            } else {
                $errors[] = "投稿に失敗しました";
            }
        }
    } else if (isset($_POST["delete"])) {
        $postId = $_POST["post_id"];
    
        if($postId === "") {
            $errors[] = "不正なリクエストです";
        }

        if(count($errors) === 0) {
            $result = $post->delete($postId, $_SESSION["userId"]);
            if ($result) {
                header("Location: /board");
            } else {
                $errors[] = "投稿の削除に失敗しました";
            }
        }
    }
}

$dataArr = $post->fetch();
