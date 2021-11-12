<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
                     <?php if(validation_errors()):?>
                                <div class="alert alert-danger col-lg-4" role="alert">
                                <?=validation_errors();?>
                                </div>
                            <?php endif ;?>
                     <div class="row">
                        <div class="col-lg">
                           <?= $this->session->flashdata('pesan'); ?>
                          <a href="menu" class="btn btn-primary mb-3" data-toggle="modal" data-target="#NewBarangModal">Daftar Barang</a>
                          <table class="table table-hover fa-fw ">
                    <thead>
                        <tr class="bg-success text-white">
                        <th scope="col">No</th>
                        <th scope="col">Barang</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Barang Masuk</th>
                        <th scope="col">Barang keluar</th>
                        <th scope="col">Edit/Hapus</th>


                        </tr>
                    </thead>
                    <tbody>
                          <?php $i = 1; ?>
                        <?php foreach($nama_barang as $b) : ?>
                        <tr>
                        <th scope="row "><?= $i; ?></th>
                        <td><?=$b['nama_barang'];?></td>
                        <td><?=$b['stok'];?></td>
                        <td><?=$b['harga_jual'];?></td>
                        <td><?=$b['barang_masuk'];?></td>
                        <td><?=$b['barang_keluar'];?></td>
                        <td>
                            <a href="<?= base_url()?>barang/edit/<?=$b['id'];?>" class="badge rounded-pill bg-success text-white col-4 p-2">Edit</a>
                            <a href="barang/hapus/<?=$b['id'];?>" class="badge rounded-pill bg-danger text-white col-5 p-2" onclick="return confirm('yakin mau dihapus ?');">Delete</a>
                        </td>
                        </tr>

                        <?php $i++; ?>
                        <?php endforeach; ?>

                    </tbody>
                    </table>
                    </div>


                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <!-- modal-->
            <!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="NewBarangModal" tabindex="-1" role="dialog" aria-labelledby="NewBarangModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="NewBarangModalLabel">Masukan Daftar Barang</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('barang');?>" Method="post"> 
      <div class="modal-body">
           <div class="form-group">
               <label >Nama Barang</label>
              <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="">
              
              <div class="form-group">
                  <label >Stok</label>
                 <input type="number" class="form-control" id="stok" name="stok" placeholder="">
            </div>
            
               <div class="form-group">
               <label >Harga jual</label>
               <input type="number" class="form-control" id="harga_jual" name="harga_jual" placeholder="">
            </div>
            
              <div class="form-group">
               <label >Barang Masuk</label>
               <input type="number" class="form-control" id="barang_masuk" name="barang_masuk" placeholder="">
            </div>
            
            
            
               <div class="form-group">
               <label>Barang keluar</label>
               <input type="number" class="form-control" id="barang_keluar" name="barang_keluar" placeholder="">
            </div>
  </div>
      </div>
            
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>