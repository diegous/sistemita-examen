<!DOCTYPE html>

<html>
  <head>
    <title><?php echo $page_title?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="/javascript/jquery.js"></script>
    <script type="text/javascript" src="/javascript/jquery.validate.js"></script>
  </head>

  <body>
    <div id="header">
      <h1>Mini Test</h1>
      <div id="sessionContainer">
        <?php if(isset($logout_content)):include $logout_content;endif;?>
      </div>
    </div>

    <div id="content">
      <?php include $contenido?>
    </div>
  </body>
</html>

