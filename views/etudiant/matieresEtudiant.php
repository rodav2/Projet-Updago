<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="panel-group" id="panel-matiere">
				<!-- Liste des matieres -->
				<?php 
				foreach ($mesMatieres as $idMatiere) 
				{ 
					$mesDevoirs = Devoir::getDevoirsEtudiantMatiere($utilisateurCourant, $idMatiere); 
				?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<a class="panel-title" data-toggle="collapse" data-parent="#panel-matiere" href="#panel-element-<?php echo $idMatiere; ?>">
								<?php 
								$maMatiere = new Matiere($idMatiere); 
								echo $maMatiere->getLibelleMatiere(); 
								?>
							</a>
						</div>
						<div id="panel-element-<?php echo $idMatiere; ?>" class="panel-collapse collapse">
							<div class="panel-body">

								<!-- Lister les devoirs -->
								<?php 
								foreach ($mesDevoirs as $idDevoir) 
								{
									$monDevoir = new Devoir($idDevoir);
									?>
									<div class="list-group">
										<!-- Un devoir -->
										<a id="modal-<?php echo $idMatiere.$idDevoir; ?>" href="#modal-container-<?php echo $idMatiere.$idDevoir; ?>" role="button" class="list-group-item" data-toggle="modal">
											<?php 
											$note = Appartient::getNoteEtudiantDevoir($utilisateurCourant, $monDevoir->getIdDevoir());
											
											if(isset($note))
											{
												?>
												<span class="badge"><?php echo $note; ?></span>
												<?php 
											} 
											echo $monDevoir->getLibelleDevoir(); 
											?>
										</a>

										<!-- Formulaire pour ajouter les fichiers -->    
										<form method="post" action="" enctype="multipart/form-data">
											<!-- Modal - Affichage du devoir -->
											<div class="modal fade" id="modal-container-<?php echo $idMatiere.$idDevoir; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															<h4 class="modal-title" id="myModalLabel">
																<?php echo $monDevoir->getLibelleDevoir(); ?>
															</h4>
														</div>
														<div class="modal-body"> 
															<blockquote>
																<p>
																	<?php echo $monDevoir->getDescriptionDevoir(); ?>
																</p>
																<small>
																	par 
																	<cite>
																		<?php 
																		$enseignant = new Enseignant($monDevoir->getIdEnseignant()); 
																		echo $enseignant->getNomEnseignant(); 
																		echo " ".$enseignant->getPrenomEnseignant(); 
																		?>
																	</cite>
																</small>
															</blockquote>

															<table class="table">
																<caption>Informations du devoir :</caption>
																<tbody>
																	<tr>
																		<?php
																		// Formatage de la date 
																		$Date = DateTime::createFromFormat('Y-m-d H:i:s', $monDevoir->getDateLimiteDevoir()); 
																		$DateFormate = $Date->format('d-m-Y H:i');
																		?>
																		<td>Date de fin :</td>
																		<td><?php echo $DateFormate;?></td> 
																	</tr>
																	<tr>
																		<td>Commentaire :</td>
																		<td><?= Groupe::getCommentaireDevoir($idDevoir);?></td>
																	</tr>

																	<?php $mesLivrables = LivrableAttendu::getLivrableAttendusDevoir($idDevoir);

																	//Affiche le nombre de livrable
																	foreach ($mesLivrables as $idLivrable) {
																		$monLivrable = new LivrableAttendu($idLivrable); 

																		// Formatage de la date 
																		$Date = DateTime::createFromFormat('Y-m-d H:i:s', $monLivrable->getDateLimiteLivrableAttendu()); 
																		$DateFormate = $Date->format('d-m-Y H:i');
																		?>
																		<tr>
																			<td>Livrable (<?php echo $DateFormate; ?>) :</td>

																			<?php $monFichier = LivrableRendu::getLivrableRenduLivrableAttenduEtudiant($idLivrable, $utilisateurCourant);

																			//Si le livrable a était déposé
																			if($monFichier)
																			{
																				// Formatage de la date 
																				$Date = DateTime::createFromFormat('Y-m-d H:i:s', $monFichier[0]["dateSoumissionLivrableRendu"]); 
																				$DateFormate = $Date->format('d-m-Y H:i');
																				?>
																				<td>
																					<a target="_blank" href="<?= $monFichier[0]["fichierLivrableRendu"]; ?>">
																						<!-- Image pour le dl du livrable -->
																						<span class="glyphicon glyphicon-save" aria-hidden="true"></span>
																					</a> (<?php echo $DateFormate; ?>)
																				</td>
																				<?php 
																			} 
																			else 
																			{ 
																				?>
																				<td>
																					<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																					  <div class="form-control" data-trigger="fileinput">
																					  	<i class="glyphicon glyphicon-file fileinput-exists">Livrable</i>
																					  </div>
																					  <span class="input-group-addon btn btn-default btn-file">
																					  	<span class="fileinput-new">Choisir...</span>
																					  	<span class="fileinput-exists">Modifier</span>
																					  	<input type="file" name="LivrableRendu<?= $idLivrable; ?>">
																					  </span>
																					  <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Supprimer</a>
																					</div>
																				</td>
																				<?php 
																			} 
																			?>
																		</tr>
																		<?php 
																	} 
																	?>
																</tbody>
															</table>
														</div>
														<div class="modal-footer raw">
															<div class="col-sm-6">
																<button type="button" class="btn btn-default btn-block" data-dismiss="modal">Fermer</button>
															</div>
															<div class="col-sm-6">
																<input type="hidden" name="idDevoir" value="<?= $monDevoir->getIdDevoir()?>">
																<button type="submit" name="save" class="btn btn-success btn-block">Enregistrer</button>
															</div>
														</div>
													</div>	
												</div>
											</div>
											<!-- Fin du modal -->
										</form>

									</div>
									<!-- Fin liste des devoirs -->
									<?php 
								} 
								?>
							</div>
						</div>
					</div>
					<?php 
				} 
				?>
				<!-- Fin liste des matieres -->
			</div>
		</div>
	</div>
</div>