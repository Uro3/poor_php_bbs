<?php
$name = "";
$content = "";
$err_msg = "";

if(isset($_POST["submit"])) {
    $name = $_POST["name"];
    $content = $_POST["content"];

    if($name === "") {
        $err_msg .= "名前を入力してください<br>";
    }

    if($content === "") {
        $err_msg .= "投稿テキストを入力してください<br>";
    }

    if($err_msg === "") {
        $fp = fopen("post.txt", "a");
        $data = $name."\t".$content."\n";
        fwrite($fp, $data);
        fclose($fp);
        header('Location: index.php');
        exit;
    }
}
?>
