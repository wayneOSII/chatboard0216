<?php
session_start();
$mbr_id = $_SESSION['mbr_id'];
$mbr_account = $_SESSION['mbr_account'];
print($mbr_id);
print($mbr_account);
// $nickname = $_POST['nickname'];
$message = $_POST['message'];
date_default_timezone_set("Asia/Taipei");
$dt = new DateTime();
$time = $dt->format("Y-m-d H:i:s");
$edit_time = $dt->format("Y-m-d H:i:s");
// print("暱稱：".$nickname."<br>");
print("您輸入的訊息為：".$message."<br>");
print("時間為：".$time."<br>");

require_once("connect_db.php");

$msgData = [$mbr_id,$mbr_account ,$message, $time,$edit_time];
$sql = 'INSERT INTO message(mbr_id,mbr_account,content,create_at,edit_time) VALUES (?,?,?,?,?)';
$sth = $db_link->prepare($sql);
try{
    if($sth->execute($msgData)) {
        echo "
        <script>
            alert('留言成功');
            window.location.replace('../frontend/index.php');
        </script>
        ";
    }else{
        echo"
        <script>
            alert('錯誤1');
            window.location.replace('../frontend/index.php');
        </script>
        ";
    }
} catch(PDOException $e) {
    echo "
        <script>
            alert('錯誤2');
            window.location.replace('../frontend/index.php');
        </script>
        ";
}

?>