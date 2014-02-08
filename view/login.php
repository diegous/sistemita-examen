<script>
  function send()
  {             
    $.ajax(
    {
      type: 'POST',
      url: 'ajax_login.php',
      data:
        {
          username: $('#username').val(), 
          password: $('#password').val()
        },
      success: function(data)
        {
          if(data == 'true')
          {
            location.href = "index.php";
          }
          else
          {
            alert("Datos Incorrectos");
          }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
          console.log("Error status:", jqXHR.status);
        }
    });
  };
</script>
<form id="login_form" method="post" name="login_form">
  Nombre de usuario<input type="text" id="username" placeholder="Nombre de usuario"/><br>
  Contrase&ntilde;a<input type="password" id="password" placeholder="Contrase&ntilde;a"/>
  <button id="sendButon" type="button" onclick="send()">Login</button>
</form>
