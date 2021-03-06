<?php
session_start();
// Para verificar se a session admin foi setada ou foi retornada como TRUE caso contrario a pessoa nao podera ter acesso a essa pagina (Segurança)
if (!isset($_SESSION['ADMIN']) || $_SESSION['ADMIN'] == false) {
    echo 'voce nao pode acessar essa pagina';
    die();
}
// se o botao com o NAME : enviar for setado entao executa
if (isset($_POST['enviar'])) {
    $statusMsg = "";
    //verifica se a imagem foi inserida
    if (!empty($_FILES["imagem"]["name"])) {
        // caso tenha sido inserida pega a imagem e o formato dela
        $fileName = basename($_FILES["imagem"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // testa o formato que a imagem veio e ve se é compativel
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            // se a imagem for compativel cria uma variavel para a imagem
            $imagem = $_FILES['imagem']['tmp_name'];
            $imgContent = addslashes(file_get_contents($imagem));
            include_once('../inc/banco.php');
            // pega todas as informações inserida no formulario
            $numb_comb = $_POST['numb_comb'];
            $nome1 = $_POST['nome1'];
            $nome2 = $_POST['nome2'];
            $nome3 = $_POST['nome3'];
            $nome4 = $_POST['nome4'];
            $nome5 = $_POST['nome5'];
            $nome6 = $_POST['nome6'];
            $quantidade1 = $_POST['quantidade1'];
            $quantidade2 = $_POST['quantidade2'];
            $quantidade3 = $_POST['quantidade3'];
            $quantidade4 = $_POST['quantidade4'];
            $quantidade5 = $_POST['quantidade5'];
            $quantidade6 = $_POST['quantidade6'];
            $preco = $_POST['preco'];
            $acumulos = $_POST['acumulo'];
            $gastarP = $_POST['gastarP'];
            //prepara o banco para inseri os valores que veio do formulario

            $sql = "INSERT INTO cupons (codigo,numero_comb,preco,acumulo,nome1,nome2,nome3,nome4,nome5,nome6,quantidade1,quantidade2,quantidade3,quantidade4,quantidade5,quantidade6,imagem,gastarP) VALUES (NULL ,'$numb_comb' ,'$preco' ,'$acumulos' ,'$nome1' ,'$nome2' ,'$nome3','$nome4','$nome5','$nome6' ,'$quantidade1','$quantidade2','$quantidade3','$quantidade4','$quantidade5','$quantidade6', '$imgContent', '$gastarP')";
            $exe = $pdo->prepare($sql);
            //envia as informaões para o banco
            $exe->execute();
            if ($exe) {
                // caso tenha sido executado com sucesso exibi a mensagem:
                echo "Dados inseridos com sucesso";
            }
        } else {
            // caso a imagem nao seja dos formatos que foram exigidos essa mensagem sera exibida
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        }
    } else {
        //se a imagem nao for inserida no formulario
        $statusMsg = 'Please select an image file to upload.';
    }
    echo $statusMsg;
}
include_once('../inc/menuBoot.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

</head>

<style>
    body {
        background-color: #fb5607;
    }

    div.login-1Cadastro {
        margin-left: auto;
        margin-right: auto;
        width: 550px;
        height: auto;
    }
</style>

<body>
    <div class="centerADM">
        <form class="formADM" action="" method="POST" enctype="multipart/form-data">
            <div class="">
                <input type="text" name="numb_comb" placeholder="Numero Do Combo">
                <div style="padding-left: 120px;">
                    <div class="d-flex">
                        <label for="nome" class="">comida1</label>
                        <input type="text" name="nome1" />
                        <input type="text" name="quantidade1" placeholder="quantidade1" />
                    </div>
                    <div class="d-flex">
                        <label for="nome" class="">comida2</label>
                        <input type="text" name="nome2" />
                        <input type="text" name="quantidade2" placeholder="quantidade2" />
                    </div>
                    <div class="d-flex">
                        <label for="nome" class="">comida3</label>
                        <input type="text" name="nome3" />
                        <input type="text" name="quantidade3" placeholder="quantidade3" />
                    </div>
                    <div class="d-flex">
                        <label for="nome" class="">comida4</label>
                        <input type="text" name="nome4" />
                        <input type="text" name="quantidade4" placeholder="quantidade4" />
                    </div>
                    <div class="d-flex">
                        <label for="nome" class="">comida5</label>
                        <input type="text" name="nome5" />
                        <input type="text" name="quantidade5" placeholder="quantidade5" />
                    </div>
                    <div class="d-flex">
                        <label for="nome" class="">comida6</label>
                        <input type="text" name="nome6" />
                        <input type="text" name="quantidade6" placeholder="quantidade6" />
                    </div>
                </div>
                <br>
                <div>
                    <label for="nome" class="">Preço</label>
                    <br>
                    <input type="text" name="preco" />
                </div>
                <div>
                    <label for="nome" class="">quantos ponto client ganha</label>
                    <br>
                    <input type="text" name="acumulo" />
                </div>
                <!-- O P C I O N A L -->
                <div>
                    <label for="telefone" class="">quantos pontos gasta:</label>
                    <br>
                    <input type="text" name="gastarP" />
                </div>
                <!-- O P C I O N A L -->
                <div>
                    <label for="imagem" class="">imagem</label>
                    <br>
                    <input type="file" name="imagem" />
                </div>
            </div>
            <div class="button">
                <br>
                <button type="submit" class="email buttonCadastro" name="enviar">cadastrar</button>
            </div>
        </form>
        <br>
    </div>