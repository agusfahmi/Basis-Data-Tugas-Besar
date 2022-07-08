
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Aplikasi CRUD</title>
    
    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/datepicker.min.css" rel="stylesheet">
    <link href="assets/js/dataTables/css/dataTables.bootstrap.css" rel="stylesheet">
    <script src="assets/chart.js/dist/chart.js"></script>

    <!-- styles -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Fungsi untuk membatasi karakter yang diinputkan -->
    <script language="javascript">
      function getkey(e)
      {
        if (window.event)
          return window.event.keyCode;
        else if (e)
          return e.which;
        else
          return null;
      }

      function goodchars(e, goods, field)
      {
        var key, keychar;
        key = getkey(e);
        if (key == null) return true;
       
        keychar = String.fromCharCode(key);
        keychar = keychar.toLowerCase();
        goods = goods.toLowerCase();
       
        // check goodkeys
        if (goods.indexOf(keychar) != -1)
            return true;
        // control keys
        if ( key==null || key==0 || key==8 || key==9 || key==27 )
          return true;
          
        if (key == 13) {
            var i;
            for (i = 0; i < field.form.elements.length; i++)
                if (field == field.form.elements[i])
                    break;
            i = (i + 1) % field.form.elements.length;
            field.form.elements[i].focus();
            return false;
            };
        // else return false
        return false;
    }
    </script>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <!-- Brand -->
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Tugas Besar Basis Data</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Input<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="?page=tambah-data-barang">Input Data Barang</a></li>
          <li><a href="?page=tambah-data-company">Input Data Company</a></li>
          <li><a href="?page=transaksi">Transaksi Barang</a></li>
        </ul>
      </li>
      <li><a href="?page=rekap">Rekap Data</a></li>
      <li><a href="?page=admin">Admin</a></li>
      <li><a href="?page=chart">Chart</a></li>
    </ul>
    </nav>

    <div class="container-fluid">
      <?php
      if (empty($_GET["page"])) {
      include "page/home.php";
      } elseif ($_GET['page'] == 'tambah-data-barang') {
        include "page/form-tambah.php";
      } elseif ($_GET['page'] == 'ubah') {
        include "page/form-ubah.php";
      }  elseif ($_GET['page'] == 'rekap') {
        include "table/rekap_table.php";
      } elseif ($_GET['page'] == 'tambah-data-company') {
        include "page/form-company.php";
      } elseif ($_GET['page'] == 'admin') {
        include "crud/tampil-data.php";
      } elseif ($_GET['page'] == 'chart') {
        include "page/chart-data.php";
      } elseif ($_GET['page'] == 'transaksi') {
        include "page/transaksi.php";
      } 
      ?>
    </div>
     <!-- /.container-fluid -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.min.js"></script>
    <!-- DataTables -->
    <script src="assets/js/dataTables/js/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/js/dataTables.bootstrap.js"></script>

    <script type="text/javascript">
      $(function () {

        //datepicker plugin
        $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        });

        // toolip
        $('[data-toggle="tooltip"]').tooltip();

        $('#dataTables-example').dataTable( {
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            "pageLength": 5
        } );
      })
    </script>
  </body>
</html>