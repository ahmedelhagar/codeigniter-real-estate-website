  </div>
<!--Footer-->
    <footer>
    <div class="col-lg-10 col-md-11 col-sm-12 mx-auto">
        <div class="col-lg-4 col-md-4 col-sm-12 footer_wid">
          <h5><?php echo $langArray['who_are_us']; ?></h5>
          <span style="color:#ddd;"><?php echo preg_replace('!\s+!', ' ',mb_substr(strip_tags($settings['welcome']),0,300, "utf-8")); ?></span>
        </div>
          <div class="col-lg-4 col-md-4 col-sm-12 footer_wid">
                <h5><?php echo $langArray['important_links']; ?></h5>
              <ul>
                  <?php if($links){foreach($links as $link){ ?>
                  <li class="col-lg-6 col-md-6 col-sm-12 float-left px-0"><a href="<?php echo $link->content; ?>"><?php echo $link->title; ?></a></li>
                  <?php }} ?>
              </ul>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 footer_wid">
              <h5><?php echo $langArray['contact_us']; ?></h5>
              <ul>
                <li class="col-lg-12 col-md-12 col-sm-12 float-left px-0"><span class="fa fa-envelope"></span> <?php echo $settings['email']; ?></li>
                <li class="col-lg-12 col-md-12 col-sm-12 float-left px-0"><span class="fa fa-phone-alt"></span> <?php echo $settings['telephone']; ?></li>
                <li class="col-lg-12 col-md-12 col-sm-12 float-left px-0"><span class="fa fa-map-marker"></span> <?php echo $settings['c_add']; ?></li>
                <div class="float-<?php echo $langArray['float']; ?> top-icos">
                  <!-- Icons -->
                  <a class="ic-top" href="<?php echo $settings['linkedin']; ?>">
                    <i class="fab fa-whatsapp fa-lg fa-2x"> </i>
                  </a>
                  <a class="ic-top" href="<?php echo $settings['youtube']; ?>">
                    <i class="fab fa-instagram fa-lg fa-2x"> </i>
                  </a>
                  <a class="ic-top" href="<?php echo $settings['twitter']; ?>">
                    <i class="fab fa-twitter fa-lg fa-2x"> </i>
                  </a>
                  <a class="ic-top" href="<?php echo $settings['facebook']; ?>">
                    <i class="fab fa-facebook-f fa-lg fa-2x"> </i>
                  </a>
                </div>
              </ul>
          </div>
          <!-- Footer Elements -->
          <div class="col-lg-12 col-md-12 col-sm-12 float-left">
          <div class="col-lg-12 col-md-12 col-sm-12 copys" style="margin:auto;">
            <?php echo $settings['fax']; ?> Designed by
            <a href="https://wisyst.com/">WISYST</a>
          </div>
        </div>
        </div>
      </div>
    </footer>
    <div class="galleryData">
    <div class="close-gallery">
      <span class="fa fa-times"></span>
    </div>
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
                      <!-- slides -->
                      <div class="carousel-inner fullGalleryData">
                          <!--<div class="carousel-item active"> <img src="https://i.imgur.com/weXVL8M.jpg" alt="Hills"> </div>
                          <div class="carousel-item"> <img src="https://i.imgur.com/Rpxx6wU.jpg" alt="Hills"> </div>
                          <div class="carousel-item"> <img src="https://i.imgur.com/83fandJ.jpg" alt="Hills"> </div>
                          <div class="carousel-item"> <img src="https://i.imgur.com/JiQ9Ppv.jpg" alt="Hills"> </div>-->
                      </div> <!-- Left right --> <a class="carousel-control-prev" href="#custCarousel" data-slide="prev"> <span class="fa fa-chevron-left"></span> </a> <a class="carousel-control-next" href="#custCarousel" data-slide="next"> <span class="fa fa-chevron-right"></span> </a> <!-- Thumbnails -->
                      <ol class="carousel-indicators list-inline">
                          <!--<li class="list-inline-item active"> <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#custCarousel"> <img src="https://i.imgur.com/weXVL8M.jpg" class="img-fluid"> </a> </li>
                          <li class="list-inline-item"> <a id="carousel-selector-1" data-slide-to="1" data-target="#custCarousel"> <img src="https://i.imgur.com/Rpxx6wU.jpg" class="img-fluid"> </a> </li>
                          <li class="list-inline-item"> <a id="carousel-selector-2" data-slide-to="2" data-target="#custCarousel"> <img src="https://i.imgur.com/83fandJ.jpg" class="img-fluid"> </a> </li>
                          <li class="list-inline-item"> <a id="carousel-selector-2" data-slide-to="3" data-target="#custCarousel"> <img src="https://i.imgur.com/JiQ9Ppv.jpg" class="img-fluid"> </a> </li>-->
                      </ol>
                  </div>
              </div>
          </div>
      </div>
    </div>
  <!-- Bootstrap core JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>vendor/js/home.js"></script>
  <script src="<?php echo base_url(); ?>vendor/js/slick.js"></script>
  <script type="text/javascript">
  function getGallery(i_id){
       // your code go here
      $.ajax({
          url:"<?php echo base_url('pages/getGallery/'); ?>",
          type:"POST",
          dataType: "json",
          async: true,
          data: {
              'i_id' : i_id
          },
          success:function(response){
                if(response.done == 1){
                  var thumbs = '';
                  var full = '';
                  for (var i=0; i<response.items.length; i++) {
                    if(i < 1){
                      var active = ' active';
                    }else {
                      var active = '';
                    }
                      full += '<div class="carousel-item'+active+'"> <img src="'+response.items[i]['file']+'" alt="'+response.items[i]['title']+'"> </div>';
                      thumbs += '<li class="list-inline-item'+active+'"> <a id="carousel-selector-'+i+'" data-slide-to="'+i+'" data-target="#custCarousel"> <img src="'+response.items[i]['content']+'" class="img-fluid"> </a> </li>';
                  }
                  $('.fullGalleryData').html(full);
                  $('.list-inline').html(thumbs);
                  $('.galleryData').fadeIn();
                }
              }
      });
  }
  $('.close-gallery').click(function() {
    $('.galleryData').fadeOut();
  })
  </script>
</body>

</html>