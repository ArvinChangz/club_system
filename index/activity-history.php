<?php
SESSION_START();

$Login_id =  $_SESSION['id'];
$con = mysql_connect("localhost", "root", "12345678");
mysql_select_db("sadb", $con);
$sql = "select t.act_name, t.act_start, t.act_end, t.act_location, l.LDAP_name, temp2.temp
from activity t, ldap l,  club_member c,
    (select count(LDAP_id) as temp, act_id as act_id
        from account_activity
        group by act_id) temp2
where t.LDAP_id = l.LDAP_id and t.act_id = temp2.act_id and t.club_id = (select club_id from club_member where LDAP_id = $Login_id)
group by t.club_id";
$rs = mysql_query($sql, $con);
date_default_timezone_set("Asia/Shanghai");
$t = time();
while ($record = mysql_fetch_row($rs)) {
    $act_start = strtotime($record[1]);
    $act_start_go = date("Y/m/d h:i", $act_start);
    $act_end = strtotime($record[2]);
    $act_end_go = date("Y/m/d h:i", $act_end);
    $today = date("Y/m/d h:i");
    $todaybefore = date("Y", strtotime("-4 year"));
    $fourday = date("Y-m-d H:i:s", mktime(0, 0, 0, date("08"), date("01"), date("$todaybefore")));
    if (strtotime($today) > strtotime($record[1]) and ($fourday < $record[1])) {
        echo '<tr class="hover">
<td height="30px" width="30%" align="center" valign="center">', $record[0], '</td>
<td height="30px" width="15%" align="center" valign="center">', $act_start_go, '</td>
<td height="30px" width="15%" align="center" valign="center">', $act_end_go, '</td>
<td height="30px" width="15%" align="center" valign="center">', $record[3], '</td>
<td height="30px" width="10%" align="center" valign="center">', $record[4], '</td>
<td height="30px" width="15%" align="center" valign="center">', $record[5], '</td>
</tr>';
    }
}
mysql_close($con);
