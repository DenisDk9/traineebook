<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
        <!--CSS-->
        <link rel="stylesheet" type="text/css" href="css/style2.css">

        <title>Traineebook</title>

    </head>
    <body >
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col col-lg-3"> 
                    <br><br><br>
                    <img src="images/bm.png"  alt="logo"  width="100% px" height="100%" >
                </div>
                <!--Login e formulario de cadastro(Consertar esses brs depois)-->
                <div class="col col-lg-3">
                    <br><br>
                    <div class="card mt-3">
                        <div class="card-body">
                        Já é cadastrado? Faça login abaixo
                        </div>
                    </div>
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite seu email">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Digite sua senha">
                        </div>
                        <div class="form-group form-check">
                            <!--<input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                     <div class="card mt-3">
                        <div class="card-body">
                        Não tem um cadastro? Crie uma conta
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </body>
</html>