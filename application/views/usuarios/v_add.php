<!doctype html>

<html lang="es">
<head>
  <meta charset="utf-8">

  <title>AgregarUsuario</title>
  <meta name="description" content="The add new user page">
  <meta name="author" content="LGuzman">

  <link rel="stylesheet" href="content/vendor/bootstrap/css/bootstrap.min.css">

  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="js/gFunctions.js" type="text/javascript"></script>
  <script type="text/javascript" src="content/vendor/jquery.validate/jquery.validate.js"></script>
  <script type="text/javascript" src="content/assets/js/validateMessages.js"></script>
  <script type="text/javascript">
  	// this one requires the text "buga", we define a default message, too
		$.validator.addMethod("", function(value) {
			return value == "buga";
		}, 'Please enter "buga"!');

		// this one requires the value to be the same as the first parameter
		// $.validator.methods.equal = function(value, element, param) {
		// 	return value == param;
		// };

		// jQuery.validator.addMethod("laxEmail", function(value, element) {
		//   // allow any non-whitespace characters as the host part
		//   return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
		// }, 'Please enter a valid email address.');
  	
  	$(document).ready(function(){
  		gFunctions.geonames("txtDireccion");
  		

			$("#frm_newUser").validate({
				rules: {
					txtNombre: { required: true, minlength: 3, maxlength: 50 },
					txtApPaterno: { required: true, minlength: 3, maxlength: 50 },
					txtPassword: { required: true },
			    txtPasswordConf: { equalTo: "#txtPassword" },
			    txtUsername: {
			    	required: true,
			    	remote: {
			        url: 'c_usuarios/checkIfExist',
			        type: "post",
			        data: {
			        	tableName: 't001_usuarios_ma',
			        	field: "Username_TXT",
			          value: function() {
			            return $( "#txtUsername" ).val();
			          }
			        }
			      }
			    },
			    txtUsername: {
			    	required: true,
			    	remote: {
			        url: 'c_usuarios/checkIfExist',
			        type: "post",
			        data: {
			        	tableName: 't001_usuarios_ma',
			        	field: "Email_TXT",
			          value: function() {
			            return $( "#txtCorreo" ).val();
			          }
			        }
			      }
			    }
				}
			});
		});
  </script>

</head>

<body>
	<?php 
		var_dump($item);
	?>
	<form id="frm_newUser" class="form-horizontal" action="c_usuarios/add" method="post">
		<h2 id="summary"></h2>
	  
	  <div class="form-group">
	    <label for="txtNombre" class="col-sm-2 control-label">Nombre</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Aldo">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="txtApPaterno" class="col-sm-2 control-label">Apellido Paterno</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="txtApPaterno" name="txtApPaterno" placeholder="Cardenas">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="txtApMaterno" class="col-sm-2 control-label">Apellido Materno</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="txtApMaterno" name="txtApMaterno" placeholder="Calderon">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="txtDescripcion" class="col-sm-2 control-label">Descripción</label>
	    <div class="col-sm-10">
	    	<textarea class="form-control" id="txtDescripcion" name="txtDescripcion" placeholder="Ingeniero en Sistemas, con 10 años de esperiencia en el área..." rows="3"></textarea>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="txtCorreo" class="col-sm-2 control-label">Correo</label>
	    <div class="col-sm-10">
	      <input type="email" class="form-control" id="txtCorreo" name="txtCorreo" placeholder="usuario@email.com">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="txtTelefono" class="col-sm-2 control-label">Telefono</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" placeholder="(312)3155555">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="txtDireccion" class="col-sm-2 control-label">Dirección</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="Colima, CL, Mexico">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="txtImagenUlr" class="col-sm-2 control-label">Imagen</label>
	    <div class="col-sm-9">
	      <input type="text" class="form-control" id="txtImagenUrl" name="txtImagenUrl" placeholder="http://dominio.com/miImagen.jpg">
	    </div>
	    <div class="col-sm-1">
	      <input type="file" class="btn btn-default" id="txtImagenFile" name="txtImagenFile">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="txtUsername" class="col-sm-2 control-label">Username</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="txtUsername" name="txtUsername" placeholder="aldoCalderon">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="txtPassword" class="col-sm-2 control-label">Password</label>
	    <div class="col-sm-4">
	      <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="***********">
	    </div>
	    <label for="txtPasswordConf" class="col-sm-2 control-label">Confirmar password</label>
	    <div class="col-sm-4">
	      <input type="password" class="form-control" id="txtPasswordConf" name="txtPasswordConf" placeholder="***********">
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-2 col-sm-offset-2">
	      <button type="submit" class="btn btn-primary" id="btn_save" name="btn_save">Registrar</button>
	    </div>
	    <div class="col-sm-2 col-sm-6">
	      <button type="button" class="btn btn-primary" id="btn_saveSocial" name="btn_saveSocial">Registrar con Google</button>
	    </div>
	  </div>
	</form>
</body>
  
</html>