<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Traineebook</title>

</head>
<body>

    <div class="container-fluid ">
        <div class="row">
            <div class="col">

                <img class="rrt" src="images/rrt.png">
                <h1>Estudante: </h1>
                <h2>Sabemos o quanto é difícil encontrar um estágio</h2>    
            
                <h1>Empresa: </h1>
                <h2>Entendemos as dificuldades em encontrar um estágiario adequado para sua empresa</h2>

            </div>

            <div class="col">

                <!--Formulario de login-->
            <br>
                <form  action="login.php" method="POST">
                    <input type="email" required name="email" placeholder="email" /> 
                    
                    <input type="password" required name="senha" placeholder="Senha" />
                    
                    <input type="submit" name="login"  value="Entrar" placeholder="Entrar" />
                </form>

                <br/><br/><br/><br/><br/><br/><br/><br/><br/>
                
                <!--Formulario de cadastro-->
                
                <div class="divcadastro">
                <h3>Cadastre-se agora<h3>
                    <form action="cadastra.php" method="POST">
                        
                        <input type="text" required name="name" placeholder="Nome" size ="30"/>
                        <br />
                        <input type="email" required name="email" placeholder="Email" size="30" />
                        <br />
                        <input type="password" required name="senha" placeholder="Senha" />
                        <br />
                        <input type="password" required name="senha-confirmar" placeholder="Confirmar senha" />
                        <br>
                        <input type="radio" name="tipo-cadastro" value="estudante" checked /> Estudante
                        <input type="radio" name="tipo-cadastro" value="empresa" /> Empresa
                        <br />
                        <br />
                        <input type="submit" name="cadastro" value="Cadastrar"  placeholder="Enviar" />
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>
</html>