<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<table id="note" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th><input type="checkbox" id="checkall" /></th>
						<th>Matiere</th>
						<th>Devoir</th>
						<th>Date</th>
						<th>Note</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th><button type="button" class="btn btn-primary btn-xs">Moyenne</button></th>
						<th>Matiere</th>
						<th>Devoir</th>
						<th>Date</th>
						<th>Note</th>
					</tr>
				</tfoot>

				<tbody>
					<?php foreach ($lesDevoirs as $idDevoir) { 
						$monDevoir = new Devoir($idDevoir);
					?>
					<!-- Liste des notes -->
						<tr>
							<th><input type="checkbox" class="checkthis" /></th>
							<td><?= $monDevoir->getIdMatiere(); ?></td>
							<td><?= $monDevoir->getLibelleDevoir(); ?></td>
							<td><?= $monDevoir->getDateLimiteDevoir(); ?></td>
							<td><?= Appartient::getNoteEtudiantDevoir($utilisateurCourant, $idDevoir); ?></td>
						</tr>
					<?php } ?>
				</tbody>

			</table>
		</div>
	</div>
</div>