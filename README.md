Mi idea es desarrollar una página para un concesionario de autos, que venda tantos nuevos como usados, en donde las entidades que figuran serían los propios autos, con su marca. ,modelo, año, km, precio, imagen del mismo, si ya fue vendido o sigue en stock, y una breve descripción. La otra entidad que se me habia ocurrido seria la de venta, que posea un auto, un número, una fecha en la cual se concretó y el empleado que vendió dicho auto.

La idea es que haya dos tipos de usuarios, los empleados y el gerente o dueño, los primeros tendrían únicamente acceso de lectura a los autos que hay disponibles para vender, en cambio el dueño o gerente tendrían acceso de administrador de la BD, podrán tanto leer datos, agregar o eliminar según corresponda. Se encargará de registrar las ventas, los autos nuevos que haya y los que se irán vendiendo.

A su vez, creería conveniente que en los autos se guarde un código o la patente misma, de modo tal que se tenga un clave única de este para poder identificarlo en la propia BD.

Resumiendo, tendríamos dos roles, empleado y gerente, el primero solo podrá ver que autos hay disponibles para la venta, con toda su información correspondiente, y el ultimo será el encargado de modificar cualquier aspecto de la BD, agregar/quitar autos y ventas

## Implementación proyecto.

Finalmente el proyecto contó con dos roles, el de administrador y el de empleado. Dónde el empleado únicamente puede ver el listado de vehículos en Stock, mientras que el administrador puede ver el stock y modificar ciertos aspectos del almacenamiento de datos. Ambos tienen acceso a la API, solo deben de tener el api_token que generado automáticamente al crear el usuario. 
Para probar dicha API, usaremos Postman de la siguiente manera:

El usuario que utilizaremos es el llamado Administrador, con el mail proyectoWeb@laravel.com y password 123456789. Su api_token es 77qULIU7ZrRjDVp46x5WlN3YiEZDKjwg6f6CcgsSuShl6ziG7WEbSza9gNjR.

La url de la api es la siguiente https://proyecto-2-horus.herokuapp.com/api/ApiCar 
, y si se quiere filtrar por marca de auto es https://proyecto-2-horus.herokuapp.com/api/ApiCar/Marca .
Para poder autenticarnos debemos ingresar a la url de la siguiente manera : https://proyecto-2-horus.herokuapp.com/api/ApiCar?api_token=YOUR-TOKEN,
https://proyecto-2-horus.herokuapp.com/api/ApiCar/Marca?api_token=YOUR-TOKEN&Marca=YOUR-BRAND-CAR respectivamente.

Luego desde postman hacemos lo siguiente:
<img src="https://i.imgur.com/99u8jqF.png" alt="Uso-Postman-1" border="0">

Al lado de GET ponemos la url de la api, en key ponemos api_token y en value el valor de nuestro api_token, luego apretamos en send y obtenemos lo siguiente:

<img src="https://i.imgur.com/JByBLjd.png" alt="Uso-Postman-2" border="0">

En body podremos observar en formato JSON lo que la API nos retornó, y en la parte superior derecha podremos observar el status de la llamada, el tiempo y el peso.

Para testear la otra url de la API debemos cambiar la url agregando el /Marca y agregando otro par clave valor siendo key=Marca y el valor el nombre de la marca:

<img src="https://i.imgur.com/XN9ToRL.png" alt="Uso-Postman-3" border="0">

Y así podremos hacerlo con cualquier marca, si no existen autos de dicha marca entonces la respuesta será vacía. En caso de que no nos podemos autenticar, en ambas urls,  tendremos igual una respuesta que es la siguiente: 

<img src="https://i.imgur.com/YDyk8FJ.png" alt="Uso-Postman-4" border="0">

                                                                        


