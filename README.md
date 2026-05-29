# 🎻 Vinski - Keep Every Orchestra Project in Harmony
A Laravel-based platform for organizing orchestral projects, rehearsals, concerts, and musician coordination. Built to simplify scheduling, communication, and project management for orchestras and ensembles.

<img width="1244" height="311" alt="Captura de pantalla 2026-05-29 a les 10 54 57" src="https://github.com/user-attachments/assets/f51e5a88-e639-458e-a9d1-66d79110c6db" />

## ✨ Features
* 🎼 Create and manage multiple orchestras
* 📚 Organize orchestral projects
* 📅 Schedule rehearsals, concerts, and events
* 👥 User roles with admin and member permissions
* 🧭 View upcoming events sorted chronologically
* 🔗 Support for users participating in multiple orchestras
* 🔐 Authentication system powered by Laravel Breeze

## 🛠️  Tech Stack
**Back-end** 🧠
* PHP 8
* Laravel 13
* MySQL

**Front-end** 🎨
* HTML 5
* Blade
* Alpine.js
* Tailwind CSS

**Authentication** 🔐
* Laravel Breeze

## Preview

<img width="1470" height="324" alt="image" src="https://github.com/user-attachments/assets/b18c1146-50d6-4341-9b4c-2d73cc1a7053" />

## 🚧  Setup


### 📋 Prerequisites
Before installing the project, make sure you have:
- Git
- PHP 8.3+
- Composer
- Node.js (LTS)
- MySQL

### 🚀 Installation Steps

1. Clone the repository
```bash
git clone https://github.com/lbadiaestopa/tasca-s4-01
```
```bash
cd tasca-s4-01
```
2. Install dependencies
```bash
composer install
```
```bash
npm install
```
3. Configure environment
```bash
cp .env.example .env
```
```bash
php artisan key:generate
```
4. Configure database

Edit .env file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tasca_s4_01
DB_USERNAME=root
DB_PASSWORD=
```
5. Run migrations
```bash
php artisan migrate
```
6. Start development servers

On the first terminal:
```bash
npm run dev
```
On the second terminal:
```bash
php artisan serve
```
7. Access the app
http://localhost:8000

## 📌 Future Improvements
* Sheet music management
* Attendance tracking
* Notifications and reminders
* Join orchestras via unique invitation codes

##

Project developed by **Lluc Badia Estopà** - [LinkedIn](https://www.linkedin.com/in/lbadiaestopa) · [Github](https://github.com/lbadiaestopa)
