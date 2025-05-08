# 📚 Esoteric Library

A digital library platform designed for managing, browsing, and exploring esoteric books and manuscripts. Built with Laravel, styled with custom CSS, and powered by a MySQL backend.

---

## 🚀 Project Overview

**Esoteric Library** is a full-stack web application that allows users to interact with a curated library of rare, mystical, or hard-to-find literature. The platform offers clean UI, efficient backend management, and scalable database integration.

---

## 🛠️ Features

- 🧭 Browse esoteric books
- 🗃️ Admin panel for managing entries
- 🔍 Search and filter functionality
- 🌐 Fully responsive custom UI
- 💾 MySQL-powered database
- 🚀 Deployed and ready for use

---

## 👨‍💻 Built With

- [Laravel 10.x](https://laravel.com/)
- [MySQL](https://www.mysql.com/)
- [Blade Templating](https://laravel.com/docs/blade)
- [Custom CSS](https://developer.mozilla.org/en-US/docs/Web/CSS)
- [XAMPP](https://www.apachefriends.org/index.html) for local development

---

## 🧑‍🤝‍🧑 Team Contributions

| Name       | Contribution                                    |
|------------|-------------------------------------------------|
| **Brandivye** | Project template & website deployment         |
| **Sahil**      | Database setup, repository creation, custom CSS, full Laravel integration |

---

## 📦 Setup Instructions

### 1. Clone the Repository
```bash
git clone https://github.com/yourusername/esoteric-library.git
cd esoteric-library

2. Install Dependencies
bash
Copy
Edit
composer install
npm install && npm run dev
3. Configure Environment
Copy .env.example to .env and update DB credentials:

bash
Copy
Edit
cp .env.example .env
php artisan key:generate
Ensure .env has:

makefile
Copy
Edit
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=esoteric_library
DB_USERNAME=root
DB_PASSWORD=
4. Run Migrations
bash
Copy
Edit
php artisan migrate
5. Start the Server
With Laravel:

bash
Copy
Edit
php artisan serve
Or via XAMPP:

Place the project in htdocs

Visit http://localhost/esoteric-library/public


🌍 Live Demo

https://drive.google.com/file/d/1Aphs3-fvZ0kuwdtIE06f1a-L3--UC5kk/view?usp=sharing
