<?php include_once("conexao.php");
$result_produtos = sprintf("SELECT * FROM tbprod001 ORDER BY RAND()", time()%(24*60*60));
$resultado_produto = mysqli_query($conn, $result_produtos);
?>

<!--Conexão com o banco-->
<?session_start();
    include_once "../login_novo/conexao.php";
    if(isset($_SESSION['email']) && isset ($_SESSION['id']) && isset ($_SESSION['role'])) { 
?>

<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
	<title>Produtos</title>
	<!-- CSS-->
    <!--<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto+Slab:400,700|Pacifico' rel='stylesheet' type='text/css'>   -->
	<link href="/noticias_jogos/src/css/index.css" rel="stylesheet"/>
    <link href="/noticias_jogos/src/css/produto.css" rel="stylesheet"/>


    <!--back_and script -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <!--JQuery, Pooper.js e Bootstrap -->
    <script src="./src/Scripts/jquery-3.6.0.js"></script>
    <script src="./src/Scripts/popper.min.js"></script>
	<script src="./src/Scripts/bootstrap.min.js"></script>    
	<script src="./src/Scripts/index.js"></script>
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>

    <!--API GOOGLE-->
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <!--Fonte-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

<!--IMPORTAR através do php o menu pronto-->
<?php include_once ("../geral/header_produto.php");?>

<!--Seção para o admin-->
<? phpif ($row['role'] === 'user') {?>

<br><br><br>
<div class="container">
    <div class="row ">
        <div class="col-lg-3"> 
        <!--BUSCA/PESQUISAR-->
            <div class="sidebar"> <br>
                <div class=" widget border-0">
                    <div class="locations">
                        <form class="form-inline" method="POST" action="../produto/pesquisar.php">
                            <div class="input-group md-3">
                            <input class="form-control mr-sm-1" type="text" name="pesquisar" placeholder="Pesquisar">
                            <div class="input-group-append">
                            <button class="btn btn-dark" type="submit">IR</button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
          <!--BUSCA/PESQUISAR-->   <br>  
                <form class="form"  method="POST" action="../produto/categoria_02.php">
                <p>Produtos</p>
                    <div class="custom-control custom-radio custom-control" >
                            <input type="radio" class="custom-control-input" id="customRadio" name="categoria2" value="Xbox">
                            <label class="custom-control-label" for="customRadio">Xbox</label>
                    </div>

                    <div class="custom-control custom-radio custom-control">
                        <input type="radio" class="custom-control-input" id="customRadio2" name="categoria2" value="Playstation">
                        <label class="custom-control-label" for="customRadio2">Playstation</label>
                    </div>
                    
                    <div class="custom-control custom-radio custom-control">
                        <input type="radio" class="custom-control-input" id="customRadio3" name="categoria2" value="Nintendo">
                        <label class="custom-control-label" for="customRadio3">Nintendo</label>
                    </div>
                    <div class="custom-control custom-radio custom-control">
                        <input type="radio" class="custom-control-input" id="customRadio4" name="categoria2" value="Computador">
                        <label class="custom-control-label" for="customRadio4">Computador</label>
                    </div>

                    <br><button class="btn btn-dark " type="submit" values="ENVIAR">Buscar</button>

                </form>


            <!--Categoria 01--> <br>
                <form method="POST" action="../produto/categoria_01.php" >
                <div class="input-group mb-3">
                <select name="categoria1" class="custom-select">
                    <option selected>Classificação</option>
                    <option value="Acessorios e Consoles">Acessorios e Consoles</option>
                    <option value="Jogos">Jogos</option>
                </select>
                 <div class="input-group-append">
                <button class="btn btn-dark btn-sm-2" type="submit" values="ENVIAR">Buscar</button>
                 </div>
                </div>
                </form> 
        </div> 
    </div>


    <!--PRODUTOS-->
     <div class="col-sm-9 col-md-9">
        <ul class="row portfolio lightbox list-unstyled mb-0 shuffle boxed-portfolio" id="grid" >
            <!-- project -->
            <?php while($rows_produto = mysqli_fetch_assoc($resultado_produto)){ ?>

            <li class="col-md-5 col-lg-4 project shuffle-item filtered" >
                <div class="card mb-0">
                    <div class="project m-0">
                        <figure class="portfolio-item">
                            <div class="hovereffect">
                            <?php echo '<img class="img-responsive mx-auto d-block" src="../edição_dados_admin/upload/'.$rows_produto['cImagem'].'" style="width: 210px; height: 210px;" alt="Imagem">';?>

                                <div class="overlay">
                                    <div class="hovereffect-title project-icons">
                                        <a href="../produto/vitrine.php?nCdProduto=<?php echo $rows_produto['nCdProduto'];?>" data-toggle="modal" data-target=".project-modal2"><i class="fa fa-eye"></i></a>
                                    </div>
                                    <!-- / project-icons -->
                                </div>
                                <!-- / overlay -->
                            </div>
                            <!-- / hovereffect -->
                        </figure>
                        <!-- / portfolio-item -->
                    </div>
                    <!-- / project -->
                    <div class="card-body" style="height: 180px;" >
                        <a style="text-decoration: none;" class="card-title title-link fs-20 fw-bold text-uppercase"  href="../produto/vitrine.php?nCdProduto=<?php echo $rows_produto['nCdProduto'];?>"><?php echo $rows_produto['cNmProduto']; ?></a>
                        <p class="card-text text-dark mt-3 mb-0 fs-20" ><?php echo'R$' .number_format($rows_produto['nPreco'],2,',','.').  '<br/>';?></p>
                         
                         <!--coloca as categorias no card-->
                    </div>

                    <div class="card-footer text-center">
                        <p class="card-text mt-2 mb-0 "><a href="../produto/vitrine.php?nCdProduto=<?php echo $rows_produto['nCdProduto']; ?>" class="btn btn-outline-dark ">Acessar</a></p> 
                    </div>
                    <!-- / card-body -->
                </div>
                <!-- / card -->
            </li>
            <!-- / project -->
            <?php } ?>
        </ul>
    <!-- / portfolio -->
    </div> <br><br><br>
</div>
</div><br><br><br>
  
  <!--IMPORTAR através do php o footer = rodapé pronto-->
    <?php include_once "../geral/footer.php";?>
    <? } ?>

</body>
</html>
<?}else {
        header("Location: index.php");

}?> 