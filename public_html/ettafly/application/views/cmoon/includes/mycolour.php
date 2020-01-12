<?php 
require_once 'connect_db.php';
$site = $con->query("SELECT * FROM site_settings WHERE id ='1'")->fetch(PDO::FETCH_OBJ);
 
 
?>

<style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700,800);
@import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900);
@import url(https://fonts.googleapis.com/css?family=Poppins:400,500,300,600,700);
/*Theme Colors*/
/*bootstrap Color*/
/*Normal Color*/
/*Border radius*/
/*Preloader*/
.preloader {
  width: 100%;
  height: 100%;
  top: 0px;
  position: fixed;
  z-index: 99999;
  background: #fff;
}
.preloader .cssload-speeding-wheel {
  position: absolute;
  top: calc(50% - 3.5px);
  left: calc(50% - 3.5px);
}


/*Just change your choise color here its theme Colors*/
body {
  background: #4F5467;
}
/*Top Header Part*/
.logo i {
  color: <?php echo $site->colour; ?>;
}
.navbar-header {
  background: <?php echo $site->colour; ?>;
}
.navbar-top-links > li > a {
  color: <?php echo $site->colour; ?>;
}
/*Right panel*/
.right-sidebar .rpanel-title {
  background: <?php echo $site->colour; ?>;
}
/*Bread Crumb*/
.bg-title .breadcrumb .active {
  color: <?php echo $site->colour; ?>;
}
/*Sidebar*/
.sidebar {
  background: #4F5467;
  box-shadow: 1px 0px 20px rgba(0, 0, 0, 0.08);
}
.sidebar .label-custom {
  background: #01c0c8;
}
#side-menu li a {
  color: #a6acbc;
}
#side-menu li a {
  color: #a6acbc;
  border-left: 0px solid #4F5467;
}
#side-menu > li > a {
  border-color: #4F5467;
}
#side-menu > li > a:hover,
#side-menu > li > a:focus {
  background: rgba(0, 0, 0, 0.07);
  border-color: #4F5467;
}
#side-menu > li > a.active {
  border-bottom: 2px solid <?php echo $site->colour; ?>;
  font-weight: 500;
}
#side-menu > li > a.active i {
  color: <?php echo $site->colour; ?>;
}
#side-menu ul > li > a:hover {
  color: <?php echo $site->colour; ?>;
  background: none;
}
#side-menu ul > li > a.active {
  color: <?php echo $site->colour; ?>;
  font-weight: 500;
}
#side-menu>li>a.active {
	color: <?php echo $site->colour; ?>
}

#side-menu ul>li>a:hover {
	color: #02bec9;
	background: #f7fafc
}

#side-menu ul>li>a.active {
	color: #02bec9
}
.sidebar #side-menu > li:hover a {
  background: #393e4f;
}
.sidebar #side-menu .user-pro .nav-second-level a:hover {
  color: <?php echo $site->colour; ?>;
}
#side-menu li a {
    color: <?php echo $site->colour; ?>;
}
.navbar-header {
    width: 100%;
    height: 90px;
    background: <?php echo $site->colour; ?>;
    border: 0;
}
#side-menu .nav-second-level li:hover > a {
  color: <?php echo $site->colour; ?>;
}
#side-menu .nav-second-level.two-li {
  background: #393e4f;
}
@media (min-width: 768px) {
  .content-wrapper #side-menu li a.active,
  .content-wrapper #side-menu ul,
  .content-wrapper .sidebar #side-menu > li:hover {
    background: #ffffff;
  }
}
.fix-sidebar .top-left-part {
  background: <?php echo $site->colour; ?>;
}
/*themecolor*/
.bg-theme {
  background-color: #fb9678 !important;
}
.bg-theme-dark {
  background-color: #01c0c8 !important;
}
/*Chat widget*/
.chat-list .odd .chat-text {
  background: <?php echo $site->colour; ?>;
}
/*Button*/
.btn-custom {
  background: <?php echo $site->colour; ?>;
  border: 1px solid <?php echo $site->colour; ?>;
  color: <?php echo $site->colour; ?>;
}
.btn-custom:hover {
  background: <?php echo $site->colour; ?>;
  opacity: 0.8;
  color: <?php echo $site->colour; ?>;
  border: 1px solid <?php echo $site->colour; ?>;
}
/*Custom tab*/
.customtab li.active a,
.customtab li.active a:hover,
.customtab li.active a:focus {
  border-bottom: 2px solid <?php echo $site->colour; ?>;
  color: <?php echo $site->colour; ?>;
}
.tabs-vertical li.active a,
.tabs-vertical li.active a:hover,
.tabs-vertical li.active a:focus {
  background: <?php echo $site->colour; ?>;
  border-right: 2px solid <?php echo $site->colour; ?>;
}
/*Nav-pills*/
.nav-pills > li.active > a,
.nav-pills > li.active > a:focus,
.nav-pills > li.active > a:hover {
  background: <?php echo $site->colour; ?>;
  color: <?php echo $site->colour; ?>;
}
.navbar-top-links>li>a {
    color: #ffffff;
    padding: 35px 12px;
    line-height: 60px;
    min-height: 60px;
}
.navbar-header .navbar-toggle {
    float: none;
    padding: 13px 40px;
    line-height: 60px;
    border: 0;
    color: rgb(255, 253, 253);
    margin: 0;
    display: inline-block;
    border-radius: 0;
}
</style>