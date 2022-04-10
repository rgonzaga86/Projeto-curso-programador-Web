<?php 

$idproduto = isset($_GET["idproduto"]) ? $_GET["idproduto"]: null;
$op = isset($_GET["op"]) ? $_GET["op"]: null;
 

    try {
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $bd = "bdprojeto";
        $con = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$senha); 

        if($op=="del"){
            $sql = "delete  FROM  produto where idproduto= :idproduto";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":idproduto",$idproduto);
            $stmt->execute();
            header("Location:listarprodutos.php");
        }


        if($idproduto){
            //estou buscando os dados do produto no BD
            $sql = "SELECT * FROM  produto where idproduto= :idproduto";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":idproduto",$idproduto);
            $stmt->execute();
            $idproduto = $stmt->fetch(PDO::FETCH_OBJ);
            //var_dump($produtos);
        }
        
            if($_POST["idproduto"]){
                $sql = "UPDATE produto SET produto=:produto, preco=:preco, estoqueatual=:estoqueatual, estoquemax=:estoquemax, estoquemin=:estoquemin, foto=:foto WHERE idproduto=:idproduto";
                $stmt = $con->prepare($sql);
                $stmt->bindValue(":produto",$_POST["produto"]);
                $stmt->bindValue(":preco",$_POST["preco"]);
                $stmt->bindValue(":estoqueatual",$_POST["estoqueatual"]);
                $stmt->bindValue(":estoquemax",$_POST["estoquemax"]);
                $stmt->bindValue(":estoquemin",$_POST["estoquemin"]);
                $stmt->bindValue(":foto",$_POST["foto"]);
                $stmt->bindValue(":idproduto", $_POST["idproduto"]);
                $stmt->execute(); 
            } else {
                $sql = "INSERT INTO produto(produto,preco,estoqueatual,estoquemax,estoquemin,foto) VALUES (:produto, :preco, :estoqueatual, :estoquemax, :estoquemin,:foto)";
                $stmt = $con->prepare($sql);
               
                $stmt->bindValue(":produto",$_POST["produto"]);
                $stmt->bindValue(":preco",$_POST["preco"]);
                $stmt->bindValue(":estoqueatual",$_POST["estoqueatual"]);
                $stmt->bindValue(":estoquemax",$_POST["estoquemax"]);
                $stmt->bindValue(":estoquemin",$_POST["estoquemin"]);
                $stmt->bindValue(":foto",$_POST["foto"]);

                $stmt->execute(); 
            }
            header("Location:listarprodutos.php");
        } 
     catch(PDOException $e){
         echo "erro".$e->getMessage;
        }
// Incluindo arquivo de conexão


// Selecionando fotos
$stmt = $con->prepare('SELECT foto FROM produto WHERE idproduto = :idproduto');
$stmt->bindParam(':idproduto', $idproduto, PDO::PARAM_INT);
// Se executado
if ($stmt->execute())
{
    // Alocando foto
    $foto = $stmt->fetchObject();
    
    // Se existir
    if ($foto != null)
    {
        // Definindo tipo do retorno
        header('Content-Type: png ');
        
        // Retornando conteudo
        echo $foto->foto;
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bo"></script>
</head>
<body>
<section class="vh-100" style="background-color: #9A616D;">
<h1>Cadastro de Produtos</h1>
    <div class="container">
        <form method="POST">

            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <p class="form-label">PRODUTO </p>  
                        <input type="text" class="form-control" name="produto" required value="<?php echo isset($idproduto) ? $idproduto->produto: null  ?>"><br>
                        <p class="form-label">PREÇO </p>    
                        <input type="text" class="form-control" name="preco" required value="<?php echo isset($idproduto) ? $idproduto->preco: null ?>"><br>
                        <p class="form-label">ESTOQUE ATUAL </p>      
                        <input type="text" class="form-control" name="estoqueatual" required value="<?php echo isset($idproduto) ? $idproduto->estoqueatual: null ?>"><br>
                        <p class="form-label">ESTOQUE MAX  </p>    
                        <input type="text" class="form-control" name="estoquemax" required value="<?php echo isset($idproduto) ? $idproduto->estoquemax:  null ?>"><br>
                        <p class="form-label">ESTOQUE MIN  </p>    
                        <input type="text" class="form-control" name="estoquemin" required value="<?php echo isset($idproduto) ? $idproduto->estoquemin:  null ?>"><br>
                       ADICIONAR FOTO <input type="file" name="foto" value="<?php echo isset($produto) ? $produto->foto : null ?>"><br>
                    </div>
                </div>
            </div>
            <input type="hidden"     name="idproduto"   value="<?php echo isset($idproduto) ? $idproduto->idproduto : null ?>">
            <div class="row">
                <div class="col">
                    <a href="listarprodutos.php" class="btn btn-primary">Volta</a>
                </div>
                <div class="col">
                    <input type="submit" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</body>
</html>
