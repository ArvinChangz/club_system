<?php
SESSION_START();
$con = mysql_connect("localhost", "root", "12345678");
header('Content-Type: text/html; charset=utf-8');
$login_id = $_POST['id'];
$_SESSION['id'] = $_POST['id'];
$login_password = $_POST['password'];
$db_selected = mysql_select_db("sadb", $con);

$sql_student = "SELECT * FROM ldap
where LDAP_id = '$login_id'
AND LDAP_pwd = '$login_password'
AND LDAP_identity = 1";

$sql_management = "SELECT l.* , cl.club_position, cl.club_id
FROM ldap l,
    (select club_position as club_position, club_id as club_id
    from club_member
    where $login_id = LDAP_id) cl
where l.LDAP_id = '$login_id'
AND l.LDAP_pwd = '$login_password'
AND l.LDAP_identity = 1
AND cl.club_position is not null";

$sql_teacher = "SELECT * FROM ldap
where LDAP_id = '$login_id'
AND LDAP_pwd = '$login_password'
AND LDAP_identity = 2";

$result_student = mysql_query($sql_student, $con);
$rs_student = mysql_fetch_row($result_student);

$result_management = mysql_query($sql_management, $con);
$rs_management = mysql_fetch_row($result_management);

$result_teacher = mysql_query($sql_teacher, $con);
$rs_teacher = mysql_fetch_row($result_teacher);

if (mysql_num_rows($result_management)) {
    $_SESSION['club_id'] = $rs_management[7];
    header("location: index-club.php");
} elseif (mysql_num_rows($result_student)) {
    $_SESSION['club_id'] = $rs_student[7];
    header("location: index-student.php");
}  elseif (mysql_num_rows($result_teacher)) {
    header("location: index-teacher.php");
} else {
    echo "<script> alert('您的帳號或密碼錯誤');location.href = ' ../Login/login.html';</script>";
}

?>
