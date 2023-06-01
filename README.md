## Proceso de instalación

A continuación se presenta el proceso de instalación paso a paso para el proyecto:

* Abrir la terminal y asegurarse de estar ubicado dentro de la carpeta htdocs.
* Ejecutar el siguiente comando para clonar el repositorio:

```
git clone https://github.com/alexisml-12/crud-trade-solutions.git
```

* Una vez clonado el repositorio, ingresar al directorio del proyecto mediante el siguiente comando:

```
cd crud-trade-solutions
```
* Instalar las dependencias de Composer utilizando el comando:

```
composer install
```

* Abrir el proyecto en el editor de código preferido y renombrar el archivo ```env.example``` a ```env```. Luego, configurar los detalles de conexión a la base de datos MySQL, como el nombre de la base de datos y las credenciales de acceso.

* Después de crear la base de datos, generar la clave ```APP_KEY``` del proyecto ejecutando el siguiente comando en la terminal:

```
php artisan key:generate
```

* Antes de finalizar se debe generar las migraciones correspondientes para crear las tablas necesarias en la base de datos. Ejecutar el siguiente comando:

```
php artisan migrate
```
* Por último, para habilitar la visualización de las imágenes almacenadas en el proyecto, debemos ejecutar el siguiente comando:
```
php artisan key:generate
```

Una vez completados estos pasos, el proyecto estará instalado y listo para su uso.
