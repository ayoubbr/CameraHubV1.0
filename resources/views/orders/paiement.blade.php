{{-- 
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
                    <label for="card_name">Name on Card <span
                            class="required">*</span></label>
                    <input type="text" id="card_name" name="card_name"
                        value="{{ old('card_name') }}">
                    @error('card_name')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="card_number">Card Number <span
                            class="required">*</span></label>
                    <input type="text" id="card_number" name="card_number"
                        placeholder="XXXX XXXX XXXX XXXX"
                        value="{{ old('card_number') }}">
                    @error('card_number')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group half">
                    <label for="card_expiry">Expiration Date <span
                            class="required">*</span></label>
                    <input type="text" id="card_expiry" name="card_expiry"
                        placeholder="MM/YY" value="{{ old('card_expiry') }}">
                    @error('card_expiry')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group half">
                    <label for="card_cvv">CVV <span class="required">*</span></label>
                    <input type="text" id="card_cvv" name="card_cvv"
                        placeholder="123" value="{{ old('card_cvv') }}">
                    @error('card_cvv')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="payment-option">
            <input type="radio" id="payment_paypal" name="payment_method"
                value="paypal" {{ old('payment_method') == 'paypal' ? 'checked' : '' }}>
            <label for="payment_paypal">
                <span>PayPal</span>
                <i class="fab fa-paypal"></i>
            </label>
        </div>
    </div>
</div> --}}
<h1>payment</h1>
