
<html>
<head>
    <style>
        body {font-family: sans-serif;
            font-size: 10pt;
        }
        p {	margin: 0pt; }
        table.items {
            border: 0.1mm solid #000000;
        }
        td { vertical-align: top; }
        .items td {
            border-left: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
        }
        table thead td { background-color: #EEEEEE;
            text-align: center;
            border: 0.1mm solid #000000;
            font-variant: small-caps;
        }
        .items td.blanktotal {
            background-color: #EEEEEE;
            border: 0.1mm solid #000000;
            background-color: #FFFFFF;
            border: 0mm none #000000;
            border-top: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
        }
        .items td.totals {
            text-align: right;
            border: 0.1mm solid #000000;
        }
        .items td.cost {
            text-align: "." center;
        }
    </style>
</head>
<body>
<h2 style="text-align: center;">Data Mahasiswa teknik Informatika Angkatan 2020 <br>Universitas Malikussaleh</h2>

<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
    <thead>
    <tr>
        <td width="5%">No.</td>
        <td width="45%">Nama</td>
        <td width="15%">Nim</td>
    </tr>
    </thead>
    <tbody>
    <!-- ITEMS HERE -->
          <?php
            $no=1;
            foreach($hasil as $data){
          ?>
    <tr>
      <th><?php echo $no++ ?></th>
      <td><?php echo htmlentities($data->nama, ENT_QUOTES, 'UTF-8');?></td>
      <td  align="center"><?php echo htmlentities($data->nim, ENT_QUOTES, 'UTF-8');?></td>
    </tr>
          <?php
            }
          ?>
    </tbody>
</table>
</body>
<script>
  window.print();
</script>
</html>