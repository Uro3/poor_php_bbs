<?php

require_once(__DIR__."/model/User.php");

$errors = array();

if(isset($_POST["register"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if($name === "") {
        $errors[] = "名前を入力してください";
    }
    if($email === "") {
        $errors[] = "メースアドレスを入力してください";
    }
    if($password === "") {
        $errors[] = "パスワードを入力してください";
    } else if(mb_strlen(trim($password)) < 8) {
        $errors[] = "パスワードは8文字以上にしてください";
    }

    if(count($errors) === 0) {
        $user = new User();
        $result = $user->register($name, $email, $password);
        if ($result) {
            header("Location: /");
        }
    }
}
?>
