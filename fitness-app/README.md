# Fitness Journal - Laravel Web Application

## Overview

The Fitness Journal is a web application built using the Laravel 11 framework that allows users to track and manage their workout activities. This application demonstrates the implementation of the Model-View-Controller (MVC) architectural pattern, providing a clean separation of concerns and following Laravel best practices.

## Scenario

The Fitness Journal application enables users to record, view, edit, and search through their workout activities. Users can track various types of physical activities including jogging, weight training, yoga, and more. Each activity record includes details such as date, time, duration, distance, sets, reps, and personal notes. This application serves as a digital fitness diary, helping users maintain consistency in their fitness journey and monitor their progress over time.

## MVC Design Pattern Implementation

The application follows the MVC (Model-View-Controller) architectural pattern, which separates the application into three interconnected components:

### Model (M)

The Model layer represents the data structure and business logic. In this application, the `Activity` model (`app/Models/Activity.php`) extends Laravel's Eloquent ORM, providing an object-oriented interface to interact with the `activities` database table.

**Example from code:**
```php
// app/Models/Activity.php
class Activity extends Model
{
    protected $fillable = [
        'date', 'time_start', 'time_end', 'activity',
        'time_spent', 'distance', 'set_count', 'reps', 'note',
    ];
}
```

The model defines which attributes can be mass-assigned, ensuring data integrity. Eloquent automatically handles database operations, allowing us to use methods like `Activity::create()`, `Activity::find()`, and `$activity->update()` without writing SQL queries directly.

### View (V)

The View layer is responsible for presenting data to the user. This application uses Laravel's Blade templating engine, which provides a clean syntax for embedding PHP code within HTML templates.

**Example from code:**
```php
// resources/views/activities/index.blade.php
@foreach($activities as $activity)
    <tr>
        <td>{{ $activity->date->format('Y-m-d') }}</td>
        <td>{{ $activity->activity }}</td>
    </tr>
@endforeach
```

Blade directives like `@foreach`, `@if`, and `{{ }}` make the templates readable and maintainable. The views are organized in the `resources/views` directory, with a layout file (`layouts/app.blade.php`) providing consistent structure across all pages.

### Controller (C)

The Controller layer acts as an intermediary between the Model and View, handling user input and coordinating the application flow. The `ActivityController` (`app/Http/Controllers/ActivityController.php`) contains methods for each CRUD operation.

**Example from code:**
```php
// app/Http/Controllers/ActivityController.php
public function store(Request $request): RedirectResponse
{
    $validated = $request->validate([...]);
    Activity::create($validated);
    return redirect()->route('activities.index')
        ->with('success', 'Activity created successfully.');
}
```

The controller receives HTTP requests, validates input, interacts with the model to perform database operations, and returns appropriate responses (views or redirects).

## Key Features

### CRUD Operations

The application implements full CRUD (Create, Read, Update, Delete) functionality:

- **Create**: Users can add new activities through a form (`/activities/create`)
- **Read**: Activities are displayed in a paginated table (`/activities`)
- **Update**: Existing activities can be edited (`/activities/{id}/edit`)
- **Delete**: Activities can be removed from the database

### Database Design

The application uses a single `activities` table designed in first normal form (1NF). The table structure includes:

- Primary key (`id`)
- Date and time fields for tracking when activities occurred
- Activity name and details (duration, distance, sets, reps)
- Notes field for additional information
- Timestamps for record creation and updates

### Migrations and Seeders

Laravel migrations (`database/migrations/2024_01_01_000001_create_activities_table.php`) define the database schema, allowing version control of database structure. The seeder (`database/seeders/ActivitySeeder.php`) populates the database with sample data for testing and demonstration purposes.

### Additional Features (Extra Credit)

1. **Search Functionality**: Users can search activities by date or keyword through the search page
2. **Pagination**: Activity listings are paginated (10 items per page) for better performance and usability
3. **Input Validation**: Laravel's validation system ensures data integrity with custom error messages
4. **Laravel Components**: The application uses Blade components and directives effectively

## Good Practices Implemented

1. **Route Naming**: All routes are named using `route()` helper for maintainability
2. **Form Validation**: Server-side validation prevents invalid data entry
3. **Error Handling**: Validation errors are displayed to users with clear messages
4. **Security**: CSRF protection is enabled for all forms
5. **Code Organization**: Files are organized following Laravel's conventions
6. **Responsive Design**: CSS is optimized for desktop viewing (1366x768 resolution)

## Installation Instructions

1. Clone the repository
2. Copy `.env.example` to `.env` and configure database settings
3. Run `composer install` to install dependencies
4. Run `php artisan key:generate` to generate application key
5. Run `php artisan migrate:fresh --seed` to create and populate the database
6. Run `php artisan serve` to start the development server
7. Access the application at `http://localhost:8000`

## Technical Stack

- **Framework**: Laravel 11
- **Database**: MySQL/MariaDB
- **PHP Version**: 8.2+
- **Frontend**: HTML5, CSS3, Blade Templates
- **Backend**: PHP, Eloquent ORM

## Conclusion

This Fitness Journal application demonstrates a solid understanding of the Laravel framework and MVC architecture. The separation of concerns makes the codebase maintainable, testable, and scalable. The implementation of CRUD operations, validation, search, and pagination showcases proficiency in web development using modern PHP frameworks.
