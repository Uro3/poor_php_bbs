<?php
$fp = fopen("post.txt", "r");
 
$dataArr = array();
while($res = fgets($fp)){
    $tmp = explode("\t", $res);
    if($tmp[0] !== "" && $tmp[1] !== ""){
        $dataArr[] = array(
            "name" => $tmp[0],
            "content" => $tmp[1]
        );
    }
}

fclose($fp);
?>
