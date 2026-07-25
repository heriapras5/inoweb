# INOWEB - Master Blueprint
## Pusat Website Profesional

> **Versi** : 1.0.0  
> **Nama Project** : INOWEB (Pusat Website)  
> **Framework** : Laravel 12  
> **Database** : MySQL (`db_inoweb`)  
> **Frontend** : Blade + Tailwind CSS + Alpine.js + Vite  
> **Arsitektur** : MVC + Service Layer + Repository Pattern  
> **Metode Pengembangan** : Chain of Truth (7 Fase)

---

# DAFTAR ISI

1. Fase 1 - Software Requirement Specification (SRS)
2. Fase 2 - Product Structure Development
3. Fase 3 - High Fidelity Prototype Development
4. Fase 4 - Data Model Development
5. Fase 5 - Use Case Integration Contract (UCIC)
6. Fase 6 - Implementation
7. Fase 7 - Testing & Validation

---

# PROJECT OVERVIEW

## Deskripsi

INOWEB merupakan sebuah platform jasa pembuatan website profesional yang menyediakan berbagai solusi digital seperti:

- Company Profile
- Website UMKM
- Landing Page
- Website Katalog Produk
- Sistem Management
- Custom Website

Website ini dibangun menggunakan Laravel dengan konsep CMS sehingga seluruh konten website dapat dikelola melalui Admin Panel tanpa perlu mengubah kode program.

Website harus:

- Modern
- Elegant
- Premium
- Professional
- Responsive
- Dynamic
- SEO Friendly
- Fast Loading
- Secure

---

# TEKNOLOGI

## Backend

- Laravel 12
- PHP 8.4+
- Composer

## Frontend

- Blade Template
- Tailwind CSS
- Alpine.js
- Vite
- Heroicons
- Lucide Icons

## Database

MySQL

Nama Database

```
db_inoweb
```

## Tools

- Git
- GitHub
- NPM
- Laravel Pint
- Laravel Backup
- Laravel Excel
- Chart.js
- SweetAlert2
- TomSelect
- Flatpickr

---

# FASE 1
# SOFTWARE REQUIREMENT SPECIFICATION (SRS)

---

# 1.1 Tujuan Sistem

Membangun website company yang mampu menjadi media pemasaran digital profesional untuk menawarkan jasa pembuatan website.

---

# 1.2 Visi

Menjadi pusat layanan pembuatan website modern yang profesional, terpercaya, dan inovatif.

---

# 1.3 Misi

- Membantu UMKM go digital
- Menyediakan website profesional
- Memberikan support terbaik
- Membangun sistem yang scalable

---

# 1.4 Target Pengguna

- UMKM
- Perusahaan
- Sekolah
- Pondok Pesantren
- Klinik
- Rumah Sakit
- Dealer
- Cafe
- Furniture
- Property
- Startup

---

# 1.5 Functional Requirements

## Public Website

- Home
- Layanan
- Portfolio
- Detail Portfolio
- Harga
- Tentang Kami
- FAQ
- Blog
- Detail Blog
- Contact
- Privacy Policy
- Terms
- Sitemap
- Search
- Newsletter

---

## Portfolio

- Kategori
- Filter
- Search
- Pagination
- Detail
- Related Project

---

## Contact

- Contact Form
- WhatsApp
- Google Maps
- Email

---

## Blog

- Category
- Tag
- Search
- Popular Post
- Related Post

---

## CMS

Admin dapat mengelola seluruh isi website.

---

# 1.6 Non Functional Requirement

## Performance

- Fast Loading
- Lazy Load
- Image Optimization
- Cache

---

## Security

- CSRF
- XSS Protection
- SQL Injection Protection
- Authentication
- Authorization

---

## SEO

- Meta Title
- Meta Description
- Sitemap XML
- Robots.txt
- Open Graph
- JSON-LD

---

## Accessibility

- Keyboard Navigation
- Screen Reader
- Color Contrast

---

## Responsive

Website wajib mendukung:

- Desktop
- Laptop
- Tablet
- Mobile

Breakpoint

```
sm
md
lg
xl
2xl
```

---

# WEBSITE HARUS DINAMIS

Seluruh data berasal dari database.

Tidak boleh ada data yang di-hardcode kecuali konfigurasi sistem.

Semua halaman dapat dikelola melalui CMS.

Contoh:

- Hero
- Slider
- Banner
- CTA
- Portfolio
- Testimoni
- FAQ
- Pricing
- Blog
- Footer
- Menu
- SEO

Semua bersifat dinamis.

---

# FASE 2
# PRODUCT STRUCTURE DEVELOPMENT

---

# PUBLIC FRONTEND

```
Home
│
├── Hero
├── Statistic
├── Services
├── Why Choose Us
├── Portfolio Preview
├── Workflow
├── Pricing
├── Testimonial
├── FAQ
├── CTA
└── Footer
```

---

```
Services
│
├── Company Profile
├── Website UMKM
├── Landing Page
├── Katalog Produk
├── Sistem Management
└── Custom Website
```

---

```
Portfolio
│
├── Hero
├── Search
├── Filter
├── Sort
├── Grid
├── Pagination
└── CTA
```

---

```
Portfolio Detail
│
├── Hero
├── Overview
├── Feature
├── Technology
├── Gallery
├── Results
├── Testimonial
├── Related Project
└── CTA
```

---

```
Pricing
```

---

```
Blog
```

---

```
Blog Detail
```

---

```
About
```

---

```
FAQ
```

---

```
Contact
```

---

# ADMIN PANEL

```
Dashboard

CMS

Website

Menu

Hero

About

Services

Portfolio

Portfolio Category

Project Gallery

Technology

Pricing

FAQ

Testimonial

Client

Partner

Blog

Blog Category

Tag

Media Manager

SEO

Contact

Inbox

Newsletter

Users

Roles

Permissions

Activity Log

Backup

Setting

Analytics

System
```

---

# FASE 3
# HIGH FIDELITY PROTOTYPE

---

# HOME

```
Navbar

Hero

Client Logo

Statistic

Services

Featured Portfolio

Workflow

Pricing

Testimonial

FAQ

CTA

Footer
```

---

# PORTFOLIO

```
Hero

Category

Search

Sort

Grid

Pagination

CTA

Footer
```

---

# PORTFOLIO DETAIL

```
Hero

Project Information

Overview

Feature

Technology

Gallery

Performance

Result

Testimonial

Related Project

CTA

Footer
```

---

# BLOG

```
Hero

Search

Category

Article

Sidebar

Popular

Pagination

Footer
```

---

# CONTACT

```
Hero

Form

Maps

FAQ

CTA

Footer
```

---

# FASE 4
# DATA MODEL DEVELOPMENT

Database

```
db_inoweb
```

---

## Master Tables

```
users

roles

permissions

menus

settings

activities
```

---

## CMS

```
hero_sections

about_sections

services

service_categories

pricing

faqs

testimonials

partners

clients

banners

cta_sections
```

---

## Portfolio

```
project_categories

projects

project_images

project_features

project_technologies

project_results
```

---

## Blog

```
blog_categories

blogs

tags

blog_tag
```

---

## Contact

```
contacts

messages

newsletter
```

---

## SEO

```
seo_meta

redirects

sitemap
```

---

## Media

```
media
```

---

Semua tabel memiliki:

- UUID (opsional)
- Soft Delete
- Timestamp
- Foreign Key
- Index
- Slug
- Status
- Sort Order

---

# RELATIONSHIP

```
Category

1

|

Projects

|

N

Project Images

|

N

Project Technologies

|

N

Project Features
```

---

# FASE 5
# UCIC (USE CASE INTEGRATION CONTRACT)

---

## Visitor

```
Home

↓

Service

↓

Portfolio

↓

Project Detail

↓

Contact

↓

Send Inquiry

↓

Admin Receive

↓

Follow Up
```

---

## Admin

```
Login

↓

Dashboard

↓

Manage Content

↓

Publish

↓

Visitor View

↓

Analytics
```

---

# ROLE

```
Super Admin

Admin

Editor

Content Writer

Marketing
```

---

# FASE 6
# IMPLEMENTATION

---

# Arsitektur

```
MVC

↓

Repository

↓

Service

↓

Controller

↓

Blade

↓

Tailwind

↓

Alpine.js
```

---

# Folder

```
app

bootstrap

config

database

public

resources

routes

storage

tests
```

---

# Resources

```
resources

├── css
├── js
├── views
│     ├── frontend
│     ├── admin
│     ├── components
│     ├── layouts
│     └── partials
```

---

# Frontend

- Blade Component
- Layout Component
- Dynamic Section
- Reusable Component

---

# Backend

- Controller
- Form Request
- Service
- Repository
- Policy
- Observer

---

# Optimization

- Config Cache
- Route Cache
- View Cache
- Queue
- Lazy Loading
- Eager Loading
- Image Optimization

---

# Responsive Design

Layout menggunakan pendekatan **Mobile First**.

Breakpoint:

```
<640px     Mobile

640px      SM

768px      MD

1024px     LG

1280px     XL

1536px     2XL
```

Semua komponen wajib responsif, termasuk:

- Navbar
- Hero
- Card Portfolio
- Grid Layanan
- Pricing
- FAQ
- Form
- Footer
- Sidebar Admin
- Tabel Data
- Dashboard
- Modal
- Gallery

---

# Dynamic Content Strategy

Seluruh konten frontend diambil dari database melalui CMS.

Komponen yang bersifat dinamis:

- Logo
- Favicon
- Navigasi
- Hero Section
- Banner
- Statistik
- Layanan
- Portfolio
- Detail Proyek
- Testimoni
- FAQ
- Pricing
- CTA
- Artikel Blog
- Kategori
- Tag
- Footer
- Informasi Kontak
- Media Sosial
- SEO Meta
- Google Maps
- WhatsApp
- Google Analytics
- Google Search Console

---

# FASE 7
# TESTING & VALIDATION

---

## Unit Testing

- Service
- Repository
- Model
- Helper

---

## Feature Testing

- Login
- CRUD CMS
- CRUD Portfolio
- CRUD Blog
- Contact Form

---

## Integration Testing

- Frontend
- Backend
- Database

---

## Performance Testing

Target:

- Google PageSpeed ≥ 90
- GTMetrix Grade A
- LCP < 2.5 detik
- CLS < 0.1
- TTFB < 800 ms

---

## Security Testing

- Authentication
- Authorization
- CSRF
- XSS
- SQL Injection
- File Upload Validation
- Rate Limiting

---

## Responsive Testing

Wajib diuji pada:

- Android
- iPhone
- iPad
- Laptop
- Desktop
- Ultra Wide Monitor

Browser:

- Chrome
- Edge
- Firefox
- Safari

---

## SEO Validation

- Meta Title
- Meta Description
- Canonical URL
- Open Graph
- Twitter Card
- Structured Data (JSON-LD)
- XML Sitemap
- Robots.txt
- Breadcrumb Schema

---

# DEPLOYMENT

Target Environment:

- Development
- Staging
- Production

Server Requirements:

- PHP 8.4+
- MySQL 8+
- Composer
- Node.js
- NPM
- Nginx / Apache
- SSL (HTTPS)

---

# PENUTUP

Blueprint ini menjadi acuan utama pengembangan **INOWEB** sebagai website landing page profesional berbasis **Laravel 12**, **Tailwind CSS**, **Alpine.js**, dan **MySQL (`db_inoweb`)**. Sistem dirancang menggunakan arsitektur yang modular, mudah dikembangkan, aman, responsif, dan seluruh konten **Public Frontend** dikelola melalui **Admin Panel CMS**. Dengan pendekatan **Chain of Truth (7 Fase)**, dokumen ini menjadi fondasi untuk analisis kebutuhan, desain, implementasi, pengujian, hingga deployment sehingga pengembangan berlangsung terstruktur, konsisten, dan siap dikembangkan untuk kebutuhan jangka panjang.