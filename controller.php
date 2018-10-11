<?php
/*Androidからpost送信されてきたデータを
*csvファイルとして保存する。
*また、最新のデータをlastdate.csvとして
*保存し、realtime_data.htmlから参照できるようにする.
*リアルライム表示をするプログラムが今何回目のTFか把握するためのテキストファイルを更新する
*/

//これは第何回のTFであるか
//プログラムを書き直さずに変更する方法を考える必要あり。
header("Content-Type: text/html; charset=UTF-8");
$tf = "test";
$input = file_get_contents('php://input');
//$input = $_POST["data"];
$content = mb_convert_encoding($input, "UTF-8");
$p = strpos($content, ",");
$count = substr("$content", 0, $p);
$replace = substr($content, $p + 1, strlen($content)-$p);
$lines = explode("\n", $replace);

/*(time,pitch,yaw,roll,latitude,longitude,gpsCnt,straightDistance,
integralDistance,Elevator,rudder,trim,airspeed,cadence,ultsonuic,
atmopress,cadencevolt,selector,ultsonicvolt,sevrtvolt)
*/
$filename = "./data/" .$tf  ."/" .$tf ."_" .$count .".csv";
$lastdata = "./data/lastdata.csv";
$tf_num = "./data/tf_num.txt";

//TFが第何回のデータか保存する。
$tf_num_file = fopen($tf_num,'w');
fwrite($tf_num_file,$tf ."_" .$count);
fclose($tf_num_file);

//最新のデータを保存する。
$lastdatafile = fopen($lastdata,'w');
fwrite($lastdatafile,$lines[0]);
fclose($lastdatafile);

//受けったデータをすべて保存する
if(!file_exists($filename)){
  $file = fopen($filename,'w');
  fwrite($file,"time,pitch,yaw,roll,latitude,longitude,gpsCnt,straightDistance,integralDistance,Elevator,rudder,trim,airspeed,cadence,ultsonuic,atmopress,cadencevolt,selector,ultsonicvolt,sevrtvolt\n" .$replace);
  fclose($file);
}else{
  $file = fopen($filename,'a');
  fwrite($file, $replace);
  fclose($file);
}


?>
