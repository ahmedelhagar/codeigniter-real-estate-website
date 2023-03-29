<h4 class="tag"> Control Pages </h4>
<div class="col-lg-12 col-md-12 col-sm-12 btnss">
    <a href="<?php echo base_url().'arthouseadmin/addsupplies'; ?>" class="btn btn-primary add">
        <span class="fa fa-plus"></span> Add Supply job</a>
</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Supply jobs Title</th>
      <th scope="col">Applications</th>
      <th scope="col">Edit</th>
      <th scope="col">Remove</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $x=1;
          if($records){foreach ($records as $row){
      ?>
    <tr>
      <th scope="row"><?php echo $x; ?></th>
    <td><a href="<?php echo base_url().'arthouseadmin/applications/'.$row->id; ?>"><?php echo $row->title; ?></a></td>
        <?php
              $num = $this->main_model->getByDataw('items','(state = 14 AND c_id = '.$row->id.')','count');
                if($num == ''){$num=0;}
              ?>
        <td><a href="<?php echo base_url().'arthouseadmin/applications/'.$row->id; ?>"><?php echo $num.' Application'; ?></a></td>
      <td><a href="<?php echo base_url().'arthouseadmin/edit/'.$row->id; ?>"><span class="fa fa-cogs"></span></a></td>
        <td>
            <a href="#" id="<?php echo $row->id; ?>" class="delete_data" style="color:#e74c3c;"><span class="fa fa-trash"></span></a>
        <input type="hidden" id="wher" value="career">
        </td>
    </tr>
      <?php $x++;}}else{
              ?>
      <h5>There Is No Jobs To Show.</h5>
      <?php
          } ?>
  </tbody>
</table>
