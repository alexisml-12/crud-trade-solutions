## Proceso de instalación

Para iniciar el proceso de instalacion de este proyecto se debe estar dentro de la carpeta htdocs en la terminal, una vez dentro se debe ejecutar el siguiente comando:

```
git clone https://github.com/alexisml-12/crud-trade-solutions.git
```

Una vez clonado el repositorio, hacemos un cd dentro del nombre del proyecto

```
cd crud-trade-solutions
```
Despues de eso procederemos a instalar las dependencias de composer con el siguiente comando:

```
composer install
```
Luego abriremos el proyecto en nuestro editor de codigo de preferencia y modificamos el nombre del archivo  ```env.example``` a ```env``` y procederemos a crear la base de datos en MySQL con el nombre ```crud``` y de ser necesario modificaremos las credenciales del usuario para ingresar a la base de datos.

Despues de crear la base de datos procederemos a generar la ```APP_KEY``` del proyecto con el siguiente comando en la terminal:

```
php artisan key:generate
```

Por ultimo procederemos a generar las migraciones correspondientes del proyecto para generar las tablas de la base de datos con el siguiente comando:

```
php artisan migrate
```
