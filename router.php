<?php
    require_once 'app/controllers/api.controller.php';
    require_once 'libs/ruta.php';
    require_once 'app/controllers/produc.controller.php';
   
    $router = new Router(); 

                 
             /*                                     clase del
                       endpoint      | verbo |      controlador     |    funcion   */
    $router->addRoute('productos'     ,'GET',   'ProductoController', 'obtener'   );
    $router->addRoute('productos'     ,'POST',  'ProductoController', 'crear'     );
    $router->addRoute('productos/:ID' ,'GET',   'ProductoController', 'obtener'   );
    $router->addRoute('productos/:ID','DELETE', 'ProductoController', 'eliminar'  );
    $router->addRoute('productos/:ID' ,'PUT',   'ProductoController', 'actualizar');
     
    $router->addRoute('user/token' ,'GET', 'UserApiController', 'obtenerToken');
   
    
    
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
