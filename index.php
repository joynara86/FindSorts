<?php
if (!session_id()) {
    session_start();
}
require_once './partial/conexao.php';
require_once './_app/config.php';
try {
    $content = 'login';
    if (!isset($_SESSION['login']) && !isset($_SESSION['fb_access_token'])) {
        if (isset($_GET['p'])) {
            if ($_GET['p'] == 'cadastro') {
                $content = 'cadastro';
            } else {
                $content = 'login';
            }
        }
    } else {
        if (isset($_GET['p'])) {
            $content = $_GET['p'];
        } else {
            $content = 'login';
        }
    }
    if (isset($_GET['logOut'])) {
        session_destroy();
        session_start();
        header("loation: ./index.php");
    }
    $title = ucwords(str_replace("_", " ", (" &middot; " . $content)));

    $require = 'partial/' . $content . '.php';
    if (!file_exists($require)) {
        header("HTTP/1.0 404 Not Found");
        header("Status: 404 Not Found");
        $require = './404.php';
    }
} catch (Exception $ex) {
    echo "<h1>Houve um Erro ao processar esta Página!</h1><p>Informe ao desenvolvedor:</p><br /><pre>";
    echo $ex;
    exit;
}
//realizando o get nos dados do usuario na api
if (isset($_SESSION['fb_access_token'])) {
    try {
        $profile_request = $fb->get('/me?fields=name,first_name,last_name,email', $_SESSION['fb_access_token']);
        $profile = $profile_request->getGraphNode()->asArray();
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        header("Location: ./");
        exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <!-- start: Meta -->
        <meta charset="utf-8">
        <title>FindSports<?= $title ?></title>
        <meta name="description" content="FindSports">
        <meta name="author" content="Joao Pedro, Ulisses, Joyce">
        <meta name="keywords" content="Palavras, chave">
        <!-- end: Meta -->

        <!-- start: Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- end: Mobile Specific -->

        <!-- start: CSS -->
        <link href="css/site.css" rel="stylesheet">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- end: CSS -->


        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>

                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
                <script src="bootstrap/lib_js/respond.min.js"></script>
                <script src="bootstrap/lib_css/ie6-8.css"></script>

        <![endif]-->
        <!-- Acessibilidade Libras - Feito com WEBLibras-->
        <script src="http://arquivos.weblibras.com.br/auto/wl-min.js"></script>
        <script>
            var wl = new WebLibras();
        </script>

    </head>
    <body>
        <div id="menu_top" class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="?p=home" style="color: white;"><img src="" alt="FindSports" class="img-responsive" /></a>
                </div>
                <?php if (isset($_SESSION['login'])) { ?>
                    <div class="navbar-collapse collapse navbar-responsive-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li id="menu-home"><a href="?p=home" style="color: white;"><span class="text-center fa fa-home fa-lg"></span> Inicio</a></li>
                            <li id="menu-usuario"><a href="?p=usuario" style="color: white;"><span class="fa fa-user fa-lg"></span> <?= $_SESSION['nome'] ?></a></li>
                            <li><a href="?logOut=sair" style="color: white;"><span class="fa fa-power-off fa-lg"></span> Sair</a></li>
                        </ul>
                    </div>
                <?php } elseif (isset($profile)) { ?>
                    <div class="navbar-collapse collapse navbar-responsive-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li id="menu-home"><a href="?p=home" style="color: white;"><span class="text-center fa fa-home fa-lg"></span> Inicio</a></li>
                            <li id="menu-usuario"><a href="?p=usuario" style="color: white;"><span class="fa fa-user fa-lg"></span> <?= $profile['first_name'] ?></a></li>
                            <li><a href="?logOut=sair" style="color: white;"><span class="fa fa-power-off fa-lg"></span> Sair</a></li>
                        </ul>
                    </div>
                <?php } else { ?>
                    <div class="navbar-collapse collapse navbar-responsive-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li id="menu-home"><a href="?p=home" style="color: white;"><span class="text-center fa fa-home fa-lg"></span><br>Inicio</a></li>
                            <li id="menu-usuário"><a href="?p=login" style="color: white;"><span class="fa fa-user fa-lg"></span><br>Usuário</a></li>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>

        <?php require_once $require; ?>
        <div class="clearfix"></div>

        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">

                    </div>
                </div>
                <div class="row">
                    <p class="text-center"></p>
                </div>
            </div>
        </div>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../bootstrap/js/jquery.min.js"><\/script>');</script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <!-- carregando API Google Maps-->



    </body>
</html>