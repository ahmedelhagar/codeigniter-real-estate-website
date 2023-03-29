<div class="imager">
    <span class="fa fa-times" id="up-close"></span>
    <h5>رافع ملفات السهل</h5>
<iframe class="image-uploader" src="<?php echo base_url().'upload';?>"></iframe>
</div>
<div class="fa fa-upload uploader-t"></div>
<h6 class="powered">Powered By <a href="https://wisyst.com/">WISYST</a> @ 2020/2021</h6>
</div>
  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url(); ?>vendor/jquery/jquery.slim.min.js"></script>
  <script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>vendor/js/home.js"></script>
  <script src="<?php echo base_url(); ?>vendor/js/slick.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('.delete_data').click(function() {
        var id = $(this).attr('id');
        var wher = $('#wher').attr('value');
        if(confirm('Do You Want To Delete This Record?')){
            window.location="<?php echo base_url(); ?>arthouseadmin/delete/"+id+"/"+wher;
        }else{
            return false;
        }
    })
        $('.btny').click(function(){
            $(this).css('display','none');
        })
        })
</script>

</body>

</html>
