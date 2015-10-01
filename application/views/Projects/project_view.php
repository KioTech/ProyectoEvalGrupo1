<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php base_url();?>../content/assets/css/App.css">
    <link rel="stylesheet" href="../content/vendor/jquery.validate/css/screen.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
    <script type="text/javascript" src="../content/assets/js/validateMessages.js"></script>
    <script src="../js/gFunctions.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php base_url();?>../content/vendor/tinymce/tinymce.min.js"></script>
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
            external_filemanager_path:"<?php base_url();?>../content/vendor/filemanager/",
           	filemanager_title:"Responsive Filemanager" ,
           	external_plugins: { "filemanager" : "../filemanager/plugin.min.js"}
        });
    </script>
</head>
<body>
    <div class="container">
        <h1>¡Comienza a construir tu proyecto!</h1>
        <h3>Añade una imagen, una meta de financiación y otros datos importantes.</h3>
        <div class="panel"> <!--panel-default-->
            <form method="post" action="Project/create_project" id="form_proyecto" >
              <ul class="list-group">
                <li class="list-group-item">
                    <div class="form-group">
                        <label>Título del proyecto</label>
                        <input type="text" class="form-control" id="tituloProyecto" name="tituloProyecto" placeholder="" minlength="15" maxlength="60" onkeyup="countChar60(this)" >
                        <span id="charNum1">60</span>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group">
                        <label>Imagen del proyecto</label>
                        <div class="AnchoImagen">
                            <img id="blah" src="" width="447px" height="335px" class=""/>
                            <input type='file' id="imgInp" name="imgInp"/>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group">
                        <label>Descripcion breve del proyecto</label>
                        <textarea class="form-control noresize" rows="3" id="desBreProy" name="desBreProy" maxlength="150" onkeyup="countChar150(this)"></textarea>
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
                    <div class="form-group" >
                        <label>Ubicación del proyecto</label>
                        <input type="Text" class="form-control" id="UbicacionProyecto" name="UbicacionProyecto" auto-complete/>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group">
                        <label>Meta</label>
                        <input type="Text" id="meta" name="meta" class="form-control"  />
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group">
                        <label>Descripcion del proyecto</label>
                        <textarea id="mytextarea" name="mytextarea"></textarea>
                        </div>
                </li>
                <li class="list-group-item">
                    <input type="submit"/>
                </li>
              </ul>
              
            </form>
        </div>
        
    </div>

    <script type="text/javascript">
    $(document).ready(function(){
        gFunctions.geonames("UbicacionProyecto");
        

            $("#form_proyecto").validate({
                rules: {
                    tituloProyecto: { required: true, minlength: 3, maxlength: 60 },
                    desBreProy: { required: true, minlength: 10, maxlength: 150 },
                    categoriaProyecto: { required: true },
                    meta: { required: true, maxlength: 10},
                    UbicacionProyecto: {required: true},
                tituloProyecto: {
                    required: true,
                    remote: {
                    url: 'checkIfExist',
                    type: "post",
                    data: {
                        tableName: 't005_proyectos_ma',
                        field: "Nombre_TXT",
                      value: function() {
                        return $( "#tituloProyecto" ).val();
                      }
                    }
                  }
                }
                }
            });
        });
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