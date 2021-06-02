<?php
session_start();
$Login_id = $_SESSION['id'];
$Club_id = $_SESSION['club_id'];

$edit_id = $_GET['id2'];

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
<form action="access-management-editaccess.php" method="POST" onsubmit="return closeSelf(this);">
        <table align="center" border="1" rules="all" width="100%" style="font-family: 微軟正黑體">
            <h2 align="center"><font face="微軟正黑體">修改幹部權限</font></h2><br>
            <thead>
                <tr style="border-color: white;">
                    <td height="30px" width="20%" align="center" valign="center"><strong>職稱</strong></td>
                    <td height="30px" width="20%" align="center" valign="center"><strong>學號</strong></td>
                    <td height="30px" width="60%" align="center" valign="center"><strong>權限</strong></td>
                </tr>
            </thead>
            <tbody>
                <tr style="border-color: white;">
                    <td align="center" valign="center" width="20%"><input type="text" name="acc_p" id="acc_p" size="12"></td>
                    <td align="center" valign="center" width="20%"><?php echo $edit_id ?></td>
                    <td align="center" valign="center" width="60%">
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
</body>
</html>

<?php
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


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['submit']) && ($_POST['submit'] == 'Submit')) {
            $acc_p = $_POST["acc_p"];
            $acc_la = $_POST["acc_la"];
            $acc_add = $_POST["acc_add"];
            if (empty($_POST["acc_add"])){
                $key1 = 0;
                $key2 = 0;
                $key3 = 0;
                $key4 = 0;
                $acc_add = array($key1, $key2, $key3, $key4);
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

        $sql_updateclubmem = "UPDATE club_member SET club_position = '$acc_p' WHERE club_id = $Login_club AND LDAP_id = $edit_id";
        $sql_updateaccess = "UPDATE access SET acc_activity = $acc_add_s[0], acc_sign = $acc_add_s[1], acc_access = $acc_add_s[2], acc_club = $acc_add_s[3] WHERE club_id = $Login_club AND LDAP_id = $edit_id";

            mysqli_query($conn, $sql_updateclubmem) or die(mysqli_error($conn));
            mysqli_query($conn, $sql_updateaccess) or die(mysqli_error($conn));
        }
    }

?>

<script type="text/javascript">
  function closeSelf (f) {
     f.submit();
     window.close();
     alert('權限資料成功修改');
  }
</script>
