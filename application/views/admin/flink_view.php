<h4 class="tag"> روابط التذييل </h4>
<div class="col-lg-12 col-md-12 col-sm-12 btnss">
    <a href="<?php echo base_url().'arthouseadmin/addflink'; ?>" class="btn btn-primary add">
        <span class="fa fa-plus"></span> أضف رابط</a>
</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">عنوان الرابط</th>
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
        <td><a href="<?php echo $row->content; ?>"><?php echo $row->title; ?></a></td>
      <td><a href="<?php echo base_url().'arthouseadmin/edit/'.$row->id; ?>"><span class="fa fa-cogs"></span></a></td>
        <td>
            <a href="#" id="<?php echo $row->id; ?>" class="delete_data" style="color:#e74c3c;"><span class="fa fa-trash"></span></a>
        <input type="hidden" id="wher" value="flink">
        </td>
    </tr>
      <?php $x++;}}else{
              ?>
      <h5>لايوجد روابط لعرضها.</h5>
      <?php
          } ?>
  </tbody>
</table>
