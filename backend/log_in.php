<?php
session_start();
$account = isset($_POST['account']) ? $_POST['account'] : "";
print("您輸入的會員帳號為：" . $account . "</br>");

$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : "";
print("您輸入的會員密碼為：" . $pwd . "</br>");

require_once("connect_db.php");

$sql = 'SELECT mbr_id,mbr_account,mbr_pwd,mbr_name FROM member WHERE mbr_account = :account';
// $sql = 'SELECT mbr_pwd,mbr_name FROM member WHERE mbr_account = :account';
$sth = $db_link->prepare($sql);
$sth->bindValue(':account',$account);
$sth->execute();
$userData = $sth->fetch(PDO::FETCH_ASSOC);
try{
    if(empty($userData) != 1){
        if(password_verify($pwd,$userData['mbr_pwd'])){
            $_SESSION['mbr_id'] = $userData['mbr_id'];
            $_SESSION['mbr_account'] = $userData["mbr_account"];
            echo "
            <script>
                alert('登入成功');
                window.location.replace('../frontend/index.php');
            </script>
            ";
        } else {
            echo "
            <script>
                alert('帳號或密碼錯誤');
                window.location.replace('../frontend/log_in.html');
            </script>
            ";
        }
    } else {
        echo "
        <script>
            alert('帳號或密碼錯誤');
            window.location.replace('../frontend/log_in.html');
        </script>
        ";
    }
} catch (PDOException $e) {
    echo "
    <script>
        alert('帳號或密碼錯誤');
        window.location.replace('../frontend    /log_in.html');
    </script>
    ";
}
?>