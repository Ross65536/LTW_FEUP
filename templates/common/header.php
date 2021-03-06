
<?
include_once('database/UsersHTMLDecorator.php');
include_once('database/UsersFacade.php');

$usersDB = new UsersHTMLDecorator(new UsersFacade());
$username = Session\getHTMLLogin();
$photo = $usersDB->getPhoto($username, "thumbs_tiny");
?>

<body>

<div id="container">

    <header id="header" >
      <div class="wrapper">
        <a href="index.php" id="title" class="inner">
            <div id="logo">
              <img id="logo_image" src="images/logo2.png" alt="logo"><span id="site_name">TODO Lists</span>
            </div>
        </a>
      </div>


            <?php  if(Session\isLoggedIn()) { ?>
              <div class="dropdown">
                <div id="large_menu" class="container">
                  <img id="profile_pic" src="<?=$photo?>"/>
                  <div class="middle">
                    <a href="upload_user_photo.php"><div class="text"><span class="default" style="font-size: 15px">Change Photo</span></div></a>
                  </div>
                </div>
                <div id="small_menu" class="container">
                  <span class="fa fa-bars fa-2x"></span>
                </div>
                <div id="responsive-dropdown" class="dropdown-content">
                  <p><a href="my_lists.php">My Lists</a></p>
                  <p><a href="edit_account.php">Edit Account</a></p>
                  <p><a href="PHP/actions/accounts/action_logout.php">Logout</a></p>
                </div>
              </div>
            <?php } ?>
        <!-- <menu>
            <ul>
                <li><a href="index.php">??</a></li>
            </ul>
        </menu> -->
    </header>

    <div id="body-section">
