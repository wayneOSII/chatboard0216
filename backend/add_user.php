<?php
$account=$_POST['account'];
$pwd=$_POST['pwd'];
$membername=$_POST['membername'];

print("您輸入的會員帳號為：".$account."<br>");
print("您輸入的會員密碼為：".$pwd."<br>");
print("您輸入的會員名稱為：".$membername."<br>");


$sex = $_POST['sex'];
if ($sex == 'man'){
    print("您輸入的會員性別為：男性"."<br>");
} 
else{
    print("您輸入的會員性別為：女性"."<br>");
}


    print("您選擇的技能為：");
//     if(isset($_POST['skill'])) {
//        foreach ($_POST['skill'] as $skill) {
//          print($skill." ");
//  } 
//     }

if(isset($_POST['skill'])) {
    $skill = implode(' ', $_POST['skill']);
    echo $skill;
  }
else{
    $skill = '';
    print("未選擇技能");
} 

$btdyear = $_POST['btdyear'];
switch ($btdyear) {
    case '1980':
        echo("<br>"."您選擇的出生年為：1980"."<br>");
        break;
    case '1981':
        echo("<br>"."您選擇的出生年為：1981"."<br>");
        break;
    case '1982':
        echo("<br>"."您選擇的出生年為：1982"."<br>");
        break;
    case '1983':
        echo("<br>"."您選擇的出生年為：1983"."<br>");
        break;
    case '1984':
        echo("<br>"."您選擇的出生年為：1984"."<br>");
        break;
    case '1985':
        echo("<br>"."您選擇的出生年為：1985"."<br>");
        break;
    case '1986':
        echo("<br>"."您選擇的出生年為：1986"."<br>");
        break;
}

$telephone=$_POST['telephone'];
print("您輸入的電話為：".$telephone."<br>");


$subnews = isset($_POST['subnews']);
if ($subnews){
    print("是否訂閱電子報：是"."<br>");
} 
else{
    print("是否訂閱電子報：否"."<br>");
}



require_once("connect_db.php");

$userData = [$account, password_hash($pwd, PASSWORD_DEFAULT), $membername,$sex,$skill,$btdyear,$telephone,$subnews];
$sql = 'INSERT INTO member(mbr_account,mbr_pwd,mbr_name,mbr_sex,mbr_capability,mbr_birthday,mbr_phone,news_sub) VALUES (?,?,?,?,?,?,?,?)';
$sth = $db_link->prepare($sql);
try{
    if($sth->execute($userData)) {
        echo "
        <script>
            alert('註冊成功，請登入');
            window.location.replace('../frontend/log_in.html');
        </script>
        ";
    }else{
        echo"
        <script>
            alert('註冊失敗');
            window.location.replace('../frontend/sign_up.html');
        </script>
        ";
    }
} catch(PDOException $e) {
    echo "
        <script>
            alert('信箱已註冊過');
            window.location.replace('../frontend/log_in.html');
        </script>
        ";
}
?>