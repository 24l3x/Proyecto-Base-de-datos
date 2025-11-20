# Proyecto-Base-de-datos
Proyecto de implmentacion de las cosas vistas en la materia de base de datos

## Planteación de el problema
El cliente tiene una fabrica de juguetes en la que necesita tener el control de toda la gestión de ella, necesita saber que plantas intervienen en la creación de cada juguete. Cada juguete puede ser creado en 1 sola planta o en muchas plantas dependiendo de el proceso que necesite la creación; cada planta puede crear muchos tipos de juguetes distintos, así mismo en cada planta solo puede hacerse un tipo de proceso, pero cada proceso puede estar en muchas plantas, los procesos solo pueden existir si hay alguna planta donde hacerlo y maquinas que las hagan, así mismo saber que maquina hace que proceso, cada maquina solo puede tener un solo proceso al mismo tiempo pero un mismo proceso puede estar asignado a varias maquinas, como que maquina esta asignada a cada técnico operario en que lapso de tiempo, cada maquina solo puede tener una sola asignación en cada turno y así mismo un técnico solo esta asignado a una sola maquina cada turno, cada técnico puede ser técnico industrial si sus actividades requieren algún tipo de intervención eléctrica, mecánica, etc, o textil si su trabajo tiene algo que ver con tela, un tecnico solo puede ser un tipo de tecnico a la vez. De la misma manera la asignación solo puede existir si hay alguna maquina disponible y un técnico que la opere.

## Entrevista
**-Gestor de la base de datos:** Comencemos con la estructura básica de la fábrica. ¿Cómo la tienen organizada físicamente? ¿Hay diferentes áreas o secciones?

**-Cliente:** Sí. La fábrica se divide en varias plantas. Cada planta está identificada por un nombre, y de cada una nos interesa saber el área en metros cuadrados con la que disponemos para -saber cuantas maquinas cabe en cada planta

-**Gestor de la base de datos:** ¿Y qué actividades se realizan en esas plantas?

**-Cliente:** En cada planta se llevan a cabo un único proceso, como lo son la creación de los moldes para los juguetes, la parte electrónica o en caso de los peluches donde se cosen dichos peluches, etc. Necesitamos registrar el nombre de cada planta y de cada proceso y el grado de complejidad que tiene cada uno de los procesos.

**-Gestor de la base de datos:** Hablemos ahora de la maquinaria. ¿Qué datos necesita guardar sobre las máquinas que usan?

**-Cliente:** De cada máquina, necesitamos saber su marca y modelo. Además, cada máquina tiene un número de identificación único que la distingue de todas las demás, sin importar en qué planta esté.

**-Gestor de la base de datos:** ¿Necesitamos guardar información sobre el personal?

**-Cliente:** Sí. Las máquinas son operadas por técnicos. De cada técnico, necesitamos guardar su numero de trabajador, nombre, apellido, fecha de nacimiento y varios teléfonos de contacto, así mismo, necesitamos saber en qué rango de fechas un técnico estuvo asignado a una máquina específica y en qué turno trabajaba en ella.

**-Gestor de la base de datos: **Perfecto, finalmente, ¿Qué necesitamos saber de cada tipo de juguete?

**-Cliente:** De cada juguete necesitamos que poder saber en que plantas intervinieron en su creación, así mismo, cada juguete tiene un tipo y su propio identificador, por decir algo, un peluche león es de tipo peluche y su identificador podría ser como león o algo por el estilo.

## Modelo Entidad Relacion Extendido
<img width="1403" height="1001" alt="image" src="https://github.com/user-attachments/assets/b49024cb-e012-4204-9b56-57b2e7db9cbd" />


## Modelo relacional
<img width="1742" height="693" alt="image" src="https://github.com/user-attachments/assets/f6edf2ac-7c84-46e0-9a84-78288ffcd633" />

## Como clonar este proyecto:
Lo primero, descarga la version de **1.0** de estre mismo proyecto en la parte de releases.
En el encontraras el docker compose necesario para crear un contenedor parecido con el que se trabajo este proyecto, te recomiendo que modifiques lo siguiente:

     container_name: DBProyecto
        environment:
          MYSQL_ROOT_PASSWORD: host
          MYSQL_DATABASE: Fabrica
          MYSQL_USER: user
          MYSQL_PASSWORD: host
 Aqui puedes modificar el nombre de el contenedor pertenecioente a la base de datos en Mysql, si lo borras, Docker le pondrá un nombre generico.
 
     container_name: SGDB
Tambien lo puedes hacer en el servicio de phpMyAdmin

    container_name: Pagina_Web
Y en el servicio de apache; Todo lo demas te recomiendo que lo dejes tal y como está
 
##  Bibliografía:
- ¿Qué es una pila LAMP? - Explicación de la pila LAMP - AWS. (n.d.). Amazon Web Services, Inc. https://aws.amazon.com/what-is/lamp-stack/

- VanMSFT. (n.d.). Inyección de código SQL - SQL Server. Microsoft Learn. https://learn.microsoft.com/es-es/sql/relational-

- W3Schools.com. (n.d.). https://www.w3schools.com/php/php_mysql_prepared_statements.asp
