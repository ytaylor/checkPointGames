<div>
    <div class="block">
        <p class="txtPurple">MI CUENTA</p>
        <?php
        if(isset($_SESSION['user'])){
            echo '
              <!--<img src="../images/user.png" style="width:45%">-->
              <h1>'.$_SESSION['user'].'</h1>
              <p class="txtPurple">BIENVENIDO</p>
              <form action="index.php">
                <p><input name="closeSession" type="submit"class="btnClose" value="Cerrar Sesión"></input></p>
              </form>
            ';
        }
        else{
            echo'
              <div class="col-lg-10">
                <form action="index.php">
                    Nombre de usuario:<br> <input type="text" name="user">
                    Contraseña:<br><input type="password" name="password"><br>
                    <button class="btnBuy" type="submit">Acceder</button><br>
                </form>
                <a href="index.php?registration=registration">Registrarse</a><br>
                <a href="index.php?registro=3">¿Olvidaste la contraseña?</a><br>
              </div>
            ';
        }
        ?>

  </div>

  <!-- Subir producto -->

    <?php

    if(isset($_SESSION['rol'])) {
        if ($_SESSION['rol'] === 'Administrador') {
            echo '
              <div class="block">
                 <input type="submit" value="Subir juegos" onclick = "location=\'index.php?upGame=upGame\'" class="btnBuy"/>
                </div>';

        }
    }

    ?>

</div>
