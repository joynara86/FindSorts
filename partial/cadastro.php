<div class="container">
    <form class="form-horizontal" action="" method="POST">
        <fieldset>

            <!-- Form Name -->
            <legend class="text-center" style="font-size: 34px;">Cadastro</legend>
            <div class="row">
                <div class="col-md-8">
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="nome">Nome</label>  
                        <div class="col-md-8">
                            <input id="nome" name="nome" type="text" placeholder="Digite seu nome completo" class="form-control input-md" required="">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="login">Login</label>  
                        <div class="col-md-8">
                            <input id="login" name="login" type="text" placeholder="Digite o seu login de acesso" class="form-control input-md" required="">
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="senha">Senha</label>  
                        <div class="col-md-8">
                            <input id="senha" name="senha" type="password" placeholder="Digite uma senha" class="form-control input-md" required="">
                        </div>
                    </div>
                    <!-- Input escondido para identificação do cadastro -->
                    <input id="iscad" name="iscad" type="hidden" value="cadastro">
                </div>

            </div>
            <!-- Button -->
            <div class="form-group">
                <div class="col-md-12 text-center">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Finalizar Cadastro</button>
                </div>
            </div>
        </fieldset>
    </form>

</div>