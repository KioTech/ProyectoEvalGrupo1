<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php base_url();?>../../content/assets/css/App.css">
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="<?php base_url();?>../../content/vendor/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "#mytextarea",
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste responsivefilemanager"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link responsivefilemanager",
            relative_urls: false,
            remove_script_host : false,
            height: 800,
            language: "es_MX",
            external_filemanager_path:"<?php base_url();?>../../content/vendor/filemanager/",
           	filemanager_title:"Responsive Filemanager" ,
           	external_plugins: { "filemanager" : "../filemanager/plugin.min.js"}
        });
    </script>
</head>
<body>
    <div class="container">
        <h1>¡Comienza a construir tu proyecto!</h1>
        <h3>Añade una imagen, una meta de financiación y otros datos importantes.</h3>
        <div class="panel panel-default">
            <!-- panel Body -->
            <!--<div class="panel-body">
             <form method="post">
                <textarea id="mytextarea"></textarea>
            </form> 
            </div>-->
            <!-- List group -->
            
            <form method="post" action="create_project" name="myform">
              <ul class="list-group">
                <li class="list-group-item">
                    <div class="form-group">
                        <label>Título del proyecto</label>
                        <input type="text" class="form-control" id="" name="tituloProyecto" placeholder="" maxlength="60" onkeyup="countChar60(this)">
                        <span id="charNum1">60</span>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group">
                        <label>Imagen del proyecto</label>
                        <div class="AnchoImagen">
                            <img id="blah" src="" width="447px" height="335px" class=""/>
                            <input type='file' id="imgInp" name="imagenProyecto"/>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group">
                        <label>Descripcion breve del proyecto</label>
                        <textarea class="form-control noresize" rows="3" maxlength="150" onkeyup="countChar150(this)" name="descripcionBreveProyecto"></textarea>
                        <span id="charNum">150</span>
                    </div>
                </li>
                <li class="list-group-item">
                    <label>Categoría</label>
                    <select class="form-control" name="categoriaProyecto">
                        <?php foreach ($categories as $categories_item) : ?>
                            <option value="<?php echo $categories_item["ID"];?>"><?php echo $categories_item["Categoria_TXT"];?></option>
                        <?php endforeach ?>
                    </select>
                </li>
                <li class="list-group-item">
                    <div class="form-group">
                        <label>Ubicación del proyecto</label>
                        <input type="Text" class="form-control" name="ubicacionProyecto"/>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group">
                        <label>Meta</label>
                        <input type="Text" class="form-control" name="metaProyecto"/>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group">
                        <label>Descripcion del proyecto</label>
                        <textarea id="mytextarea" name="descripcionProyecto"></textarea>
                    </div>
                </li>
                   
                   <input type="submit" value="Submit" /> 
              </ul>
            </form>
        </div>
        
    </div>

    <script type="text/javascript">
     function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });

    function countChar150(val) {
        var len = val.value.length;
        if (len >= 151) {
          val.value = val.value.substring(0, 150);
        } else {
          $('#charNum').text(150 - len);
        }
      };
      function countChar60(val) {
        var len = val.value.length;
        if (len >= 61) {
          val.value = val.value.substring(0, 60);
        } else {
          $('#charNum1').text(60 - len);
        }
      };
    </script>
</body>
</html> 