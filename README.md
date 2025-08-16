# 🎓 Student Management System

A comprehensive Laravel-based Student Management System with full CRUD operations for Students, Courses, and Professors, featuring relationship management and modern UI components.

![Laravel](https://img.shields.io/badge/Laravel-12.24.0-red?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue?style=flat-square&logo=php)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3.2-purple?style=flat-square&logo=bootstrap)
![MySQL](https://img.shields.io/badge/MySQL-Database-orange?style=flat-square&logo=mysql)

## 📋 Table of Contents

- [Features](#-features)
- [System Architecture](#-system-architecture)
- [Installation](#-installation)
- [Database Setup](#-database-setup)
- [Usage](#-usage)
- [API Routes](#-api-routes)
- [Models & Relationships](#-models--relationships)
- [Screenshots](#-screenshots)
- [Contributing](#-contributing)
- [License](#-license)

## ✨ Features

### 🎯 Core Functionality
- **Complete CRUD Operations** for Students, Courses, and Professors
- **Soft Delete Support** with trash/restore functionality
- **Advanced Relationships** between all entities
- **Form Validation** with custom request classes
- **Toastr Notifications** for user feedback
- **Responsive Design** with Bootstrap 5

### 👥 User Management
- **Laravel Breeze Authentication** with Livewire
- **Profile Management** 
- **Secure Login/Registration**
- **Password Reset Functionality**

### 🔗 Entity Relationships
- **Students ↔ Courses**: Many-to-Many relationship
- **Professors → Courses**: One-to-Many relationship
- **Dynamic Course Assignment** to students
- **Professor Assignment** to courses

### 🎨 UI/UX Features
- **Modern Bootstrap 5 Interface**
- **Intuitive Navigation System**
- **Comprehensive Dashboard** with statistics
- **Responsive Card-based Layouts**
- **Real-time Toast Notifications**
- **Consistent Design Patterns**

## 🏗️ System Architecture

### Technology Stack
- **Backend**: Laravel 12.24.0 (PHP 8.2+)
- **Frontend**: Bootstrap 5.3.2, Livewire 3.6.4
- **Database**: MySQL
- **Authentication**: Laravel Breeze
- **Notifications**: Toastr.js
- **Icons**: Bootstrap Icons

### Project Structure
```
StudentCrud/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── StudentController.php
│   │   │   ├── CourseController.php
│   │   │   └── ProfessorController.php
│   │   └── Requests/
│   │       ├── StoreCourseRequest.php
│   │       └── UpdateCourseRequest.php
│   ├── Models/
│   │   ├── Student.php
│   │   ├── Course.php
│   │   ├── Professor.php
│   │   └── User.php
│   └── Policies/
│       └── StudentPolicy.php
├── database/
│   ├── migrations/
│   ├── factories/
│   └── seeders/
├── resources/
│   └── views/
│       ├── layouts/
│       ├── students/
│       ├── courses/
│       └── professors/
└── routes/
    └── web.php
```

## 🚀 Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js & NPM
- MySQL Database
- Git

### Step-by-Step Setup

1. **Clone the Repository**
   ```bash
   git clone <repository-url>
   cd StudentCrud
   ```

2. **Install PHP Dependencies**
   ```bash
   composer install
   ```

3. **Install Node Dependencies**
   ```bash
   npm install
   ```

4. **Environment Configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure Database**
   Edit `.env` file with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=student_management
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Database Migration & Seeding**
   ```bash
   php artisan migrate:fresh --seed
   ```

7. **Build Assets**
   ```bash
   npm run build
   # or for development
   npm run dev
   ```

8. **Start Development Server**
   ```bash
   php artisan serve
   ```

9. **Access Application**
   Open your browser and navigate to: `http://localhost:8000`

## 🗄️ Database Setup

### Migrations Included
- `create_users_table` - User authentication
- `create_cache_table` - Application caching
- `create_jobs_table` - Queue management
- `create_students_table` - Student records
- `create_professors_table` - Professor records
- `create_courses_table` - Course records with professor relationships
- `create_course_student_table` - Many-to-many pivot table

### Seeders
- **DatabaseSeeder**: Orchestrates all seeding
- **StudentSeeder**: Creates 20 sample students
- **ProfessorSeeder**: Creates 10 sample professors
- **CourseSeeder**: Creates 10 courses with professor assignments
- **Course-Student Relationships**: Random assignments

### Sample Data
After seeding, you'll have:
- ✅ 20 Students with diverse profiles
- ✅ 10 Professors across various departments
- ✅ 10 Courses with assigned professors
- ✅ Random student-course enrollments
- ✅ Test user account for authentication

## 📖 Usage

### Authentication
1. **Register** a new account or **Login** with existing credentials
2. Access the **Dashboard** for system overview

### Managing Students
- **View All Students**: Browse paginated student list
- **Add Student**: Create new student profiles
- **Edit Student**: Update student information
- **Delete Student**: Soft delete with restore option
- **Manage Enrollments**: Assign students to courses

### Managing Courses
- **View All Courses**: Browse course catalog
- **Add Course**: Create new courses
- **Edit Course**: Update course details
- **Assign Professor**: Link courses to professors
- **View Enrollments**: See enrolled students
- **Trash Management**: Restore deleted courses

### Managing Professors
- **View All Professors**: Browse faculty directory
- **Add Professor**: Create faculty profiles
- **Edit Professor**: Update professor information
- **View Courses**: See assigned courses
- **Delete Professor**: Remove faculty records

### Navigation
- **Dashboard**: System overview with statistics
- **Entity Dropdowns**: Quick access to all CRUD operations
- **Breadcrumb Navigation**: Easy return to previous pages
- **Search & Filter**: Find specific records quickly

## 🛣️ API Routes

### Student Routes
```php
GET     /students              # List all students
GET     /students/create       # Show create form
POST    /students              # Store new student
GET     /students/{id}         # Show student details
GET     /students/{id}/edit    # Show edit form
PUT     /students/{id}         # Update student
DELETE  /students/{id}         # Soft delete student
GET     /students/trashed      # List trashed students
POST    /students/{id}/restore # Restore student
DELETE  /students/{id}/force   # Permanently delete
```

### Course Routes
```php
GET     /courses               # List all courses
GET     /courses/create        # Show create form
POST    /courses               # Store new course
GET     /courses/{id}          # Show course details
GET     /courses/{id}/edit     # Show edit form
PUT     /courses/{id}          # Update course
DELETE  /courses/{id}          # Soft delete course
GET     /courses/trashed       # List trashed courses
POST    /courses/{id}/restore  # Restore course
DELETE  /courses/{id}/force    # Permanently delete
```

### Professor Routes
```php
GET     /professors            # List all professors
GET     /professors/create     # Show create form
POST    /professors            # Store new professor
GET     /professors/{id}       # Show professor details
GET     /professors/{id}/edit  # Show edit form
PUT     /professors/{id}       # Update professor
DELETE  /professors/{id}       # Delete professor
```

### Authentication Routes
```php
GET     /login                 # Show login form
POST    /login                 # Process login
GET     /register              # Show registration form
POST    /register              # Process registration
POST    /logout                # User logout
GET     /dashboard             # Main dashboard
```

## 🔗 Models & Relationships

### Student Model
```php
class Student extends Model
{
    use SoftDeletes;
    
    // Relationships
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
```

### Course Model
```php
class Course extends Model
{
    use SoftDeletes;
    
    // Relationships
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    
    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
}
```

### Professor Model
```php
class Professor extends Model
{
    // Relationships
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
```

### Relationship Diagram
```
┌─────────────┐         ┌─────────────┐         ┌─────────────┐
│   Student   │◄──────┐ │   Course    │ ┌──────►│  Professor  │
│             │       │ │             │ │       │             │
│ - id        │       └─│ - id        │─┘       │ - id        │
│ - fname     │         │ - name      │         │ - name      │
│ - lname     │         │ - code      │         │ - email     │
│ - email     │         │ - description│         │ - department│
│ - course    │         │ - professor_id│        │ - phone     │
│ - created_at│         │ - created_at│         │ - created_at│
│ - updated_at│         │ - updated_at│         │ - updated_at│
│ - deleted_at│         │ - deleted_at│         └─────────────┘
└─────────────┘         └─────────────┘
      │                       │
      └───────────────────────┘
           course_student
         (Many-to-Many Pivot)
```

## 📱 Screenshots

### Dashboard Overview
The main dashboard provides a comprehensive overview of the system with statistics for all entities, quick action buttons, and navigation shortcuts.

### Student Management
- **Student List**: Card-based layout showing all students
- **Student Form**: Clean, validated forms for data entry
- **Student Profile**: Detailed view with course enrollments

### Course Management
- **Course Catalog**: Organized course listings with professor information
- **Course Details**: Comprehensive course information with enrolled students
- **Course Assignment**: Easy professor and student assignment interface

### Professor Management
- **Faculty Directory**: Professional professor listings
- **Professor Profile**: Detailed faculty information with assigned courses
- **Course Assignment**: Simple course assignment interface

## 🤝 Contributing

We welcome contributions to improve the Student Management System!

### How to Contribute
1. **Fork** the repository
2. **Create** a feature branch (`git checkout -b feature/amazing-feature`)
3. **Commit** your changes (`git commit -m 'Add amazing feature'`)
4. **Push** to the branch (`git push origin feature/amazing-feature`)
5. **Open** a Pull Request

### Development Guidelines
- Follow **PSR-12** coding standards
- Write **comprehensive tests** for new features
- Update **documentation** for any changes
- Ensure **cross-browser compatibility**
- Use **semantic commit messages**

### Areas for Contribution
- 🐛 **Bug Fixes**: Report and fix issues
- ✨ **New Features**: Add functionality enhancements
- 📚 **Documentation**: Improve documentation
- 🎨 **UI/UX**: Enhance user interface design
- ⚡ **Performance**: Optimize application performance
- 🧪 **Testing**: Add comprehensive test coverage

## 📄 License

This project is licensed under the **MIT License** - see the [LICENSE](LICENSE) file for details.

## 🙏 Acknowledgments

- **Laravel Team** for the amazing framework
- **Bootstrap Team** for the responsive UI components
- **Livewire Team** for reactive components
- **Community Contributors** for continuous improvements

## 📞 Support

For support, questions, or suggestions:

- 📧 **Email**: [your-email@example.com]
- 🐛 **Issues**: [GitHub Issues](https://github.com/your-repo/issues)
- 💬 **Discussions**: [GitHub Discussions](https://github.com/your-repo/discussions)

---

**Made with ❤️ using Laravel & Bootstrap**

> This Student Management System demonstrates modern web development practices with Laravel, featuring comprehensive CRUD operations, relationship management, and a responsive user interface.
