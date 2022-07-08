

            <?php include "config/koneksi.php";
            $query = mysqli_query($koneksi, 'SELECT MAX(harga_barang) AS harga_tertinggi FROM is_barang;')->fetch_array();
            $isiData = mysqli_query($koneksi, 'SELECT * FROM is_barang');
            ?>
<br>

<!-- <script>
$array1 = array();
$result = mysql_query("SELECT is_barang FROM is_barang");
while ($row = mysql_fetch_assoc($result)) {
   $array1 = array_merge($array1, array_map('trim', explode(",", $row['article_tags_fld'])));
}
</script> -->

<div style="width: 50%">
    <canvas id="canvas" height="450" width="600"></canvas>
  </div>

  <script>
  var getRandomDataArray = function () {
    var dataArray = [];
    for (var i = 0; i < 7; i++) dataArray.push(Math.round(Math.random() * 100));
    return dataArray;
  }
  
  var chartData = {
  	labels : ["January","February","March","April","May","June","July"],
  	datasets : [
      {
        fillColor : "#ffa500",
        strokeColor : "rgba(220,220,220,0.8)",
        highlightFill: "rgba(220,220,220,0.75)",
        highlightStroke: "rgba(220,220,220,1)",
        data : getRandomDataArray()
      },
      {
        fillColor : "rgba(151,187,205,0.5)",
        strokeColor : "rgba(151,187,205,0.8)",
        highlightFill : "rgba(151,187,205,0.75)",
        highlightStroke : "rgba(151,187,205,1)",
        data : getRandomDataArray()
      }
  	]
  }
  window.onload = function(){
    var chartOptions = { responsive : true };
    var chart = document.getElementById("canvas").getContext("2d");
    window.myBar = new Chart(chart).Bar(chartData, chartOptions);
  }
  </script>
<p>Harga Tertinggi : <?php echo $query['harga_tertinggi'] ?></p>
