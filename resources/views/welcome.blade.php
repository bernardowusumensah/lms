<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>School Management System - Streamline Education</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .hero-gradient {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }
            .feature-card {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .feature-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            }
            .stat-number {
                font-size: 2.5rem;
                font-weight: 700;
                color: #667eea;
            }
        </style>
    </head>
    <body class="font-sans">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <i class="fas fa-graduation-cap text-primary me-2" style="font-size: 1.5rem;"></i>
                    <span class="fw-bold text-primary">EduManage</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#features">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#stats">Statistics</a>
                        </li>
                    </ul>
                    @if (Route::has('login'))
                        <div class="d-flex">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary me-2">
                                    <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">
                                    <i class="fas fa-sign-in-alt me-1"></i>Login
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-primary">
                                        <i class="fas fa-user-plus me-1"></i>Register
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="hero-gradient text-white py-5">
            <div class="container">
                <div class="row align-items-center min-vh-75">
                    <div class="col-lg-6">
                        <h1 class="display-4 fw-bold mb-4">
                            Transform Your Educational Institution
                        </h1>
                        <p class="lead mb-4">
                            A comprehensive School Management System designed to streamline academic operations, 
                            manage students, faculty, and courses with modern technology and intuitive design.
                        </p>
                        <div class="d-flex flex-wrap gap-3">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-light btn-lg">
                                    <i class="fas fa-tachometer-alt me-2"></i>Go to Dashboard
                                </a>
                            @else
                                <a href="{{ route('register') }}" class="btn btn-light btn-lg">
                                    <i class="fas fa-rocket me-2"></i>Get Started
                                </a>
                                <a href="#features" class="btn btn-outline-light btn-lg">
                                    <i class="fas fa-info-circle me-2"></i>Learn More
                                </a>
                            @endauth
                        </div>
                    </div>
                    <div class="col-lg-6 text-center">
                        <div class="bg-white bg-opacity-10 rounded-4 p-4 backdrop-blur">
                            <i class="fas fa-school display-1 text-white mb-3"></i>
                            <h3 class="text-white">Modern Education Management</h3>
                            <p class="text-white-50">Built with Laravel & Bootstrap for reliability and performance</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
                                        <!-- Features Section -->
        <section id="features" class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center mb-5">
                        <h2 class="display-5 fw-bold">Powerful Features for Modern Education</h2>
                        <p class="lead text-muted">
                            Everything you need to manage students, faculty, courses, and academic operations in one unified platform.
                        </p>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm feature-card">
                            <div class="card-body text-center p-4">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <i class="fas fa-users text-primary fa-xl"></i>
                                </div>
                                <h5 class="card-title">Student Management</h5>
                                <p class="card-text text-muted">
                                    Complete student lifecycle management with profiles, enrollment tracking, and academic progress monitoring.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm feature-card">
                            <div class="card-body text-center p-4">
                                <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <i class="fas fa-chalkboard-teacher text-success fa-xl"></i>
                                </div>
                                <h5 class="card-title">Faculty Management</h5>
                                <p class="card-text text-muted">
                                    Streamlined professor and staff management with course assignments and departmental organization.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm feature-card">
                            <div class="card-body text-center p-4">
                                <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <i class="fas fa-book text-warning fa-xl"></i>
                                </div>
                                <h5 class="card-title">Course Management</h5>
                                <p class="card-text text-muted">
                                    Comprehensive course catalog management with scheduling, prerequisites, and enrollment controls.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm feature-card">
                            <div class="card-body text-center p-4">
                                <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <i class="fas fa-chart-line text-info fa-xl"></i>
                                </div>
                                <h5 class="card-title">Analytics & Reports</h5>
                                <p class="card-text text-muted">
                                    Real-time insights and comprehensive reporting for academic performance and institutional metrics.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm feature-card">
                            <div class="card-body text-center p-4">
                                <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <i class="fas fa-shield-alt text-danger fa-xl"></i>
                                </div>
                                <h5 class="card-title">Security & Access</h5>
                                <p class="card-text text-muted">
                                    Role-based access control with secure authentication and data protection protocols.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm feature-card">
                            <div class="card-body text-center p-4">
                                <div class="bg-secondary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <i class="fas fa-mobile-alt text-secondary fa-xl"></i>
                                </div>
                                <h5 class="card-title">Mobile Responsive</h5>
                                <p class="card-text text-muted">
                                    Fully responsive design ensuring seamless access across all devices and platforms.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Statistics Section -->
        <section id="stats" class="py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center mb-5">
                        <h2 class="display-5 fw-bold">System Overview</h2>
                        <p class="lead text-muted">Current system statistics and capabilities</p>
                    </div>
                </div>
                <div class="row g-4 text-center">
                    <div class="col-md-3">
                        <div class="p-4">
                            <div class="stat-number">{{ \App\Models\Student::count() ?? '20' }}+</div>
                            <h6 class="text-muted">Active Students</h6>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-4">
                            <div class="stat-number">{{ \App\Models\Professor::count() ?? '10' }}+</div>
                            <h6 class="text-muted">Faculty Members</h6>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-4">
                            <div class="stat-number">{{ \App\Models\Course::count() ?? '10' }}+</div>
                            <h6 class="text-muted">Available Courses</h6>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-4">
                            <div class="stat-number">100%</div>
                            <h6 class="text-muted">Uptime Reliability</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h2 class="display-5 fw-bold mb-4">Built for Modern Education</h2>
                        <p class="lead mb-4">
                            Our School Management System is designed with modern educational institutions in mind, 
                            providing a comprehensive solution for managing all aspects of academic operations.
                        </p>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    <span>Laravel Framework</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    <span>Bootstrap Design</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    <span>Real-time Updates</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    <span>Secure & Scalable</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bg-primary bg-opacity-5 rounded-4 p-5 text-center">
                            <i class="fas fa-laptop-code display-1 text-primary mb-4"></i>
                            <h4 class="mb-3">Modern Technology Stack</h4>
                            <p class="text-muted">
                                Built with Laravel 12, Bootstrap 5, and modern web technologies 
                                to ensure reliability, security, and exceptional user experience.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="hero-gradient text-white py-5">
            <div class="container text-center">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2 class="display-5 fw-bold mb-4">Ready to Get Started?</h2>
                        <p class="lead mb-4">
                            Transform your educational institution with our comprehensive School Management System.
                        </p>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-light btn-lg">
                                <i class="fas fa-tachometer-alt me-2"></i>Access Dashboard
                            </a>
                        @else
                            <div class="d-flex flex-wrap justify-content-center gap-3">
                                <a href="{{ route('register') }}" class="btn btn-light btn-lg">
                                    <i class="fas fa-user-plus me-2"></i>Create Account
                                </a>
                                <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">
                                    <i class="fas fa-sign-in-alt me-2"></i>Sign In
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </section>

        <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </footer>
       

        <!-- Bootstrap JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
                            
                    
               