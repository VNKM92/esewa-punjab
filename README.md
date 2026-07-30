# EsewaPunjab - Migration Visa & Document Verification Portal

[![Laravel Version](https://img.shields.io/badge/Laravel-13.x-red.svg)](https://laravel.com)
[![PHP Version](https://img.shields.io/badge/PHP-%5E8.3-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
[![Tests Status](https://img.shields.io/badge/Tests-18%20Passed-emerald.svg)]()

**EsewaPunjab (MigraVerify)** is an enterprise-grade document verification and portal management web application. Designed for migration agencies, immigration consultants, and document issuers, it enables instant QR-code verification for issued work permits, marriage certificates, residency permits, and identity credentials, while providing an end-to-end admin management studio.

---

## 🌟 Key Features

### 🔍 Document & QR Code Verification
- **Automated QR Verification**: Generates unique secure verification links for every issued document.
- **Bot-Resistant Captcha & Security Lookup**: Interactive verification workflow before displaying sensitive document details.
- **Visibility Control**: Turn verification access ON or OFF at any time from the backend console.

### 🛡️ Admin Security & Account Management
- **Forgot Password & Reset Flow**: Full self-service account recovery via secure email reset tokens (`/forgot-password` & `/reset-password/{token}`).
- **Change Password**: Secure password update tool for logged-in administrators with current password validation (`/admin/change-password`).
- **Profile Edit & Backend Selfie**: Update admin profile info and upload a personal selfie avatar (`/admin/profile`).
  > **Note on Selfie Photo**: The uploaded selfie avatar is stored privately and rendered **strictly inside the backend admin interface** (dashboard, backend header, profile card) and never on public-facing pages.

### 🎨 Dynamic Logo, Brand Content & Slogan Engine
- **Custom Logo Upload**: Upload custom SVG, PNG, JPG, or WEBP logo images directly from the backend settings (`/admin/settings`).
- **Dynamic Brand Text & Highlight**: Change primary logo text (e.g. *Esewa*) and colored highlight text (e.g. *Punjab*) on the fly.
- **Dynamic Slogan / Tagline**: Update the portal tagline (e.g. *Document assurance*) dynamically in the site header and footer without touching code.
- **Global Title & Footer Content**: Customize global HTML title and footer metadata in real time.

### 📝 Content Management Studio
- **Public Page Editor**: Dynamically edit hero section titles, descriptions, CTA buttons, and body content for homepage, About Us, Contact Us, and Terms pages.
- **Navigation Menu Manager**: Reorder, add, hide, or delete top menu navigation links.
- **Migration Insights (Blog/Posts)**: Publish and manage migration guidance articles and updates.
- **Enquiry Inbox**: Receive, view, and clear public contact messages.
- **Traffic & Visitor Analytics**: Live graph and stats tracking page visits, unique IPs, and document scan metrics over time.

---

## 📁 Detailed Project Directory Structure

```
migration-visa-portal/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AdminAuthController.php      # Admin login and session termination
│   │   │   ├── AdminContentController.php   # Page content & navigation menu editor
│   │   │   ├── AdminController.php          # Dashboard analytics & QR document management
│   │   │   ├── AdminPostController.php       # Migration insight articles management
│   │   │   ├── AdminProfileController.php    # Profile edit & backend selfie avatar upload
│   │   │   ├── AdminSettingsController.php   # Dynamic logo, brand text & slogan management
│   │   │   ├── ChangePasswordController.php  # Authenticated password updating
│   │   │   ├── ContactController.php         # Public contact form submission
│   │   │   ├── HomeController.php            # Main landing page controller
│   │   │   ├── PageController.php            # Dynamic public pages (About, Terms, etc.)
│   │   │   ├── PasswordResetController.php  # Forgot password link & token reset handler
│   │   │   ├── PostController.php            # Public blog/insight article reader
│   │   │   └── VerificationController.php    # Public QR code lookup & captcha verification
│   │   └── Middleware/
│   │       └── TrackPageVisit.php           # Middleware tracking unique visitor page views
│   ├── Models/
│   │   ├── ContactMessage.php               # Public enquiry submissions
│   │   ├── HeroSection.php                  # Landing page hero configuration
│   │   ├── NavigationItem.php               # Dynamic header navigation menu items
│   │   ├── PageContent.php                  # Editable public web pages
│   │   ├── PageView.php                     # Traffic analytics records
│   │   ├── Post.php                         # Migration insight posts
│   │   ├── SiteSetting.php                  # Dynamic logo, brand text, slogan & site settings
│   │   ├── Slider.php                       # Hero banner sliders
│   │   ├── User.php                         # Admin users with selfie avatar support
│   │   └── VerificationDocument.php         # Issued verification documents & QR links
│   └── Providers/
│       └── AppServiceProvider.php           # Global view composer sharing siteSettings & navigation
├── bootstrap/
│   └── app.php                              # Application middleware & routing bootstrap
├── config/
│   ├── auth.php                             # Authentication guards & password reset brokers
│   ├── database.php                         # Database connection configurations
│   ├── filesystems.php                      # Storage disks (public, local, s3)
│   └── mail.php                             # Mailer configurations
├── database/
│   ├── factories/                           # Model factories for testing and seeding
│   ├── migrations/                          # Database schema migrations
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 2026_07_29_140707_create_verification_documents_table.php
│   │   ├── 2026_07_29_140713_create_page_views_table.php
│   │   ├── 2026_07_30_000000_create_posts_table.php
│   │   ├── 2026_07_30_000001_create_contact_messages_table.php
│   │   ├── 2026_07_30_000002_create_page_contents_and_navigation_items_tables.php
│   │   ├── 2026_07_30_000003_add_selfie_path_to_users_table.php
│   │   └── 2026_07_30_000004_create_site_settings_table.php
│   └── seeders/                             # Database seeders (DatabaseSeeder.php)
├── public/
│   ├── index.php                            # HTTP entry point
│   └── storage/                             # Symlink pointing to storage/app/public
├── resources/
│   ├── css/
│   │   └── app.css                          # Tailwind CSS styles
│   ├── js/
│   │   └── app.js                           # Vite entry script & Alpine.js initialization
│   └── views/
│       ├── admin/
│       │   ├── auth/
│       │   │   ├── change-password.blade.php # Admin change password form
│       │   │   ├── forgot-password.blade.php # Account recovery link request view
│       │   │   └── reset-password.blade.php  # New password entry view
│       │   ├── content/
│       │   │   ├── index.blade.php           # Public pages & navigation manager
│       │   │   └── page-editor.blade.php     # Visual page editor
│       │   ├── posts/                        # Insights CRUD views
│       │   ├── profile/
│       │   │   └── edit.blade.php            # Profile edit & backend selfie upload view
│       │   ├── settings/
│       │   │   └── edit.blade.php            # Dynamic logo & slogan settings view
│       │   ├── dashboard.blade.php           # Main admin management console
│       │   └── login.blade.php               # Protected admin sign in
│       ├── layouts/
│       │   └── app.blade.php                 # Master application layout
│       ├── partials/
│       │   ├── footer.blade.php              # Dynamic website footer
│       │   └── navbar.blade.php              # Dynamic website navigation bar
│       ├── home.blade.php                    # Landing page
│       └── welcome.blade.php
├── routes/
│   ├── console.php                          # Artisan CLI commands
│   └── web.php                              # Web HTTP application routes
├── storage/
│   └── app/
│       └── public/
│           ├── logos/                       # Uploaded dynamic brand logo images
│           ├── selfies/                     # Uploaded private backend admin selfies
│           └── verified_docs/               # Issued verification document files
├── tests/
│   ├── Feature/
│   │   ├── AdminManagementTest.php          # Profile, selfie & logo settings feature tests
│   │   ├── PasswordManagementTest.php       # Forgot, reset & change password feature tests
│   │   └── PortalTest.php                   # Public portal & QR verification feature tests
│   └── TestCase.php
├── .env.example                             # Environment configuration blueprint
├── composer.json                            # PHP dependencies
├── package.json                             # Frontend Node.js dependencies
├── phpunit.xml                              # PHPUnit test runner configuration
├── tailwind.config.js                       # Tailwind CSS configuration
└── vite.config.js                           # Vite asset bundler configuration
```

---

## 🗄️ Database Schema & Entities

### 1. `users` Table
Stores portal administrator accounts and backend profile data.
- `id`: Primary key
- `name`: Admin full name
- `email`: Unique email address
- `password`: Hashed password string
- `selfie_path`: Uploaded backend selfie avatar file path (*backend view only*)
- `remember_token`, `timestamps`

### 2. `site_settings` Table
Singleton configuration table for dynamic site identity.
- `logo_image_path`: Uploaded logo image path (reverts to SVG icon if null)
- `logo_text`: Primary brand title (e.g., *Esewa*)
- `logo_text_highlight`: Highlighted colored title (e.g., *Punjab*)
- `slogan`: Dynamic tagline shown in header and footer
- `site_title`: Default page `<title>` attribute
- `footer_description`: Footer brand overview paragraph

### 3. `verification_documents` Table
Stores issued documents and QR access controls.
- `uuid`: Public unique identifier used in QR links
- `title`: Document description
- `applicant_name`: Issued recipient name
- `document_type`: Type category (Work permit, Marriage certificate, etc.)
- `file_path`: Stored document file
- `is_active`: Boolean toggle allowing/denying public access
- `scans_count`: Scan counter

---

## 🛠️ Installation & Setup Guide

### 1. Requirements
- **PHP**: `^8.3` (with `pdo`, `mbstring`, `openssl`, `gd`, `fileinfo` extensions)
- **Composer**: `^2.x`
- **Node.js**: `^18.x` or `^20.x` & `npm`
- **Web Server**: Apache / Nginx / PHP CLI server (XAMPP / Laravel Herd)

### 2. Setup Steps

```bash
# 1. Clone or navigate into project directory
cd c:/xampp/htdocs/vk/migration-visa-portal

# 2. Install PHP dependencies
composer install

# 3. Environment configuration
cp .env.example .env
php artisan key:generate

# 4. Configure Database (.env)
# Set your SQLite or MySQL connection. For default SQLite:
# DB_CONNECTION=sqlite

# 5. Run Database Migrations & Seeders
php artisan migrate --seed

# 6. Create Storage Symlink
php artisan storage:link

# 7. Install & Build Frontend Assets
npm install
npm run build

# 8. Start Local Development Server
php artisan serve
```

---

## 🗺️ Sitemap & Route Overview

| Method | Endpoint | Route Name | Access Level | Description |
| :--- | :--- | :--- | :--- | :--- |
| `GET` | `/` | `home` | Public | Public landing page |
| `GET` | `/about-us` | `about` | Public | Dynamic About Us page |
| `GET` | `/contact-us` | `contact` | Public | Public contact enquiry page |
| `POST` | `/contact-us` | `contact.store` | Public | Submit contact message |
| `GET` | `/verify/{uuid}` | `verify.captcha` | Public | QR code security captcha |
| `POST` | `/verify/{uuid}` | `verify.submit` | Public | Access verified document |
| `GET` | `/login` | `admin.login` | Guest | Admin sign in screen |
| `POST` | `/login` | `admin.login.store` | Guest | Authenticate admin user |
| `GET` | `/forgot-password` | `password.request` | Guest | Request password reset link |
| `POST` | `/forgot-password` | `password.email` | Guest | Email reset link token |
| `GET` | `/reset-password/{token}` | `password.reset` | Guest | Reset password view |
| `POST` | `/reset-password` | `password.update` | Guest | Execute password update |
| `GET` | `/admin/dashboard` | `admin.dashboard` | Auth (Admin) | Main admin console |
| `GET` | `/admin/profile` | `admin.profile.edit` | Auth (Admin) | Profile & Backend Selfie edit |
| `PUT` | `/admin/profile` | `admin.profile.update` | Auth (Admin) | Save profile & selfie avatar |
| `GET` | `/admin/settings` | `admin.settings.edit` | Auth (Admin) | Dynamic logo & slogan settings |
| `PUT` | `/admin/settings` | `admin.settings.update` | Auth (Admin) | Update logo, text & slogan |
| `GET` | `/admin/change-password` | `admin.password.change` | Auth (Admin) | Admin change password form |
| `PUT` | `/admin/change-password` | `admin.password.update` | Auth (Admin) | Execute admin password update |
| `GET` | `/admin/content` | `admin.content.index` | Auth (Admin) | Public content & menu manager |

---

## 🧪 Running Automated Tests

Run the complete test suite using PHPUnit / Artisan test runner:

```bash
php artisan test
```

### Test Coverage Highlights
- **`PortalTest`**: Verifies dynamic landing pages, traffic tracking, and QR document access controls.
- **`PasswordManagementTest`**: Tests forgot password links, password reset tokens, and authenticated password changes.
- **`AdminManagementTest`**: Validates profile updates, backend selfie uploads, dynamic logo changes, and slogan updates.

---

## 📄 License
This project is open-source software licensed under the [MIT License](LICENSE).
