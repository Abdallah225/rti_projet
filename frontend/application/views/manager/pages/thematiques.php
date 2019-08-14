

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
							<h2><small class="titre">Formulaire de création des <?php echo $title; ?></small></h2>
						</div>

						<div class="card-body card-padding">

							<div class="form-group fg-float m-b-30">
								<div class="fg-line">
									<input type="text" class="form-control input-sm" id="sai_libelle">
									<label class="fg-label">Libellé</label>
								</div>
							</div>

							<div class="form-group fg-float">
								<div class="fg-line">
									<textarea class="form-control auto-size input-sm" id="sai_description"
											  data-autosize-on="true" style="overflow: hidden; word-wrap: break-word; height: 43px;"></textarea>
									<label class="fg-label">Description</label>
								</div>
							</div>


							<div class="clearfix"></div>

							<div class="m-t-20">
								<button id="btn_annuler" class="btn btn-danger waves-effect">Annuler</button>
								<button id="btn_valider" class="btn btn-info waves-effect">Valider</button>
								<input type="number" value="0" id="i" style="display: none;">
							</div>
						</div>
					</div>



					<?php
					$CI =& get_instance();
					$CI->load->model('Thematique_model');
					$chaine = $CI->Thematique_model->get_all_entry();
					//print_r($chaine);
					?>


					<div class="table-responsive">
						<table id="data-table-command" class="table table-striped">
							<thead>
							<tr>
								<th data-column-id="id" data-type="numeric" data-identifier="true">ID</th>
								<th data-column-id="libelle">Libellé</th>
								<th data-column-id="desc" data-order="desc">Description</th>
								<th data-column-id="status" data-order="desc">Status</th>
								<th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
							</tr>
							</thead>
							<tbody>

							<?php
							for( $i= 0 ; $i <= count($chaine)-1 ; $i++ )
							{
							?>

							<tr>
								<td><?php echo $chaine[$i]->r_i; ?></td>
								<td><?php echo $chaine[$i]->r_libelle; ?></td>
								<td><?php echo character_limiter($chaine[$i]->r_description,20,'...'); ?></td>
								<td><?php
									if($chaine[$i]->r_status ==1)
									{
									echo 'Actif' ;
									}
									else
									{
										echo 'inactif';
									}
							?></td>
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
		function vider_champ()
		{
			$('#sai_libelle').val('');
			$('#sai_description').val('');
			$('.titre').text('Formulaire de création de thématique')
			$('#i').val(0);
		}


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
					return "<button type=\"button\" onclick=\"fupdate('"+row.id+"','"+row.libelle+"','"+row.desc+"')\" class=\"btn btn-icon command-edit waves-effect waves-circle\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-edit\"></span></button> " +
						"<button type=\"button\"  class=\"btn btn-icon command-delete waves-effect waves-circle\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-delete\"></span></button>";
				}
			}
		});



		function fupdate(id,libelle,desc) {
			$('#sai_libelle').val(libelle);
			$('#sai_description').val(desc);
			$('#i').val(id);
			$('.titre').text('Formulaire de modification de thématique')
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}



		function fdelete(id,libelle,type) {
			swal({
				title: "Etes vous sur ?",
				text: "Vous êtes sur le point de supprimer la chaine "+libelle,
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Oui supprimer",
				closeOnConfirm: false
			}, function(){
				//swal("Deleted!", "Your imaginary file has been deleted.", "success");


				$.ajax({
					url: '<?php echo site_url(); ?>/Chaine/setStat/'+id+'/-1',
					type: 'GET',
					dataType: 'json',
					headers: {
						'session': '<?php echo $this->session->session; ?>'
					},
					contentType: 'application/json; charset=utf-8',
					success: function (result) {
						if (result.status===200 ) {
							$('.preloader').hide();
							vider_champ();
							toast(result.message,'success');
							window.setTimeout(function(){

								window.location.href=window.location.href;

							}, 3000);
							return false;
						}

						else {
							$('.preloader').hide();
							toast(result.message, 'error');
						}

					},
					error: function (error) {
						console.log(error)
					}
				});

			});
		}

		$('#btn_annuler').click(function () {

			vider_champ();

		});

		$('#btn_valider').click(function () {
			var libelle = $('#sai_libelle').val();
			var description = $('#sai_description').val();
			var i = $('#i').val();

			if(libelle ==='')
			{
				toast('Merci de saisir le titre de la chaine','warning');
				return false;
			}




			var thematic =
				{
					libelle: libelle,
					description: description,
					i:i
				};

				console.log(thematic);
			$.ajax({
				url: '<?php echo site_url(); ?>/Thematique/maj',
				type: 'post',
				dataType: 'json',
				data: JSON.stringify(thematic),
				headers: {
					"session": "<?php echo $this->session->session; ?>"
				},
				success: function (data) {

					var obj = data;

					//console.log(data);
					if (obj.status===200 ) {
						$('.preloader').hide();
						vider_champ();
						toast(data.message,'success');

						return false;
					}

					else {
						$('.preloader').hide();
						toast(obj.message, 'error');
					}


				},
				error: function (xhr, status, error) {
					$("#load").hide();
					toast('Erreur d accèes réseau veuillez rééssayer', 'error');
				}

			});



		})


	</script>
