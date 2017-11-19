<?php
if (isset($profile)) {
    ?>
    <div class="container">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">Você está logado pelo Facebook</h3>
            </div>
            <div class="panel-body text-center">
                <h2 class="text-center text-danger">Não é possível acessar esta página</h2>
                <br />
                <p>
                    <?= $profile['name'] ?>, você não pode alterar seus dados, pois está logado com o facebook! 
                </p>
                <div class="col-md-4 col-md-offset-4">
                    <a href="?p=home" class="btn btn-block btn-primary">Leve-me para a HOME</a>
                </div>
            </div>
        </div>
    </div>
<?php } else {
    ?>
    <div class="container">
        <form class="form-horizontal" action="" method="POST">
            <fieldset>

                <!-- Form Name -->
                <legend class="text-center" style="font-size: 34px;">Seus Dados</legend>
                <input type="hidden" name="id" id="id" value="<?=$_SESSION['id']?>">
                <input id="iscad" name="iscad" type="hidden" value="alterar">
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nome">Login</label>  
                    <div class="col-md-4">
                        <input id="nome" name="nome" type="text" placeholder="<?=$_SESSION['nome']?>" class="form-control input-md" value="<?=$_SESSION['nome']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="senha">Senha </label>  
                    <div class="col-md-4">
                        <input id="senha" name="senha" type="password" placeholder="Digite a sua senha de acesso" class="form-control input-md" value="<?=$_SESSION['senha']?>">
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <button id="singlebutton" name="singlebutton" class="btn btn-success">Alterar</button>
                        
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

<?php } ?>
