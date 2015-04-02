<div class="page-header text-center">
	<h1>
		Enregistrement d'un nouvel étudiant
	</h1>
</div>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<form class="form-horizontal" role="form" method="post" onSubmit="return verify(this.Password, this.ConfirmationPassword)" enctype="multipart/form-data">
				<div class="form-group">
					<label for="Nom" class="col-sm-3 control-label">Nom :</label>
					<div class="input-group col-sm-9">
						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-pencil"></i></span>
						<input type="text" placeholder="Nom de l'étudiant" class="form-control" name="Nom" id="Nom" required>
					</div>
				</div>
				<div class="form-group">
					<label for="Prenom" class="col-sm-3 control-label">Prenom :</label>
					<div class="input-group col-sm-9">
						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-pencil"></i></span>
						<input type="text" placeholder="Prenom de l'étudiant" class="form-control" name="Prenom" id="Prenom" required required>
					</div>
				</div>
				<div class="form-group">
					<label for="Identifiant" class="col-sm-3 control-label">Identifiant :</label>
					<div class="input-group col-sm-9">
						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-pencil"></i></span>
						<input type="text" placeholder="Identifiant de l'étudiant" class="form-control" name="Identifiant" id="Identifiant" required required>
					</div>
				</div>
				<div class="form-group">
					<label for="Password" class="col-sm-3 control-label">Password :</label>
					<div class="input-group col-sm-9">
						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="Password" placeholder="Password de l'étudiant" class="form-control" name="Password" id="Password" required required>
					</div>
				</div>
				<div class="form-group">
					<label for="ConfirmationPassword" class="col-sm-3 control-label">Retapez le password :</label>
					<div class="input-group col-sm-9">
						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="Password" placeholder="Confirmation du password de l'étudiant" class="form-control" name="ConfirmationPassword" id="ConfirmationPassword" required required>
					</div>  
				</div>
				<div class="form-group">
					<label for="Formation" class="col-sm-3 control-label">Formation de l'étudiant :</label>
					<div class="input-group col-sm-9">
						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-book"></i></span>
						<select class="selectpicker show-tick show-menu-arrow" data-selected-text-format="count>2" title='Selection de(s) formation(s)' data-live-search="true" data-size="5" name="Formation" id="Formation" data-width="100%" required required>
							<?php
							foreach ($Formations as $Formation) {
								?>
								<option value="<?= $Formation->getIdFormation() ?>"> 
									<?= $Formation->getLibelleFormation() ?>   <?= $Formation->getAnneeFormation() ?>
								</option>
								<?php
							}
							?>
						</select>
					</div>
				</div>

<!-- ========================================================================================================================= -->

				<div class="page-header text-center">
				  	<h3>Informations complémentaires</h3>
				</div>

				<div class="form-group">
					<label for="Email" class="col-sm-3 control-label">Adresse email :</label>
					<div class="input-group col-sm-9">
						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
						<input type="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1" name="Email" id="Email" required>
					</div>
				</div>
				<div class="form-group">
					<label for="Telephone" class="col-sm-3 control-label">Télèphone :</label>
					<div class="input-group col-sm-9">
						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-phone-alt"></i></span>
						<input type="text" class="form-control bfh-phone" placeholder="Télèphone" aria-describedby="basic-addon1" name="Telephone" id="Telephone" data-format="dd-dd-dd-dd-dd" required>
					</div>
				</div>
				<div class="form-group">
					<label for="Sexe" class="col-sm-3 control-label">Sexe :</label>
					<div class="input-group col-sm-9">
						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
						<select id="Sexe" name="Sexe" class="form-control selectpicker show-tick show-menu-arrow"  required>
							<option value="1">Homme</option>
							<option value="2">Femme</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Date de naissance :</label>
					<div class="input-group col-sm-9">	
						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-calendar"></i></span>	
						<input type="text" class="form-control" value="dd/mm/yyyy" name="Date" id="Date" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Photo de profil :</label>
					<div class="input-group col-sm-9">			
						<div class="fileinput fileinput-new input-group" data-provides="fileinput">
							<div class="form-control" data-trigger="fileinput">
								<i class="glyphicon glyphicon-file fileinput-exists"></i>
								<span class="fileinput-filename"></span>
							</div>
							<span class="input-group-addon btn btn-default btn-file">
								<span class="fileinput-new">Choisir...</span>
								<span class="fileinput-exists">Modifier</span>
								<input type="file" id="Profil" name="photoProfil">
							</span>
							<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">
								Supprimer
							</a>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
					</div>
					<div class="col-sm-9">
						<button type="submit" class="btn btn-success col-sm-12 form-control" name="valider">Enregistrer</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>