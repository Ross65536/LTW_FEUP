<?
include_once('database/UsersFacade.php');
include_once('upload.php');
$usersDB = new UsersFacade();

$username = $_GET['username'];
$image = $_FILES["user_image_" . $username];
echo "Cannot do this right now";

//upload($image, $username, "users_photos");

// try {
//   $usersDB->updatePhoto($username);
//   header("Location: edit_account.php");
// } catch (PDOException $e) {
//   die($e->getMessage());
// }
?>
