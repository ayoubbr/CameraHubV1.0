<x-app-layout>
    <x-slot name="header">
        <h2 class="page-title">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="main-content">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <x-validation-errors/>
                    <x-success-message />
                    <form method="POST" action="{{ route('profile.update') }}">
                        @method('PUT')
                        @csrf
                        <div class="form-grid">
                            <div class="form-column">
                                <div class="form-group">
                                    <x-label for="name" :value="__('Name')" />
                                    <x-input id="name" class="form-control" type="text" name="name"
                                        value="{{ auth()->user()->name }}" autofocus />
                                </div>
                                <div class="form-group">
                                    <x-label for="email" :value="__('Email')" />
                                    <x-input id="email" class="form-control" type="email" name="email"
                                        value="{{ auth()->user()->email }}" autofocus />
                                </div>
                            </div>
                            <div class="form-column">
                                <div class="form-group">
                                    <x-label for="new_password" :value="__('New password')" />
                                    <x-input id="new_password" class="form-control" type="password" name="password"
                                        autocomplete="new-password" />
                                </div>
                                <div class="form-group">
                                    <x-label for="confirm_password" :value="__('Confirm password')" />
                                    <x-input id="confirm_password" class="form-control" type="password"
                                        name="password_confirmation" autocomplete="confirm-password" />
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <x-button class="btn-primary">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>