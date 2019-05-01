<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMSADMIN - <?=date("D d M Y")?></title>
    
    <link href="<?=base_url("assets")?>/admin/css/main.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/images/vlogo.png"/>
    <style type="text/css">
    @media print {
      aside,header, .col-lg-12, .myhead, hr{
        display:none !important;
      }
      #printarea{
        margin-top:-30px;
        margin-left:-230px;
      }
      
    }
    </style>
</head>
<body ng-app="groveusCms" hoe-navigation-type="vertical" hoe-nav-placement="left" theme-layout="wide-layout" class="view-animate-container">
     <div id="hoeapp-wrapper" class="hoe-hide-lpanel" hoe-device-type="desktop" class="view-animate">
        <header id="hoe-header" hoe-lpanel-effect="default">
            <div class="hoe-left-header">
                <a href="#">
                <img id="logo1" src="<?=base_url("assets/")?>/logo/logosmall.png" style="display:inline-block"> <span>
                
                <img src="<?="http://127.0.0.1/IndiaFilling_proper/assets/website/uploads/page/thumb"?>/<?=$this->profile['image']?>" style="display:inline-block">
                </span>
                </a>
            </div>

            <div class="hoe-right-header" hoe-position-type="relative">
            <?php if($this->session->userdata('username')):?>
                <span class="hoe-sidebar-toggle"><a id="sidebtn" href=""></a></span>

                <ul class="right-navbar">
                
                    <li><button onClick="window.location.reload();" class="btn btn-default">
                        <i class="fa fa-refresh"></i></button></li>
					<li class="dropdown hoe-rheader-submenu hoe-header-profile">					
						<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                            <span><span class="fa fa-user"></span>
                             <i class=" fa fa-angle-down"></i></span>
						</a> 
						<ul class="dropdown-menu ">
						    <li><a href="#logs"><i class="fa fa-list"></i>View Logs</a></li>
						    <li><a href="#change_password"><i class="fa fa-lock"></i>Change Password</a></li>
							<li><a href="<?=site_url()?>/login/logout"><i class="fa fa-power-off"></i>Logout</a></li>
						</ul>
					</li>
				
				</ul>
				<?php endif?>	
            </div>
        </header>