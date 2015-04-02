<?php

	require_once ("global/config/config.inc");
	require_once ("global/lib/spdo.class.php");

?>
<!doctype html>
<html lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta author="ETIBESSORG">
		<title>Ogadpu</title>
		<?php
			include_once ("global/lib/css.php");
		?>
	</head>
	<body>
<?php
	if(isset($_SESSION['utilisateur']) && $_SESSION['typeUtilisateur'] == 'administrateur')
	{

		if( isset($_GET['page']))
		{
			$page = $_GET['page'];
		}
		else
		{
			$page = "etudiant";
		}

		if(isset($_GET['action']) && $_GET['action'] == "deconnexion")
		{
			$_SESSION = null;
			session_unset();
			session_destroy();
			Header("Location: index.php");
		}

		if(in_array($page, $pagesAdministrateur))
		{
			include_once "controllers/administrateur/barreNavigationAdministrateur.php";
			include_once "controllers/administrateur/". $page ."Administrateur.php";
			include_once "global/lib/js.php";

			if(file_exists("global/js/administrateur/" . $page . "Administrateur.js"))
			{
				echo '<script type="text/javascript" src="global/js/administrateur/' . $page . 'Administrateur.js"></script>';
			}

		}
		else
		{
			// Supposed to be 404 page... 
			Header("Location: index.php");
		}
	}
	else
	{
		Header("Location: index.php");
	}


?>
	</body>
</html>