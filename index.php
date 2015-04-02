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


		if (isset($_SESSION["utilisateur"]) 
			&& !empty($_SESSION["utilisateur"])
			&& isset($_SESSION["typeUtilisateur"])
			&& !empty($_SESSION["typeUtilisateur"])
			)
		{
			Header('Location: index' .ucFirst($_SESSION["typeUtilisateur"]). '.php');
		}
		else
		{
			include_once ("controllers/connexion.php");
		}

		include_once ("global/lib/js.php");
	?>

	</body>
</html>