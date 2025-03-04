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
                            {{-- <span class="cart-count">{{ $cart_count }}</span> --}}
                        </a>
                    </div>

                    <button class="mobile-menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

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
                {{-- {{ route('place.order') }}/ --}}
                <form action="#" method="POST" id="checkout-form" class="checkout-form">
                    @csrf
                    <div class="checkout-columns">
                        <div class="checkout-column billing-shipping">
                            <div class="checkout-section">
                                <h3><i class="fas fa-user"></i> Customer Information</h3>
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="first_name">First Name <span class="required">*</span></label>
                                        <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                                        @error('first_name')
                                            <span class="form-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group half">
                                        <label for="last_name">Last Name <span class="required">*</span></label>
                                        <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                                        @error('last_name')
                                            <span class="form-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="email">Email Address <span class="required">*</span></label>
                                        <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email ?? '') }}" required>
                                        @error('email')
                                            <span class="form-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="phone">Phone Number <span class="required">*</span></label>
                                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required>
                                        @error('phone')
                                            <span class="form-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="checkout-section">
                                <h3><i class="fas fa-map-marker-alt"></i> Shipping Address</h3>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="address">Street Address <span class="required">*</span></label>
                                        <input type="text" id="address" name="address" value="{{ old('address') }}" required>
                                        @error('address')
                                            <span class="form-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="address2">Apartment, suite, etc. (optional)</label>
                                        <input type="text" id="address2" name="address2" value="{{ old('address2') }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="city">City <span class="required">*</span></label>
                                        <input type="text" id="city" name="city" value="{{ old('city') }}" required>
                                        @error('city')
                                            <span class="form-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group half">
                                        <label for="state">State/Province <span class="required">*</span></label>
                                        <input type="text" id="state" name="state" value="{{ old('state') }}" required>
                                        @error('state')
                                            <span class="form-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="zip">Postal/ZIP Code <span class="required">*</span></label>
                                        <input type="text" id="zip" name="zip" value="{{ old('zip') }}" required>
                                        @error('zip')
                                            <span class="form-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group half">
                                        <label for="country">Country <span class="required">*</span></label>
                                        <select id="country" name="country" required>
                                            <option value="">Select Country</option>
                                            <option value="US" {{ old('country') == 'US' ? 'selected' : '' }}>United States</option>
                                            <option value="CA" {{ old('country') == 'CA' ? 'selected' : '' }}>Canada</option>
                                            <option value="GB" {{ old('country') == 'GB' ? 'selected' : '' }}>United Kingdom</option>
                                            <option value="AU" {{ old('country') == 'AU' ? 'selected' : '' }}>Australia</option>
                                            <!-- Add more countries as needed -->
                                        </select>
                                        @error('country')
                                            <span class="form-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="shipping_notes">Delivery Notes (optional)</label>
                                        <textarea id="shipping_notes" name="shipping_notes" rows="3">{{ old('shipping_notes') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="checkout-section">
                                <h3><i class="fas fa-truck"></i> Shipping Method</h3>
                                <div class="shipping-options">
                                    @php
                                        $subtotal = isset($subtotal) ? $subtotal : 0;
                                        foreach (isset($cart) ? $cart : [] as $details) {
                                            $price = isset($details['sale_price']) && $details['sale_price'] < $details['price']
                                                ? $details['sale_price']
                                                : $details['price'];
                                            $subtotal += $price * ($details['quantity'] ?? 1);
                                        }
                                        
                                        $freeShippingEligible = $subtotal >= 100;
                                    @endphp
                                
                                    <div class="shipping-option">
                                        <input type="radio" id="shipping_standard" name="shipping_method" value="standard" 
                                            {{ old('shipping_method', 'standard') == 'standard' ? 'checked' : '' }}>
                                        <label for="shipping_standard">
                                            <span class="shipping-name">Standard Shipping (3-5 business days)</span>
                                            <span class="shipping-price">
                                                @if ($freeShippingEligible)
                                                    <span class="free-badge">FREE</span>
                                                @else
                                                    $10.00
                                                @endif
                                            </span>
                                        </label>
                                    </div>
                                    
                                    <div class="shipping-option">
                                        <input type="radio" id="shipping_express" name="shipping_method" value="express"
                                            {{ old('shipping_method') == 'express' ? 'checked' : '' }}>
                                        <label for="shipping_express">
                                            <span class="shipping-name">Express Shipping (1-2 business days)</span>
                                            <span class="shipping-price">$25.00</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="checkout-section">
                                <h3><i class="fas fa-credit-card"></i> Payment Information</h3>
                                <div class="payment-methods">
                                    <div class="payment-option">
                                        <input type="radio" id="payment_card" name="payment_method" value="card" 
                                            {{ old('payment_method', 'card') == 'card' ? 'checked' : '' }} required>
                                        <label for="payment_card">
                                            <span>Credit / Debit Card</span>
                                            <div class="card-icons">
                                                <i class="fab fa-cc-visa"></i>
                                                <i class="fab fa-cc-mastercard"></i>
                                                <i class="fab fa-cc-amex"></i>
                                                <i class="fab fa-cc-discover"></i>
                                            </div>
                                        </label>
                                    </div>
                                    
                                    <div class="card-details" id="card_details">
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="card_name">Name on Card <span class="required">*</span></label>
                                                <input type="text" id="card_name" name="card_name" value="{{ old('card_name') }}">
                                                @error('card_name')
                                                    <span class="form-error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="card_number">Card Number <span class="required">*</span></label>
                                                <input type="text" id="card_number" name="card_number" placeholder="XXXX XXXX XXXX XXXX" value="{{ old('card_number') }}">
                                                @error('card_number')
                                                    <span class="form-error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group half">
                                                <label for="card_expiry">Expiration Date <span class="required">*</span></label>
                                                <input type="text" id="card_expiry" name="card_expiry" placeholder="MM/YY" value="{{ old('card_expiry') }}">
                                                @error('card_expiry')
                                                    <span class="form-error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group half">
                                                <label for="card_cvv">CVV <span class="required">*</span></label>
                                                <input type="text" id="card_cvv" name="card_cvv" placeholder="123" value="{{ old('card_cvv') }}">
                                                @error('card_cvv')
                                                    <span class="form-error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="payment-option">
                                        <input type="radio" id="payment_paypal" name="payment_method" value="paypal"
                                            {{ old('payment_method') == 'paypal' ? 'checked' : '' }}>
                                        <label for="payment_paypal">
                                            <span>PayPal</span>
                                            <i class="fab fa-paypal"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="checkout-column order-summary">
                            <div class="order-summary-wrapper">
                                <h3>Order Summary</h3>
                                
                                @if (isset($cart) && count($cart) > 0)
                                    <div class="order-items">
                                        @foreach ($cart as $id => $details)
                                            <div class="order-item">
                                                <div class="item-image">
                                                    <img src="{{ $details['image'] ?? asset('images/placeholder.jpg') }}" alt="{{ $details['name'] }}">
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
                                                        $price = isset($details['sale_price']) && $details['sale_price'] < $details['price']
                                                            ? $details['sale_price']
                                                            : $details['price'];
                                                        $subtotal = $price * ($details['quantity'] ?? 1);
                                                    @endphp
                                                    ${{ number_format($subtotal, 2) }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="coupon-section">
                                        <div class="coupon-input">
                                            <input type="text" name="coupon_code" id="coupon_code" placeholder="Coupon Code" value="{{ old('coupon_code') }}">
                                            <button type="button" id="apply_coupon" class="apply-coupon">Apply</button>
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
                                                @php
                                                    $standardShipping = $freeShippingEligible ? 0 : 10;
                                                @endphp
                                                $<span id="shipping-amount">{{ number_format($standardShipping, 2) }}</span>
                                                @if ($freeShippingEligible && $standardShipping == 0)
                                                    <span class="free-badge">FREE</span>
                                                @endif
                                            </span>
                                        </div>

                                        <div class="total-line">
                                            <span>Tax</span>
                                            <span id="tax-price">
                                                @php
                                                    $tax = $subtotal * 0.08; // Assuming 8% tax rate
                                                @endphp
                                                ${{ number_format($tax, 2) }}
                                            </span>
                                        </div>

                                        <div class="total-line grand-total">
                                            <span>Total</span>
                                            <span id="total-price">${{ number_format($subtotal + $standardShipping + $tax, 2) }}</span>
                                        </div>
                                    </div>

                                    <div class="checkout-actions">
                                        <button type="submit" class="place-order-btn">Place Order</button>
                                        <a href="{{ route('cart.view') }}" class="return-cart-btn">Return to Cart</a>
                                    </div>

                                    <div class="secure-checkout">
                                        <i class="fas fa-lock"></i> Secure Checkout
                                    </div>
                                @else
                                    <div class="empty-cart-message">
                                        <p>Your cart is empty. Please add products before checkout.</p>
                                        <a href="{{ route('products.all') }}" class="continue-shopping-btn">Browse Products</a>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Payment method toggle
            const paymentCard = document.getElementById('payment_card');
            const paymentPaypal = document.getElementById('payment_paypal');
            const cardDetails = document.getElementById('card_details');
            
            paymentCard.addEventListener('change', function() {
                if(this.checked) {
                    cardDetails.style.display = 'block';
                }
            });
            
            paymentPaypal.addEventListener('change', function() {
                if(this.checked) {
                    cardDetails.style.display = 'none';
                }
            });
            
            // Initialize display based on default selection
            if(paymentCard.checked) {
                cardDetails.style.display = 'block';
            } else {
                cardDetails.style.display = 'none';
            }
            
            // Shipping method calculation
            const shippingStandard = document.getElementById('shipping_standard');
            const shippingExpress = document.getElementById('shipping_express');
            const shippingAmount = document.getElementById('shipping-amount');
            const totalPrice = document.getElementById('total-price');
            
            function updateTotal() {
                const subtotal = parseFloat({{ $subtotal ?? 0 }});
                const tax = subtotal * 0.08; // 8% tax
                let shipping = 0;
                
                if(shippingStandard.checked) {
                    shipping = {{ $freeShippingEligible ?? false }} ? 0 : 10;
                } else if(shippingExpress.checked) {
                    shipping = 25;
                }
                
                shippingAmount.textContent = shipping.toFixed(2);
                totalPrice.textContent = '$' + (subtotal + tax + shipping).toFixed(2);
            }
            
            shippingStandard.addEventListener('change', updateTotal);
            shippingExpress.addEventListener('change', updateTotal);
            
            // Form validation
            const checkoutForm = document.getElementById('checkout-form');
            
            checkoutForm.addEventListener('submit', function(e) {
                // Basic validation could be added here
                // This is just a placeholder for your backend validation
            });
            
            // Apply coupon button
            const applyCouponBtn = document.getElementById('apply_coupon');
            const couponField = document.getElementById('coupon_code');
            const couponMessage = document.getElementById('coupon_message');
            const discountLine = document.getElementById('discount-line');
            const discountAmount = document.getElementById('discount-amount');
            
            applyCouponBtn.addEventListener('click', function() {
                const couponCode = couponField.value.trim();
                
                if(couponCode === '') {
                    couponMessage.textContent = 'Please enter a coupon code';
                    couponMessage.className = 'coupon-message error';
                    return;
                }
                
                // This would be an AJAX call to validate the coupon in a real application
                // For this example, we'll just simulate a valid coupon "CAMERA20" for 20% off
                
                if(couponCode.toUpperCase() === 'CAMERA20') {
                    const subtotal = parseFloat({{ $subtotal ?? 0 }});
                    const discount = subtotal * 0.2; // 20% discount
                    
                    discountAmount.textContent = '-$' + discount.toFixed(2);
                    discountLine.style.display = 'flex';
                    
                    // Update total with discount
                    const tax = subtotal * 0.08; // 8% tax
                    let shipping = 0;
                    
                    if(shippingStandard.checked) {
                        shipping = {{ $freeShippingEligible ?? false }} ? 0 : 10;
                    } else if(shippingExpress.checked) {
                        shipping = 25;
                    }
                    
                    totalPrice.textContent = '$' + (subtotal - discount + tax + shipping).toFixed(2);
                    
                    couponMessage.textContent = 'Coupon applied successfully!';
                    couponMessage.className = 'coupon-message success';
                } else {
                    couponMessage.textContent = 'Invalid coupon code';
                    couponMessage.className = 'coupon-message error';
                    discountLine.style.display = 'none';
                    updateTotal(); // Reset total
                }
            });
        });
    </script>
</body>

</html>