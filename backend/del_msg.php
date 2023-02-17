<?php
// require_once("./connect_db,php");

// $content_id = $_POST["content_id"];
// $sql = "DELETE FROM message WHERE content_id = $id";

// $result = mysqli_query($con , $sql) or die('MySQL query error');
// echo "<script type='text/javascript'>";
// echo "alert('刪除留言成功');";
// echo "location.href='index.php';";
// echo "</script>";



session_start();
$content_id = $_GET["id"];
$mbr_id = $_SESSION['mbr_id'];
require_once("./connect_db.php");

$sql = "DELETE FROM message WHERE content_id = :content_id AND mbr_id = :mbr_id";
$sth = $db_link->prepare($sql);
$sth->bindValue(':content_id', $content_id);
$sth->bindValue(':mbr_id', $mbr_id);
$result = $sth->execute();
$count=$sth->rowCount();
print($count);
if ($count == 1) {
    
    echo "
    <script>
    alert('刪除留言成功');
    window.location.replace('../frontend/index.php');
    </script>
    ";
} else {
    
    echo "
    <script>
    alert('刪除留言失敗');
    window.location.replace('../frontend/index.php');
    </script>
    ";
    die('MySQL query error');
}

?>