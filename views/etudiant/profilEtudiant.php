<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						Profil
					</h3>
				</div>
				<div class="panel-body">
					<div class="col-sm-4">
						<img alt="Photo de profil utilisateur" src="<?= $utilisateur->getPhotoEtudiant(); ?>" width="300"> 
					</div>
					<div class="col-sm-8">
						<form class="form-horizontal">
							<div class="form-group">
							    <label class="col-sm-4 control-label">
							    	Nom :
							    </label>
 							    <div class="col-sm-8"> 
							    	<p class="form-control-static">
							    		<?= $utilisateur->getNomEtudiant(); ?>
							    	</p>
								</div>
							</div>
							<div class="form-group">
							    <label class="col-sm-4 control-label">
							    	Prénom :
							    </label>
							    <div class="col-sm-8">
							    	<p class="form-control-static">
							    		<?= $utilisateur->getPrenomEtudiant(); ?>
							    	</p>
								</div>
							</div>
							<div class="form-group">
							    <label class="col-sm-4 control-label">
							    	Date de naissance :
							    </label>
							    <div class="col-sm-8">
							    	<p class="form-control-static">
							    		<?php
							    			$date = date_create($utilisateur->getDateNaissanceEtudiant());
							    			echo date_format($date, "d/m/Y");
							    		?>
							    	</p>
								</div>
							</div>
							<div class="form-group">
							    <label class="col-sm-4 control-label">
							    	Formation :
							    </label>
							    <div class="col-sm-8">
							    	<p class="form-control-static">
							    		<?php 
							    			$formation = new Formation($utilisateur->getIdFormation());
											echo $formation->getLibelleFormation(); 
										?>
							    	</p>
								</div>
							</div>
							<div class="form-group">
							    <label class="col-sm-4 control-label">
							    	Téléphone :
							    </label>
							    <div class="col-sm-8">
							    	<p class="form-control-static">
							    		<?= 
							    			
							    			$utilisateur->getTelephoneEtudiant(); 
							    			
							    		?> 
							    	</p>
								</div>
							</div>
							<div class="form-group">
							    <label class="col-sm-4 control-label">
							    	Email :
							    </label>
							    <div class="col-sm-8">
							    	<p class="form-control-static">
							    		<?= $utilisateur->getEmailEtudiant(); 
										?>
							    	</p>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>