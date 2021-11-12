<div class="container-fluid">

                    <!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
<div class="row">
   <div class="col-lg mb-5">
<form class="col-lg-4 mb-5" action="barang" method="post">
  <input type="hidden"name='id' value="<?=$edit['id']?>">
  <div class="form-group">
    <label for="formGroupExampleInput">Barang</label>
    <input type="text" class="form-control" id="nama_barang" name="nama_barang"  value="<?=$edit['nama_barang']?>" placeholder="Example input placeholder">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Stok</label>
    <input type="text" class="form-control" id='stok' name='stok' value="<?=$edit['stok']?>" placeholder="Another input placeholder">
  </div>
   <div class="form-group">
    <label for="formGroupExampleInput2">Harga Jual</label>
    <input type="text" class="form-control" id='harga_jual' name='harga_jual' value="<?=$edit['harga_jual']?>" placeholder="Another input placeholder">
  </div>
   <div class="form-group">
    <label for="formGroupExampleInput2">Barang Masuk</label>
    <input type="text" class="form-control" id='barang_masuk' name='barang_masuk' value="<?=$edit['barang_masuk']?>" 
    placeholder="Another input placeholder">
     </div>

    <div class="form-group">
    <label for="formGroupExampleInput2">Barang keluar</label>
    <input type="text" class="form-control" id='barang_keluar' name='barang_keluar' value="<?=$edit['barang_keluar']?>" 
    placeholder="Another input placeholder">
     </div>
  <button class="btn btn-primary mb-5  " type="submit">Save</button>
  <button class="btn btn-primary mb-5" type="reset">Ulang</button>


</form>
   </div>
</div>

</div>