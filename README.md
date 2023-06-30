# Grupo 3

Este es el repositorio del grupo 3, cuyos integrantes son:
|                       |                            |
|-----------------------|---------------------------|
| **Nombre**            | **Correo electrónico**    |
| Daniel Barriga Villanueva | daniel.barriga@usm.cl |
| Benjamín Mena Ardura | benjamin.menaa@usm.cl |
| Celeste Ramirez Cabezas | celeste.ramirez@usm.cl |

* **Tutor**: José Southerland

# Wiki

Puede acceder a la wiki mediante el siguiente [enlace](https://github.com/INGESO-2023-1/grupo_3.wiki.git)

# Configuración de servidor con PHP en XAMPP y configuración de base de datos

Este readme proporciona instrucciones paso a paso para configurar un servidor local utilizando XAMPP, así como la configuración de una base de datos con PHP. Sigue las siguientes instrucciones para levantar el servidor y configurar la base de datos correctamente.

## Requisitos previos
Asegúrate de tener los siguientes requisitos previos instalados en tu sistema:

1. [XAMPP](https://www.apachefriends.org/index.html) - XAMPP es una distribución de Apache fácil de instalar que contiene PHP, MySQL y Apache.
2. Navegador web - Cualquier navegador moderno, como Google Chrome o Mozilla Firefox.

## Pasos de configuración

### 1. Instalación de XAMPP
1. Descarga XAMPP desde el sitio web oficial.
2. Ejecuta el instalador y sigue las instrucciones en pantalla.
3. Elige los componentes que deseas instalar. Asegúrate de seleccionar Apache, MySQL y PHP.
4. Selecciona la ubicación de instalación y completa el proceso de instalación.

### 2. Iniciar los servicios de Apache y MySQL
1. Abre XAMPP desde el menú de inicio o el escritorio.
2. Haz clic en los botones "Start" o "Start" junto a los servicios de Apache y MySQL.
3. Si los servicios se inician correctamente, verás un mensaje de confirmación.

### 3. Configuración de la base de datos
1. Abre tu navegador web e ingresa la siguiente URL: `http://localhost/phpmyadmin/`. Esto abrirá la interfaz de administración de MySQL.
2. Haz clic en "New" o "Crear" en la barra lateral izquierda para crear una nueva base de datos.
3. Asigna un nombre a la base de datos y elige la codificación de caracteres deseada (por ejemplo, utf8_general_ci).
4. Haz clic en el botón "Create" o "Crear" para crear la base de datos.
5. el nombre de la base de datos debe ser "sistemademensajes"
6. en la pestaña SQL se debe pegar el codigo presente en sistemademensajes.sql ya que es

### 4. Configuración de archivos PHP
1. Abre el directorio de instalación de XAMPP. Por lo general, se encuentra en `C:\xampp` en sistemas Windows o `/opt/lampp` en sistemas Linux.
2. Busca el directorio `htdocs` y ábrelo.
3. Clona el repositorio en dicha carpeta

### 5. Ejecución de servidor.
1. se debe escribir en la carpeta del repositorio `grupo_3/` el siguiente comando en terminal:
```
php -S localhost:8000
```

### 6. Pruebas de ejecución

1. Se levanta el servidor de xammp desde nuestro editor de código y se inicia apache junto con MySQL.
 ![image](https://github.com/INGESO-2023-1/grupo_3/assets/102114557/89b26a78-673c-4c26-ad02-4125ad76d6af)
 
2. En la página princial creamos un usuario.
![image](https://github.com/INGESO-2023-1/grupo_3/assets/102114557/5bfe6036-0e39-4d38-a838-ffda9341e039)

3. Luego de la creación del usuario se nos redirige al aparto de inicio de sesión.
![image](https://github.com/INGESO-2023-1/grupo_3/assets/102114557/80eefae5-8363-4dbe-8812-43d7f6f1aacf)

4. Al iniciar sesión se nos redirige a la página principal de mensajería, en la cual están los contactos y el historial de conversaciones.
 ![image](https://github.com/INGESO-2023-1/grupo_3/assets/102114557/e7defc26-6884-492a-ba7c-ac8b111a68bc)

 ![image](https://github.com/INGESO-2023-1/grupo_3/assets/102114557/673a5c1c-6b87-484e-ba2e-d1f40eab5055)


