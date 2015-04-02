<div class="page-header" style="text-align: center">
	<h1>
		Enregistrement d'un nouvel administrateur
	</h1>
</div>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<form role="form" method="post" class="form-horizontal" onSubmit="return verify(this.Password, this.ConfirmationPassword)">
				<div class="form-group">
					<label for="Nom" class="col-sm-3 control-label">
						Nom :
					</label>
					<div class="input-group col-sm-9">
						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-pencil"></i></span>
						<input type="text" class="form-control" id="Nom" name="Nom" placeholder="Nom" required>
					</div>  
				</div>
				<div class="form-group">
					<label for="Prenom" class="col-sm-3 control-label">
						Prenom :
					</label>
					<div class="input-group col-sm-9">
						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-pencil"></i></span>
						<input type="text" class="form-control" id="Prenom" name="Prenom" placeholder="Prenom" required>
					</div>  
				</div>
				<div class="form-group">
					<label for="Identifiant" class="col-sm-3 control-label">
						Identifiant :
					</label>
					<div class="input-group col-sm-9">
						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-pencil"></i></span>
						<input type="text" class="form-control" id="Identifiant" name="Identifiant" placeholder="Identifiant" required>
					</div>  
				</div>
				<div class="form-group">
					<label for="Password" class="col-sm-3 control-label">
						Password :
					</label>
					<div class="input-group col-sm-9">
						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="Password" class="form-control" id="Password" name="Password" placeholder="Password" required>
					</div>  
				</div>
				<div class="form-group">
					<label for="Password" class="col-sm-3 control-label">
						Retapez le password :
					</label>
					<div class="input-group col-sm-9">
						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="Password" class="form-control" id="ConfirmationPassword" name="ConfirmationPassword" placeholder="Confirmation du password" required>
					</div>  
				</div>      
				<div class="form-group">
					<label for="Email" class="col-sm-3 control-label">
						Email :
					</label>

					<div class="input-group col-sm-9">
						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
						<input type="text" class="form-control" id="Email" placeholder="Email" name="Email" required>
					</div>
				</div>      
				<div class="form-group">
					<div class="col-sm-3">
					</div>
					<div class="input-group col-sm-9">
						<button type="submit" class="btn btn-success col-sm-12 form-control" name="valider">Enregistrer</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
