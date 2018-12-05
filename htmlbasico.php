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

        <title>???</title>

    </head>

    <body> 
        <!--Barra cima-->
        <div class="container-fluid backgMenu">
            <div class="row justify-content-md-center">
                <div class="col col-lg-1">
                    <img src="images/logo-traineebook.png" alt="logo" class="logo-traineebook" width="40" height="40" >
                </div>
                <!--Barra de pesquisa-->
                <div class="col col-lg-4">
                    <form method="POST" action="Pesquisar2.php">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="estagio" placeholder="Buscar estágio" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-Light" type="button submit" id="button-addon2" onclick="">Pesquisar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--Colocar fotinha e mais algo-->
                <div class="col col-lg-2">
                  
                </div>
            </div>  
    
    </body>

</html>













////////////////////////////////////////////////////////////////



                        for ($i=0; $i < 3; $i++) { 
                            echo (" 
                                <div class='card'>
                                    <div class='card-header'>
                                        $area
                                    </div>
                                    <div class='card-body'>
                                        <h5 class='card-title'>Special title treatment</h5>
                                        <p class='card-text'>With supporting text below as a natural lead-in to additional content.</p>
                                        <a href='#' class='btn btn-primary'>Ver mais</a>
                                    </div>
                                </div>
                             ");
                        }