<?php
session_start();
$id = $_SESSION['id'];
$club_id = $_SESSION['club_id'];
$servername = "localhost";
$username = "root";
$password = "12345678";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

mysqli_select_db($conn, "sadb");

mysqli_query($conn, "SET CHARACTER SET utf8");

mysqli_query($conn,  "SET collation_connection = 'utf8_general_ci'");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";



$acc_p = $_POST["acc_p"];
$acc_la = $_POST["acc_la"];
$acc_add = $_POST["acc_add"];
if (empty($_POST["acc_add"])){
    $key1 = 0;
    $key2 = 0;
    $key3 = 0;
    $key4 = 0;
    $acc_add = array($key1, $key2, $key3, $key4);
}else{

}

if (in_array('ma', $acc_add)){
    $key1 = 1;
}else{
    $key1 = 0;
}
if (in_array('ms', $acc_add)){
    $key2 = 1;
}else{
    $key2 = 0;
}
if (in_array('mac', $acc_add)){
    $key3 = 1;
}else{
    $key3 = 0;
}
if (in_array('mc', $acc_add)){
    $key4 = 1;
}else{
    $key4 = 0;
}

$acc_add_s = array($key1, $key2, $key3, $key4);

$sql_checkldap = "SELECT LDAP_id FROM ldap WHERE LDAP_id = $acc_la";
$sql_check_clubmem = "SELECT LDAP_id FROM club_member WHERE club_id = $club_id AND LDAP_id = $acc_la";
$sql_updateclubmem = "UPDATE club_member SET club_position = '$acc_p' WHERE club_id = $club_id AND LDAP_id = $acc_la";
$sql_addaccess = "INSERT INTO access (club_id, LDAP_id, acc_activity, acc_sign, acc_access, acc_club) VALUES ($club_id, $acc_la, $acc_add_s[0], $acc_add_s[1], $acc_add_s[2], $acc_add_s[3])";
$sql_checkaccess = "SELECT LDAP_id FROM access WHERE club_id = $club_id AND LDAP_id = $acc_la";
$result1 = mysqli_query($conn, $sql_check_clubmem) or die(mysqli_error($conn));
$result2 = mysqli_query($conn, $sql_checkaccess) or die(mysqli_error($conn));
$result3 = mysqli_query($conn, $sql_checkldap) or die(mysqli_error($conn));

if (mysqli_fetch_row($result3) > 0){
    if (mysqli_fetch_row($result1) > 0){

        if (mysqli_fetch_row($result2) > 0){
            echo "<script>alert('權限資料已經存在'); location.href = 'access-management.php';</script>";
        }else{
            mysqli_query($conn, $sql_updateclubmem) or die(mysqli_error($conn));
            mysqli_query($conn, $sql_addaccess) or die(mysqli_error($conn));
            echo "<script>alert('權限資料成功新增'); location.href = 'access-management.php';</script>";
        }
    }else{
        echo "<script>alert('查無此社團成員，請先建立成員資料'); location.href = 'access-management.php';</script>";
    }
}else{
    echo "<script>alert('LDAP輸入錯誤，查無此資料'); location.href = 'access-management.php';</script>";
}









$conn->close();

?>
