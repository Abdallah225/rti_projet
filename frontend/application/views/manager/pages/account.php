

<section id="content">
	<div class="container">

		<div class="card">
			<div class="card-header">
				<h2>Gestion de mon compte</h2>

				</ul>
			</div>

			<div class="card-body">

				<div class="card">
					<div class="card-header ch-alt">
						<h2><small class="titre">Interface de gestion de mon compte</small></h2>
					</div>

					<div class="card-body card-padding">

						<div class="container">
							<div class="card" id="profile-main">


								<div class="pm-body">





									<div class="pmb-block">
										<div class="pmbb-header">
											<h2><i class="zmdi zmdi-account m-r-5"></i> Informations de bases</h2>

											<ul class="actions">
												<li class="dropdown">
													<a href="#" data-toggle="dropdown">
														<i class="zmdi zmdi-more-vert"></i>
													</a>

													<ul class="dropdown-menu dropdown-menu-right">
														<li>
															<a data-pmb-action="edit" href="#">Editer</a>
														</li>
													</ul>
												</li>
											</ul>
										</div>
										<div class="pmbb-body p-l-30">
											<div class="pmbb-view">
												<dl class="dl-horizontal">
													<dt>Nom & prénoms</dt>
													<dd><?php echo $this->session->r_nom_prenoms; ?></dd>
												</dl>

												<dl class="dl-horizontal">
													<dt>Adresse Mail</dt>
													<dd><?php echo $this->session->r_mail; ?></dd>
												</dl>
												<dl class="dl-horizontal">
													<dt>Mot de passe</dt>
													<dd>***********</dd>
												</dl>
											</div>

											<div class="pmbb-edit">
												<dl class="dl-horizontal">
													<dt class="p-t-10">Nom & prénoms</dt>
													<dd>
														<div class="fg-line">
															<input type="text" class="form-control" placeholder="<?php echo $this->session->r_nom_prenoms; ?>">
														</div>

													</dd>
												</dl>

												<dl class="dl-horizontal">
													<dt class="p-t-10">Adresse Mail</dt>
													<dd>
														<div class="dtp-container dropdown fg-line">
															<input type='text' class="form-control" data-toggle="dropdown" placeholder="<?php echo $this->session->r_mail; ?>">
														</div>
													</dd>
												</dl>
												<dl class="dl-horizontal">
													<dt class="p-t-10">Mot de passe</dt>
													<dd>
														<div class="fg-line">

																<input type='text' class="form-control" data-toggle="dropdown" placeholder="Ancien mot de passe">
																<div class="clearfix">
																	&nbsp;
																</div>
																<input type='text' class="form-control" data-toggle="dropdown" placeholder="Nouveau mot de passe">
																<div class="clearfix">
																	&nbsp;
																</div>
																<input type='text' class="form-control" data-toggle="dropdown" placeholder="Confirmation">

														</div>
													</dd>
												</dl>

												<div class="m-t-30">
													<button class="btn btn-primary btn-sm">Sauvegarder</button>
													<button data-pmb-action="reset" class="btn btn-danger">Annuler</button>
												</div>
											</div>
										</div>
									</div>



								</div>
							</div>
						</div>






						<div class="clearfix"></div>


					</div>
				</div>



				<?php
				$CI =& get_instance();
				$CI->load->model('Chaine_model');
				$chaine = $CI->Chaine_model->getdata();
				//print_r($chaine);
				?>


			</div>
		</div>


	</div>
</section>

