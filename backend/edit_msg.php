<?php
// $content_id = $_GET["id"];

// $sql = "UPDATE message SET  content = '$content' WHERE id = $content_id";
// require_once("./connect_db.php");
// $result = mysqli_query($con , $sql) or die('MySQL query error');
// echo "<script type='text/javascript'>";
// echo "alert('編輯留言成功');";
// echo "location.href='index.php';";
// echo "</script>";



// $content_id = $_GET["id"];

// // $content = $_POST["content"];
// print($content_id);

// $sql = "UPDATE message SET content = :content WHERE id = :id";

// $stmt = $db_link->prepare($sql);
// $stmt->bindParam(':content', $content);
// $stmt->bindParam(':id', $content_id);
// $stmt->execute();


// echo "<script type='text/javascript'>";
// echo "alert('編輯留言成功');";
// echo "location.href='index.php';";
// echo "</script>";


session_start();
$mbr_id = $_SESSION['mbr_id'];
$content_id = $_POST["id"];
$editedcontent = $_POST["editedcontent"];
print($content_id);
print($editedcontent);
date_default_timezone_set("Asia/Taipei");
$dt = new DateTime();
$edit_time = $dt->format("Y-m-d H:i:s");
require_once("./connect_db.php");
// $editedData = [$editedcontent,$content_id];

// $editedData = array(
//     ':editedcontent' => $editedcontent,
//     ':content_id' => $content_id
// );


// UPDATE message SET content = 'hello123' WHERE content_id = "8"
$sql = "UPDATE message SET content = :editedcontent , edit_time = :edit_time WHERE content_id = :content_id AND mbr_id = :mbr_id";
// $editedData = [$editedcontent,$content_id];
// print_r($editedData);
// $sql = "UPDATE message SET content = ? WHERE content_id = ?";
$sth = $db_link->prepare($sql);
$sth->bindValue(':editedcontent', $editedcontent);
$sth->bindValue(':content_id', $content_id);
$sth->bindValue(':edit_time', $edit_time);
$sth->bindValue(':mbr_id', $mbr_id);
try{
    // if($sth->execute($editedData))
    if($sth->execute())
     {
        echo "
        <script>
            alert('資料編輯成功');
            window.location.replace('../frontend/index.php');
        </script>
        ";
    }else{
        echo"
        <script>
            alert('資料編輯失敗1');
            window.location.replace('../frontend/index.php');
        </script>
        ";
    }
} catch(PDOException $e) {
    print($e);
    echo "
        <script>
            alert('資料編輯失敗2');
            
        </script>
        ";
}


// $sql = 'UPDATE message SET content = :content WHERE id = :id';
// $sth = $db_link->prepare($sql);
// try {
//     $params = array(
//         ':content' => $content,
//         ':id' => $content_id
//     );
//     if($sth->execute($params)) {
//         echo "
//         <script>
//             alert('資料編輯成功');
//             window.location.replace('../frontend/index.php');
//         </script>
//         ";
//     }else{
//         echo"
//         <script>
//             alert('資料編輯失敗1');
//             window.location.replace('../frontend/index.php');
//         </script>
//         ";
//     }
// } catch(PDOException $e) {
//     echo "
//         <script>
//             alert('資料編輯失敗2');
//             window.location.replace('../frontend/index.php');
//         </script>
//         ";
// }

?>