# Andromeda Joyas — Sistema de Inventario

Sistema web de inventario desarrollado para la gestión de productos, ventas y movimientos de una tienda de joyería.



## Descripción del proyecto

Este es un sistema de inventario web que permite administrar el catálogo de productos, registrar ventas, llevar el historial de movimientos de stock y recibir alertas automáticas cuando los productos tienen poco o ningún stock.

El sistema cuenta con autenticación de usuarios, asi se garantiza que solo las personas con autorización puedan acceder y gestionar la información de la empresa.



## Tecnologías utilizadas

|Tecnología|Uso|
|-|-|
|HTML5|Estructura de las páginas|
|CSS3|Estilos y diseño visual|
|JavaScript|Interactividad del frontend|
|PHP|Backend y lógica del servidor|
|MySQL|Base de datos|
|XAMPP|Servidor local (Apache + MySQL)|



## Instalación

### Requisitos

* XAMPP instalado (Apache + MySQL)
* Navegador web

### Pasos

**1. Clonar o descargar el proyecto**

```bash
git clone https://github.com/Danielacorredor/andromeda-joyas.git
```

**2. Mover a la carpeta de XAMPP**

Copia la carpeta `andromeda\\\\\\\\\\\\\\\_joyas` dentro de:

```
C:\\\\\\\\\\\\\\\\xampp\\\\\\\\\\\\\\\\htdocs\\\\\\\\\\\\\\\\
```

**3. Iniciar XAMPP**

Abre XAMPP Control Panel y enciende Apache y MySQL.

**4. Crear la base de datos**

Abre `http://localhost/phpmyadmin` e importa el archivo `andromeda\\\\\\\\\\\\\\\_joyas.sql`.

**5. Abrir el sistema**

```
http://localhost/andromeda\\\\\\\\\\\\\\\_joyas/login.php
```



## Cómo usarlo

**Inicio de sesión**

Ingresa con las credenciales de administrador. Se recomienda cambiar la contraseña después del primer acceso.

|Campo|Valor por defecto|
|-|-|
|Email|admin@andromedarjoyas.com|
|Contraseña|andromeda|

**Productos**

Desde la sección Productos puedes ver el catálogo completo, agregar nuevos productos con imagen, editar la información existente y eliminar productos. El buscador y los filtros permiten encontrar productos por nombre, categoría o nivel de stock.

**Ventas**

Registra cada venta indicando el producto, cliente, cantidad y estado. Al guardar una venta el stock del producto se actualiza automáticamente.

**Movimientos**

Lleva el historial completo de entradas, salidas, correcciones y devoluciones de inventario. Cada movimiento actualiza el stock del producto indicado.

**Alertas**

El sistema genera alertas automáticas para los productos sin stock, con stock bajo, sin movimiento reciente y con ventas inusuales.

**Gestión de usuarios**

Desde el menú de opciones puedes cambiar la contraseña y agregar nuevos usuarios al sistema.



## Desarrollado por

Daniela Corredor — Tecnóloga en Desarrollo de Software  
Proyecto de prácticas empresariales

