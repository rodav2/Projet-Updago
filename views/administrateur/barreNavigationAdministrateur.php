<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"> 
			 	<span class="sr-only">Ouvrir menu</span>
			 	<span class="icon-bar"></span>
			 	<span class="icon-bar"></span>
			 	<span class="icon-bar"></span>
			 </button> 
			 <a class="navbar-brand" href="#">
				Ogdapu
			</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="<?= ($page == 'etudiant') ? 'active' : ''; ?>">
					<a href="?page=etudiant">Etudiant</a>
				</li>
				<li class="<?= ($page == 'enseignant') ? 'active' : ''; ?>">
					<a href="?page=enseignant">Enseignant</a>
				</li>
				<li class="<?= ($page == 'matiere') ? 'active' : ''; ?>">
					<a href="?page=matiere">Matière</a>
				</li>
				<li class="<?= ($page == 'formation') ? 'active' : ''; ?>">
					<a href="?page=formation">Formation</a>
				</li>
				<li class="<?= ($page == 'administrateur') ? 'active' : ''; ?>">
					<a href="?page=administrateur">Administrateur</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
		        <li>
		        	<a href="?action=deconnexion" role="button">Se déconnecter</a>
		        </li>
		    </ul>
		</div>
	</div>
</nav>