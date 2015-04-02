<div class="page-header text-center">
	<h1>
		Enregistrement d'une nouvelle formation
	</h1>
</div>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<form class="form-horizontal" role="form" method="post">
				<div class="form-group">
					<label for="Nomformation" class="col-sm-3 control-label">Nom de la formation :</label>
					<div class="input-group col-sm-9">
						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-pencil"></i></span>
						<input type="text" class="form-control" name="nomFormation" id="nomFormation" placeholder="Nom de la formation"/>
					</div>
				</div>
				<div class="form-group">
					<label for="Annee" class="col-sm-3 control-label">Année de la formation :</label>
					<div class="input-group col-sm-9">
						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-calendar"></i></span>
						<input type="text" value="<?= date("Y") ?>" data-format="dddd" placeholder="Année de la formation" class="form-control bfh-phone" id="Annee" name="Annee">
					</div>
				</div>
				<div class="form-group">
					<label for="Nomformation" class="col-sm-3 control-label">Matières de la formation :</label>
					<div class="input-group col-sm-9">
						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-book"></i></span>
						<select name="matiere[]" class="selectpicker show-tick show-menu-arrow" multiple="multiple" data-size="10" title='Selection de(s) matière(s)' data-live-search="true" id="matiere" data-width="100%" data-selected-text-format="count>3">
							<?php
							foreach ($Matieres as $Matiere) {
								?>  
								<option value="<?= $Matiere->getIdMatiere() ?>"> <?= $Matiere->getLibelleMatiere() ?> </option>
								<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
					</div>
					<div class="col-sm-9">
						<button type="submit" class="btn btn-success col-sm-12 form-control" id="valider" name="valider">Enregistrer</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

