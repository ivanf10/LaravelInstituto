# ============================================================
# 🏫 INSTITUTO – PROYECTO DE LARAVEL
# ============================================================

# ------------------------------------------------------------
# 📘 DESCRIPCIÓN
# ------------------------------------------------------------
 Instituto es una aplicación web desarrollada con Laravel
 que simula un sistema básico de gestión de alumnos para un entorno
 educativo.

 El proyecto incluye una Landing Page pública, sistema de
 autenticación, gestión de roles, multiidioma y un CRUD completo
 de alumnos siguiendo el patrón MVC de Laravel.

# ------------------------------------------------------------
# 📌 FUNCIONALIDADES PRINCIPALES
# ------------------------------------------------------------
 - Landing Page pública con Blade
 - Sistema de autenticación (login / register / logout)
 - Gestión de roles:
   - Admin: acceso completo
   - Teacher: editar y eliminar alumnos
   - Student: solo visualizar alumnos
 - CRUD de alumnos
 - Sistema multiidioma (ES / EN / FR)
 - Componentes Blade reutilizables
 - Confirmaciones con SweetAlert2
 - Diseño con TailwindCSS y DaisyUI

# ------------------------------------------------------------
# ⚙️ REQUISITOS PREVIOS
# ------------------------------------------------------------
 - PHP >= 8.1
 - Composer
 - Node.js y NPM
 - MySQL
 - Docker

# ------------------------------------------------------------
# 🚀 INSTALACIÓN DEL PROYECTO
# ------------------------------------------------------------

## Clonar el repositorio
git clone https://github.com/ivanf10/LaravelInstituto.git
cd instituto

## Instalar dependencias de PHP
composer install

## Instalar dependencias frontend
npm install
npm run build

# ------------------------------------------------------------
# 🗄️ MIGRACIONES Y SEEDERS
# ------------------------------------------------------------

## Ejecutar migraciones
php artisan migrate

## Ejecutar seeders
php artisan db:seed

# ------------------------------------------------------------
# 👤 USUARIOS DE PRUEBA
# ------------------------------------------------------------
## Contraseña para todos los usuarios:
 12345678

## Admin:
   Email: admin@admin.com

## Teacher:
   Email: teacher1@instituto.com

## Student:
   Email: student1@instituto.com

# ------------------------------------------------------------
# 🌍 IDIOMAS DISPONIBLES
# ------------------------------------------------------------
 - Español (es)
 - Inglés (en)
 - Francés (fr)

 El idioma se puede cambiar desde el selector del header.

# ------------------------------------------------------------
# 🧱 ESTRUCTURA DEL PROYECTO
# ------------------------------------------------------------
### app/
### ├── Http/
### │   ├── Controllers/
### │   └── Middleware/
### resources/
### ├── views/
### │   ├── layouts/
### │   ├── components/
### │   └── students/
### lang/
### routes/
### └── web.php

# ------------------------------------------------------------
# 🛠️ COMANDOS PHP ARTISAN UTILIZADOS
# ------------------------------------------------------------

## 1. Crear el proyecto Laravel
laravel new instituto

## 2. Iniciar el servidor de desarrollo y docker
docker compose up -d
npm run dev
php artisan serve

## 3. Crear un controlador
php artisan make:controller StudentController

## 4. Crear un modelo con migración
php artisan make:model Student -m

## 5. Ejecutar migraciones
php artisan migrate

## 6. Crear un seeder
php artisan make:seeder UserSeeder

## 7. Ejecutar seeders
php artisan db:seed

## 8. Crear middleware
php artisan make:middleware SetLanguageMiddleware

## 9. Limpiar caché de la aplicación
php artisan optimize:clear

## 10. Listar todas las rutas
php artisan route:list

## 11. Publicar archivos de configuración
php artisan vendor:publish

# ------------------------------------------------------------
# 🖼️ DISEÑO Y MOCKUPS
# ------------------------------------------------------------
 El proyecto sigue los mockups proporcionados en la práctica:
 - Landing Page
 - Login y Register
 - Dashboard privado
 - Listado de alumnos con acciones según rol

# ------------------------------------------------------------
# 📅 ENTREGA
# ------------------------------------------------------------
 Este proyecto cumple con los requisitos de la práctica:
 - Uso del patrón MVC
 - CRUD completo
 - Autenticación
 - Roles y permisos
 - Multiidioma
 - Uso de Blade y componentes
 - README documentado

# ------------------------------------------------------------
# 📜 LICENCIA
# ------------------------------------------------------------
 Proyecto desarrollado con fines educativos.
