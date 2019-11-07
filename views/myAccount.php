<div>
    <div class="block">
        <p class="txtPurple">MI CUENTA</p>
        <?php
        if(isset($_SESSION['user'])){
            echo '
              <img src="../images/user.png" alt="John" style="width:45%">
              <h1>'.$_SESSION['user'].'</h1>
              <p class="title">Usuario Logueado</p>
              <p><button type="submit">Cerrar Sesión</button></p>
            ';
        }
        else{
            echo'
        <form action="index.php">
            Nombre de usuario: <input type="text" name="user">
            Contraseña:<br> <input type="password" name="password">
            <button type="submit" class="btnBuy">Acceder</button><br>
        </form>
        <a href="index.php?registration=registration">Registrarse</a><br>
        <a href="index.php?registro=3">¿Olvidaste la contraseña?</a><br>
';
        }
        ?>

  </div>

  <!-- Subir producto -->
  <div class="block">
    <input type="submit" value="Subir juegos" onclick = "location='index.php?upGame=upGame'" class="btnBuy"/>
  </div>
</div>
