<div class="page-header text-center">
	<h1>
		Enregistrement d'une nouvelle matière
	</h1>
</div>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<form role="form" class="form-horizontal" method="post">
				<div class="form-group">
					<label for="NomMatiere" class="col-sm-3 control-label">Nom de la matiére :</label>
					<div class="input-group col-sm-9">
						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-pencil"></i></span>
						<input type="text" class="form-control" name="nomMatiere" id="nomMatiere" placeholder="Nom de la matière"/>
					</div>
				</div>  	
			  	<div class="form-group">
					<label for="NomFormation" class="col-sm-3 control-label">Formations de la matière :</label>
					<div class="input-group col-sm-9">
						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-book"></i></span>
						<select name="formation[]" class="selectpicker show-tick show-menu-arrow" data-size="5" data-selected-text-format="count>2"  id="Formation" data-width="100%" multiple="multiple" title='Selection de(s) formation(s)' data-live-search="true">
					        <?php
	                            foreach ($Formations as $Formation) {
	                        ?>
	                            <option value="<?= $Formation->getIdFormation() ?>"> <?= $Formation->getLibelleFormation() ?>   <?= $Formation->getAnneeFormation() ?> </option>
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
						<button type="submit" class="btn btn-success col-sm-12 form-control" name="valider">Enregistrer</button>
					</div>
				</div>
			</form>	
		</div>
	</div>
</div>