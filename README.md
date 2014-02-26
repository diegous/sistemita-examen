sistemita-examen
================

Sistemita para entrevista

Configuración
=============
- **DocumentRoot** debe apuntar a **controller/**
- El servidor debe tener instalado **MDB2** del repositorio _**Pear**_
- La base de datos es MySQL la conexión se hace con usuario _root_ y contraseña _root_. Esto se puede modificar en **conf/ConnectionManager.php**


Explicación
===========
Los controladores de cada página están en **controller/**. Todos cargan el archivo **conf/load.php** que lo que hace es cargar todos los modelos, iniciar la sesión php, cargar _ConnectionManager_ que es el manejador de la conecxión a la DB e incluye _**MDB2**_.

Luego verifican que esté iniciada la sesión php y en ese caso muestran el contenido (mediante la variable **$contenido**) dependiendo si es un visitante o si está logueado. El html básico se llama **view/base.php** y se carga al final en cada uno de los controladores.

Para iniciar sesión en el **controller/index.php** se muestra un formulario que manda una petición ajax a **controller/ajax\_login.php**. Una vez iniciada la sesión se muestra un menú con 2 opciones: formulario y listado. A estas páginas solo se puede entrar si está iniciada la sesión.
