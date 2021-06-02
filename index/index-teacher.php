<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>index-teacher</title>

    <!-- Favicon -->
    <link rel="icon" href="#">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="hover.css">
    <link rel="stylesheet" href="button1.css">

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
                        <a class="nav-brand" href="#">
                            <font face="微軟正黑體" color="white">社團活動管理系統</font>
                        </a>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li><a href="#">管理社團</a></li>&nbsp;&nbsp;&nbsp;
                                    <li><a href="../Login/login.html">登出</a></li>
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
                        <h2 style="font-family: 微軟正黑體">管理社團</h2>
                    </div>
                </div>
            </div>
            <div class="roberto-news-area section-padding-100-0">
                <div class="container wow fadeInUp" data-wow-delay="100ms">
                    <div align="center">

                        <table align="center" border="0" rules="all" width="100%" style="font-family: 微軟正黑體">
                            <!-- 搜尋 -->
                            <div class="search-container" align="center">
                                <form>
                                    <font face="微軟正黑體">輸入社團名稱：</font>
                                    <input type="text" style="font-size:16px" placeholder="search..." name="search">
                                    <button type="submit" style="background: none;"><i class="fa fa-search"></i></button>
                                </form>
                                <button class="button"><a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">新增社團</a></button>
                            </div><br><br>
                            <!-- 學術性 -->
                            <form method="get">
                                <tr valign="top" style="border-color: white;">
                                    <td align="center">
                                        <details align="center">
                                            <table align="center" width="100%" style="font-family: 微軟正黑體" height="50">
                                                <tr>
                                                    <summary>學術性</summary>
                                                </tr><br>
                                                <?php
                                                $link = mysql_connect("localhost", "root", "12345678");
                                                mysql_select_db("sa", $link);
                                                $sql1 = "SELECT * FROM club WHERE club_type='學術性'";
                                                $rs1 = mysql_query($sql1, $link);
                                                while ($record1 = (mysql_fetch_row($rs1))) {
                                                    echo "<tr><td><a class='portfolio-link' data-toggle='modal' href='#portfolioModal1' name=test>$record1[1]</a></td></tr>";
                                                }

                                                ?>
                                            </table>
                                        </details>
                                    </td>
                                    <!-- 休閒聯誼性 -->
                                    <td align="center">
                                        <details align="center">
                                            <table align="center" width="100%" height="50" style="font-family: 微軟正黑體">
                                                <tr>
                                                    <summary>休閒聯誼性</summary>
                                                </tr><br>
                                                <?php
                                                $link = mysql_connect("localhost", "root", "12345678");
                                                mysql_select_db("sa", $link);
                                                $sql2 = "SELECT * FROM club WHERE club_type='休閒聯誼性'";
                                                $rs2 = mysql_query($sql2, $link);
                                                while ($record2 = (mysql_fetch_row($rs2))) {
                                                    echo "<tr><td><a class='portfolio-link' data-toggle='modal' href='#portfolioModal1'>$record2[1]</a></td></tr>";
                                                }
                                                ?>

                                            </table>
                                        </details>
                                    </td>
                                    <!-- 服務性 -->
                                    <td align="center">
                                        <details align="center">
                                            <table align="center" width="100%" height="50" style="font-family: 微軟正黑體">
                                                <tr>
                                                    <summary>服務性</summary>
                                                </tr><br>
                                                <?php
                                                $link = mysql_connect("localhost", "root", "12345678");
                                                mysql_select_db("sa", $link);
                                                $sql3 = "SELECT * FROM club WHERE club_type='服務性'";
                                                $rs3 = mysql_query($sql3, $link);
                                                while ($record3 = (mysql_fetch_row($rs3))) {
                                                    echo "<tr><td><a class='portfolio-link' data-toggle='modal' href='#portfolioModal1'>$record3[1]</a></td></tr>";
                                                }
                                                ?>

                                            </table>
                                        </details>
                                    </td>
                                    <!-- 體能性 -->
                                    <td align="center">
                                        <details align="center">
                                            <table align="center" width="100%" height="50" style="font-family: 微軟正黑體">
                                                <tr>
                                                    <summary>體能性</summary>
                                                </tr><br>
                                                <?php
                                                $link = mysql_connect("localhost", "root", "12345678");
                                                mysql_select_db("sa", $link);
                                                $sql4 = "SELECT * FROM club WHERE club_type='體能性'";
                                                $rs4 = mysql_query($sql4, $link);
                                                while ($record4 = (mysql_fetch_row($rs4))) {
                                                    echo "<tr><td><a class='portfolio-link' data-toggle='modal' href='#portfolioModal1'>$record4[1]</a></td></tr>";
                                                }
                                                ?>

                                            </table>
                                        </details>
                                    </td>
                                    <!-- 藝術性 -->
                                    <td align="center">
                                        <details align="center">
                                            <table align="center" width="100%" height="50" style="font-family: 微軟正黑體">
                                                <tr>
                                                    <summary>藝術性</summary>
                                                </tr><br>
                                                <?php
                                                $link = mysql_connect("localhost", "root", "12345678");
                                                mysql_select_db("sa", $link);
                                                $sql5 = "SELECT * FROM club WHERE club_type='藝術性'";
                                                $rs5 = mysql_query($sql5, $link);
                                                while ($record5 = (mysql_fetch_row($rs5))) {
                                                    echo "<tr><td><a class='portfolio-link' data-toggle='modal' href='#portfolioModal1'>$record5[1]</a></td></tr>";
                                                }
                                                ?>

                                            </table>
                                        </details>
                                    </td>
                                    <!-- 音樂性 -->
                                    <td align="center">
                                        <details align="center">
                                            <table align="center" width="100%" height="50" style="font-family: 微軟正黑體">
                                                <tr>
                                                    <summary>音樂性</summary>
                                                </tr><br>
                                                <?php
                                                $link = mysql_connect("localhost", "root", "12345678");
                                                mysql_select_db("sa", $link);
                                                $sql6 = "SELECT * FROM club WHERE club_type='音樂性'";
                                                $rs6 = mysql_query($sql6, $link);
                                                while ($record6 = (mysql_fetch_row($rs6))) {
                                                    echo "<tr><td><a class='portfolio-link' data-toggle='modal' href='#portfolioModal1'>$record6[1]</a></td></tr>";
                                                }
                                                ?>

                                            </table>
                                        </details>
                                    </td>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal 1 社團資訊(修改) 開始-->
    <div class=" modal fade" id="portfolioModal1" tabindex="-1">
        <div class="modal-dialog modal-lg" style="width: 100%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="selectTree" class="ztree" style="height:1000px width:100%;overflow:auto;">
                        <form method="get">
                            <table align="center" border="0" rules="all" width="100%" style="font-family: 微軟正黑體">
                                <h2 align="center">
                                    <font face="微軟正黑體">社團名稱</font>
                                </h2><br>
                                <thead>
                                    <tr style="border-color: white;">
                                        <td height="30px" width="20%" align="center" valign="center"><strong>社團類型</strong></td>
                                        <td height="30px" width="20%" align="center" valign="center"><strong>社長</strong></td>
                                        <td height="30px" width="20%" align="center" valign="center"><strong>聯絡電話</strong></td>
                                        <td height="30px" width="20%" align="center" valign="center"><strong>成立日期</strong></td>
                                        <td height="30px" width="20%" align="center" valign="center"><strong>廢除</strong></td>

                                    </tr>

                                </thead>
                                <tbody></tbody>
                                <?php       //讀社團名稱
                                $link = mysql_connect("localhost", "root", "12345678");
                                mysql_select_db("sadb", $link);
                                $sql_information = "SELECT club_type,LDAP_id FROM club WHERE club_name ='$clubname1' ";
                                $rs_information = mysql_query($sql_information, $link);


                                echo "<tr style='border-color: white;'>
                                        <td align=center valign=center><input type=text name=club_type size=15 ></td>
                                        <td align=center valign=center><input type=text name=club_contact size=15></td>
                                        <td align=center valign=center><input type=text name=club_phone size=15></td>
                                        <td align=center valign=center><input type=text name=club_date size=15></td>
                                        <td align=center valign=center style='padding-top: 5px;'><button style='background: none; border: 0;' onClick=alert('已刪除社團!')><label class='trash'><i class='fa fa-trash'></i></label></button></td>
                                        </tr>";

                                ?>
                                <tr height="50" style="border-color: white;">
                                    <td colspan="5" align="center" valigh="middle"><br>
                                        <button type="submit" value="提交" class="button" onClick="alert('儲存成功。')">儲存</button>
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
    <!-- 社團資訊(修改) 結束 -->

    <!-- Modal 2 新增社團 開始-->
    <div class=" modal fade" id="portfolioModal2" tabindex="-1">
        <div class="modal-dialog modal-lg" style="width: 100%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="selectTree" class="ztree" style="height:1000px width:100%;overflow:auto;">
                        <form method="get" action="club-insert.php">
                            <table align="center" border="0" rules="all" width="100%" style="font-family: 微軟正黑體">
                                <h2 align="center">
                                    <font face="微軟正黑體">新增社團</font>
                                </h2><br>
                                <thead>
                                    <tr style="border-color: white;">
                                        <td height="30px" width="25%" align="center" valign="center" name="club_name2"><strong>社團名稱</strong></td>
                                        <td height="30px" width="25%" align="center" valign="center" name="club_type2"><strong>社團類型</strong></td>
                                        <td height="30px" width="25%" align="center" valign="center" name="club_manager2"><strong>社長</strong></td>
                                        <td height="30px" width="25%" align="center" valign="center" name="club_phone2"><strong>聯絡電話</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="border-color: white;">
                                        <td align="center" valign="center"><input type="text" name="clubname" size="15"></td>
                                        <td align="center" valign="center">
                                            <select name="type">
                                                <option value="learn">學術性</option>
                                                <option value="relationship">休閒聯誼性</option>
                                                <option value="help">服務性</option>
                                                <option value="pe">體能性</option>
                                                <option value="art">藝術性</option>
                                                <option value="music">音樂性</option>
                                            </select>
                                        </td>
                                        <td align="center" valign="center"><input type="text" name="manager" size="15"></td>
                                        <td align="center" valign="center"><input type="text" name="phone" size="15"></td>
                                    </tr>
                                    <tr height="50" style="border-color: white;">
                                        <td colspan="5" align="center" valigh="middle"><br><br><br>
                                            <button type="submit" value="提交" class="button">提交</button>&nbsp;&nbsp;&nbsp;
                                            <button type="reset" value="重設" class="button">重設</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table><br><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 新增社團 結束 -->

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
