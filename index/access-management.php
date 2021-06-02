<?php
session_start();
$Login_id = $_SESSION['id'];
$Login_club = $_SESSION['club_id'];

$servername = "localhost";
$username = "root";
$password = "12345678";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

mysqli_select_db($conn, "sadb");


mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, "SET CHARACTER SET utf8");
mysqli_query($conn, "SET collation_connection = 'utf8_general_ci'");
?>

<!DOCTYPE html>



<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>access-management</title>

    <!-- Favicon -->
    <link rel="icon" href="#">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="hover.css">
    <link rel="stylesheet" href="button.css">

    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous">
    </script>
</head>

<body>
    <header class="header-area">
        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="robertoNav">

                        <!-- 系統名稱 -->
                        <a class="nav-brand" href="#"><font face="微軟正黑體" color="white">社團活動管理系統</font></a>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li><a href="activity-list.php">活動列表</a></li>
                                    <li><a href="club-list.php">社團列表</a></li>
                                    <li><a href="">個人頁面</a>
                                        <ul class="dropdown">
                                            <li><a href="personal-page-student.php#a">- 修改資料</a></li>
                                            <li><a href="personal-page-student.php#b">- 已報名 / 取消活動</a></li>
                                            <li><a href="personal-page-student.php#c">- 歷年活動</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">幹部</a>
                                        <ul class="dropdown">
                                            <li><a href="activity-management.php">- 活動管理</a></li>
                                            <li><a href="sign-management.php">- 報名系統</a></li>
                                            <li><a href="access-management.php">- 權限變更</a></li>
                                            <li><a href="club-info-update.php">- 社團資訊</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="logout.php">登出</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

<!-- 權限 開始-->
    <section class="roberto-blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- 標題 -->
                <div class="col-12">
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="150ms">
                        <h2 style="font-family: 微軟正黑體">權限管理</h2>
                    </div>
                </div>
            </div>
    <div class="roberto-news-area section-padding-100-0">
        <div class="container wow fadeInUp" data-wow-delay="100ms">
            <div class="row justify-content-right">
                <div style="width: 50%; float: left;">
                    <h6 style="font-family: 微軟正黑體; font-size: 24px;">社團幹部</h6>
                </div>
                <div style="width: 50%; float: right; padding-left: 380px;">

                   <?php

                    function check_access_exist(){
                        global $conn;
                        global $Login_club;
                        global $Login_id;
                        $sql_check_acc = "SELECT LDAP_id FROM access WHERE club_id = $Login_club AND LDAP_id = $Login_id AND acc_access = '1' ";
                        $rs_check = mysqli_query($conn, $sql_check_acc);
                        if(!$rs_check)
                            {
                                echo ("Error: ".mysqli_error($conn));
                                exit();
                            }

                        if (mysqli_fetch_row($rs_check)){
                            return true;
                        }else{
                            return false;
                        }

                    }

                    if(check_access_exist() == true){
                        echo "<button class='button'><a class='portfolio-link' data-toggle='modal' href='#portfolioModal2'><font color='white'>新增權限</font></a></button>";
                    }else{
                        echo "<button class='button'><a class='portfolio-link' data-toggle='modal'><font color='white' onClick=\"alert('您無此權限')\">新增權限</font></a></button>";

                    }
                    ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <form >
                    <table style="font-family: 微軟正黑體; font-size: 16px;" border="1" width="1200px">
                    <thead>

                    <tr height="40px">
                                        <td height="30px" width="10%" align="center" valign="center">
                                            <font color="#7e212c"><strong>職稱</strong></font>
                                        </td>
                                        <td height="30px" width="13%" align="center" valign="center">
                                            <font color="#7e212c"><strong>學號</strong></font>
                                        </td>
                                        <td height="30px" width="13%" align="center" valign="center">
                                            <font color="#7e212c"><strong>姓名</strong></font>
                                        </td>
                                        <td height="30px" width="10%" align="center" valign="center">
                                            <font color="#7e212c"><strong>系級</strong></font>
                                        </td>
                                        <td height="30px" width="13%" align="center" valign="center">
                                            <font color="#7e212c"><strong>聯絡電話</strong></font>
                                        </td>
                                        <td height="30px" width="33%" align="center" valign="center">
                                            <font color="#7e212c"><strong>權限</strong></font>
                                        </td>
                                        <td height="30px" width="15%" align="center" valign="center">
                                            <font color="#7e212c"><strong>操作</strong></font>
                                        </td>
                                    </tr>
                    </thead>
                    <tbody>

                            <?php
                            $sql_all_data = "SELECT C.club_position,A.LDAP_id, L.LDAP_name, L.LDAP_department, L.LDAP_class, S.stu_phone, A.acc_activity, A.acc_sign, A.acc_access, A.acc_club FROM club_member C ,access A, ldap L, student_information S
                                WHERE C.club_id = $Login_club AND A.club_id = $Login_club AND C.club_position is not null AND C.LDAP_id = A.LDAP_id AND C.LDAP_id = L.LDAP_id AND C.LDAP_id = S.LDAP_id AND A.LDAP_id = L.LDAP_id AND A.LDAP_id = S.LDAP_id AND L.LDAP_id = S.LDAP_id";

                            $rs_all_data = mysqli_query($conn, $sql_all_data);

                            if(!$rs_all_data)
                            {
                                echo ("Error: ".mysqli_error($conn));
                                exit();
                            }
                            while ($record_data = mysqli_fetch_array($rs_all_data)){ ?>

                           <tr>
                            <td height="30px" align="center" valign="center"><?php echo $record_data[0] ?></td>
                            <td height="30px" align="center" valign="center"><?php echo $record_data[1] ?></td>
                            <td height="30px" align="center" valign="center"><?php echo $record_data[2] ?></td>
                            <td height="30px" align="center" valign="center"><?php echo $record_data[3], " ", $record_data[4] ?></td>
                            <td height="30px" align="center" valign="center"><?php echo $record_data[5] ?></td>
                            <td height="30px" align="center" valign="center">
                                <input type="checkbox" name="checkbox1" disabled
                                    <?php if ($record_data[6] == '1') {
                                        echo 'checked = "checked"';
                                            } ?>>&nbsp管理活動&nbsp
                                            <input type=checkbox name=checkbox disabled
                                                <?php if ($record_data[7] == '1') {
                                                    echo 'checked = "checked"';
                                                    } ?>>&nbsp管理報名&nbsp
                                                        <input type=checkbox name=checkbox disabled
                                                            <?php if ($record_data[8] == '1') {
                                                                echo 'checked = "checked"';
                                                                } ?>>&nbsp管理權限&nbsp
                                                                    <input type=checkbox name=checkbox disabled
                                                                        <?php if ($record_data[9] == '1') {
                                                                                echo 'checked = "checked"';
                                                                                } ?>>&nbsp管理社團</td>
                            <td height="30px" align="center" valign="center" style="padding-top: 5px;">
                                <a href="access-management-editaccess.php?id2=<?php echo $record_data[1] ?>" target="_blank"><i class="fa fa-edit"></i></a>
                                <a href="access-update.php?id2=<?php echo $record_data[1] ?>">
                                <label class="trash" onclick="location.href'access-update.php?id2=<?php echo $record_data[1] ?>'">
                                <i class="fa fa-trash"></i></label>
                            </td>
                            </tr>
                            <? } ?>
                    </tbody>
                    </table>
                            </form>
            </div>
            <br>
            <div class="row justify-content-right" style="padding-top: 50px;">
                        <div style="width: 50%; float: left;">
                            <h6 style="font-family: 微軟正黑體; font-size: 24px;">
                                <font color="#321e17"><strong>社團成員</strong></font>
                            </h6>
                        </div>
                        <div style="width: 50%; float: right;" align="right">
                            <button class="mbutton"><a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                                    <font color="white" face="微軟正黑體">新增成員</font>
                                </a></button>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <form method="get">
                            <table align="center" style="font-family: 微軟正黑體; font-size: 16px; border-color: #ccd3d9;" border="1" rules="all" width="1110px">
                                <thead>
                                    <tr>
                                        <td height="40px" width="25%" align="center" valign="center">
                                            <font color="#7e212c"><strong>學號</strong></font>
                                        </td>
                                        <td height="40px" width="20%" align="center" valign="center">
                                            <font color="#7e212c"><strong>姓名</strong></font>
                                        </td>
                                        <td height="40px" width="20%" align="center" valign="center">
                                            <font color="#7e212c"><strong>系級</strong></font>
                                        </td>
                                        <td height="40px" width="25%" align="center" valign="center">
                                            <font color="#7e212c"><strong>聯絡電話</strong></font>
                                        </td>
                                        <td height="40px" width="10%" align="center" valign="center">
                                            <font color="#7e212c"><strong>操作</strong></font>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $sql_student = "SELECT L.LDAP_id,LDAP_name,LDAP_department,LDAP_class,stu_phone FROM club_member C ,ldap L ,student_information S where club_id = $Login_club AND club_position IS NULL AND L.LDAP_id= C.LDAP_id AND S.LDAP_id =C.LDAP_id";
                                    $rs_student = mysqli_query($conn, $sql_student);
                                    if(!$rs_student)
                                        {
                                        echo ("Error: ".mysqli_error($conn));
                                        exit();
                                        }
                                    while ($record = (mysqli_fetch_row($rs_student))) { ?>
                                        <tr align="center" class="hover">
                                            <td height="30px" width="25%" align="center" valign="center"><?php echo  $record[0] ?></td>
                                            <td height="30px" width="20%" align="center" valign="center"><?php echo  $record[1] ?></td>
                                            <td height="30px" width="20%" align="center" valign="center"><?php echo  $record[2], " ", $record[3] ?></td>
                                            <td height="30px" width="25%" align="center" valign="center"><?php echo  $record[4] ?></td>
                                            <td align="center" valign="center" style="padding-top: 5px;"><a href="member-delete.php?id2=<?php echo $record[0] ?>"><label class="trash" onClick="location.href'member-delete.php?id2=<?php echo $record[0] ?>'"><i class="fa fa-trash"></i></label></a>
                                            <?php }?>

                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
                <br><br>
            </div>
        </div>
        </div>
    </section>
<!-- 權限 結束-->

<!-- Modal 1 新增社團成員 開始-->
    <div class=" modal fade" id="portfolioModal1" tabindex="-1" >
      <div class="modal-dialog modal-lg" style="width: 100%">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
          </div>
          <div class="modal-body">
          <div id="selectTree" class="ztree" style="height:1000px width:1000px;overflow:auto;">

     <form>
        <table align="center" border="0" rules="all" width="100%" style="font-family: 微軟正黑體">
            <h2 align="center"><font face="微軟正黑體">新增社團成員</font></h2><br>
            <thead>
                <tr style="border-color: white;">
                    <td height="30px" width="25%" align="center" valign="center"><strong>學號</strong></td>
                    <td height="30px" width="25%" align="center" valign="center"><strong>系級</strong></td>
                    <td height="30px" width="25%" align="center" valign="center"><strong>姓名</strong></td>
                    <td height="30px" width="25%" align="center" valign="center"><strong>聯絡電話</strong></td>
                </tr>
            </thead>
            <tbody>
                <tr style="border-color: white;">
                    <td align="center" valign="center"><input type="text" name="m_a[]" size="15"></td>
                    <td align="center" valign="center"><input type="text" name="m_d[]" size="15"></td>
                    <td align="center" valign="center"><input type="text" name="m_n[]" size="15"></td>
                    <td align="center" valign="center"><input type="text" name="m_p[]" size="15"></td>

                </tr>
                <tr height="50" style="border-color: white;">
                    <td colspan="4" align="center" valigh="middle"><br><br>
                    <button type="submit" value="提交" class="button" onClick="alert('提交成功。')">提交</button>&nbsp;&nbsp;&nbsp;
                    <button type="reset" value="重設" class="button">重設</button>
                    </td>
                </tr>
            </tbody>
        </table><br>
    </form>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- 新增社團成員 結束 -->

<!-- Modal 2 新增權限 開始-->
    <div class=" modal fade" id="portfolioModal2" tabindex="-1" >
      <div class="modal-dialog modal-lg" style="width: 100%">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
          </div>
          <div class="modal-body">
          <div id="selectTree" class="ztree" style="height:1000px width:1000px;overflow:auto;">
     <form action="access-management-addaccess.php" method="POST">
        <table align="center" border="0" rules="all" width="100%" style="font-family: 微軟正黑體">
            <h2 align="center"><font face="微軟正黑體">新增幹部權限</font></h2><br>
            <thead>
                <tr style="border-color: white;">
                    <td height="30px" width="15%" align="center" valign="center"><strong>職稱</strong></td>
                    <td height="30px" width="15%" align="center" valign="center"><strong>學號</strong></td>
                    <td height="30px" width="60%" align="center" valign="center"><strong>權限</strong></td>
                </tr>
            </thead>
            <tbody>
                <tr style="border-color: white;">
                    <td align="center" valign="center"><input type="text" name="acc_p" id="acc_p" size="12"></td>
                    <td align="center" valign="center"><input type="text" name="acc_la" id="acc_la" size="10"></td>
                    <td align="center" valign="center">
                        <input type="checkbox" name="acc_add[]" id="acc_add[]" value="ma"> 管理活動&nbsp;&nbsp;
                        <input type="checkbox" name="acc_add[]" id="acc_add[]" value="ms"> 管理報名&nbsp;&nbsp;
                        <input type="checkbox" name="acc_add[]" id="acc_add[]" value="mac"> 管理權限&nbsp;&nbsp;
                        <input type="checkbox" name="acc_add[]" id="acc_add[]" value="mc"> 管理社團&nbsp;&nbsp;
                        </td>
                </tr>
                <tr height="50" style="border-color: white;">
                    <td colspan="4" align="center" valigh="middle"><br><br>
                    <button type="submit" value="submit" class="button">提交</button>&nbsp;&nbsp;&nbsp;
                    <button type="reset" value="reset" class="button">重設</button>
                    </td>
                </tr>
            </tbody>
        </table><br>
    </form>

              </div>
            </div>
          </div>
        </div>
      </div>
<!-- 新增權限 結束 -->

    <!-- **** All JS Files ***** -->
    <!-- jQuery 2.2.4 -->
    <script src="js/jquery.min.js"></script>
    <!-- Popper -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All Plugins -->
    <script src="js/roberto.bundle.js"></script>
    <!-- Active -->
    <script src="js/default-assets/active.js"></script>


</body>

</html>
