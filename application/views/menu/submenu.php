                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                  <div class="row">
                        <div class="col-lg">
                             <?php if(validation_errors()):?>
                                <div class="alert alert-danger col-lg-4" role="alert">
                                <?=validation_errors();?>
                                </div>
                            <?php endif ;?>
                           
                          <?= $this->session->flashdata('pesan'); ?>
                        <a href="menu" class="btn btn-primary mb-3" data-toggle="modal" data-target="#NewSubMenuModal">Add New SubMenu</a>
                        <table class="table table-hover fa-fw">
                    <thead>
                        <tr class="bg-success text-white">
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">active</th>
                        <th scope="col">action</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                          <?php $i = 1; ?>
                        <?php foreach($subMenu as $sm) : ?>
                        <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?=$sm['title'];?></td>
                        <td><?=$sm['menu'];?></td>
                        <td><?=$sm['url'];?></td>
                        <td><?=$sm['icon'];?></td>
                        <td><?=$sm['is_active'];?></td>
                        <td>
                            <a href="<?= base_url()?>menu/delete/<?=$sm['id']?>" class="badge rounded-pill bg-danger text-white col-7 p-2 " onclick="return confirm('yakin mau dihapus ?');">Delete</a>
                            <a href="<?= base_url()?>menu/edit/<?=$sm['id']?>" class="badge rounded-pill bg-primary text-white col-7 p-2 mt-2">Edit</a>
                        </td>
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
<div class="modal fade" id="NewSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="NewSubMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="NewSubMenuModalLabel">Add New SubMenu</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('menu/submenu');?>" Method="post"> 
      <div class="modal-body">
           <div class="form-group">
              <input type="text" class="form-control" id="title" name="title" placeholder="submenu name">
            </div>

               <div class="form-group">
              <select type="text" class="form-control" id="menu_id" name="menu_id" >
                  <option value="">Select menu</option>
                  <?php foreach($menu as $m) : ?>
                    <option value="<?= $m['id']?>"><?= $m['menu']?></option>
                  <?php endforeach ; ?>


              </select>
        </div>      

                <div class="form-group">
              <input type="text" class="form-control" id="url" name="url" placeholder="url">
        </div>

            <div class="form-group">
              <input type="text" class="form-control" id="icon" name="icon" placeholder="menu icon">
        </div>
                 <div class="form-group">
             <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active "checked>
            <label class="form-check-label" for="is_active" >
                Active ?
            </label>
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
            
