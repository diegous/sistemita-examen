<script>
  $().ready(function()
  {
    $("#dataForm").validate(
    {
      rules:
      {
        nombre: "required",
        observaciones: "required",
        dni:
        {
          required: true,
          minlength: 8,
          number: true
        },
        email:
        {
          required: true,
          email: true
        }
      },
      messages:
      {
        nombre: "Por favor ingrese su nombre",
        observaciones: "Ingrese sus observaciones",
        dni: 
        {
          required: "Por favor, ingrese su DNI",
          minlength: "Un mínimo de 8 dígitos",
          number: "Ingrese solo números",
        },
        email:
        {
          required: "Por favor, ingrese su email",
          email: "Ingrese un email válido"
        }
      }
    });
  });
</script>
<h3>Llenar formulario:</h3>
<form id="dataForm" action="save_form.php" method="post">
  <table>
    <tr>
      <td>Nombre</td>
      <td><input type="text" id="nombre" name="nombre" required=""></td>
    </tr>
    <tr>
      <td>DNI</td>
      <td><input type="number" id="dni" name="dni" required=""></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="email" id="email" name="email" required=""></td>
    </tr>
    <tr>
      <td>
        <input type="radio" name="genero" value="Hombre" checked="">Hombre<br>
        <input type="radio" name="genero" value="Mujer">Mujer
      </td>
    </tr>
    <tr>
      <td>VIP</td>
      <td><input type="checkbox" name="vip" value="1"></td>
    </tr>
    <tr>
      <td>Ciudad</td>
      <td>
        <select name="city_id" required="">
        <?php if($city_list): foreach($city_list as $city): ?>
          <option value="<?= $city->getId();?>"><?= $city->getName();?></option>
        <?php endforeach; endif;?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Observaciones</td>
      <td><textarea name="observaciones" id="observaciones" required="" rows="3" cols="25"></textarea></td>
    </tr>
  </table>
  <input type="submit" value="Enviar">
</form>

