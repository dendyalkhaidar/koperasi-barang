<div class="container-fluid">

                    <!-- Page Heading -->

<div class="row">
   <div class="col-lg mb-5">
<form class="col-lg-4 mb-5" action="barang" method="post">
  <input type="hidden"name='id' value="<?=$edit['id']?>">
  <div class="form-group">
    <label for="formGroupExampleInput">judul</label>
    <input type="text" class="form-control" id="title" name="title"  value="<?=$edit['title']?>" placeholder="Example input placeholder">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">menu_id</label>
    <input type="text" class="form-control" id='menu_id' name='menu_id' value="<?=$edit['menu_id']?>" placeholder="Another input placeholder">
  </div>
   <div class="form-group">
    <label for="formGroupExampleInput2">url</label>
    <input type="text" class="form-control" id='url'name='url'value="<?=$edit['url']?>" placeholder="Another input placeholder">
  </div>
   <div class="form-group">
    <label for="formGroupExampleInput2">icon</label>
    <input type="text" class="form-control" id='icon' name='icon' value="<?=$edit['icon']?>" 
    placeholder="Another input placeholder">
     </div>

    <div class="form-group">
    <label for="formGroupExampleInput2">is_active</label>
    <input type="text" class="form-control" id='is_active' name='is_active' value="<?=$edit['is_active']?>" 
    placeholder="Another input placeholder">
     </div>
  <button class="btn btn-primary mb-5  " type="submit">Save</button>
  <button class="btn btn-primary mb-5" type="reset">Ulang</button>


</form>
   </div>
</div>

</div>