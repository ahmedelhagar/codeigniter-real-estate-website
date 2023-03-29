<?php 
$res22 = $this->main_model->getByData('settings','id',1);
$row22 = (array) $res22[0];
?>
<style type="text/css">
/*
Desgin : Art Hous
By : Ahmed Elhaggar -Employer-
*/
#load{
    width:100%;
    height:100%;
    position:fixed;
    z-index:9999999;
    background:url("<?php echo base_url(); ?>vendor/images/loader.gif") no-repeat center center #fff;
    float: left;
}
a:hover{
    text-decoration:none;
}
/* width */
::-webkit-scrollbar {
  width: 10px;
}
/* Track */
::-webkit-scrollbar-track {
  background: #fafafa; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: <?php echo $row22['color']; ?>; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: <?php echo $row22['hover']; ?>; 
}
html {
      overflow-y: scroll;
  scrollbar-color: <?php echo $row22['color']; ?> #fafafa;
  scrollbar-width: thin;
}
    html, body {
      margin: 0;
      padding: 0;
      background: #ffffff;
    }

    * {
      box-sizing: border-box;
    }

    .slider {
        width: 90%;
        margin: 50px auto;
    }

    .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
        width: 250px;
        height: 250px;
    }

    .slick-prev:before,
    .slick-next:before {
      color: black;
    }


    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: .2;
    }
    
    .slick-active {
      opacity: .5;
    }

    .slick-current {
      opacity: 1;
    }
nav.navbar.navbar-expand-lg.navbar-dark.bg-dark.static-top {
    background: #fff !important;
    border-bottom: 1px solid #ddd;
    z-index: 99;
}
img.logo {
max-width: 240px !important;
}
.active a.nav-link {
    color: <?php echo $row22['color']; ?> !important;
    font-weight: bold;
    border-bottom: 2px solid <?php echo $row22['color']; ?>;
}
a.dropdown-item.active {
    color: <?php echo $row22['color']; ?> !important;
    background: #fff0;
    font-weight: bold;
}
a.nav-link {
    color: #292929 !important;
    padding: 10px;
    font-size: 0.9rem;
}
button.navbar-toggler {
    color: #292929 !important;
    border-color: #292929 !important;
    border-radius: 0px !important;
}
li.nav-item {
    border-bottom: 2px solid #fff;
}
.dropdown-item:hover {
    color: #8b5201 !important;
    font-weight: bold;
    transition: all 0.1s ease-in-out;
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
    -o-transition: all 0.1s ease-in-out;
}
a.nav-link.dropdown-toggle:hover {
    color: #8b5201;
    transition: all 0.1s ease-in-out;
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
    -o-transition: all 0.1s ease-in-out;
}
.dropdown-menu {
    z-index: 999;
}
.active:hover{
    color: #fff !important;
    font-weight: normal;
}
.nav-item:hover{
    border-bottom: 2px solid <?php echo $row22['color']; ?>;
    transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
}
.getGallery {
    cursor: pointer;
}
.carousel-inner img {
    width: 100%;
    height: 100%
}

#custCarousel .carousel-indicators {
    position: static;
    margin-top: 20px
}

#custCarousel .carousel-indicators>li {
    width: 100px
}

#custCarousel .carousel-indicators li img {
    display: block;
    opacity: 0.5
}

#custCarousel .carousel-indicators li.active img {
    opacity: 1
}

#custCarousel .carousel-indicators li:hover img {
    opacity: 0.75
}

.carousel-item img {
    width: 70%;
    max-height:520px;
}
.galleryData {
    position: fixed;
    width: 100%;
    z-index: 10000;
    background: #00000087;
    height: 100%;
    display: none;
}
.close-gallery {
    font-size: 30px;
    color: #fff;
    cursor: pointer;
    padding:10px;
}
.topper {
    background: #282828;
    color: #fff;
    text-align: right;
    padding: 0px;
    font-size: 13px;
    left: auto;
}
.email, .telephone {
    float: right;
    padding-left: 20px;
    padding: 10px;
    font-size: 12px;
}
.topper span.fa {
    background: #8b5201;
    color: #ffffff;
    padding: 5px;
    border-radius: 3px;
    font-size: 11px;
    float: right;
    margin-left: 5px;
}
.service-block{
    background: linear-gradient(rgba(0, 0, 0, 0.78), rgba(0, 0, 0, 0.78)), url(<?php echo base_url(); ?>vendor/images/service.png);
    background-position: center top;
    display:table;
}
.service-block{
    color: #ffffff;
    padding: 30px 0px;
    text-align: center;
}
.service-block h2{
    margin:50px 0px;
}
.contact-img {
    padding: 10px;
    background: #f29625;
    width: 50px;
    border-radius: 40px;
}
.latest h2{
    color:<?php echo $row22['color']; ?>;
    margin:20px 0px;
}
.service-item{
    background: #fff;
    padding: 0px;
    border-radius: 5px;
    border-top-right-radius: 7px;
    border-top-left-radius: 7px;
}
.service-item img{
    width: 100%;
    height: 200px;
    border-top-right-radius: 7px;
    border-top-left-radius: 7px;
}
.service-item h4{
    text-align: center;
    color: #7d7d7d;
    margin: 10px 0px;
    font-weight: bold;
}
.ser-desc{
    color: #7d7d7d;
    text-align: left;
    padding: 20px;
    word-break: break-word;
}
.ci2{
    width: 100%;
    float: left;
    margin: 40px 0px;
    position: unset;
}
.lang {
    padding: 13px;
    background: #864e01;
    transform: skew(-20deg);
    margin-left: -20px;
    font-size: 13px;
}
.lang a {
    text-decoration: none;
    color: #fff;
    transform: skew(20deg);
    display: block;
}
a.ic-top {
    color: #fff;
    font-size: 9px;
    margin: 0px 3px;
    float: right;
    padding: 4px;
}
div#navbarResponsive {
    direction: rtl;
    margin-top: 30px;
}
.top-icos{
    padding:10px;
}
.content{
    padding: 0px;
    float: left;
}
.vv {
    float: left;
    margin-top: 30px;
}
a.carousel-control-prev {
    color: #fff;
    position: absolute !important;
    top: 50%;
    padding: 0px;
    border-radius: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    line-height: 0;
    text-align: center;
    font-size: 55px;
    left: 10px;
}
a.carousel-control-next {
    color: #fff;
    position: absolute !important;
    top: 50%;
    padding: 0px;
    border-radius: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    line-height: 0;
    text-align: center;
    font-size: 55px;
    right: 10px;
}
.carousel-indicators li {
    display: inline-block;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #dee2e6;
    border-top: 0px;
    border-bottom: 0px;
    opacity: 1;
}
.carousel-indicators .active {
    background-color: <?php echo $row22['color']; ?>;
}
a.carousel-control-prev:hover {
    color: #fff;
}
a.carousel-control-next:hover {
    color: #fff;
}
h4.img-block {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 10px;
    color: #fff;
    text-align:center;
}
.img-block p {
    width: 100%;
    float: right;
    margin-top: 20px;
}
a.rm-slide {
    padding: 10px;
    margin-top: 20px;
    border: 1px solid #fff;
    color: #fff;
    font-size: 16px;
    border-radius: 5px;
}
.inner {
    width: 100%;
    height: 100%;
    float: left;
    background: #292929c2;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 5px !important;
}
.news {
    float: left;
    padding: 10px;
    background-color: orange;
    color: #fff;
    width: 72px;
    font-size: 20px;
}
.inner-img {
    width: 100% !important;
    max-height: fit-content !important;
    height: fit-content !important;
}
marquee.news-bar {
    float: left;
    width: 92%;
    padding: 12px;
    border-bottom: 2px solid orange;
}
.latest {
    float: left;
    padding: 15px;
    text-align: center;
}
.latest .service-item {
    border-radius: 5px;
}
.latest .service-item img{
    height: 310px !important;
    border-radius: 5px;
}
.service-item h4 {
    margin: 15px auto auto auto;
}
.item-title-ho span {
    color: #fff;
    background: #f0f8ff00;
    border-radius: 5px;
    border: 1px solid #fff;
    padding: 10px;
}
ul.navbar-nav.ml-auto {
    /* float: left; */
    /* margin-left: unset !important; */
    /* left: 0px; */
    /* right: unset; */
    /* margin: auto; */
    direction: ltr;
}
.page-banner {
    background: linear-gradient(rgb(7 12 19 / 70%), rgba(7 12 19 / 70%)), url(<?php echo base_url(); ?>vendor/images/pagebanner.png);
    min-height: 300px;
    background-size: cover;
}
.page-banner h3{
    text-align: left;
    float: left;
    color: #fff;
    margin-top: 8%;
    padding-left: 80px;
}
.page-banner span {
    float: right;
    color: #fff;
    margin-top: 10%;
    padding-right: 80px;
}
.who-con{
    color: #6c6c6c;
    font-size: 20px;
}
.who-con h3{
    color: #002095;
    margin: 20px 0px;
}
.who-img-pg img {
    box-shadow: 15px 15px 0px #ededed;
    max-width: 100%;
    border-radius: 5px;
}
.who-more {
    padding: 30px;
    border: 1px solid #ddd;
    border-radius: 10px;
    background: #fff;
    color: #777e82;
    font-size: 17px;
}
.who-more span.fa {
    color: #032396;
    font-size: 30px;
}
.who-more h4 {
    color: #032396;
    font-size: 25px;
    margin: 10px 0px;
}
.who-more-m{
    background:#181530;
    color:#fff;
    padding: 30px;
    border: 1px solid #ddd;
    border-radius: 10px;
    font-size: 17px;
}
.who-more-m h4{
    color:#fff;
}
.who-more-m span{
    color:#fff;
    font-size: 30px;
}
li.nav-item {
    padding: 0px 30px;
    font-weight: bold;
}
.who-img{
    float: left;
    margin: 40px 30px 40px 0px;
    box-shadow: 25px 45px 0px #ededed;
    border-radius:5px;
    width: 35%;
    z-index:1;
}
.service-block{
    min-height:652.5px;
}
.who {
    width: 80%;
    margin-top: 120px;
    background: #fff;
    z-index: 10;
    box-shadow: 0px 0px 10px 6px #0000001a;
    border-radius: 5px;
    padding: 40px;
    font-size: 17px;
    position: absolute;
    text-align: left;
    float: right;
    right: 0;
}
.who2{
    width: 70%;
    margin-top: 120px;
    background: #fff;
    z-index: 10;
    box-shadow: 0px 0px 10px 6px #0000001a;
    border-radius: 5px;
    padding: 30px;
    font-size: 17px;
    position: absolute;
    text-align: left;
    right: 0;
}
.who-img2 {
    float: left;
    margin: 40px 30px 40px 0px;
    border-radius: 5px;
    width: 60%;
    z-index: 1;
}
.who h2{
    text-align: left;
    color: #8b5201;
}
.who2 a {
    color: #5f5f5f;
}
.item {
    float: left;
    padding: 15px;
    text-align: center;
}
.inner-item {
    padding: 0px;
}
.inner-item:hover .ite{
    display: block;
}
.inner-item img {
    width: 100%;
    max-height: 307px;
}
.inner.ite {
    display: none;
    border-top-left-radius:20px;
    border-top-right-radius:20px;
}
.item-title {
    color: #fff;
    font-size: 17px;
    margin: 0px auto;
    width: 50px;
    background: <?php echo $row22['color']; ?>;
    padding: 15px;
    border-radius: 40px;
}
.tag{
    text-align: center;
}
.tag {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    padding-right: 0.5rem;
    z-index: 5;
}
.tag:before, .tag:after {
    content: "";
    height: 1px;
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    background: #ddd;
}
.view-all {
    font-size: 18px;
    text-decoration: none;
    border: 2px solid <?php echo $row22['color']; ?>;
    color: <?php echo $row22['color']; ?>;
    padding: 12px 30px;
    border-radius: 4px;
}
.view-all:hover{
    background-color: <?php echo $row22['color']; ?>;
    color: #fff;
    text-decoration: none;
}
.inner-who {
    float: left;
    width: 100%;
    text-align: center;
    margin-top: 20px;
    background: <?php echo $row22['color']; ?>;
    color: #fff;
    padding: 20px;
}
.w-item {
    float: left;
    padding: 15px;
}
.w-item span.fa,.w-item span.fas {
    font-size: 50px;
    padding: 10px;
}
.w-item h6 {
    font-weight: bold;
    font-size: 18px;
}
.s-btn {
    padding: 10px;
    background: <?php echo $row22['color']; ?>;
    color: #fff;
    cursor: pointer;
    margin-left: 10px;
}
.search {
    padding: 15px;
    text-align: left;
    float: left;
    border-bottom: 1px solid #ddd;
    position: fixed;
    z-index: 1;
    background: #fff;
    display: none;
}
.search form {
    margin: auto;
    display: block;
    width: 100%;
}
input.form-control.search-bar {
    border-radius: 0px;
    width: 93%;
    float: left;
}
.search button {
    width: 7%;
    padding: 7px;
    border: 0px;
    background: #ddd;
}
.search button:hover {
    background: <?php echo $row22['color']; ?>;
    color: #fff;
    -webkit-transition: .3s all ease-in-out;
    -o-transition: .3s all ease-in-out;
    transition: .3s all ease-in-out;
}
._card{
    float: left;
    padding: 15px;
}
.card {
    float: left;
    padding: 0px;
}
footer {
    width: 100%;
    float: left;
    padding: 30px 30px 0px 30px;
    background-color: #ffffff;
    margin-top: 50px;
    background: linear-gradient(rgb(7 12 19 / 90%), rgba(7 12 19 / 90%)), url(<?php echo base_url(); ?>vendor/images/who.png);
    background-position: center top;
    display: table;
}
.copys {
    padding: 20px;
    background: #864e01;
    text-align: center;
    color: #fff;
}
.footer_wid {
    float: left;
    padding: 20px;
    color: #fff;
}
.footer_wid ul {
    padding: 0px;
    list-style-type: none;
}
footer a {
    color: #ddd;
}
footer a:hover {
    color: #ddd;
    text-decoration: none;
}
img.f-logo {
    max-width: 250px;
}
.center.follow {
    text-align: center;
    margin-top: 40px;
}
.follow a {
    padding: 10px;
}
.follow {
    margin: 30px auto;
    width: 100%;
    float: left;
    text-align: center;
}
h6.powered {
    float: left;
    width: 100%;
    text-align: center;
    padding: 10px;
    background: #fafafa;
    border-top: 1px solid #ddd;
    font-size: 14px;
}
div#toTop {
    right: 0;
    bottom: 0;
    position: fixed;
    padding: 15px;
    background: <?php echo $row22['color']; ?>;
    z-index: 99;
    color: #fff;
    cursor: pointer;
    display: none;
}
.item-det {
    float: left;
    padding: 10px;
    background: #fff;
    border: 1px solid #ddd;
    border-bottom-right-radius: 20px;
    border-bottom-left-radius: 20px;
}
.item-det h4 {
    margin: 15px auto;
    color: #273d81;
    text-align: center;
    font-size: 20px;
}
.g-itm .item-title-ho{
    text-align: center;
    margin-top: 130px;
}
button.navbar-toggler {
    position: absolute;
    right:0px;
}
.slick-current div {
    padding: 0px;
    line-height: 0px;
}
.slick-current {
    box-shadow: -1px 3px 17px 5px #00000038;
}
.gallery {
    float: left;
}
.g-item {
    float: left;
    padding: 15px;
    border-radius: 20px;
}
.g-item .inner-item {
    border: 1px solid #ddd;
}
ul.pagination {
    width: 250px;
    margin: auto;
}
.map {
    float: left;
    padding: 0px;
    margin: 20px auto;
}
.map iframe {
    width: 100%;
    height: 350px;
}
.dets {
    padding: 20px;
    background: #fff;
    border-left: 0px;
    margin-bottom:20px;
}
.cates {
    float: left;
    padding: 15px 15px 0px 15px;
}
.widget.cates {
    background: #fff;
    text-align: center;
}
.widget h6 {
    border-bottom: 2px solid #282828;
    padding-bottom: 6px;
}
.widget ul {
    list-style-type: none;
    padding: 5px;
}
.widget li {
    line-height: 2rem;
    border-bottom: 1px solid #ddd;
}
.widget li:last-child {
    line-height: 2rem;
    border-bottom: 0px;
}
.admin-menu {
    background-color: #ffffff;
    float: left;
    padding: 20px;
    text-align: center;
    z-index: 999;
    border-right: 1px solid #ddd;
    box-shadow: 2px 3px 10px #ddd;
    overflow-y: scroll;
    position: fixed;
}
.admin-menu2 {
    float: left;
    padding: 10px;
}
.admin-menu h6 {
    font-size: 20px;
    border-bottom: 2px solid <?php echo $row22['color']; ?>;
    padding: 0px 0px 5px 0px;
    width: 100%;
    float: left;
    text-align: center;
}
.admin-menu a {
    color: #282828;
    float: left;
    text-decoration: none;
}
.admin-menu span.fa.fa-times {
    float: right;
    padding: 4px;
    color: #282828;
    cursor: pointer;
}
.admin-menu ul {
    padding: 10px;
    list-style-type: none;
    line-height: 2rem;
    margin: 0px;
    width: 100%;
    float: left;
}
li.a-menu {
    width: 100%;
    float: left;
    margin-bottom: 15px;
    border-bottom: 2px solid #28282800;
    text-align: left;
}
.admin-menu li a {
    width: 100%;
}
.a-menu .fa {
    float: left;
    padding: 8px;
}
li.a-menu:hover {
    border-bottom: 2px solid #282828;
}
.admin-toggler {
    float: left;
    padding: 10px;
    background: #282828;
    color: #fff;
    border: 1px solid #282828;
    cursor: pointer;
    font-size: 25px;
    position: fixed;
    top: 0px;
    left: 0px;
    z-index: 9;
}
.admin-toggler:hover{
    background: #fff;
    color: #282828;
}
.subber {
    color: <?php echo $row22['color']; ?>;
    text-align: center;
    width: 100%;
    float: left;
}
.dropdown:hover .dropdown-menu {
    display: block;
    margin-top: 0;
 }
.dropdown-menu {
    border-radius: 0px;
}
a.dropdown-item {
    text-align: center;
}
.c-img{
    width: 200px !important;
    height: 200px !important;
}
.login {
    margin: 20px auto;
    padding: 20px;
    background: #fff;
    text-align: center;
    border: 1px solid #ddd;
}
.login span.fa.fa-user {
    font-size: 50px;
    margin: 10px auto;
    color: <?php echo $row22['color']; ?>;
}
.login input.form-control {
    border-radius: 0px;
    margin: 15px auto;
}
.login button.btn.btn-primary {
    border-radius: 0px;
}
.a-widget {
    float: left;
    padding: 0px;
    text-align: center;
}
.a-widget a {
    padding: 20px;
    float: left;
    width: 100%;
    color: #fff;
    height: 100%;
}
.a-widget span {
    font-size: 50px;
    margin: 15px auto;
}
.a-center {
    width: 100%;
    float: left;
}
.table.table-striped {
    margin: 20px auto;
    border: 2px solid #dee2e6;
    background: #fff;
    width: 95%;
}
.add {
    margin-bottom: 10px;
}
.btnss {
    float: left;
    text-align: center;
    padding: 10px;
}
.admin-c {
    float: left;
}
.admin-toggler2{
    display: none;
}
.addData {
    padding: 15px;
    margin: 20px auto;
    clear: both;
    background: #fff;
    border: 2px solid #ddd;
    text-align: center;
}
.addData input.form-control {
    border-radius: 0px;
    margin: 10px auto;
    border: 2px solid #ddd;
    background: #fafafa;
    box-shadow: 0px 0px 0px #0000;
}
.addData input.form-control:focus {
    border: 2px solid <?php echo $row22['color']; ?>;
    background: #fff;
}
.addData textarea:focus {
    border: 2px solid <?php echo $row22['color']; ?>;
    background: #fff;
}
.addd {
    background: #f29625;
    border: 0px;
    color: #fff;
    padding: 20px;
    border-radius: 5px;
    margin-top: 10px;
}
.imager {
    position: fixed;
    bottom: 0;
    right: 0;
    background: #fff;
    border: 2px solid #ddd;
    overflow-y: scroll;
    text-align: center;
    padding: 10px;
    max-width: 97%;
    overflow-x: hidden;
    z-index: 1000;
}
.uploader-t {
    bottom: 10px;
    position: fixed;
    right: 10px;
    background: <?php echo $row22['color']; ?>;
    color: #fff;
    padding: 15px;
    cursor: pointer;
    font-size: 25px;
    border-radius: 50px;
    z-index: 999;
}
.imager span.fa.fa-times {
    float: right;
    padding: 7px;
    background: #282828;
    color: #fff;
    border: 1px solid #282828;
    cursor: pointer;
}
.imager span.fa.fa-times:hover {
    color: #282828;
    background: #fff;
}
iframe.image-uploader {
    background: none;
    border: 0px;
    padding: 10px;
}
.cont {
    float: left;
    padding: 10px;
}
.full-content {
    background: #fff;
    float: left;
    word-break: break-word;
    border: 1px solid #ddd;
    margin-top: -100px;
}
img.top-img {
    width: 100%;
    max-height: 700px;
}
input.form-control {
    padding: 10px;
    height: auto;
    margin-top: 10px;
}
.pros-pg .g-itm a {
    float: left;
    border-radius: 20px;
    box-shadow: 2px 2px 2px 0px #00000012;
}
.news-cont{
    background: #fff;
    padding: 5px;
    margin-top: -30px;
    box-shadow: 0px 0px 2px #00000030;
    margin-bottom: 10px;
}
.rml {
    text-align: right;
    padding: 5px;
    color: #e99803;
}
.container.con-dets {
    background: #282828;
    padding: 10px;
    color: #fff;
    text-align: center;
    position: absolute;
    left: 0px;
    right: 0px;
    margin-top: -40px;
}
.side {
    float: left;
    margin: 20px 0px;
    padding: 10px;
}
.widget {
    float: left;
    padding: 10px;
    background: #fff;
    text-align: center;
    margin: 20px 0px;
}
label.s-label {
    float: left;
    font-weight: bold;
}
.addData textarea {
    border-radius: 0px;
    margin: 10px auto;
    border: 2px solid #ddd;
    background: #fafafa;
    box-shadow: 0px 0px 0px #0000;
    width: 100% !important;
    padding: 10px;
}
.career {
    width: 100%;
    margin: 20px auto;
    display: block;
    padding: 15px;
    background: #fff;
    border: 1px solid #ddd;
    float: left;
}
.career h4 {
    float: left;
}
.apply {
    float: right;
    background: <?php echo $row22['color']; ?>;
    color: #fff;
    padding: 10px;
}
h6.apply-cv {
    margin: 10px;
    float: left;
    width: 100%;
    text-align: center;
    padding-top: 10px;
    border-top: 1px solid #ddd;
}
a.btn.btn-success.appbtn {
    margin: 20px auto 0px;
    border-radius: 0px;
    float: right;
}
.app-i {
    text-align: left;
    padding: 10px;
    border: 1px solid #ddd;
    float: left;
    width: 100%;
    background: #fff;
    margin-bottom: 20px;
    word-break: break-word;
}
.d-app {
    float: left;
    margin-top: 30px;
}
.mychart{
    float: left;
    margin-left: 8px;
    width: 95% !important;
}
.appp{
    background: #fff0 !important;
    border: 0px;
}
.aler {
    float: right;
    background: #cc2a2a;
    color: #fff;
    border-radius: 50px;
    width: 30px;
    height: 30px;
    text-align: center;
    font-size: 15px;
}
.color {
    float: right;
    padding: 15px;
    margin-left: 20px;
    background: <?php echo $row22['color']; ?>;
    border: 2px solid #676767;
}
.hover {
    float: right;
    padding: 15px;
    margin-left: 20px;
    background: <?php echo $row22['hover']; ?>;
    border: 2px solid #676767;
}
h4.w-back {
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ddd;
    font-size: 20px;
}
.connt {
    float: left;
    padding: 10px;
    text-align: center;
}
.c-w {
    float: left;
    background: #fff;
    border: 2px solid #ddd;
    padding: 0px;
}
.c-w h4 {
    padding: 5px;
    border-top: 2px solid #ddd;
    color: <?php echo $row22['color']; ?>;
}
.container.p-list table {
    border: 1px solid #ddd;
    background: #fff;
}
h4.col-lg-12.col-md-12.col-sm-12 {
    width: 100%;
    float: left;
    margin-top: 10px;
}
.pager a {
    position: relative;
    display: block;
    padding: .5rem .75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #007bff;
    background-color: #fff;
    border: 1px solid #dee2e6;
}
.pager strong {
    position: relative;
    display: block;
    padding: .5rem .75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #ffffff;
    background-color: <?php echo $row22['color']; ?>;
    border: 1px solid #dee2e6;
}
.gallery .inner-item img {
    height: 300px;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
}
img.center-img {
    max-width: 100%;
    display: block;
    margin: auto;
}
.g-itm{
    float: left;
    padding: 10px;
    }
a.dropdown-item {
    color: #864e01 !important;
}
.ite-ser {
    border-top-left-radius: 20px !important;
    border-top-right-radius: 20px !important;
}
button.navbar-toggler {
    border: 0px;
}
@media(max-width:500px){
    .top-icos{
        display: none;
    }
}
@media(max-width:760px){
    .col-lg-6.col-md-6.col-sm-12.latest {
        margin-bottom: 120px;
    }
    .who {
        width: 100%;
        float:left;
        margin:0px;
        position: unset;
    }
    .vv {
        margin-top: 110px;
        width: 100%;
        float: right;
        display: block;
    }
    .lang {
        margin-left: -10px;
    }
    .who-img {
        width:100%;
        float:right;
        margin:0px;
    }
    li.nav-item {
    padding-left: 20px !important;
    }
    .admin-toggler2{
    display: block;
    }
    marquee.news-bar {
        width: 81%;
    }
    input.form-control.search-bar {
    border-radius: 0px;
    width: 87%;
    float: left;
    }
    .search button {
        width: 13%;
        padding: 7px;
        border: 0px;
        background: #ddd;
    }
    .admin-menu{
        display: none;
    }
    a.navbar-brand {
    float: left;
    width: 100%;
    margin: 0px;
    }
    img.logo {
    margin: auto;
    display: block;
    margin-top: 40px !important;
    }
    .table th {
    padding: 10px !important;
    font-size: 13px;
    }
}
    </style>