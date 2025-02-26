{{-- @if (Route::has('login'))
            <div class="fixed top-0 right-0 p-6 sm-block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark-text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark-text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-sm text-gray-700 dark-text-gray-500 underline ml-4">Register</a>
                    @endif
                @endauth
            </div>
        @endif --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Professional cameras and photography equipment">

    <title>CameraHub - Professional Photography Equipment</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/camera-store.css') }}" rel="stylesheet">
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
                        <li><a href="#" class="active">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">Brands</a></li>
                        <li><a href="#">Lenses</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </nav>

                <div class="header-actions">
                    <div class="search-form">
                        <form action="#" method="GET">
                            <input type="text" placeholder="Search products..." name="search">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>

                    <div class="user-actions">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="account-link"><i class="fas fa-user"></i></a>
                            @else
                                <a href="{{ route('login') }}" class="account-link"><i class="fas fa-sign-in-alt"></i></a>
                            @endauth
                        @endif

                        <a href="#" class="cart-link">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="cart-count">0</span>
                        </a>
                    </div>

                    <button class="mobile-menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h2>Professional Cameras for Every Photographer</h2>
                <p>Discover the perfect equipment to capture your vision with unparalleled clarity and precision.</p>
                <div class="hero-buttons">
                    <a href="#featured" class="btn btn-primary">Shop Now</a>
                    <a href="#" class="btn btn-outline">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories-section">
        <div class="container">
            <div class="section-header">
                <h2>Browse Categories</h2>
                <p>Find exactly what you need for your next shoot</p>
            </div>

            <div class="categories-grid">
                <a href="#" class="category-card">
                    <div class="category-icon"><i class="fas fa-camera"></i></div>
                    <h3>DSLR Cameras</h3>
                </a>

                <a href="#" class="category-card">
                    <div class="category-icon"><i class="fas fa-video"></i></div>
                    <h3>Video Cameras</h3>
                </a>

                <a href="#" class="category-card">
                    <div class="category-icon"><i class="fas fa-solar-panel"></i></div>
                    <h3>Mirrorless</h3>
                </a>

                <a href="#" class="category-card">
                    <div class="category-icon"><i class="fas fa-circle"></i></div>
                    <h3>Lenses</h3>
                </a>

                <a href="#" class="category-card">
                    <div class="category-icon"><i class="fas fa-lightbulb"></i></div>
                    <h3>Lighting</h3>
                </a>

                <a href="#" class="category-card">
                    <div class="category-icon"><i class="fas fa-grip-lines"></i></div>
                    <h3>Tripods</h3>
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section id="featured" class="featured-products">
        <div class="container">
            <div class="section-header">
                <h2>Featured Products</h2>
                <p>Our best-selling professional cameras</p>
            </div>

            <div class="products-grid">
                @for ($i = 1; $i <= 4; $i++)
                    <div class="product-card">
                        <div class="product-badge">New</div>
                        <div class="product-image">
                            <img src="https://images.pexels.com/photos/212372/pexels-photo-212372.jpeg?cs=srgb&dl=pexels-asphotograpy-212372.jpg&fm=jpg"
                                alt="Professional Camera {{ $i }}">
                            <div class="product-actions">
                                <button class="action-btn"><i class="fas fa-heart"></i></button>
                                <button class="action-btn"><i class="fas fa-shopping-cart"></i></button>
                                <button class="action-btn"><i class="fas fa-eye"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-category">Professional</div>
                            <h3 class="product-title">ProMaster X{{ $i }}00 Digital Camera</h3>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>({{ rand(25, 120) }})</span>
                            </div>
                            <div class="product-price">
                                <span class="current-price">${{ rand(799, 2499) }}.99</span>
                                @if (rand(0, 1))
                                    <span class="old-price">${{ rand(999, 2699) }}.99</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <div class="view-all">
                <a href="#" class="btn btn-outline">View All Products</a>
            </div>
        </div>
    </section>

    <!-- Brand Banner -->
    <section class="brand-banner">
        <div class="container">
            <div class="brands-wrapper">
                <div class="brand">
                    <img src="https://cdn4.iconfinder.com/data/icons/flat-brand-logo-2/512/canon-512.png"
                        width="100px" alt="Canon">
                </div>
                <div class="brand">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Nikon_Logo.svg/1200px-Nikon_Logo.svg.png"
                        width="100px" alt="Nikon">
                </div>
                <div class="brand">
                    <img src="https://www.avc-group.com/assets/manufacturers/Sony/Sony-Logo.png" width="100px"
                        alt="Sony">
                </div>
                <div class="brand">
                    <img src="https://images.seeklogo.com/logo-png/5/1/fujifilm-new-logo-png_seeklogo-58165.png?v=1956249132038839752"
                        width="100px" alt="Fujifilm">
                </div>
                <div class="brand">
                    <img src="https://cdn.freebiesupply.com/logos/large/2x/panasonic-logo-png-transparent.png"
                        width="100px" alt="Panasonic">
                </div>
            </div>
        </div>
    </section>

    <!-- Special Offer -->
    <section class="special-offer">
        <div class="container">
            <div class="offer-content">
                <div class="offer-text">
                    <span class="offer-label">Special Deal</span>
                    <h2>Professional Photography Bundle</h2>
                    <p>Get our premium camera with 3 lenses, tripod, and carrying case.</p>
                    <ul class="offer-features">
                        <li><i class="fas fa-check"></i> 45.7MP Full-Frame Sensor</li>
                        <li><i class="fas fa-check"></i> 4K Ultra HD Video</li>
                        <li><i class="fas fa-check"></i> 2-Year Extended Warranty</li>
                        <li><i class="fas fa-check"></i> Free Photography Course</li>
                    </ul>
                    <div class="price-box">
                        <div class="price">
                            <span class="current">$2,399</span>
                            <span class="old">$3,299</span>
                        </div>
                        <div class="timer">
                            <div class="time-unit">
                                <span class="number">2</span>
                                <span class="label">Days</span>
                            </div>
                            <div class="time-unit">
                                <span class="number">08</span>
                                <span class="label">Hours</span>
                            </div>
                            <div class="time-unit">
                                <span class="number">43</span>
                                <span class="label">Mins</span>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary">Shop Now</a>
                </div>
                <div class="offer-image">
                    <img src="https://filmcamerastore.co.uk/cdn/shop/files/zenit-122-50th-anniversary-kmz-special-edition-35mm-film-camera-with-58mm-helios-f1-8-lens--3.png?v=1689277143&width=1406"
                        alt="Special Camera Offer">
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <h2>What Our Customers Say</h2>
                <p>Real reviews from professional photographers</p>
            </div>

            <div class="testimonials-slider">
                <div class="testimonial">
                    <div class="testimonial-content">
                        <p>"The ProMaster X800 completely changed my photography game. The image quality is outstanding,
                            and the build quality is exceptional."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="https://www.shutterstock.com/image-photo/handsome-happy-african-american-bearded-600nw-2460702995.jpg"
                                alt="User Avatar">
                        </div>
                        <div class="author-info">
                            <h4>Michael Roberts</h4>
                            <span>Wildlife Photographer</span>
                        </div>
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>

                <div class="testimonial">
                    <div class="testimonial-content">
                        <p>"The customer service at CameraHub is exceptional. They helped me find the perfect setup for
                            my studio and offered great advice."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="https://www.shutterstock.com/image-photo/handsome-happy-african-american-bearded-600nw-2460702995.jpg"
                                alt="User Avatar">
                        </div>
                        <div class="author-info">
                            <h4>Samantha Lee</h4>
                            <span>Portrait Photographer</span>
                        </div>
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="testimonial-dots">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
    </section>

    <!-- Blog Posts -->
    <section class="blog-section">
        <div class="container">
            <div class="section-header">
                <h2>Photography Tips & News</h2>
                <p>Learn from experts and stay updated with the latest trends</p>
            </div>

            <div class="blog-grid">
                <article class="blog-card">
                    <div class="blog-image">
                        <img src="https://d3c0aoh0dus5lw.cloudfront.net/WP/wp-content/uploads/2017/11/cjasonbradley_170902_26266-864x577.jpg"
                            alt="Photography Tips">
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span><i class="far fa-calendar"></i> Feb 20, 2025</span>
                            <span><i class="far fa-user"></i> Admin</span>
                        </div>
                        <h3><a href="#">10 Essential Camera Settings for Night Photography</a></h3>
                        <p>Learn how to capture stunning night scenes with the right camera settings and equipment.</p>
                        <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="blog-card">
                    <div class="blog-image">
                        <img src="https://media.greatbigphotographyworld.com/wp-content/uploads/2022/04/photographer-holding-a-nikon-camera.jpg"
                            alt="Photography Tips">
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span><i class="far fa-calendar"></i> Feb 18, 2025</span>
                            <span><i class="far fa-user"></i> Admin</span>
                        </div>
                        <h3><a href="#">Comparison: Top 5 Professional Cameras of 2025</a></h3>
                        <p>We compare the latest professional cameras to help you find the perfect tool for your
                            photography needs.</p>
                        <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="blog-card">
                    <div class="blog-image">
                        <img src="https://cdn.shopify.com/s/files/1/0070/7032/files/photographer.jpg?v=1710541843"
                            alt="Photography Tips">
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span><i class="far fa-calendar"></i> Feb 15, 2025</span>
                            <span><i class="far fa-user"></i> Admin</span>
                        </div>
                        <h3><a href="#">Essential Lens Guide for Portrait Photography</a></h3>
                        <p>Discover which lenses will help you capture stunning portraits with beautiful bokeh effects.
                        </p>
                        <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
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

    <!-- JavaScript -->
    <script src="{{ asset('js/camera-store.js') }}"></script>
</body>

</html>
