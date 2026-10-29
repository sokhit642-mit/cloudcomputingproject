# HOMESPORT — E-Commerce & Store Management Platform

<p align="center">
  <img src="public/front-assets/homesport-logo.png" alt="HOMESPORT Logo" width="220">
</p>

<p align="center">
  <strong>A full-featured sports apparel & fitness e-commerce platform built with Laravel 9, Livewire, and modern Bootstrap 5 administrative tooling.</strong>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-9.52-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/Livewire-2.12-FB70A9?style=for-the-badge&logo=livewire&logoColor=white" alt="Livewire">
  <img src="https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap">
  <img src="https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
</p>

---

## 📖 Overview

**HOMESPORT** is a comprehensive multi-channel e-commerce platform designed for sports apparel, athletic footwear, and fitness equipment. The project features a dynamic customer shopping experience powered by **Laravel Livewire** and a powerful administrative portal based on the **Sneat** dashboard framework.

It includes payment processing via **Bakong KHQR**, real-time **Telegram bot alerts**, multi-language localization, customer wishlist & cart management, and automated PDF invoice generation.

---

## ✨ Key Features

### 🛒 Customer Storefront
* **Product Catalog**: Multi-level categorization (Categories & Sub-categories), brand filters, search, and sort.
* **Variant System**: Interactive color and size variant selection with live inventory checking.
* **Real-time Cart & Wishlist**: Livewire-powered instant cart updates, item counters, and slide-in trays without page refreshes.
* **Discounts & Coupons**: Promotional percentage/fixed coupon validation applied directly at checkout.
* **Payment Gateways**:
  * **Bakong KHQR** dynamic QR scanning integration.
  * Cash on Delivery (COD).
* **Customer Account**: Profile management, order history, downloadable PDF invoices, and delivery tracking.
* **Social Authentication**: Google & Facebook OAuth login via Laravel Socialite.
* **Telegram Notifications**: Real-time order confirmation alerts sent directly to Telegram channels/users.
* **Multi-Language Support**: Seamless language switching (English & Khmer).

### 🛡️ Administrative Portal
* **Dashboard Overview**: Key sales metrics, revenue analytics, new orders, and inventory status.
* **Admin Authentication**:
  * Modern split-screen **Admin Registration** (`/admin/register`) with live avatar preview, dynamic password strength meters, and confirmation checks.
  * Dedicated **Admin Login** (`/admin/login`).
  * Role-based access control (`Super Admin`, `Admin`).
* **Catalog Management**:
  * Products (CRUD, multi-image gallery upload, specifications, stock).
  * Brands, Categories & Sub-Categories.
  * Colors and Sizes taxonomy.
* **Order Processing**:
  * Live status changes (Pending, Processing, Completed, Cancelled).
  * PDF invoice generation and thermal receipt printing.
* **Marketing Tools**:
  * Banner & homepage slider management.
  * Coupon creation (expiry dates, minimum cart value, usage limits).
* **Reporting & Export**:
  * Export sales reports to PDF and Excel (`maatwebsite/excel` & `barryvdh/laravel-dompdf`).

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| **Backend Framework** | Laravel 9.x (PHP 8.2+) |
| **Interactive Components** | Laravel Livewire 2.12 |
| **Database** | MySQL / MariaDB (UTF8mb4) |
| **Frontend UI** | Bootstrap 5.3, Phoenix Theme, Sneat Admin Dashboard |
| **Icons & Typography** | Boxicons, FontAwesome 6, Bootstrap Icons, Public Sans |
| **Real-time & Broadcast** | Pusher / Laravel Echo |
| **Notifications & Alerts** | SweetAlert2, Toastr.js, Telegram Bot API |
| **PDF Generation** | DomPDF & Snappy (wkhtmltopdf) |

---

## 🚀 Getting Started

Follow these steps to set up the project locally:

### 1. Prerequisites
Ensure you have the following installed on your machine:
* **PHP** $\ge$ 8.2 (with `pdo_mysql`, `mbstring`, `openssl`, `curl`, `gd`, `fileinfo` extensions enabled)
* **Composer** $\ge$ 2.x
* **MySQL** $\ge$ 8.0 or MariaDB
* **Node.js** $\ge$ 18.x & **NPM**

### 2. Clone the Repository
```bash
git clone https://github.com/Sievphor/ecomm.git
cd ecomm
```

### 3. Install PHP Dependencies
```bash
composer install
```

### 4. Configure Environment
Copy the example environment file:
```bash
cp .env.example .env
```

Open `.env` and configure your database and application settings:
```env
APP_NAME=HOMESPORT
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=thesis
DB_USERNAME=root
DB_PASSWORD=
```

Generate the unique application key:
```bash
php artisan key:generate
```

### 5. Setup Database
You can either run standard Laravel migrations:
```bash
php artisan migrate
```
Or import the complete pre-populated database dump provided in the project root:
```bash
mysql -u root -p thesis < thesis-4.sql
```

### 6. Create Storage Symlink
Link the public storage directory for user uploads:
```bash
php artisan storage:link
```

### 7. Run the Application
Start the Laravel local development server:
```bash
php artisan serve
```

The application is now accessible at **[http://localhost:8000](http://localhost:8000)**!

> **Tip:** If port 8000 is occupied by another application, specify an alternate port:
> ```bash
> php artisan serve --port=8080
> ```

---

## 🧭 Key Routes

| Route | Method | Description | Access |
|---|---|---|---|
| `/` | `GET` | Store Homepage | Public |
| `/login` | `GET`, `POST` | Customer Login | Public / Guest |
| `/register` | `GET`, `POST` | Customer Registration | Public / Guest |
| `/wishlist` | `GET` | User Wishlist | Authenticated User |
| `/admin/login` | `GET`, `POST` | Administrator Login | Admin Guest |
| `/admin/register` | `GET`, `POST` | Administrator Registration | Admin Guest |
| `/admin/dashboard` | `GET` | Main Administrative Dashboard | Admin Only |
| `/admin/products` | `GET`, `POST` | Manage Products & Stock | Admin Only |
| `/admin/orders` | `GET` | Order Processing & Invoicing | Admin Only |
| `/admin/admins` | `GET` | Admin User Management | Super Admin Only |

---

## 📂 Project Structure

```plaintext
thesis-4/
├── app/
│   ├── Http/
│   │   ├── Controllers/       # Frontend & Admin Controllers
│   │   └── Middleware/        # Authentication & Role Gate Guards
│   ├── Models/                # Eloquent Models (Product, Order, Admin, etc.)
│   └── View/                  # Blade Components
├── config/                    # Application configuration
├── database/
│   ├── migrations/            # 47 Database schema migrations
│   └── seeders/               # Initial seeders
├── public/
│   ├── admin-das/             # Sneat Admin template assets (CSS, JS, Avatars)
│   ├── front-assets/          # Storefront branding & media
│   └── uploads/               # Product, Category & Profile uploads
├── resources/
│   ├── views/
│   │   ├── admin/             # Admin portal views & modals
│   │   ├── frontend/          # Customer-facing shopping views
│   │   ├── layouts/           # Admin & App master layouts
│   │   └── livewire/          # Real-time Livewire Blade components
├── routes/
│   ├── web.php                # Web routes & admin middleware groups
│   └── api.php                # API endpoints
├── thesis-4.sql               # Full database export
└── composer.json              # PHP dependencies
```

---

## 🔒 Security Best Practices
* Sensitive credentials in `.env` (Telegram bot tokens, mailer secrets, OAuth IDs) are excluded from version control.
* Passwords are protected using secure `Bcrypt` / `Argon2id` hashing.
* Multi-guard authentication separates customer sessions (`web`) from staff sessions (`admin`).

---

## 👤 Author

Developed by **Sievphor** ([@Sievphor](https://github.com/Sievphor))  
*Email:* [tonnsievphor@gmail.com](mailto:tonnsievphor@gmail.com)

---

## 📄 License

This project is open-sourced under the [MIT License](LICENSE).
