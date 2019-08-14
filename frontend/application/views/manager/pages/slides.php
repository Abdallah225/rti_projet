<?php
$CI =& get_instance();
$CI->load->model('Chaine_model');
$CI->load->model('Slider_model');
$slides = $CI->Slider_model->getdata();
$chaine = $CI->Chaine_model->getdata();
//print_r($chaine);
?>

	<section id="content">
		<div class="container">

			<div class="card">
				<div class="card-header">
					<h2>Gestion des <?php echo $title; ?></h2>

					</ul>
				</div>

				<div class="card-body">

					<div class="card">
						<div class="card-header ch-alt">
							<h2><small>Formulaire de création des slides</small></h2>
						</div>

						<div class="card-body card-padding">

							<div class="row">

								<div class="col-md-6">
									<div class="form-group fg-float m-b-30">
										<div class="fg-line">
											<input type="text" class="form-control input-sm">
											<label class="fg-label">Titre</label>
										</div>
									</div>

									<div class="form-group fg-float">
										<div class="fg-line">
											<input type="text" class="form-control input-sm">
											<label class="fg-label">Sous titre</label>
										</div>
									</div>
									<div class="form-group fg-float m-b-30">
										<div class="fg-line">
											<input type="text" class="form-control input-sm" id="r_url">
											<label class="fg-label">Url Slide</label>
										</div>
									</div>									
									<div class="form-group fg-float col-md-12">

										<select class="selectpicker">
											<option>----Sélectionner la chaine---</option>
											<?php
											for( $c= 0 ; $c <= count($chaine)-1 ; $c++ )
											{
												?>

												<option><?php echo $chaine[$c]->r_libelle; ?></option>
											<?php } ?>
										</select>
									</div>

								</div>
								<div class="col-md-6">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
										<div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new">Sélectionner l'image</span>
                                        <span class="fileinput-exists">Changer</span>
                                        <input type="file" name="...">
                                    </span>
											<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Supprimer</a>
										</div>
									</div>

								</div>


							</div>







							<div class="clearfix"></div>

							<div class="m-t-20">
								<button class="btn btn-info waves-effect">Valider</button>

							</div>
						</div>
					</div>



					<div class="table-responsive">
						<table id="data-table-command" class="table table-striped">
							<thead>
							<tr>
								<th data-column-id="id" data-type="numeric" data-identifier="true">ID</th>
								<th data-column-id="titre">Titre</th>
								<th data-column-id="soustitre" data-order="desc">Sous titre</th>
								<th data-column-id="status" data-order="desc">Status</th>
								<th  data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
							</tr>
							</thead>
							<tbody>

							<?php
							for( $z= 0 ; $z <= count($slides)-1 ; $z++ )
							{
							?>

							<tr>
								<td><?php echo $slides[$z]->r_i; ?></td>
								<td><?php echo $slides[$z]->r_titre; ?></td>
								<td><?php echo $slides[$z]->r_sous_titre; ?></td>
								<td><?php
									if($slides[$z]->r_statut ==1)
									{
										echo 'Actif' ;
									}
									else
									{
										echo 'inactif';
									}
									?></td>

								<td></td>
							</tr>

							<?php } ?>
							</tbody>
						</table>
					</div>




				</div>
			</div>


		</div>
	</section>

<script type="text/javascript">
	$("#data-table-command").bootgrid({

		rowCount: 5,

		css: {
			icon: 'zmdi icon',
			iconColumns: 'zmdi-view-module',
			iconDown: 'zmdi-expand-more',
			iconRefresh: 'zmdi-refresh',
			iconUp: 'zmdi-expand-less'
		},
		formatters: {
			"commands": function(column, row) {
				return "<button type=\"button\" class=\"btn btn-icon command-edit waves-effect waves-circle\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-edit\"></span></button> " +
					"<button type=\"button\" class=\"btn btn-icon command-delete waves-effect waves-circle\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-delete\"></span></button>";
			}
		}
	});
</script>
