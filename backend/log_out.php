<?php
session_start();
if(isset($_SESSION["mbr_id"],$_SESSION['mbr_account'])){
    session_unset();
    echo "
    <script>
        alert('登出成功');
        window.location.replace('../frontend/logout_surface.php');
    </script>
    ";
}else{
    echo "
    <script>
        alert('登出失敗');
        window.location.replace('../frontend/logout_surface.php');
    </script>
    ";
}
?>