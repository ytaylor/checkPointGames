
<h2> RELLENA EL REGISTRO</h2>
<form>
    <label for="dp" class="encabezado">Datos personales: </label></br>

    <div class="row">
        <div class="col">
            <label for="exampleFormControlInput1">Nombres</label>
            <input type="text" class="form-control" placeholder="Maria">
        </div>
        <div class="col">
            <label for="exampleFormControlInput1">NIF</label>
            <input type="number" id="nifNum" name="nifNum" maxlength="8" class="form-control" placeholder="12345678" onkeyup="letraDNI()">
        </div>

        <div class="col">
            <label for="exampleFormControlInput1">Letra NIF</label>
            <input type="text" id="nifLet" name="nifLet" maxlength="1" class="form-control" placeholder="Letra del DNI" readonly>
        </div>
      </div>

    <div class="row">
        <div class="col">
            <label for="exampleFormControlInput1">Apellidos</label>
            <input type="text" class="form-control" placeholder="Apellidos">
        </div>

    </div>

    <div class="row">
        <div class="col">
            <label for="exampleFormControlInput1">Teléfono</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="+34 ....">
        </div>

    </div>

    <div class="form-group">
        <label for="inputAddress">Dirección Linea 1</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Dirección Linea 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCity">Provincia</label>
            <select id= "idProvi" name="idProvi" class="form-control">
                <?php
                $provinces = new Provinces();
                $array = $provinces->getData();
                if(isset($_SESSION["provincia"]))
                echo ' <option>'.$_SESSION["provincia"].'</option>';

                foreach ($array as $item=>$value){
                    echo ' <option>'.$value["provincia"].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">Municipio</label>
            <select  id="municipio" class="form-control">
                 <?php
                $municipios = new Municipio();
                $array = $municipios->getData($_SESSION['provincia']);
                foreach ($array as $item=>$value){
                    echo ' <option>'.$value["municipio"].'</option>';
                }
                unset($_SESSION["provincia"]);

                 ?>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputZip">Código Postal</label>
            <input type="text" class="form-control" id="inputZip">
        </div>
    </div>

    <label for="dp" class="encabezado">Datos del Usuario: </label></br>
    <div class="form-row">
        <div class="col">
            <label for="exampleInputEmail1">Correo Electronico</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="col">
            <label for="inputNick">Nick</label>
            <input type="text" class="form-control" placeholder="Nick">
        </div>
    </div>

    <div class="form-row">
        <div class="col">
            <label for="exampleInputEmail1">Contraseña</label>
            <input type="password" class="form-control" >
        </div>
        <div class="col">
            <label for="inputNick">Repite Contraseña</label>
            <input type="password" class="form-control" >
        </div>
    </div>
    <button style="padding: 10px" type="submit" class="btn btn-warning"> Registrarse</button>
</form>




