<h4 class="tag"> التحكم في الأخبار </h4>
<div class="col-lg-12 col-md-12 col-sm-12 btnss">
    <a href="<?php echo base_url().'arthouseadmin/addnews'; ?>" class="btn btn-primary add">
        <span class="fa fa-plus"></span> أضف خبر</a>
</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">عنوان الخبر</th>
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
      <td><a href="<?php echo base_url().'arthouseadmin/edit/'.$row->id; ?>"><span class="fa fa-cogs"></span></a></td>
        <td>
            <a href="#" id="<?php echo $row->id; ?>" class="delete_data" style="color:#e74c3c;"><span class="fa fa-trash"></span></a>
        <input type="hidden" id="wher" value="news">
        </td>
    </tr>
      <?php $x++;}}else{
              ?>
      <h5>لايوجد أخبار لإظهارها.</h5>
      <?php
          } ?>
  </tbody>
</table>
