<!doctype html>

<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>AgregarUsuario</title>
    <meta name="description" content="The add new user page">
    <meta name="author" content="LGuzman">

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="content/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="content/assets/css/style_main.css">

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="js/gFunctions.js" type="text/javascript"></script>
    <script src="content/vendor/jquery.validate/jquery.validate.js" type="text/javascript" ></script>
    <script src="content/assets/js/validateMessages.js" type="text/javascript" ></script>
  </head>
  <body>
    <nav id="nav_main"> <?php echo isset($nav); ?> </nav>
    <div id="container_main">
      <?php foreach ($views_list as $item):
        echo $item;
      endforeach;?>
    </div>
    <footer id="footer_main"> <?php echo $footer; ?> </footer>
  </body>
</html>