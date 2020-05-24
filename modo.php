<?php
session_start();
if (!isset($_SESSION['login'])) {
	header ('Location: login.php');
	exit();
}
$pseudo=(trim($_SESSION['login']));
 include("_classes/sql.php");
$sql="SELECT `actif` FROM `membre` WHERE login='$pseudo'";
sql::on();
$req=sql::query($sql);
while($d=$req->fetch_object()) {
  if ($d->actif == 0) {
	header ('Location: noactivation');
	exit();
}
}
$sql="SELECT `permission` FROM `membre` WHERE login='$pseudo'";
sql::on();
$req=sql::query($sql);
while($d=$req->fetch_object()) {
  if ($d->permission == 1) {
	//ne rien faire accès OK
} else {
	// explusion session
	header ('Location: interdit.php');
	exit();	
  }

}
?>

Bienvenue sur la page modo !

<a href="membre.php">Espace membre</a>
<a href="deconnexion.php">Se déconnecter</a>