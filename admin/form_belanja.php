<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Belanja</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <h3>BELANJA ONLINE</h3>
    <hr>
    <?php
    $ar_produk =[
        "TV"=>"TV",
        "KULKAS"=>"KULKAS",
        "MESIN CUCI"=>"MESIN CUCI",
    ]
?>
    <form method="post" action="form_belanja.php">
    <div class="form-group row">
        <label for="nama" class="col-4 col-form-label">Customer</label> 
        <div class="col-8">
        <input id="nama" name="nama" placeholder="Nama Customer" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
            <label class="col-4">Pilih Produk</label> 
            <div class="col-8">
                <?php foreach ($ar_produk as $key => $produk) : ?>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="produk" id="produk_<?= $key; ?>" type="radio" class="custom-control-input" value="<?= $key; ?>" required> 
                        <label for="produk_<?= $key; ?>" class="custom-control-label"><?= $produk; ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <div class="form-group row">
    <label for="jumlah" class="col-4 col-form-label">Jumlah</label> 
    <div class="col-8">
      <input id="jumlah" name="jumlah" type="text" class="form-control">
    </div>
  </div>  
    <div class="form-group row">
        <div class="offset-4 col-8">
        <button name="submit" type="submit" class="btn btn-success">Kirim</button>
        </div>
    </div>
    </form>
    <hr>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //menampilkan hasil di web
        $_nama = $_POST['nama'];
        $_produk = $_POST['produk'];
        $_jumlah = $_POST['jumlah'];

        $_harga_produk = [
            "TV" => 4200000,
            "KULKAS" => 3100000,
            "MESIN CUCI" => 3800000
        ];

        $_harga = $harga_produk[$produk];
        $_total = $harga * $jumlah;

        if (array_key_exists($_produk, $_harga_produk)) {
            $_harga = $_harga_produk[$_produk];
            $_total = $_harga * $_jumlah;
    }
        
    }
    ?>
    Nama Customer: <?=$_nama; ?><br>
    Produk Pilihan: <?=$_produk; ?><br>
    Jumlah Beli: <?=$_jumlah; ?><br>
    Total Belanja: Rp <?= number_format($_total, 0, ',', '.'); ?>



</body>
</html>