<div align="center">

  <img src="https://raw.githubusercontent.com/basittt2/sitecraft-laravel/main/public/logo.png" alt="SiteCraft Logo" width="120" height="120">

  # 🛠️ SiteCraft
  **The Premier E-Commerce Hub for Computer Science Professionals**

  [![Laravel Version](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
  [![PHP Version](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
  [![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg?style=for-the-badge)](https://opensource.org/licenses/MIT)
  [![Status](https://img.shields.io/badge/Status-In--Development-green?style=for-the-badge)](https://github.com/basittt2/sitecraft-laravel)

  ---

  **SiteCraft** bridges the gap between hardware needs and professional digital services. 
  From high-performance PC components to specialized CV building for developers—we build for those who build the future.

  [Explore Features](#-key-features) • [Installation](#%EF%B8%8F-installation--setup) • [Request a Service](#-professional-services)

</div>

# SiteCraft 🚀

**SiteCraft** is a specialized e-commerce platform built with Laravel, designed specifically for the Computer Science community. Whether you are a student, developer, or tech enthusiast, SiteCraft provides a curated marketplace for high-performance computer hardware and essential professional services like Game Development and CV Building.

## 🌟 Key Features

### 💻 Product Marketplace

* **Hardware for Devs:** Curated listings of components optimized for coding, compiling, and rendering.
* **CS Essentials:** Peripherals and systems tailored for software engineering workflows.

### 🛠️ Professional Services

* **Game Development:** Hire experts to bring your game concepts to life.
* **CV Building:** Professional resume optimization specifically for the tech industry and ATS (Applicant Tracking Systems).
* **Custom Tech Solutions:** Specialized services to support academic and professional CS projects.

### ⚙️ Technical Features

* **User Authentication:** Secure login and registration for customers and service providers.
* **Product Management:** Full CRUD functionality for managing inventory and service listings.
* **Order Tracking:** Real-time updates on hardware shipping and service milestones.
* **Responsive Design:** A modern, clean UI optimized for developers on any device.

---

## 🚀 Tech Stack

* **Framework:** [Laravel 10+](https://laravel.com)
* **Database:** MySQL / PostgreSQL
* **Frontend:** Blade Templating, Tailwind CSS / Bootstrap
* **Tools:** Composer, NPM

---

## 🛠️ Installation & Setup

Follow these steps to get the project running locally:

1. **Clone the repository**
```bash
git clone https://github.com/basittt2/sitecraft-laravel.git
cd sitecraft-laravel

```


2. **Install dependencies**
```bash
composer install
npm install && npm run dev

```


3. **Environment Configuration**
```bash
cp .env.example .env
php artisan key:generate

```


4. **Database Setup**
*Create a database and update your `.env` credentials.*
```bash
php artisan migrate --seed

```


5. **Run the application**
```bash
php artisan serve

```


Visit `http://localhost:8000` to view the store.

---

## 📂 Project Structure

* `app/Http/Controllers`: Handles logic for product browsing and service booking.
* `app/Models`: Database schemas for Products, Services, and Orders.
* `resources/views`: Blade templates for the storefront and user dashboard.
* `routes/web.php`: Defines the navigation flow for the e-commerce experience.

---

## 🤝 Contributing

Contributions are what make the open-source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

---

## 📄 License

Distributed under the MIT License. See `LICENSE` for more information.

---

[Laravel Repository Pattern Tips](https://www.youtube.com/watch?v=kc584MVcvmI)

This video provides insights into structuring Laravel projects like SiteCraft using the Repository pattern for better code maintainability.