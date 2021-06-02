<?php
SESSION_START();
$Login_id = $_SESSION['id'];
$con = mysql_connect("localhost", "root", "12345678");
mysql_select_db("sadb", $con);
$sql = "select t.act_name, t.act_start, t.act_end,t.act_location, l.LDAP_name
from activity t, ldap l, club_member c
where l.LDAP_id = t.LDAP_id
and t.club_id = (select club_id from club_member where $Login_id = LDAP_id)
group by act_id";
$rs = mysql_query($sql, $con);
date_default_timezone_set("Asia/Shanghai");
while ($record = mysql_fetch_row($rs)) {
    $act_start = strtotime($record[1]);
    $act_start_go = date("Y/m/d h:i", $act_start);
    $act_end = strtotime($record[2]);
    $act_end_go = date("Y/m/d h:i", $act_end);
    $today = date("Y/m/d h:i");
    $compare;
    if (strtotime($today) > strtotime($record[1]) && strtotime($today) < strtotime($record[2])) {
        echo '<tr class="hover">
<td height="30px" width="30%" align="center" valign="center">', $record[0], '</td>
<td height="30px" width="15%" align="center" valign="center">', $act_start_go, '</td>
<td height="30px" width="15%" align="center" valign="center">', $act_end_go, '</td>
<td height="30px" width="15%" align="center" valign="center">', $record[3], '</td>
<td height="30px" width="10%" align="center" valign="center">', $record[4], '</td>
<td height="30px" width="15%" align="center" valign="center">活動已開始</td>
</tr>';
    } elseif(strtotime($today) < strtotime($record[1])) {
        echo '<tr class="hover">
<td height="30px" width="30%" align="center" valign="center">', $record[0], '</td>
<td height="30px" width="15%" align="center" valign="center">', $act_start_go, '</td>
<td height="30px" width="15%" align="center" valign="center">', $act_end_go, '</td>
<td height="30px" width="15%" align="center" valign="center">', $record[3], '</td>
<td height="30px" width="10%" align="center" valign="center">', $record[4], '</td>
<td height="30px" width="15%" align="center" valign="center"><button class="button">編輯活動</button></td>
</tr>';
    }
}
mysql_close($con);
