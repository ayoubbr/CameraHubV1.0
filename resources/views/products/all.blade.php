<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Professional cameras and photography equipment">

    <title>CameraHub - All Products</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* ======= Base Styles ======= */
        :root {
            --primary-color: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary-color: #f59e0b;
            --text-color: #111827;
            --text-light: #6b7280;
            --light-gray: #f3f4f6;
            --medium-gray: #e5e7eb;
            --dark-gray: #4b5563;
            --white: #ffffff;
            --black: #000000;
            --success: #10b981;
            --danger: #ef4444;
            --border-radius: 8px;
            --box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--white);
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: var(--transition);
        }

        ul {
            list-style: none;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        .container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-header h2 {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
        }

        .section-header h2:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 70px;
            height: 3px;
            background-color: var(--primary-color);
        }

        .section-header p {
            color: var(--text-light);
            font-size: 18px;
        }

        /* ======= Buttons ======= */
        .btn {
            display: inline-block;
            padding: 12px 28px;
            border-radius: var(--border-radius);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            font-size: 16px;
            text-align: center;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: var(--white);
            border: 2px solid var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .btn-outline {
            background-color: transparent;
            color: var(--text-color);
            border: 2px solid var(--medium-gray);
        }

        .btn-outline:hover {
            background-color: var(--light-gray);
            border-color: var(--dark-gray);
        }

        /* ======= Header ======= */
        .site-header {
            background-color: var(--white);
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 0;
        }

        .logo h1 {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .main-nav ul {
            display: flex;
            gap: 25px;
        }

        .main-nav a {
            font-weight: 500;
            position: relative;
            padding: 5px 0;
        }

        .main-nav a:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary-color);
            transition: var(--transition);
        }

        .main-nav a:hover:after,
        .main-nav a.active:after {
            width: 100%;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search-form {
            position: relative;
        }

        .search-form input {
            padding: 10px 15px;
            padding-right: 40px;
            border-radius: 50px;
            border: 1px solid var(--medium-gray);
            width: 220px;
            font-size: 14px;
            transition: var(--transition);
        }

        .search-form input:focus {
            outline: none;
            border-color: var(--primary-color);
            width: 260px;
        }

        .search-form button {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-light);
        }

        .user-actions {
            display: flex;
            gap: 15px;
        }

        .account-link,
        .cart-link {
            font-size: 20px;
            position: relative;
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: var(--primary-color);
            color: var(--white);
            font-size: 12px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }

        /* ======= Hero Section ======= */
        .hero-section {
            height: 600px;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://cdn.thewirecutter.com/wp-content/media/2023/10/instantcameras-2048px-02039.jpg') no-repeat center/cover;
            display: flex;
            align-items: center;
            text-align: center;
            position: relative;
        }

        .hero-content {
            color: var(--white);
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-content h2 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero-content p {
            font-size: 20px;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        /* ======= Categories Section ======= */
        .categories-section {
            padding: 80px 0;
            background-color: var(--light-gray);
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 30px;
        }

        .category-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            padding: 30px 20px;
            text-align: center;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .category-icon {
            font-size: 40px;
            margin-bottom: 15px;
            color: var(--primary-color);
        }

        .category-card h3 {
            font-size: 18px;
            font-weight: 600;
        }

        /* ======= Featured Products ======= */
        .featured-products {
            padding: 80px 0;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .product-card {
            position: relative;
            border-radius: var(--border-radius);
            background-color: var(--white);
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            overflow: hidden;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .product-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: var(--secondary-color);
            color: var(--white);
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            z-index: 1;
        }

        .product-image {
            position: relative;
            height: 280px;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .product-card:hover .product-image img {
            transform: scale(1.05);
        }

        .product-actions {
            position: absolute;
            bottom: -50px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            gap: 10px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.9);
            transition: var(--transition);
        }

        .product-card:hover .product-actions {
            bottom: 0;
        }

        .action-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--white);
            border: 1px solid var(--medium-gray);
            cursor: pointer;
            transition: var(--transition);
        }

        .action-btn:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: var(--white);
        }

        .product-info {
            padding: 20px;
        }

        .product-category {
            font-size: 14px;
            color: var(--text-light);
            margin-bottom: 8px;
        }

        .product-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .product-rating {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            color: var(--secondary-color);
            font-size: 14px;
        }

        .product-rating span {
            color: var(--text-light);
            margin-left: 5px;
        }

        .product-price {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .current-price {
            font-size: 20px;
            font-weight: 700;
            color: var(--primary-color);
        }

        .old-price {
            font-size: 16px;
            text-decoration: line-through;
            color: var(--text-light);
        }

        .view-all {
            text-align: center;
            margin-top: 40px;
        }

        /* ======= Brand Banner ======= */
        .brand-banner {
            padding: 50px 0;
            background-color: var(--light-gray);
        }

        .brands-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 30px;
        }

        .brand {
            filter: grayscale(1);
            opacity: 0.7;
            transition: var(--transition);
        }

        .brand:hover {
            filter: grayscale(0);
            opacity: 1;
        }

        /* ======= Special Offer ======= */
        .special-offer {
            padding: 80px 0;
        }

        .offer-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .offer-label {
            display: inline-block;
            background-color: var(--secondary-color);
            color: var(--white);
            padding: 5px 15px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .offer-text h2 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .offer-text p {
            font-size: 18px;
            color: var(--text-light);
            margin-bottom: 25px;
        }

        .offer-features {
            margin-bottom: 30px;
        }

        .offer-features li {
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .offer-features i {
            color: var(--success);
        }

        .price-box {
            display: flex;
            align-items: center;
            gap: 30px;
            margin-bottom: 25px;
        }

        .price .current {
            font-size: 30px;
            font-weight: 700;
            color: var(--primary-color);
        }

        .price .old {
            font-size: 20px;
            text-decoration: line-through;
            color: var(--text-light);
            margin-left: 10px;
        }

        .timer {
            display: flex;
            gap: 10px;
        }

        .time-unit {
            background-color: var(--primary-color);
            color: var(--white);
            padding: 8px 12px;
            border-radius: var(--border-radius);
            text-align: center;
            min-width: 60px;
        }

        .time-unit .number {
            font-size: 20px;
            font-weight: 700;
            display: block;
        }

        .time-unit .label {
            font-size: 12px;
            opacity: 0.8;
        }

        .offer-image {
            position: relative;
        }

        .offer-image:before {
            content: '';
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100%;
            height: 100%;
            border: 3px solid var(--primary-color);
            border-radius: var(--border-radius);
            z-index: -1;
        }

        .offer-image img {
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        /* ======= Testimonials ======= */
        .testimonials {
            padding: 80px 0;
            background-color: var(--light-gray);
        }

        .testimonials-slider {
            display: flex;
            gap: 30px;
            margin-bottom: 30px;
        }

        .testimonial {
            background-color: var(--white);
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--box-shadow);
        }

        .testimonial-content {
            margin-bottom: 20px;
            font-style: italic;
            color: var(--text-color);
        }

        .testimonial-content p {
            position: relative;
            padding: 0 10px;
        }

        .testimonial-content p:before,
        .testimonial-content p:after {
            content: '"';
            font-size: 24px;
            color: var(--primary-color);
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .author-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
        }

        .author-info h4 {
            font-size: 16px;
            font-weight: 600;
        }

        .author-info span {
            font-size: 14px;
            color: var(--text-light);
        }

        .testimonial-rating {
            margin-left: auto;
            color: var(--secondary-color);
            font-size: 14px;
        }

        .testimonial-dots {
            display: flex;
            justify-content: center;
            gap: 8px;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: var(--medium-gray);
            cursor: pointer;
            transition: var(--transition);
        }

        .dot.active {
            background-color: var(--primary-color);
        }

        /* ======= Blog Section ======= */
        .blog-section {
            padding: 80px 0;
        }

        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }

        .blog-card {
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
        }

        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .blog-image {
            height: 220px;
        }

        .blog-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .blog-content {
            padding: 25px;
        }

        .blog-meta {
            display: flex;
            gap: 15px;
            font-size: 14px;
            color: var(--text-light);
            margin-bottom: 10px;
        }

        .blog-content h3 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .blog-content h3 a:hover {
            color: var(--primary-color);
        }

        .blog-content p {
            color: var(--text-light);
            margin-bottom: 15px;
        }

        .read-more {
            font-weight: 500;
            color: var(--primary-color);
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .read-more:hover {
            gap: 8px;
        }

        /* ======= Newsletter ======= */
        .newsletter {
            background-color: var(--primary-color);
            padding: 60px 0;
            color: var(--white);
        }

        .newsletter-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 50px;
        }

        .newsletter-content h2 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .newsletter-content p {
            opacity: 0.9;
        }

        .newsletter-form {
            flex: 1;
            max-width: 500px;
        }

        .form-group {
            display: flex;
            gap: 10px;
        }

        .form-group input {
            flex: 1;
            padding: 12px 20px;
            border-radius: var(--border-radius);
            border: none;
            font-size: 16px;
        }

        .form-group input:focus {
            outline: none;
        }

        /* ======= Footer ======= */
        .site-footer {
            background-color: #111827;
            color: var(--white);
            padding: 80px 0 30px;
        }

        .footer-top {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 50px;
        }

        .footer-logo h2 {
            font-size: 24px;
            font-weight: 700;
            color: var(--white);
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 15px;
        }

        .footer-column p {
            opacity: 0.7;
            margin-bottom: 20px;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .social-links a:hover {
            background-color: var(--primary-color);
        }

        .footer-column h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        .footer-column h3:after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: var(--primary-color);
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            opacity: 0.7;
            transition: var(--transition);
        }

        .footer-links a:hover {
            opacity: 1;
            color: var(--primary-color);
            padding-left: 5px;
        }

        .contact-info li {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
            opacity: 0.7;
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .copyright {
            opacity: 0.7;
            font-size: 14px;
        }

        /* ======= Back to Top ======= */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 40px;
            height: 40px;
            background-color: var(--primary-color);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--box-shadow);
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
        }

        .back-to-top.active {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background-color: var(--primary-dark);
        }

        /* ======= Responsive ======= */
        @media (max-width: 1024px) {
            .section-header h2 {
                font-size: 28px;
            }

            .hero-content h2 {
                font-size: 40px;
            }

            .offer-content {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .offer-text h2 {
                font-size: 30px;
            }

            .newsletter-wrapper {
                flex-direction: column;
                text-align: center;
                gap: 30px;
            }

            .newsletter-form {
                width: 100%;
                max-width: 100%;
            }
        }

        @media (max-width: 768px) {
            .header-wrapper {
                position: relative;
            }

            .main-nav {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background-color: var(--white);
                padding: 20px;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
                display: none;
            }

            .main-nav.active {
                display: block;
            }

            .main-nav ul {
                flex-direction: column;
                gap: 15px;
            }

            .search-form {
                display: none;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .hero-content h2 {
                font-size: 32px;
            }

            .hero-content p {
                font-size: 18px;
            }

            .testimonials-slider {
                flex-direction: column;
            }

            .blog-grid {
                grid-template-columns: 1fr;
            }

            .footer-top {
                grid-template-columns: 1fr 1fr;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }
        }

        @media (max-width: 576px) {
            .section-header h2 {
                font-size: 24px;
            }

            .hero-content h2 {
                font-size: 28px;
            }

            .hero-buttons {
                flex-direction: column;
                gap: 15px;
            }

            .price-box {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .form-group {
                flex-direction: column;
            }

            .footer-top {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <header class="site-header">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <h1><i class="fas fa-camera-retro"></i> CameraHub</h1>
                    </a>
                </div>

                <nav class="main-nav">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('products.all') }}" class="active">Shop</a></li>
                        <li><a href="#">Brands</a></li>
                        <li><a href="#">Lenses</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </nav>

                <div class="header-actions">
                    <div class="search-form">
                        <form action="{{ route('products.search') }}" method="GET">
                            <input type="text" placeholder="Search products..." name="search"
                                value="{{ request('search') }}">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>

                    <div class="user-actions">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('dashboard') }}" class="account-link"><i class="fas fa-user"></i></a>
                            @else
                                <a href="{{ route('login') }}" class="account-link"><i class="fas fa-sign-in-alt"></i></a>
                            @endauth
                        @endif

                        <a href="{{ route('cart') }}" class="cart-link">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="cart-count">{{ $cart_count }}</span>
                        </a>
                    </div>

                    <button class="mobile-menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Page Title -->
    <section class="page-title-client">
        <div class="container">
            <h1>All Products</h1>
        </div>
    </section>
    <x-error-message />
    <x-success-message />

    <!-- Products Section with Filtering -->
    <section class="products-section">
        <div class="container">
            <div class="products-layout">
                <!-- Sidebar with filters -->
                <aside class="products-sidebar">
                    <div class="filter-section">
                        <h3>Categories</h3>
                        <form action="{{ route('products.all') }}" method="GET" id="category-filter">
                            @if (request('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif

                            <div class="filter-options">
                                @foreach ($categories as $category)
                                    <div class="filter-option">
                                        <input type="radio" name="category" id="cat-{{ $category->id }}"
                                            value="{{ $category->id }}"
                                            {{ request('category') == $category->id ? 'checked' : '' }}
                                            onchange="document.getElementById('category-filter').submit()">
                                        <label for="cat-{{ $category->id }}">{{ $category->name }}</label>
                                    </div>
                                @endforeach
                                <div class="filter-option">
                                    <input type="radio" name="category" id="cat-all" value=""
                                        {{ request('category') == '' ? 'checked' : '' }}
                                        onchange="document.getElementById('category-filter').submit()">
                                    <label for="cat-all">All Categories</label>
                                </div>
                            </div>
                        </form>
                    </div>

                    @if (request('category'))
                        <div class="filter-section">
                            <h3>Subcategories</h3>
                            <form action="{{ route('products.all') }}" method="GET" id="subcategory-filter">
                                <input type="hidden" name="category" value="{{ request('category') }}">
                                @if (request('search'))
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                @endif

                                <div class="filter-options">
                                    @foreach ($category->subcategories as $subcategory)
                                        @if ($subcategory->category_id == request('category'))
                                            <div class="filter-option">
                                                <input type="radio" name="subcategory"
                                                    id="subcat-{{ $subcategory->id }}" value="{{ $subcategory->id }}"
                                                    {{ request('subcategory') == $subcategory->id ? 'checked' : '' }}
                                                    onchange="document.getElementById('subcategory-filter').submit()">
                                                <label
                                                    for="subcat-{{ $subcategory->id }}">{{ $subcategory->name }}</label>
                                            </div>
                                        @endif
                                    @endforeach
                                    <div class="filter-option">
                                        <input type="radio" name="subcategory" id="subcat-all" value=""
                                            {{ request('subcategory') == '' ? 'checked' : '' }}
                                            onchange="document.getElementById('subcategory-filter').submit()">
                                        <label for="subcat-all">All Subcategories</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif

                    <div class="filter-section">
                        <h3>Price Range</h3>
                        <form action="{{ route('products.all') }}" method="GET" id="price-filter">
                            @if (request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            @if (request('subcategory'))
                                <input type="hidden" name="subcategory" value="{{ request('subcategory') }}">
                            @endif
                            @if (request('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif

                            <div class="price-inputs">
                                <div class="price-input">
                                    <label for="min_price">Min $</label>
                                    <input type="number" name="min_price" id="min_price" min="0"
                                        value="{{ request('min_price', '') }}" placeholder="Min">
                                </div>
                                <div class="price-input">
                                    <label for="max_price">Max $</label>
                                    <input type="number" name="max_price" id="max_price" min="0"
                                        value="{{ request('max_price', '') }}" placeholder="Max">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline btn-filter">Apply Price Filter</button>
                        </form>
                    </div>

                    <div class="filter-section">
                        <h3>Availability</h3>
                        <form action="{{ route('products.all') }}" method="GET" id="stock-filter">
                            @if (request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            @if (request('subcategory'))
                                <input type="hidden" name="subcategory" value="{{ request('subcategory') }}">
                            @endif
                            @if (request('min_price'))
                                <input type="hidden" name="min_price" value="{{ request('min_price') }}">
                            @endif
                            @if (request('max_price'))
                                <input type="hidden" name="max_price" value="{{ request('max_price') }}">
                            @endif
                            @if (request('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif

                            <div class="filter-options">
                                <div class="filter-option">
                                    <input type="radio" name="stock" id="in-stock" value="1"
                                        {{ request('stock') == '1' ? 'checked' : '' }}
                                        onchange="document.getElementById('stock-filter').submit()">
                                    <label for="in-stock">In Stock</label>
                                </div>
                                <div class="filter-option">
                                    <input type="radio" name="stock" id="all-items" value=""
                                        {{ request('stock') == '' ? 'checked' : '' }}
                                        onchange="document.getElementById('stock-filter').submit()">
                                    <label for="all-items">All Items</label>
                                </div>
                            </div>
                        </form>
                    </div>

                    @if (request()->anyFilled(['category', 'subcategory', 'min_price', 'max_price', 'stock', 'search']))
                        <div class="filter-actions">
                            <a href="{{ route('products.all') }}" class="btn btn-outline btn-reset">Reset All
                                Filters</a>
                        </div>
                    @endif
                </aside>

                <!-- Products Grid -->
                <div class="products-content">
                    <div class="products-header">
                        <div class="products-count">
                            {{-- <p>Showing {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} of --}}
                            {{-- {{ $products->total() ?? 0 }} products</p> --}}
                        </div>
                        <div class="products-sort">
                            <form action="{{ route('products.all') }}" method="GET" id="sort-form">
                                @if (request('category'))
                                    <input type="hidden" name="category" value="{{ request('category') }}">
                                @endif
                                @if (request('subcategory'))
                                    <input type="hidden" name="subcategory" value="{{ request('subcategory') }}">
                                @endif
                                @if (request('min_price'))
                                    <input type="hidden" name="min_price" value="{{ request('min_price') }}">
                                @endif
                                @if (request('max_price'))
                                    <input type="hidden" name="max_price" value="{{ request('max_price') }}">
                                @endif
                                @if (request('stock'))
                                    <input type="hidden" name="stock" value="{{ request('stock') }}">
                                @endif
                                @if (request('search'))
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                @endif

                                <label for="sort">Sort By:</label>
                                <select name="sort" id="sort"
                                    onchange="document.getElementById('sort-form').submit()">
                                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest
                                    </option>
                                    <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>
                                        Price: Low to High</option>
                                    <option value="price_high"
                                        {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low
                                    </option>
                                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>
                                        Name: A to Z</option>
                                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>
                                        Name: Z to A</option>
                                </select>
                            </form>
                        </div>
                    </div>

                    @if ($products->isEmpty())
                        <div class="no-products">
                            <i class="fas fa-search fa-3x"></i>
                            <h3>No products found</h3>
                            <p>Try changing your filters or search terms</p>
                        </div>
                    @else
                        <div class="products-grid">
                            @foreach ($products as $product)
                                <div class="product-card">
                                    @if ($product->created_at->diffInDays(now()) < 30)
                                        <div class="product-badge">New</div>
                                    @elseif($product->sale_price && $product->sale_price < $product->price)
                                        <div class="product-badge sale">Sale</div>
                                    @endif

                                    <div class="product-image">
                                        <img src="{{ $product->image }}" alt="{{ $product->name }}">
                                        <div class="product-actions">
                                            <button class="action-btn"><i class="fas fa-heart"></i></button>
                                            <form action="{{ route('cart.add') }}" method="POST"
                                                class="add-to-cart-form">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                                <input type="hidden" name="quantity" value="1" min="1"
                                                    max="{{ $product->stock }}" class="quantity-input">
                                                @if ($product->stock > 0)
                                                    <button type="submit"
                                                        class="action-btn {{ $product->stock <= 0 ? 'disabled' : '' }}"
                                                        {{ $product->stock <= 0 ? 'disabled' : '' }}>
                                                        <i class="fas fa-shopping-cart"></i>
                                                    </button>
                                                @endif

                                            </form>
                                            <a href="{{ route('products.show', $product->id) }}"
                                                class="action-btn"><i class="fas fa-eye"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <div class="product-category">
                                            {{ $product->subcategory->category->name }} -
                                            {{ $product->subcategory->name }}
                                        </div>
                                        <h3 class="product-title">{{ $product->name }}</h3>
                                        <div class="product-rating">
                                            <span
                                                class="stock-status {{ $product->stock > 0 ? 'in-stock' : 'out-of-stock' }}">
                                                <i
                                                    class="fas {{ $product->stock > 0 ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                                                {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                                                ({{ $product->stock }})
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            @if ($product->sale_price && $product->sale_price < $product->price)
                                                <span class="old-price">${{ $product->price }}</span>
                                                <span class="current-price">${{ $product->sale_price }}</span>
                                            @else
                                                <span class="current-price">${{ $product->price }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="pagination-wrapper">
                            {{ $products->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter">
        <div class="container">
            <div class="newsletter-wrapper">
                <div class="newsletter-content">
                    <h2>Subscribe to Our Newsletter</h2>
                    <p>Get exclusive offers, photography tips, and new product announcements.</p>
                </div>
                <form class="newsletter-form">
                    <div class="form-group">
                        <input type="email" placeholder="Your email address" required>
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-top">
                <div class="footer-column">
                    <div class="footer-logo">
                        <h2><i class="fas fa-camera-retro"></i> CameraHub</h2>
                    </div>
                    <p>Your trusted source for professional photography equipment since 2010.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="footer-column">
                    <h3>Shop</h3>
                    <ul class="footer-links">
                        <li><a href="#">Cameras</a></li>
                        <li><a href="#">Lenses</a></li>
                        <li><a href="#">Tripods</a></li>
                        <li><a href="#">Lighting</a></li>
                        <li><a href="#">Accessories</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3>Account</h3>
                    <ul class="footer-links">
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Order History</a></li>
                        <li><a href="#">Wishlist</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Gift Cards</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3>Information</h3>
                    <ul class="footer-links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3>Contact</h3>
                    <ul class="contact-info">
                        <li><i class="fas fa-map-marker-alt"></i> 123 Camera Street, Photo City</li>
                        <li><i class="fas fa-phone"></i> (123) 456-7890</li>
                        <li><i class="fas fa-envelope"></i> info@camerahub.com</li>
                        <li><i class="fas fa-clock"></i> Mon-Fri: 9AM - 6PM</li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="copyright">
                    <p>&copy; {{ date('Y') }} CameraHub. All Rights Reserved.</p>
                </div>
                <div class="payment-methods">
                    <img src="{{ asset('images/payment-methods.png') }}" alt="Payment Methods">
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top"><i class="fas fa-chevron-up"></i></a>
</body>

</html>
