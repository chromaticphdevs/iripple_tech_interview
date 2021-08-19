<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Have a Pro board on your projects or business. Great built-in CRM for managing your project, business and sale">
    <meta name="author" content="Themesbox">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?php echo $title ?? ''?><?php echo '|'.COMPANY_NAME ?></title>
    <!-- Fevicon -->
    <!-- <link rel="shortcut icon" href="<?php echo URL.DS.'public/assets/favicon.PNG'?>"> -->
    <!-- Start css -->
    <link href="<?php echo _path_tmp('css/bootstrap.min.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo _path_tmp('css/icons.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo _path_tmp('css/style.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo _path_third_party('social_pages/bootstrap-social.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo _path_public('css/main/global.css')?>" rel="stylesheet" type="text/css">

    <style type="text/css">
        .bg-blue
        {
            background: var(--main-color);
            color: #fff;
        }

        #idFooter
        {
            padding-bottom: 50px;
            padding-top: 50px;
        }
        
        #idFooter li
        {
            list-style: none;
            margin-bottom: 5px;
        }

        #idFooter li.title
        {
            margin-bottom: 15px;
            font-weight: bold;
        }
        #idFooter li a
        {
            color: #fff;
        }

        #idSocials
        {
            margin-top: 30px;
        }

        #idSocials li
        {
            margin-right: 20px;
        }
        #idSocials li a i 
        {
            font-size: 2em;
        }

        .section-divider
        {
            display: block;
            background: var(--main-color);
            height: 100px;
        }

        .content-title
        {
            text-transform: uppercase;
            font-weight: 200;
            color: #fff;
            font-size: 2em;
        }

        .container-header
        {
            padding: 30px;
        }

        .header-title
        {
            font-size: 80px;
            margin-top: 70px;
            margin-bottom: 20px;
        }

        .header-subtitle
        {
            font-size: 20px;
            display: block;
            margin: 0px auto;
            width: 400px;

        }

        @media screen and (max-width: 600px ) {
            .hide-if-mobile
            {
                display: none;
            }
        }
    </style>
    <!-- End css -->
    <?php produce('headers')?>
</head>
<body class="vertical-layout" style="background: #fff;">
    <nav class="navbar navbar-expand-lg navbar-light" 
        style="background-color:#fff">
      <div class="container">
        <a class="navbar-brand" href="#">
            <h5 class="brand-title"><?php echo COMPANY_NAME?></h5>
        </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="#>">Login</a>
              </li>
            </ul>
          </div>
      </div>
    </nav>
    <!-- Start Containerbar -->
    <?php produce('content')?>
    <!-- End Containerbar -->
    <!-- Start js -->        
    <script src="<?php echo _path_tmp('js/jquery.min.js')?>"></script>
    <script src="<?php echo _path_tmp('js/popper.min.js')?>"></script>
    <script src="<?php echo _path_tmp('js/bootstrap.min.js')?>"></script>
    <script src="<?php echo _path_tmp('js/modernizr.min.js')?>"></script>
    <script src="<?php echo _path_tmp('js/detect.js')?>"></script>
    <script src="<?php echo _path_tmp('js/jquery.slimscroll.js')?>"></script>
    <script type="text/javascript" src="<?php echo _path_public('js/core.js')?>"></script>
    <script type="text/javascript" src="<?php echo _path_public('js/global.js')?>"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
       function captchaSubmit(token) {
         document.getElementById("recaptchaForm").submit();
       }
     </script>
    <?php produce('scripts')?>
    <!-- End js -->
</body>
</html>