Integrantes : Franco Bustamante, Bernardo Pears

La temática del tpe es una Pagina de Celulares

Listar todos los Productos  = GET productos

Listar todos los viajes ordenados segun el campo seleccionado de manera ascendente o descendente:

GET productos?sort={CampoSeleccionado}&order=asc GET productos?sort={CampoSeleccionado}&order=desc

Listar un viaje por su id : GET productos/:id

Agregar un viaje = POST viajes
Necesarios: {"Categoria": varchar, "Producto": int, "Precio": varchar,}

Editar un viaje = PUT productos/:id
Necesarios: {"Categoria": varchar, "Producto": int, "Precio": varchar,}

Eliminar un Producto = DELETE productos/:id

