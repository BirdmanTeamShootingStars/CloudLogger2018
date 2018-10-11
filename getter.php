<?php
/*realtime_data.htmlから非同期通信んされたとき、
*./data/lastdata.csvにアクセスしてデータをとってくる
*/
$lastdata = fopen("./data/lastdata.csv","r");
$result = fgets($lastdata);
echo $result;
 ?>
