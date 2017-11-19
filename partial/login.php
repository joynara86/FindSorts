<div class="container">
    <form class="form-horizontal" action="" method="POST">
        <fieldset>

            <!-- Form Name -->
            <legend class="text-center" style="font-size: 34px;">Login</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="login">Login</label>  
                <div class="col-md-4">
                    <input id="email" name="login" type="text" placeholder="Digite seu login" class="form-control input-md" required="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="senha">Senha </label>  
                <div class="col-md-4">
                    <input id="senha" name="senha" type="password" placeholder="Digite a sua senha de acesso" class="form-control input-md" required="">
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <div class="col-md-12 text-center">
                    <button id="singlebutton" name="singlebutton" class="btn btn-success">Entrar</button>
                    <p style="padding-top: 15px">Ao clicar em enviar você concorda com nossos termos e confirma que leu nossa política.</p>
                </div>
            </div>
        </fieldset>
    </form>
    <div class="row">
        <div class="col-md-12 text-center">
            <a class="btn btn-danger" href="?p=cadastro">Me cadastrar</a>
            <?php
            $loginUrl = $login_f->getLoginUrl('http://localhost/FindSports/partial/callbackFB.php');

            echo '<a class="btn btn-primary" href="' . htmlspecialchars($loginUrl) . '">Entrar com o Facebook</a>';
            ?>
        </div>
    </div>
</div>
