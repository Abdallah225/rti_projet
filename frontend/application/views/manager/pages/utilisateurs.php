<?php
$CI =& get_instance();
$CI->load->model('Admin_model');
$admin = $CI->Admin_model->liste();

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
							<h2><small>Formulaire de création des admistrateurs</small></h2>
						</div>

						<div class="card-body card-padding">

							<div class="row">

								<div class="col-md-6">
									<div class="form-group fg-float m-b-30">
										<div class="fg-line">
											<input type="text" id="sai_login" class="form-control input-sm">
											<label class="fg-label" >Login</label>
										</div>
									</div>

									<div class="form-group fg-float">
										<div class="fg-line">
											<input type="text" id="sai_nom_prenoms" class="form-control input-sm">
											<label class="fg-label">Nom & prénoms</label>
										</div>
									</div>


								</div>
								<div class="col-md-6">
									<div class="form-group fg-float col-md-12">

										<select class="selectpicker" id="habilitation">
											<option>----Habilitation---</option>
											<option value="0">Administrateur</option>
											<option value="1">Gestionnaire</option>
											<option value="2">Editeur</option>

										</select>
									</div>


								</div>

								<div class="col-md-6">
									<div class="form-group fg-float m-b-30">
										<div class="fg-line">
											<input type="text" id="sai_mail" class="form-control input-sm">
											<label class="fg-label">Email</label>
										</div>
									</div>

								</div>
								<div class="col-md-6">
									<div class="form-group fg-float m-b-30">
										<div class="fg-line">
											<input type="password" id="sai_mdp" class="form-control input-sm">
											<label class="fg-label">Mot de passe</label>
										</div>
									</div>

								</div>
								<div class="col-md-6">

									<div class="form-group fg-float m-b-30">
										<div class="fg-line">
											<input type="password" value="" id="sai_mdp_confirme" class="form-control input-sm" >
											<label class="fg-label">Confirmation</label>
										</div>
									</div>


								</div>
							</div>







							<div class="clearfix"></div>

							<div class="m-t-20">
								<button class="btn btn-info waves-effect" id="btn_valider">Valider</button>
								<button id="btn_annuler" onclick="vider_champ()" class="btn btn-danger waves-effect">Annuler</button>
								<div class="preloader pls-red " id="prelod">
									<svg class="pl-circular" viewBox="25 25 50 50">
										<circle class="plc-path" cx="50" cy="50" r="20"></circle>
									</svg>
								</div>
							</div>
						</div>
					</div>



					<div class="table-responsive">
						<table id="data-table-command" class="table table-striped">
							<thead>
							<tr>
								<th data-column-id="id">Id</th>
								<th data-column-id="login">Login</th>
								<th data-column-id="nom" data-order="desc">Nom & prénoms</th>
								<th data-column-id="Mail" data-order="desc">Mail</th>
								<th data-column-id="habilitation" data-order="desc">Habilitation</th>
								<th  data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
							</tr>
							</thead>
							<tbody id="listeAdmin">



							</tbody>
						</table>
					</div>




				</div>
			</div>


		</div>
	</section>

<script type="text/javascript">
$('#prelod').hide();


function validateEmail(email)
{
	var re = /\S+@\S+\.\S+/;
	return re.test(email);
}


var login = $('#sai_login').val();
var habilitation = selectedCountry = $('#habilitation').children("option:selected").val();
var nom_prenom = $('#sai_nom_prenoms').val();
var email = $('#sai_mail').val();
var pass1 = $('#sai_mdp').val();
var pass2 = $('#sai_mdp_confirme').val();



$('#btn_valider').click(function () {

	if($('#sai_login').val().length < 4)
	{
		toast('Votre login dois etre de plus de 4 caractères '+login,'error');
		return false;
	}

	if( $('#habilitation').children("option:selected").val() ===-1)
	{
		toast('Veuillez sélectionner l-habilitation','error');
		return false;
	}

	if($('#sai_nom_prenoms').val().length < 4)
	{
		toast('Merci de saisir le nom ','error');
		return false;
	}

	if(!validateEmail($('#sai_mail').val()))
	{
		toast('Merci de saisir un mail valide ','error');
		return false;
	}


	if($('#sai_mdp').val().length < 5)
	{
		toast('Votre mot de passe doit être de 6 caractères minimum ','error');
		return false;
	}

	if($('#sai_mdp').val() !== $('#sai_mdp_confirme').val())
	{
		toast('Vos mot de passe ne correspondent pas  ','error')
		return false;
	}


	var data =
		{
			"r_login":$('#sai_login').val(),
			"r_pass":$('#sai_mdp').val(),
			"r_level":$('#habilitation').children("option:selected").val(),
			"r_mail":$('#sai_mail').val(),
			"r_nom_prenoms":$('#sai_nom_prenoms').val()
		};
	var url= '<?php echo site_url(); ?>/Admin';
	$('#prelod').show();
	$.ajax({
		url: url,
		type: 'put',
		dataType: 'json',
		data: JSON.stringify(data),
		success: function (data) {
			var obj = data;
			if (obj.status === 200) {
				$('#prelod').hide();
				$('#sai_mdp_confirme').val('');
				$('#sai_mdp').val('');
				$('#sai_mail').val('');
				$('#sai_nom_prenoms').val('');
				$('#sai_login').val('');
				toast(obj.message, 'success');
				getAdmin();
			}

			else {
				$('#prelod').hide();
				toast(obj.message, 'error');
			}


		},
		error: function (xhr, status, error) {
			$('#prelod').hide();
			toast(obj.message, 'error');
		}

	});



});
getAdmin();

function getAdmin()
{

	var url= '<?php echo site_url(); ?>/Admin';
	$.ajax({
		url: url,
		type: 'get',
		dataType: 'json',
		success: function (data) {
			var obj = data;
			if (obj.status === 200) {

				var listAdmin='';
				for (i = 0; i < obj.message.length; i++) {
					listAdmin+='<tr>'+
						'<td>'+obj.message[i].r_i+'</td>'+
						'<td>'+obj.message[i].r_login+'</td>'+
						'<td>'+obj.message[i].r_nom_prenoms+'</td>'+
						'<td>'+obj.message[i].r_mail+'</td>'+
						'<td>'+obj.message[i].r_libelle+'</td>'

				}

				$("#listeAdmin").append('');
				$("#listeAdmin").append(listAdmin);

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
							return "<button type=\"button\" onclick=\"fupdate('"+row.id+"','"+row.login+"','"+row.nom+"','"+row.Mail+"','"+row.habilitation+"')\" class=\"btn btn-icon command-edit waves-effect waves-circle\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-edit\"></span></button> " +
								"<button type=\"button\" class=\"btn btn-icon command-delete waves-effect waves-circle\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-delete\"></span></button>"+
								"<button type=\"button\" class=\"btn btn-icon command-delete waves-effect waves-circle\" onclick=\"fresetpass('"+row.id+"')\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-refresh\"></span></button>";
						}
					}
				});

			}

			else {
				toast(obj.message, 'error');
			}


		},
		error: function (xhr, status, error) {
			$('#prelod').hide();
			toast(obj.message, 'error');
		}

	});
}
function vider_champ()
{
	$("#sai_mdp").attr('disabled','');
	$("#sai_mdp_confirme").attr('disabled','');
	$('#prelod').hide();
	$('#sai_mdp_confirme').val('');
	$('#sai_mdp').val('');
	$('#sai_mail').val('');
	$('#sai_nom_prenoms').val('');
	$('#sai_login').val('');
	$('#i').val(0);
}


function fupdate(id,login,nom,Mail,habilitation) {
	$('#sai_nom_prenoms').val(nom);
	$('#sai_login').val(login);
	$('#sai_mail').val(Mail);
	$('#i').val(id);
	$('.titre').text('Formulaire de modification des utilisateurs')
	$('.fileinput-preview').html('<img src="<?php echo site_url(); ?>/assets/img/'+id+'.png" style="max-width:200px">');
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
	$("#sai_mdp").attr('disabled','disabled');
	$("#sai_mdp_confirme").attr('disabled','disabled');
	$("#habilitation option[text='"+habilitation+"']").attr("selected","selected");
}

</script>
