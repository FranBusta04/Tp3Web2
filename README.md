Integrantes : Franco Bustamante, Bernardo Pears

La temática del tpe es una Pagina de Celulares

Listar todos los Productos = GET productos

Listar todos los viajes ordenados segun el campo seleccionado de manera ascendente o descendente: GET productos?sort={CampoSeleccionado}&order=asc | GET productos?sort={CampoSeleccionado}&order=desc

{CampoSeleccionado} = id_productos | Categoria | Productos | Precio

Listar un Producto por su id : GET productos/:id

Agregar un Producto = POST productos Necesarios: {"categoria": varchar, "producto": int, "precio": varchar,}

Editar un Producto = PUT productos/:id Necesarios: {"categoria": varchar, "producto": int, "precio": varchar,}

Eliminar un Producto = DELETE productos/:id