
<?php
$CI =& get_instance();
$CI->load->model('Thematique_model');
$CI->load->model('Chaine_model');
$CI->load->model('Programe_model');
$thematic = $CI->Thematique_model->getBystatus();
$chaine = $CI->Chaine_model->getdata();
$programe = $CI->Programe_model->getByDate(0);
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
							<h2><small>Formulaire de création des <?php echo $title; ?></small></h2>
						</div>

						<div class="card-body card-padding">

							<div class="row">
								<div class="col-md-4">

									<div class="form-group fg-float m-b-30">
										<div class="fg-line">
											<input type="text" class="form-control input-sm">
											<label class="fg-label">Titre</label>
										</div>
									</div>

									<div class="form-group fg-float">
										<div class="fg-line">
											<textarea class="form-control auto-size input-sm" data-autosize-on="true" style="overflow: hidden; word-wrap: break-word; height: 43px;"></textarea>
											<label class="fg-label">Synopsys</label>
										</div>
									</div>

									<p class="c-black f-500 m-b-20">Date et heure</p>

									<div class="input-group form-group">
										<span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
										<div class="dtp-container fg-line">
											<input type='text' class="form-control date-picker" placeholder="Click here...">
										</div>
									</div>



									<div class="clearfix"></div>

									<div class="m-t-20">
										<button class="btn btn-info waves-effect">Valider</button>

									</div>

								</div>
								<div class="col-md-4">
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
									<div class="form-group fg-float col-md-12">

										<select class="selectpicker">
											<option>----Sélectionner la thématique---</option>
											<?php
											for( $t= 0 ; $t <= count($thematic)-1 ; $t++ )
											{
											?>

											<option><?php echo $thematic[$t]->r_libelle; ?></option>
											<?php } ?>
										</select>
										<div class="input-group form-group">
											<span class="input-group-addon"><i class="zmdi zmdi-time"></i></span>
											<div class="dtp-container fg-line">
												<input type='text' class="form-control time-picker" placeholder="Click here...">
											</div>
										</div>
									</div>



								</div>
<div class="col-md-4">
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





						</div>
					</div>





					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table id="data-table-command" class="table table-striped">
									<thead>
									<tr>
										<th data-column-id="titre">Titre</th>
										<th data-column-id="synopsys">Synopsys</th>
										<th data-column-id="date">Date</th>
										<th data-column-id="heure">Heure</th>
										<th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
									</tr>
									</thead>
									<tbody>

									<?php
									for( $i= 0 ; $i <= count($programe)-1 ; $i++ )
									{
									?>
										<tr>
											<td><?php echo $programe[$i]->r_titre; ?></td>
											<td ><?php echo character_limiter($programe[$i]->r_synopsys, 20,'...'); ?></td>
											<td><?php echo $programe[$i]->r_date; ?></td>
											<td><?php echo $programe[$i]->r_heure; ?></td>
											<td></td>
										</tr>
<?php } ?>

									</tbody>
								</table>
							</div>
						</div>
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
