<?php 
    require_once 'app/models/produc.model.php';
    require_once 'app/view/api.view.php';
    class ProductoController extends ApiController{
       
        private $model;
        public function __construct() {
            parent::__construct();
            $this->model = new ProductoModel();
            
    }
   

   function obtener($params = []){
        if (empty($params)){
            $sort = isset($_GET['sort']) ? $_GET['sort'] : null;
            $order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
      
            $orderQuery = '';
            $acceptedOrders = ['ASC','DESC'];
      
            if (isset($sort)) {
              if ($this->model->productosColumn($sort) && in_array(strtoupper($order),$acceptedOrders)) {
                $orderQuery = 'ORDER BY '.$sort.' '.$order;
              }else{
                $this->view->response(['response' => 'Bad Request'],400);
                return;
              }
            }
            
            $productos = $this->model->getProductos($orderQuery);
            $this->view->response($productos, 200);
        }
    
        else{
            $id = ($params[':ID']);
            $producto = $this->model->getProducto($id);
            if (!empty ($producto)){
                $this->view->response ($producto,200);
            }
            
            else{
                $this->view->response (
                    ['msg'=> 'Producto no encontrado con el id'.$params[":ID"]]
                    ,404);
        
            }    
        }   
    } 

    function eliminar($params =[]){
        $id = $params[':ID'];
        $producto = $this->model->getProducto($id);
 
        if ($producto){
            $this->model->deleteProducto($id);
            $this->view->response ('El producto con id '.$id.' fue borrado exitosamente.' ,200);
        } else {
            $this->view->response ('El producto con id '.$id.' no existe.' ,404);
        }
    }

    function crear($params = []){
        $body = $this->getData();
        
        $categoria = $body->categoria;
        $producto = $body->producto;
        $precio  = $body->precio;

        $id = $this->model->insertProducto($categoria,$producto,$precio);
        $this->view->response('El Producto fue agregado correctamente con el id= '.$id, 201);
    }

    function actualizar($params){
        $id = $params[':ID'];
        $producto = $this->model->getProducto($id);
        
        if ($producto){
            $body = $this->getData();
            $categoria = $body->categoria;
            $nombre = $body->producto;
            $precio  = $body->precio;
            $this->model->updateProducto($id, $categoria, $nombre, $precio);

            $this->view->response ('El producto con id '.$id.' fue modificado exitosamente.' ,200);
        } else {
            $this->view->response ('El producto con id '.$id.' no existe.' ,404);
        }
    }
}
   
