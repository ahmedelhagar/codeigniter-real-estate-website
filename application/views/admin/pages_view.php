<h4 class="tag"> Control Pages </h4>
<div class="col-lg-12 col-md-12 col-sm-12 btnss">
    <a href="<?php echo base_url().'arthouseadmin/adddropdown'; ?>" class="btn btn-success add"><span class="fa fa-plus"></span> أضف قائمة منسدلة</a>
    <a href="<?php echo base_url().'arthouseadmin/addoriginalpage'; ?>" class="btn btn-primary add">
        <span class="fa fa-plus"></span> أضف صفحة عادية</a>
    <a href="<?php echo base_url().'arthouseadmin/addlinkpage'; ?>" class="btn btn-warning add"><span class="fa fa-plus"></span> أضف رابط</a>
</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">اسم الصفحة</th>
      <th scope="col">النوع</th>
      <th scope="col">تعديل</th>
      <th scope="col">حذف</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $x=1;
          if($records){foreach ($records as $row){
      ?>
    <tr>
      <th scope="row"><?php echo $x; ?></th>
        <td><a href="<?php echo $this->main_model->p_link($row->state,$row->id); ?>"><?php echo $row->title; ?></a></td>
        <td><?php 
            echo $this->main_model->state($row->state);
            ?></td>
      <td><a href="<?php echo base_url().'arthouseadmin/edit/'.$row->id; ?>"><span class="fa fa-cogs"></span></a></td>
        <td>
            <a href="#" id="<?php echo $row->id; ?>" class="delete_data" style="color:#e74c3c;"><span class="fa fa-trash"></span></a>
        <input type="hidden" id="wher" value="arthousepages">
        </td>
    </tr>
      <?php $x++;}}else{
              ?>
      <h5>لايوجد صفحات لإظهارها.</h5>
      <?php
          } ?>
  </tbody>
</table>
