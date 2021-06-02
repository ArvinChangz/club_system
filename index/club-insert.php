  <?
    $clubname = $_GET['clubname'];
    $type = $_GET['type'];
    $manager = $_GET['manager'];
    $phone = $_GET['phone'];
    $link = mysql_connect("localhost", "root", "12345678");
    mysql_query("set names utf8");
    mysql_select_db("sa", $link);
    $sql_check = "SELECT * FROM club WHERE club_name = '$clubname' ";
    $rs_check = mysql_query($sql_check, $link);
    $nums = mysql_num_rows($rs_check);
    if ($nums > 0) {
        echo "<script>alert('重複新增，此社團已經存在!');location.href='index-teacher.php'</script>";
    } else {
        if ($type == learn) {
            $clubtype = '學術性';
        } elseif ($type == relationship) {
            $clubtype = '休閒聯誼性';
        } elseif ($type == help) {
            $clubtype = '服務性';
        } elseif ($type == pe) {
            $clubtype = '體能性';
        } elseif ($type == art) {
            $clubtype = '藝術性';
        } else {
            $clubtype = '音樂性';
        }
        $sql_query = "SELECT LDAP_id FROM LDAP WHERE LDAP_name = '$manager'";
        $rs_query = mysql_query($sql_query, $link);
        if ($rdquery = (mysql_fetch_row($rs_query))) {
            $sql1 = "INSERT INTO `club` (`club_id`, `club_name`, `club_type`, `LDAP_id`, `club_info`, `club_location`, `club_teacher`, `club_contact`) VALUES (NULL, '$clubname', '$clubtype', '$rdquery[0]', NULL, NULL, '', '$phone')";
            $rs1 = mysql_query($sql1, $link);
            $sql_query2 = "SELECT club_id FROM club WHERE club_name = '$clubname' ";
            $rs_query2 = mysql_query($sql_query2, $link);
            if ($rdquery2 = (mysql_fetch_row($rs_query2))) {
                $sql2 = "INSERT INTO `club_member`(`club_id`, `LDAP_id`, `club_position`)VALUES ('$rdquery2[0]', '$rdquery[0]', '1')";
                $rs2 = mysql_query($sql2, $link);
            }
        }
        if ($rs1 && $rs2) {
            echo "<script>alert('新增成功!');location.href='index-teacher.php'</script>";
        }
    }
    ?>
