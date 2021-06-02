<?php
SESSION_START();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>activity-management</title>

    <!-- Favicon -->
    <link rel="icon" href="#">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="calendor.css">
    <link rel="stylesheet" href="hover.css">
    <link rel="stylesheet" href="button.css">


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
                            <!-- Menu Close Button -->
                            <div class="calendor">
                                <button type="button" style="border: 0px; background: none;"><img src="img\plus.png"></button>
                            </div>
                            <!-- Nav Start -->
                            <?php echo $_SESSION['id']; ?>
                            <div class="classynav">
                                <ul id="nav">
                                    <li><a href="#">活動</a></li>
                                    <li><a href="#">報名</a></li>
                                    <li><a href="#">社團</a></li>
                                    <li><a href="#">權限</a></li>&nbsp;&nbsp;&nbsp;
                                    <li><a href="#">登出</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- 活動 開始-->
    <section class="roberto-blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- 標題 -->
                <div class="col-12">
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="150ms">
                        <h2 style="font-family: 微軟正黑體">活動管理</h2>
                    </div>
                </div>
            </div>
    <div class="roberto-news-area section-padding-100-0">
        <div class="container wow fadeInUp" data-wow-delay="100ms">
            <div class="row justify-content-right">
                <div>
                    <h6 style="font-family: 微軟正黑體; font-size: 24px;">已發布活動</h6>
                </div>
            </div>
            <div class="row justify-content-center">
                    <table style="font-family: 微軟正黑體; font-size: 16px;" border="1" width="1200px">
                    <thead>
                        <tr>
                            <td height="30px" width="30%" align="center" valign="center"><strong>活動名稱</strong></td>
                            <td height="30px" width="15%" align="center" valign="center"><strong>開始時間</strong></td>
                            <td height="30px" width="15%" align="center" valign="center"><strong>結束時間</strong></td>
                            <td height="30px" width="15%" align="center" valign="center"><strong>地點</strong></td>
                            <td height="30px" width="10%" align="center" valign="center"><strong>負責人</strong></td>
                            <td height="30px" width="15%" align="center" valign="center"><strong>修改</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include 'activity-now.php'?>
                    </tbody>
                    </table>
            </div>
            <br>
            <div class="row justify-content-right">
                <div>
                    <h6 style="font-family: 微軟正黑體; font-size: 24px;">歷史活動</h6>
                </div>
            </div>
            <div class="row justify-content-center">
                    <table style="font-family: 微軟正黑體; font-size: 16px;" border="1" width="1200px">
                    <thead>
                        <tr>
                            <td height="30px" width="30%" align="center" valign="center"><strong>活動名稱</strong></td>
                            <td height="30px" width="15%" align="center" valign="center"><strong>開始時間</strong></td>
                            <td height="30px" width="15%" align="center" valign="center"><strong>結束時間</strong></td>
                            <td height="30px" width="15%" align="center" valign="center"><strong>地點</strong></td>
                            <td height="30px" width="15%" align="center" valign="center"><strong>負責人</strong></td>
                            <td height="30px" width="10%" align="center" valign="center"><strong>報名人數</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include 'activity-history.php' ?>
                    </tbody>
                    </table>
            </div>
            <br><br>
        </div>
    </div>
        </div>
    </section>
    <!-- 活動 結束-->

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
