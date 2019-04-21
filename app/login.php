<?php

require_once(__DIR__."/model/User.php");

$errors = array();

if(isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if($email === "") {
        $errors[] = "メースアドレスを入力してください";
    }
    if($password === "") {
        $errors[] = "パスワードを入力してください";
    } else if(mb_strlen(trim($password)) < 8) {
        $errors[] = "不正なパスワードです";
    }

    if(count($errors) === 0) {
        $user = new User();
        $result = $user->verify($email, $password);
        if ($result) {
            $_SESSION['userId'] = $result;
            header('Location: /');
        } else {
            $errors[] = "メールアドレスまたはパスワードが正しくありません";
        }
    }
}
?>
