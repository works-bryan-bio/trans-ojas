<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        Transparency IT Consulting | <?= (isset($page_title) ? $page_title : "Home") ?>
    </title>
    <meta name="title" content="<?php if(isset($mt_for_layout)) { echo $mt_for_layout; } ?>">
    <meta name="keywords" content="<?php if(isset($mk_for_layout)) { echo $mk_for_layout; } ?>">
    <meta name="description" content="<?php if(isset($md_for_layout)) { echo $md_for_layout; } ?>">

    <title>Transparency IT Consulting</title>
 
    <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('themeA/bootstrap.min.css'); 
        echo $this->Html->css('themeA/custom.css');
        echo $this->Html->css('themeA/blog.css');
        echo $this->Html->css('themeA/about.css');
        echo $this->Html->css('themeA/employer.css');
        echo $this->Html->css('themeA/job-listing.css');
        echo $this->Html->css('themeA/job-post.css');
        echo $this->Html->css('themeA/login.css');
        echo $this->Html->css('themeA/register.css');
        echo $this->Html->css('themeA/font-awesome.min.css');
        echo $this->Html->css('themeA/bootstrap.min.css');
        echo $this->Html->css('owlcarousel/owl.carousel.css');
        echo $this->Html->css('owlcarousel/owl.transitions.css');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800|Open+Sans:300,300i,400,400i,600,600i,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cedarville+Cursive" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->  
    <script id="dsq-count-scr" src="//transparencyit.disqus.com/count.js" async></script>
    <style>
    .black{
        color:black;
    }
    .left{
        float:left;
    }
    .owl-custom-nav{
        position:absolute;z-index:23;
        text-decoration: none !important;
        font-size: 30px;
        color: #17b2c3;
        padding-top: 85%;
    }
    </style>
</head>
<body class="hold-transition register-page">