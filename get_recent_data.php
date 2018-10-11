<?php
  //アクセスするファイル名を取得する
  $tf_num_file = fopen("./data/tf_num.txt",'r');
  $tf_num = fgets($tf_num_file);
  fclose($tf_num_file);

  //$recent_data_file = fopen("./data/test/" .$tf_num .".csv",'r');


  $data = file_get_contents("./data/test/" .$tf_num .".csv");
  $results = explode("\n",$data);
  $data_size = sizeof($results);
  //最新のデータ50個を返す
  if($data_size>=50){
    for($i=50;$i>=0;$i--){
      echo $results[$data_size-$i];
      echo "\n";
    }
  }else{   //データ数が50未満の時は0を補う
    for($i=0;$i<50-($data_size);$i++){
      echo "0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,";
      echo "\n";
    }
    for($i=0;$i<$data_size;$i++){
      echo $results[$i];
      echo "\n";
    }
  }
  /*
  $results = fgets($recent_data_file);
  $data_amount = sizeof($results);
  echo $data_amount;
  for($i=1;$i<50;$i++){
    $results = fgets($recent_data_file);
    echo $results;
  }
  fclose($recent_data_file);
*/
 ?>
