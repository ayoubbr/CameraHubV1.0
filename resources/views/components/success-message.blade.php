@if (session('message'))
    <div class="success-alert">
        <div class="success-alert-icon">
            <span class="success-icon">
                <svg fill="currentColor" viewBox="0 0 20 20" class="success-icon-svg">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
            </span>
        </div>
        <div class="success-alert-content">
            <div class="success-alert-title">
                {{ __('Success') }}
            </div>
            <div class="success-alert-description">
                {{ session('message') }}
            </div>
        </div>
    </div>
@endif