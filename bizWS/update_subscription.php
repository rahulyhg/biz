<?php

mysql_connect("localhost", "bizjumper123", "bizjumper@2016");
mysql_select_db("bizjumper");
$date = '2016-11-09';
$result = mysql_query("select uid from biz_subscription where end_date < '$date'");
$count = mysql_num_rows($result);
if (!empty($count)) {
    while ($row = mysql_fetch_array($result)) {
        $uid = $row['uid'];
        $result = mysql_query("select subs_type from biz_users where user_id < '$uid'");
        $count = mysql_num_rows($result);
        if (!empty($count)) {
            echo "update biz_subscription set pid='1',balance='0' where uid='$uid'"; die;
            mysql_query("update biz_subscription set pid='1',balance='0' where uid='$uid'");
            mysql_query("update biz_users set subs_type = '1', membership ='0' where uid='$uid'");
        }
    }
} else {
    echo 'No data found !!';
}
?>