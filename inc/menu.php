<script>
    var mostrarSub = function() {
        subMenu = document.querySelector('#subMenu');
        subMenu.style.left = "0.px";
    }
</script>




<nav>

    <div class="submenu" id="subMenu">


        <div class="direita">
            <div class="padding">
                <a href="cupons.php" class="letraMenu"> cupons</a>
            </div>
            <div class="padding">
                <a href="#contato" class="letraMenu">contato </a>
            </div>

        </div>


        <div>
            <div> <img src="assets/images/Desenho-Coxinha-PNG.png" alt="" class="png"> </div>
            <div> <a href="index.php"> <img src="assets/images/marca-x.png" alt="" class="marca"> </a> </div>
     
            <a href="login.php" class="signin">sign in</a> 
          <a href="" class="signin">sign out</a>
          <a href="cadastro.php" class="signin">cadastrar</a>
        
        </div>



        <div class="esquerda">
            <div class="padding">
                <a href="pontos.php" class="letraMenu"> pontos</a>
            </div>
            <div class="padding">
                <a href="cardapio.php" class="letraMenu"> cardápio</a>
            </div>
        </div>

    </div>


</nav>

<div class="lala">
    <div class="menu" id="menu" onclick="mostrarSub()">

        <img src="assets/images/botao-de-menu-de-tres-linhas-horizontais.png" alt="" class="icon">
        <div class="Ola">

            <?php if (@$_SESSION['logado']) : ?>

                <h4> Ola <?php echo $nom ?>

                <?php else : $_SESSION['logado'] = "";
            endif

                ?>
                </h4>
        </div>
    </div>
</div>