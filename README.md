# Sistema de Gestión de Tareas 

Aplicación  desarrollada para la gestión reactiva de tareas con reglas de negocio automáticas en backend y frontend.

## Tecnologías Utilizadas
- **Backend:** Laravel 13 (API RESTful, CORS).
- **Frontend:** Vue.js 3 (Composition API, `<script setup>`, Vite, Axios, TransitionGroup).
- **Base de Datos:** MySQL con soporte para Soft Deletes.

## Instrucciones de Instalación y Ejecución

### Backend (Laravel)
```bash
cd minsal-backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve