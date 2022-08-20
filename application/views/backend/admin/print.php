<!DOCTYPE html>
<html lang="en">

<head>

    <title>Print Data Mahasiswa</title>
    <link rel="stylesheet" href="<?= base_url('backend/') ?>assets/vendor/css/core.css" class="template-customizer-core-css" />


</head>

<body">

<div class="container-fluid">
  <div class="row">
    <h2 class="text-center pb-4">Data Mahasiswa teknik Informatika Angkatan 2020 <br>Universitas Malikussaleh</h2>
  <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">no</th>
      <th scope="col">Nama</th>
      <th scope="col">NIM</th>
    </tr>
  </thead>
  <tbody>
          <?php
            $no=1;
            foreach($hasil as $data){
          ?>
    <tr>
      <th><?php echo $no++ ?></th>
      <td><?php echo htmlentities($data->nama, ENT_QUOTES, 'UTF-8');?></td>
      <td><?php echo htmlentities($data->nim, ENT_QUOTES, 'UTF-8');?></td>
    </tr>
          <?php
            }
          ?>
  </tbody>
  </table>
  </div>
</div>
<script>
window.print();
//window.history.back();
</script>
</body>

</html>