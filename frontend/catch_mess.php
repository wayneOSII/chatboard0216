<?php
// require_once("../backend/connect_db.php");
// // include_once("../backend/get_message.php");
// $sql = 'SELECT * FROM message';
// $sth = $db_link->prepare($sql);
// // $sth->bindValue(':nickname',$nickname);
// // $msgData = $sth->execute();
// // $msgData =$sth->get_result();
// $result = mysqli_query($sth , $sql) or die('MySQL query error');
// $comments = array();



require_once("../backend/connect_db.php");
$sql = 'SELECT * FROM message';
$stmt = $db_link->prepare($sql);
$stmt->execute();
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);


require_once("../backend/connect_db.php");
$sql = 'SELECT * FROM message';
$stmt = $db_link->prepare($sql);
$stmt->execute();
$comments = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $comments[] = $row;
}

?>
