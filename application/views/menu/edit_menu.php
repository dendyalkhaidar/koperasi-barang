<div class="container-fluid">

                    <!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
<div class="row">
   <div class="col-lg mb-5">
<form class="col-lg-4 mb-5" action="barang" method="post">
  <input type="hidden"name='id' value="<?=$edit_menu['id']?>">
  <div class="form-group">
    <label for="formGroupExampleInput">judul</label>
    <input type="text" class="form-control" id="title" name="title"  value="<?=$edit_menu['menu']?>" placeholder="Example input placeholder">
  </div>
  <button class="btn btn-primary mb-5  " type="submit">Save</button>
  <button class="btn btn-primary mb-5" type="reset">Ulang</button>


</form>
   </div>
</div>

</div>