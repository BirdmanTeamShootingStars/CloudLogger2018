<!DOCTYPE html>
<html>
  <head>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  </head>
  <body>
    <div id="myDiv"></div>
    <?php
      $data =  file_get_contents("./data/test/test_1.csv");
     ?>
    <script type="text/javascript">
    var data = "<?php $data; ?>";

     var trace1 = {
        x: [1, 2, 3, 4],
        y: [10, 15, 13, 17],
        type: 'scatter'
      };

      var trace2 = {
        x: [1, 2, 3, 4],
        y: [16, 5, 11, 9],
        type: 'scatter'
      };

      var data = [trace1, trace2];

      Plotly.newPlot('myDiv', data);
     </script>
  </body>
</html>
