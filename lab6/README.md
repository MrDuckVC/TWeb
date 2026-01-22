<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Laborator 6

**Tema/scopul**: Utilizarea unui CMS sau Framework pentru dezvoltarea unei aplicații Web.

1. Alegeti un CMS sau Framework (JS sau pe oricare script server) pentru dezvoltarea unei aplicatii Web. Motivati alegerea.
2. Dezvoltati o aplicatie functionala in baza alegerii facute.
3. Puneti in raport PrintScreen-uri la paginile create. In cazul CMS-ului ilustrati modul de interactiune cu partea administrativa unde ati intervenit pentru adaptari, iar in cazul Framework-ului - citeva secvente de cod creat de voi pe care-l considerati important sau interesant.

Se incarca raportul in format electronic pe else.fcim.utm.md la sarcina respectiva.

Se va prezenta pagina Web la calculator si se va apara laboratorul efectuat.

# 💻 PC Master Shop (Laravel)

Лабораторная работа №6.
Веб-приложение для магазина компьютерных комплектующих.
Реализовано на **Laravel 11** с гибридной архитектурой (Blade + API).

## 🚀 Функционал
- **Публичная часть:** SPA-подход (AJAX загрузка товаров), форма обратной связи.
- **Админ-панель:** Защищена паролем, полное управление товарами (CRUD), просмотр заявок.
- **API:** REST API endpoint для получения списка товаров.

## 🛠️ Установка и запуск

Чтобы запустить проект локально, выполните следующие шаги:

### 1. Клонирование и зависимости

Сначала скачайте проект и установите библиотеки PHP (папка vendor):

```bash
git clone <ссылка-на-твой-репозиторий>
cd lab6
composer install
```

### 2. Настройка окружения

Создайте файл .env из примера:

```bash
cp .env.example .env
Откройте файл .env и настройте подключение к вашей базе данных MySQL:
```

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pcmaster_laravel  # Создайте эту базу в MySQL!
DB_USERNAME=root              # Ваш логин
DB_PASSWORD=                  # Ваш пароль

```

### 3. Ключ приложения

Сгенерируйте уникальный ключ шифрования Laravel:

```bash
php artisan key:generate
```

### 4. База данных

Запустите миграции (создание таблиц) и сиды (создание админа):

```bash
php artisan migrate --seed
```

Эта команда создаст таблицы products, messages и пользователя-админа.

### 5. Запуск
Запустите локальный сервер:

```bash
php artisan serve
```

Сайт будет доступен по адресу: http://127.0.0.1:8000
