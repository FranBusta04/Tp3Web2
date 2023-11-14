<?php
    require_once 'app/models/model.php';
    class ProductoModel extends Model{
    function db(){
        parent::__construct();  
    }
        function getProductos($orderQuery = '') {
            $query = $this->db->prepare('SELECT * FROM `productos` '. $orderQuery);
            $query->execute();
            $productos = $query->fetchAll(PDO::FETCH_OBJ);
            return $productos;
        }

        function getProducto($id) {
            $query = $this->db->prepare('SELECT * FROM productos WHERE id_productos = ?');
            $query->execute([$id]);

            $producto = $query->fetch(PDO::FETCH_OBJ);

            return $producto;
        }

        function deleteProducto($id) {
            $query = $this->db->prepare('DELETE FROM productos WHERE id_productos = ?');
            $query->execute([$id]);
        }
        function insertProducto($categoria,$producto,$precio){    
                $query = $this->db->prepare('INSERT INTO productos (Categoria, Producto, Precio) VALUES (?,?,?)');
                $query->execute([$categoria,$producto,$precio]);
        
                return $this->db->lastInsertId(); 
        }

        function updateProducto($id, $categoria, $nombre, $precio){
            $query = $this->db->prepare('UPDATE productos SET Categoria = ?, Producto = ?, Precio = ? WHERE id_productos = ?');
            $query->execute([$categoria,$nombre,$precio,$id]);
        }
        
        function productosColumn($column){
            $query = $this->db->prepare("DESCRIBE productos");
            $query->execute();
            $columnas = $query->fetchAll(PDO::FETCH_COLUMN);
    
            return in_array($column,$columnas);
        }
    }


