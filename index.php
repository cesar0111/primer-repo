<?php
    //verifico si ya no estoy logueado
    session_start();

    if(isset($_SESSION["login"]) && $_SESSION["login"] === true)
    {
        //redirecciono
        header("Location: private_zone.php");
    }

    //Login con Facebook
    //require_once_DIR_.'third-party/src/Facebook/autoload.php';  no se hace mas asi, esto era para el SDK-v4
    require_once('third-party/src/Facebook/autoload.php');  //asi se llama al SDK-v5

    //creo una nueva instancia de la libreria facebook
    $fb = new Facebook\Facebook([
        'app_id' => '371548150326508', 'app_secret' => 'db6a1e78f15aa365f838e382fd0730d8 ', 'default_graph_version' => 'v3.2',
    ]);

    $helper = $fb->getRedirectLoginHelper();
    $login = $helper->getLoginUrl('http://localhost/psd-to-html-login/process_fb.php', array());
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0//css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Facebook Login</title>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 form-box"> <!--form-box permite personalizar la seccion-->
                <div class="form-top">
                    <div class="form-top-left">
                        <h3>Iniciar Sesion</h3>
                        <p>Ingresa tus datos en el formulario:</p>
                    </div>
                    <div class="form-top-right">
                        <i class="fa fa-key"></i>
                    </div>
                </div>
                <div class="form-bottom">
                    <form action="process_form.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="form-username" placeholder="Usuario.." class="form-control" id="form-username">
                        </div>
                        <div class="form-group">
                            <input type="password" name="form-password" placeholder="Contrasena.." class="form-control" id="form-password">
                        </div>
                        <button name="submit" type="submit" class="btn">Iniciar Sesion</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-sm-offset-3 social-login"> <!---->
        <div class="row">
                <h3>...o inicia sesion con Facebook-</h3>
                <div class="social-login-buttons">
                    <a href="<?php echo $login; ?>" class="btn btn-link btn-link-facebook">
                        <i class="fa fa-facebook"></i>Facebook
                    </a>
                </div>
            </div>
        </div>
    </div>    



    <script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js"></script>
   
   <script> /*llamamos al JQ para cuando cargue el documento (.ready) le definimos en una funcion anonima el backstretch para que estire la imagen*/
        jQuery(document).ready(function(){
            $.backstretch("image/bg.jpg");
        })
    </script>


</body>
</html>