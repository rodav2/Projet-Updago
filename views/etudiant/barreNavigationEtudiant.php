<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"> 
			<span class="sr-only">Ouvrir menu</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button> 
		<a class="navbar-brand" href="#">Ogdapu</a>
	</div>
	
	<div class="collapse navbar-collapse" id="navbar-collapse">
		<ul class="nav navbar-nav">
			<li class="<?= ($page == 'profil') ? 'active' : ''; ?>">
				<a href="?page=profil">Profil</a>
			</li>
			<li class="<?= ($page == 'matieres') ? 'active' : ''; ?>">
				<a href="?page=matieres">Matieres</a>
			</li>
			<li class="<?= ($page == 'note') ? 'active' : ''; ?>">
				<a href="?page=note">Mes Notes</a>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
	        <li>
	        	<a href="?action=deconnexion" role="button">Se déconnecter</a>
	        </li>
	    </ul>
	</div>	
</nav>