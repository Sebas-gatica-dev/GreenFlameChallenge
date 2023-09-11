
# GreenFlameChallenge


Al escribir este README, es mi intención dejar en evidencia mi profunda comprensión del curso <a target="_BLANK" href="https://www.udemy.com/course/crea-tu-portafolio-dinamico-con-laravel-livewire-y-tdd/">crea tu portafolio dinamico con laravel livewire y tdd<a/>, en verdad, fue muy positivo para mí..

>Este maravilloso portafolio, desarrollado en el paquete de Laravel Breeze, está construido utilizando la metodología de trabajo TDD o Test Driven Development (desarrollo dirigido por pruebas). Es una práctica de programación en la que se comienzan escribiendo las pruebas en primer lugar, luego se escribe el código fuente, pasando correctamente la prueba y finalizando con la refactorización del código escrito. Este proyecto fue desarrollado en Laravel 10, aplicando tecnologías como Livewire, Alpine.js y Tailwind CSS.
 



<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Primeros Pasos

 Lo primero que hice fue aplicar ingenieria inversa con MysqlWorkbench, para generar un diagrama y entender visualmente las relaciones entre los datos.


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://drive.google.com/file/d/1f_GNrxpiONZMWcjDKzkzQ_H97G7HBpOx/view?usp=drive_link" width="400" alt="Laravel Logo"></a></p>


- Inicie un poyecto en laravel 10, version que utiliza PHP 8.
- Me dispuse a no utilizar ningun paquete como JetStream o Laravel Breeze, por eso genere un sistema de login y autenticacion custom, completamente desde cero.
- Tome una plantilla HTML muy popular llamada SB admin2, y apartir de ella gnre layoouts y componentes de blade.
- Desarrolle las migracione adecuadas para generar las tablas, junto conlos seeders necesarios para tenes algunos datos inciales.
- Cuando conclui la interfaz  logre que el formulario de creacion me responda como queria procedi al desarrollo dmas profundo de los controladores.


## Comenzar

Para comenzar, luego de clonar el repositorio, dbera ejecutar los siguientes comandos
  ```shell
   cd GreenFlameChallenge
  ```
  >Para pararse en la carpeta raiz del proyecto.
  

  ```shell
      composer install
  ```
  >Este comando descargara las dependencias necesarias para levantar el servidor de laravel.
  
```shell
     npm install
  ```
  >Este comando instalara las depedencias de vite, para que la aplicacion cargue automaticamente los cambios.
  
  Luego, si deseacorer elproyecto de manera local, puede tomar el archivo ".env.example" y cambiar su nombre a  ".env", abrir el archivo y dirigirse a la propiedad DB_DATABASE= y setearla con el nombre d ela bas de datos que desea usar, e mi casosuelo usar Xampp, por eso, al entrar  en phpmyadmin, podra crear la base de datos que desee, o se creara automaticamente conrriendo elsiguiente comando 

  ```shell
     php artisan migrate
  ```
  >Este comando creara las tablas necesarias para la aplicacion. 
  
Una vez hecho esto es conveniente ejecutar  los seeders
```shell
     php artisan db:seed
  ```
  >De esta forma ya tendra un usuario, y la tablas mas basicas pobladas.
  

Tan solo bastaria con abrir otra terminal para ejecutar un coando en cada una de ellas

```shell
     php artisan serve
  ```
  >De esta forma habra levantado el servidor de laravel.
  ```shell
    npm run dev
  ```
  >Y con esta comando habra levantado el servdor de vite.

  ### Devolucion Personal: 

  Desarrolle un sistema de autenticacion de usuario custom, desde cero. 
  Genere controladores, seeders, migraciones, y factories.
  La interfaz de usuario, diseño de la tabla y el mecanismo de muestra de la infromacion esta a medio camino, asi como los controladores, y el testing para cada uno de sus metodos.
   Sin embargo fue un gran esfuerzo para mi intenar realizar este challenge, me quede toda la noche, pensando en como solucionar los problemas que presento el challenge, y aprendi mucho en el proceso, me ubiera gustado haber estado mas preparado para poder aprovechar esta hermosa oportunidad.
     Ojala me tengan en cuenta para futuras busquedas, ya que, aunque  no posea el nivel para realizar este proyecto en 48 horas, se que soy capaz de hacerlo muy bien.
       Hago un esfuerzo consante por trabajar para subsistir y a la vez seguir aprendiendo y formandome, persiguiendo mi sueño.
     Espero algun dia tener la chance de dedicarme enteramente al desarrollo, para sacar a luz todo mi potencial... por eso aunque me decilucione no haber terminado el challenge a tiempo, lo voy a terminar de todas maneras para mi, esta fue una hermosa oportunidad de aprender e intentar superarme. Por eso muchas gracias.
     
     Sebastian Gatica
     
     
  
  

 

 
.




 
  
 


