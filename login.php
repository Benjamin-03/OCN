<html>
<title>Login</title>
<center>
<div id="contenu" style=" width: 1000px; 
border-radius: 10px;">

<?php
// on teste si le visiteur a soumis le formulaire de connexion
	if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
		if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {
		$base = mysqli_connect ('localhost', 'root', 'root', 'ocn');
		

		// on teste si une entrée de la base contient ce couple login / pass
		$sql = 'SELECT count(*) FROM membre WHERE login="'.htmlspecialchars($_POST['login']).'" AND pass="'.htmlspecialchars(sha1($_POST['pass'])).'"';
		$req = mysqli_query($base, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
		$data = mysqli_fetch_array($req, MYSQLI_NUM);
		printf ("%s (%s)\n", $row[0], $row[1]);
		mysqli_free_result($req);
		mysqli_close();
	
	// si on obtient une réponse, alors l'utilisateur est un membre
	if ($data[0] == 1) {
	$pseudo=$_POST['login'];
	$newip=$_SERVER['REMOTE_ADDR'];
	$date = date("d-m-Y");
    $heure = date("H:i");
    include("_classes/sql.php");
	$sql ="UPDATE `membre` SET ip_connection='$newip' WHERE login='$pseudo'";
    sql::on();
    $req=sql::query($sql);
	$sql ="UPDATE `membre` SET date_connection='$date' WHERE login='$pseudo'";
    sql::on();
    $req=sql::query($sql);
	$sql ="UPDATE `membre` SET heure_connection='$heure' WHERE login='$pseudo'";
    sql::on();
    $req=sql::query($sql);
		session_start();
		$_SESSION['login'] = $_POST['login'];
		header('Location: membre.php');
		exit();
	}
	// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
	elseif ($data[0] == 0) {
		$erreur = ' Combinaisons identifiant/Mdp incorrect.</font>';
	}
	// sinon, alors la, il y a un gros problème !! :)
	else {
		$erreur = ' Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.</font>';
	}
	}
	// là c'est un boulet il a zappé un champs :p
	else {
	$erreur = ' Au moins un des champs est vide.</font>';
	}
}
 include("_dev/sass/css/css_login.php"); 
?>
<title>Login</title>
<font face="Gabriola">
<div>
	<div class="myButton3" style="
   float: left;
    color: #484848;
	height: 500px;
    width: 465px;
    background: rgba(191, 191, 191, 0.5);
    border-color: black;
    text-decoration-style: inherit;
    "><br />
	 <u><input class="myButton3" type="submit" value="Connexion &agrave; l'espace membre  :" style="
    width: 350px;
    color: #484848;
    background: rgba(191, 191, 191, 0.5);
    border-color: black;
    text-decoration-style: inherit;
    height: 45px;font-size: 15px;"></u>
	<br />
	<br />
	<form action="login.php" method="post">
	<label  style="width:300px; height:37px; border-color:black"><input class="myButton3" name="login"type="text" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>" style=" color: #ABABAB;width:300px; height:27px; background: rgba(51, 51, 51, 0.5);" placeholder=" Votre pseudo"></label>
	<br />
	<br />
	<label  style="width:300px; height:37px; border-color:black"><input class="myButton3" name="pass"type="password" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>" style=" color: #ABABAB; width:300px; height:27px; background: rgba(51, 51, 51, 0.5);" placeholder=" Mot de passe"></label>
	<br />
	<br />
		<?php
			if (isset($erreur)) echo '<font color="red">',$erreur;
			?>
			<br />
			<br />
			<br />
			<strong>
		<input type="submit" class="myButton3" name="connexion" value="Connexion" style="
		width: 300px;
		color: rgb(157, 157, 157);
		background: rgba(51, 51, 51, 0.5);
		border-color: black;
		text-decoration-style: inherit;
		height: 35px;"></strong>
		<br />
		<br />
		</form>
			<a href="/pass">Mot de passe oubli&eacute; ?</a>
		</div>
		</div>
<div class="myButton3" style="
    color: #484848;
	height: 500px;
    width: 465px;
    background: rgba(191, 191, 191, 0.5);
    border-color: black;
    text-decoration-style: inherit;
    "><br />
	<u><input class="myButton3" type="submit" value="Inscription &agrave; l'espace membre  :" style="
    width: 350px;
    color: #484848;
    background: rgba(191, 191, 191, 0.5);
    border-color: black;
    text-decoration-style: inherit;
    height: 45px;font-size: 15px;"></u>
	<p align="justify" style="     color: black;
    text-shadow: 0px 0px 0px #545454;   margin-right: 30px;
    margin-left: 30px;">
	&rArr; Vous &ecirc;tes un nouveau ? <br />
	<br />
	Inscrivez-vous sur le site pour pouvoir rejoindre la communaut&eacute;,
	</p>
<br /><br /><br /><br /><br /><br /><br /><br />
<a class="myButton3" style="
    width: 300px;
	    height: 21px;
		margin-top: 11px;
	color: rgb(157, 157, 157);
    background: rgba(51, 51, 51, 0.5);
    border-color: black;
    text-decoration-style: inherit;
    " href="/inscription">Je m'inscrit d&eacute;s maintenant </a>
		</div>
		<br />
		</font></b></h3>

		<br />
		<br />
		</div>
		</center>
		</body>
		<br />
		<br /><br />
		<br /><br />
		<br />


		</html>