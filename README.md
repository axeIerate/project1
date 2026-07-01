# Project1

A hands-on Laravel + Livewire practice app featuring a to-do list manager and a real-time validated contact form.

Built as part of OJT learning at Clique HA, to get practical experience with the Laravel ecosystem and Livewire's reactive components.

## Tech stack

- **Backend**: Laravel 12
- **Frontend**: Livewire
- **Database**: MySQL
- **Local environment**: XAMPP

## Features

- **To-do list management**
  - add, edit, delete, and mark tasks as complete/incomplete
  - deadline tracking per task
  - powered by an Eloquent `Todo` model with a factory for testing/seeding
- **Contact form**
  - real-time field validation as the user types (`wire:model.live`)
  - required field checks and valid email format enforcement
  - success feedback on submission

## Project structure notes

- `app/Models/`
  - `Todo.php` — Eloquent model for to-do items (title, completed, deadline)
- `app/Livewire/`
  - `TodoList.php` — component handling add/edit/delete/toggle-complete logic
  - `ContactForm.php` — component handling real-time validated form submission
- `resources/views/livewire/`
  - Blade views for the to-do list and contact form components
- `database/factories/`
  - `TodoFactory.php` — factory for generating test/seed data

## CI

GitHub Actions runs on every push:
- **Type analysis** (PHPStan/Larastan) across PHP 8.4 and 8.5
- **Linter/quality** checks

## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install && npm run build
php artisan serve
```
