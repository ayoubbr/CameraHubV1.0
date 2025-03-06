<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Checkout - CameraHub">

    <title>CameraHub - Checkout</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/checkout.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Header Section -->
    @include('components.header')

    <div class="container">
        <div class="breadcrumbs">
            <a href="{{ url('/') }}">Home</a>
            <span>/</span>
            <a href="{{ route('products.all') }}">Products</a>
            <span>/</span>
            <a href="{{ route('cart') }}">Shopping Cart</a>
            <span>/</span>
            <span class="current">Checkout</span>
        </div>

        <div class="checkout-page">
            <h1 class="page-title">Checkout</h1>

            @if (session('message'))
                <div class="alert-message success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('message') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert-message error">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ session('error') }}
                </div>
            @endif

            <div class="checkout-content">

                <form action="{{ route('place.order') }}" method="POST" id="checkout-form" class="checkout-form">
                    @csrf
                    <div class="checkout-columns">
                        <div class="checkout-column billing-shipping">
                            <div class="checkout-section">
                                <h3><i class="fas fa-user"></i> Customer Information</h3>
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="first_name">First Name <span class="required">*</span></label>
                                        <input type="text" id="first_name" name="first_name"
                                            value="{{ old('first_name') }}" required>
                                        @error('first_name')
                                            <span class="form-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group half">
                                        <label for="last_name">Last Name <span class="required">*</span></label>
                                        <input type="text" id="last_name" name="last_name"
                                            value="{{ old('last_name') }}" required>
                                        @error('last_name')
                                            <span class="form-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="email">Email Address <span class="required">*</span></label>
                                        <input type="email" id="email" name="email"
                                            value="{{ old('email', Auth::user()->email ?? '') }}" required>
                                        @error('email')
                                            <span class="form-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="neighborhood">Neighborhood Name <span
                                                class="required">*</span></label>
                                        <input type="text" id="neighborhood" name="neighborhood"
                                            value="{{ old('neighborhood') }}" required>
                                        @error('neighborhood')
                                            <span class="form-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="checkout-section">
                                <h3><i class="fas fa-map-marker-alt"></i> Shipping Address</h3>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="street">Street Address <span class="required">*</span></label>
                                        <input type="text" id="street" name="street" value="{{ old('street') }}"
                                            required>
                                        @error('street')
                                            <span class="form-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="form-row">
                                    <div class="form-group">
                                        <label for="address2">Apartment, suite, etc. (optional)</label>
                                        <input type="text" id="address2" name="address2"
                                            value="{{ old('address2') }}">
                                    </div>
                                </div> --}}
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="city">City <span class="required">*</span></label>
                                        <input type="text" id="city" name="city" value="{{ old('city') }}"
                                            required>
                                        @error('city')
                                            <span class="form-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group half">
                                        <label for="region">region/Province <span class="required">*</span></label>
                                        <input type="text" id="region" name="region"
                                            value="{{ old('region') }}" required>
                                        @error('region')
                                            <span class="form-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="zip">Postal/ZIP Code <span class="required">*</span></label>
                                        <input type="text" id="zip" name="zip"
                                            value="{{ old('zip') }}" required>
                                        @error('zip')
                                            <span class="form-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group half">
                                        <label for="country">Country <span class="required">*</span></label>
                                        <select id="country" name="country" required>
                                            <option value="">Select Country</option>
                                            <option value="usa">
                                                United States</option>
                                            <option value="canada">
                                                Canada</option>
                                            <option value="england">
                                                United Kingdom</option>
                                            <option value="austria">
                                                Australia</option>
                                            <!-- Add more countries as needed -->
                                        </select>
                                        @error('country')
                                            <span class="form-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="form-row">
                                    <div class="form-group">
                                        <label for="shipping_notes">Delivery Notes (optional)</label>
                                        <textarea id="shipping_notes" name="shipping_notes" rows="3">{{ old('shipping_notes') }}</textarea>
                                    </div>
                                </div> --}}
                            </div>



                        </div>

                        <div class="checkout-column order-summary">
                            <div class="order-summary-wrapper">
                                <h3>Order Summary</h3>

                                @if (isset($cart) && count($cart) > 0)
                                    @php
                                        $subtotal = 0;
                                    @endphp
                                    <div class="order-items">
                                        @foreach ($cart as $id => $details)
                                            <div class="order-item">
                                                <div class="item-image">
                                                    <img src="{{ $details['image'] ?? asset('images/placeholder.jpg') }}"
                                                        alt="{{ $details['name'] }}">
                                                    <span class="item-quantity">{{ $details['quantity'] ?? 1 }}</span>
                                                </div>
                                                <div class="item-details">
                                                    <h4>{{ $details['name'] }}</h4>
                                                    @if (isset($details['subcategory']))
                                                        <div class="item-category">{{ $details['subcategory'] }}</div>
                                                    @endif
                                                </div>
                                                <div class="item-price">
                                                    @php

                                                        $price = $details['price'];
                                                        $subtotal += $price * ($details['quantity'] ?? 1);
                                                    @endphp
                                                    ${{ number_format($subtotal, 2) }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="coupon-section">
                                        <div class="coupon-input">
                                            <input type="text" name="coupon_code" id="coupon_code"
                                                placeholder="Coupon Code" value="{{ old('coupon_code') }}">
                                            <button type="button" id="apply_coupon"
                                                class="apply-coupon">Apply</button>
                                        </div>
                                        <div id="coupon_message" class="coupon-message"></div>
                                    </div>

                                    <div class="order-totals">
                                        <div class="total-line">
                                            <span>Subtotal</span>
                                            <span id="subtotal-price">${{ number_format($subtotal, 2) }}</span>
                                        </div>
                                        <div class="total-line" id="discount-line" style="display: none;">
                                            <span>Discount</span>
                                            <span id="discount-amount">-$0.00</span>
                                        </div>

                                        <div class="total-line">
                                            <span>Shipping</span>
                                            <span id="shipping-price">
                                                0 $ <span class="free-badge">FREE</span>
                                            </span>
                                        </div>
                                        <div class="total-line grand-total">
                                            <span>Total</span>
                                            <span id="total-price">${{ number_format($subtotal, 2) }}</span>
                                        </div>
                                    </div>

                                    <div class="checkout-actions">
                                        <button type="submit" class="place-order-btn">Place Order</button>
                                        <a href="{{ route('cart') }}" class="return-cart-btn">Return to Cart</a>
                                    </div>

                                    <div class="secure-checkout">
                                        <i class="fas fa-lock"></i> Secure Checkout
                                    </div>
                                @else
                                    <div class="empty-cart-message">
                                        <p>Your cart is empty. Please add products before checkout.</p>
                                        <a href="{{ route('products.all') }}" class="continue-shopping-btn">Browse
                                            Products</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
