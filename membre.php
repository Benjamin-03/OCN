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
?>

ca marche !

<a href="deconnexion.php">Se déconnecter</a>

<a href="modo.php">Espace modo</a>