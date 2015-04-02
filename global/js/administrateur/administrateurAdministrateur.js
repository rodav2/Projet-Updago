		// Vérifiaction des mots de passe (verification données)
		var fieldalias="mot de passe";
		var mdp = $('#Password');
		var ConfirmationMdp = $('#ConfirmationPassword');

		function verify( mdp , ConfirmationMdp)
		{
		  var passed=false

		   if (mdp.value=='')
		   {
		    	alert("Veuillez entrer votre "+fieldalias+" dans le premier champ!");
		    	mdp.focus();
		   }
		   else if (ConfirmationMdp.value=='')
		   {
		    	alert("Veuillez confirmer votre "+fieldalias+" dans le second champ!");
		    	ConfirmationMdp.focus();
		   }
/*		   else if (mdp.value<3)
		   {
		   		alert("Veuillez entrer un "+fieldalias+" d'un longueur minimum de 3 caractéres !");
		    	mdp.focus();
		   }*/
		   else if (mdp.value != ConfirmationMdp.value)
		   {
		    	alert("Les deux "+fieldalias+" ne condordent pas");
		    	mdp.select();
		   }
		   else
		   {
		   	passed=true;
		   	
		   }
		   return passed;
		}