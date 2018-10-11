<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

    if(empty($_GET)){//getでファイルを指定されていないときは最新のファイルを表示する。
      //どのcsvファイルにアクセスするのか確認する
      $tf_num = file_get_contents("./data/tf_num.txt");
      $all_data = file_get_contents("./data/test/" .$tf_num .".csv");
      echo $all_data;
    }else{//指定されているとき
      $all_data = file_get_contents("./data/test/" .$_GET['file_number'] .".csv");
      echo $all_data;
    }
     ?>

  </body>
</html>
