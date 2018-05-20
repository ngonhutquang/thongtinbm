<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Thông Tin Bộ Môn Khoa Học Máy Tính</title>
      <meta charset="utf-8">
      <meta name="description" content="Trang giới thiệu thông tin về bộ môn Khoa học máy tính, khoa Công nghệ thông tin và truyền thông, trường Đại Học Cần Thơ">
      <meta property="og:title" content="Thông Tin Bộ Môn Khoa Học Máy Tính">
      <meta property="og:description" content="Trang giới thiệu thông tin về bộ môn Khoa học máy tính, khoa Công nghệ thông tin và truyền thông, trường Đại Học Cần Thơ">
      <meta name="og:keywords" content="Khoa học máy tính, công nghệ thông tin">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="shortcut icon" href="<?php echo public_url('image/facicon.png') ?>" type="image/x-icon">
      <link rel="stylesheet" type="text/css" href="<?php echo public_url ('css/style.css');?>">
      <style>
         body {
         background-color: #b1e2f7;
         }
         header {
         padding: 2px;
         border-radius: 4px;
         background-color: #FFF;
         }
         footer {
            height: 50px;
         border-radius: 4px;
         background-color: #000000;
         }
         .content {

         /*height: 800px;*/
         margin-top: -15px;
         background-color: #FFF;
         border : 1px solid ;
         border-color :#FFF;
         padding: 15px;
         border-radius: 4px; 
        
         margin-bottom: 10px;
         min-height: 500px;
         }
         header {
            height: 145px;
            background-image: url('<?php echo public_url("image/banner.png");?>');
            width: 100%;
            background-size: 100% 100%;
            margin-bottom: 5px;
         }
         header:hover {
            cursor: pointer;
         }
      </style>
   </head>
   <body class="container">

     

         <header id="banner" onclick="goto()">
      
         </header>
         <div class="menu">
            <nav class="navbar navbar-inverse">
               <div class="container-fluid">
                  <ul class="nav navbar-nav">
                     <li class="active"><a href="<?php echo  base_url('trang-chu'); ?>">Trang Chủ</a></li>
                     // <li><a href="<?php echo  base_url('gioi-thieu'); ?>">Giới Thiệu</a></li>
                     <li><a href="<?php echo  base_url('news'); ?>">Bản Tin</a></li>
                     <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Danh Sách Đề Tài
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">

                           <li><a href="<?php echo  base_url('lv'); ?>">Đề Tài Luận Văn</a></li>
                           <li><a href="<?php echo  base_url('tl'); ?>">Đề Tài Tiểu Luận</a></li>

                        </ul>
                     </li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                     <li><a href="<?php echo base_url ('Authorization/login') ?>"><span class="glyphicon glyphicon-log-in"></span>Đăng Nhập</a></li>
                  </ul>
               </div>
            </nav>
         </div>
         <div class="wrap">
            <div class="content">

             <?php   


               if (isset($variable))
               {
                  $this->load->view($content,$variable); 
               } else {
                  $this->load->view($content); 
               }
               

               ?>





            </div>

           
         </div>

     

   </body>
    <footer class="container-fluid bg-4 text-center">
               <p> <a href="www.computerscientctu.com">www.computerscientctu.com</a></p>
            </footer>
</html>
<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
<script type="text/javascript">
   function goto  () {
      location.href = "https://google.com";
   }

</script>