
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
    
      google.load("visualization", "1", {packages:["corechart"]});

      google.setOnLoadCallback(drawChart);
      function drawChart() {
       var data = new google.visualization.DataTable();
        data.addColumn('string', 'foo');
        data.addColumn('number', 'bar');
            

        <?php
          // query MySQL and put results into array $results
          foreach ($results as $row) {
              echo "data.addRow(['{$row->title}', {$row->book_stat}]);";
          }
        ?>

        var options = {
          title: 'Book Statistics'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
<div id="main-container" class="body width-fill">
          <div class="col">
                            <div class="cell">
    <div id="piechart" style="width: 900px; height: 500px;"></div>
    </div>
  </div>
</div>