<?php 
   //session_start();
  
  //Importanto a coneção do banco
   include_once 'conexao_dbvendas.php';
   
   // Permite que os dados no input fiquem null, vazio, antes e apos o uso
   $id=0;
   $update = false;
   $cNmProduto  = '';
   $nPreco = '';
   $nEstoque = '';
   $cImagem = '';

   //Se for solocitado a opção  'save', (visto no botão para criar novos dados),
   if(isset($_POST['save'])) {
      
      $cNmProduto = $_POST['cNmProduto'];
      $nPreco = $_POST['nPreco'];
      $nEstoque = $_POST['nEstoque'];
      $cImagem = $_FILES['cImagem']['name'];
      //$Classificacao_01 = $_POST['Classificacao_01'];
      //$Classificacao_02 = $_POST['Classificacao_02'];

      $validate_img_extensao = $_FILES['cImagem']['type'] == "image/jpg" || $_FILES['cImagem']['type'] == "image/png" || 
      $_FILES['cImagem']['type'] == "image/jpeg";
      
      if($validate_img_extensao)
      {
         if(file_exists("upload/" . $_FILES['cImagem']['name']))
         {
            $store = $_FILES['cImagem']['name'];
            $_SESSION['status']= "Image já existe. '.$store.'";
            header("Location: produto_admin.php");
   
         }else{
            if(!$result-> num_rows > 0) {
            // Colocara, atraves do Mysql, os valores solicitados no input, na tabela "users"
            //$sql = "INSERT INTO  vw_produto (nome_produto, preco_produto, estoque_produto, imagem_produto, Classificacao_01, Classificacao_02) VALUES ('$nome_produto','$preco_produto','$estoque_produto','$imagem_produto','$Classificacao_01', '$Classificacao_02')";
           $sql = "INSERT INTO tbprod001 (cNmProduto, nPreco, nEstoque, cImagem) VALUES ('$cNmProduto','$nPreco','$nEstoque','$cImagem')";
           $query = mysqli_query($conn, $sql);
   
               if($query){
               move_uploaded_file($_FILES['cImagem']['tmp_name'], "upload/".$_FILES["cImagem"]["name"]);
               //mensagens de alerta quando a função for concluida
               $_SESSION['success'] ="Adicionado com sucesso";
               header("Location: produto_admin.php");
   
                  if(!$result){
                     //tirar o registro quando o formulario é enviado
                        $cNmProduto  = '';
                        $nPreco = '';
                        $nEstoque = '';
                        $cImagem = '';
                  }
               }else{
                  $_SESSION['success'] = "Não foi possível adicionar";
                  header("Location: produto_admin.php");
               }
            }
         }
      }else{
         header("Location: produto_admin.php?error=Formato do arquivo incorreto!");
      }
   }

   //Se for solicitado a opção delete (nos botões do index, que tem em cada dado da tabela) 
   if(isset($_GET['delete'])){
      $id = $_GET['delete'];

      //Deleterá os arquivos da tabela users através do id
      $sql = "DELETE FROM tbprod001 WHERE nCdProduto=$id";
      mysqli_query($conn, $sql);


      //mensagens de alerta quando a função for concluida
      $_SESSION['message'] = "Produto deletado com sucesso!";
      $_SESSION['msg_type'] = "danger";
      header("Location: produto_admin.php");

   }

   //Se for solicitado a opção update, os dados que ficaram nos input e puxado por aqui
   if(isset($_GET['edit'])){
      function validate($data){
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
      }

      $id = validate($_GET['edit']);
      $id = $_GET['edit'];
      $update = true;
      
      //Seleciona todos os dados da tabela users através do id
      $sql = "SELECT * FROM tbprod001 WHERE nCdProduto=$id";
      $result = mysqli_query($conn, $sql);

      //Quando o resultado for 1, o row permite colocar os dados nos inputs 
      if (mysqli_num_rows($result) == 1) {
         $row = mysqli_fetch_assoc($result);
         $cNmProduto = $row['cNmProduto'];
         $nPreco = $row['nPreco'];
         $nEstoque = $row['nEstoque'];
         $cImagem = $row['cImagem'];
      //   $Classificacao_01 = $row['Classificacao_01'];
       //  $Classificacao_02 = $row['Classificacao_02'];

      }
   }

   //Se for solicitado a opção update (nos botões do index, que tem em cada dado da tabela) 
   if(isset($_POST['update'])){
      $id = $_POST['nCdProduto'];
      $cNmProduto = $_POST['cNmProduto'];
      $nPreco = $_POST['nPreco'];
      $nEstoque = $_POST['nEstoque'];
      $cImagem = $_FILES['cImagem']['name'];
    //  $Classificacao_01 = $_POST['Classificacao_01'];
      //$Classificacao_02 = $_POST['Classificacao_02'];



      $sql_query= "SELECT * FROM tbprod001 WHERE nCdProduto=$id";
      $query_image= mysqli_query($conn, $sql_query);
      foreach($query_image as $fa_row)
      {
         if($cImagem == NULL){
            //Atualizar imagem se já existir 
            $imagem_data = $fa_row['cImagem'];
         }else{
            //Atualizar com a nova imagem e deletar a imagem antiga que esta no diretório
            if($img_path = "upload/".$fa_row['cImagem'])
            {
               unlink($img_path);
               $imagem_data = $cImagem;

            }
         }
      }


   //Seleciona todos os dados da tabela users para a edição (update) através do id
      $sql = "UPDATE tbprod001 SET cNmProduto='$cNmProduto', nPreco='$nPreco', nEstoque='$nEstoque', cImagem='$imagem_data' WHERE nCdProduto=$id";
      $query= mysqli_query($conn, $sql);
      
      if($query)
      {
         if($cImagem == NULL)
         {
            //Atualizar imagem se já existir 
            $_SESSION['success'] = "Imagem já existe";
            header("Location: produto_admin.php");

         }else{
            //Atualizar com a nova imagem e deletar a imagem antiga que esta no diretório
            move_uploaded_file($_FILES['cImagem']['tmp_name'], "upload/".$_FILES['cImagem']['name']);
            $_SESSION['success'] = "Adicionado!!";
            header("Location: produto_admin.php");
         }
      
      }else{
         $_SESSION['success'] = "Erro ao adicionar";
         header("Location: produto_admin.php");
      }

      //mensagens de alerta quando a função for concluida
      $_SESSION['message'] = "Produto alterado com sucesso!";
      $_SESSION['msg_type'] = "warning";
   }
   
?>