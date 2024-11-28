@extends('layouts.admin.app')

@section('title', 'Ubah Password')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl shadow-lg">
        <!-- Header -->
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Ubah Password
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Pastikan password yang Anda masukkan aman dan mudah diingat.
            </p>
        </div>

        <!-- Success Message -->
        @if (session('status'))
            <div class="bg-green-50 border-l-4 border-green-400 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle text-green-400"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700">
                            {{ session('status') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Form -->
        <form class="mt-8 space-y-6" action="{{ route('password.update') }}" method="POST" id="passwordForm">
            @csrf

            <!-- Current Password -->
            <div class="relative">
                <label for="current_password" class="block text-sm font-medium text-gray-700">
                    Password Saat Ini
                </label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input id="current_password" name="current_password" type="password"
                           class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pr-10 sm:text-sm border-gray-300 rounded-md"
                           required>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <button type="button" class="toggle-password text-gray-400 hover:text-gray-600">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- New Password -->
            <div class="relative">
                <label for="new_password" class="block text-sm font-medium text-gray-700">
                    Password Baru
                </label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input id="new_password" name="new_password" type="password"
                           class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pr-10 sm:text-sm border-gray-300 rounded-md"
                           required>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <button type="button" class="toggle-password text-gray-400 hover:text-gray-600">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Password Strength Indicator -->
                <div class="mt-2">
                    <div class="h-2 w-full bg-gray-200 rounded-full">
                        <div id="password-strength" class="h-2 rounded-full transition-all duration-300"></div>
                    </div>
                    <p id="password-strength-text" class="mt-1 text-sm text-gray-500"></p>
                </div>
            </div>

            <!-- Confirm New Password -->
            <div class="relative">
                <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">
                    Konfirmasi Password Baru
                </label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input id="new_password_confirmation" name="new_password_confirmation" type="password"
                           class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pr-10 sm:text-sm border-gray-300 rounded-md"
                           required>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <button type="button" class="toggle-password text-gray-400 hover:text-gray-600">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                <p id="password-match" class="mt-1 text-sm hidden"></p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-400 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle text-red-400"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700">
                                {{ $errors->first() }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Submit Button -->
            <div>
                <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fas fa-lock"></i>
                    </span>
                    Update Password
                </button>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
    // Toggle password visibility
    $('.toggle-password').click(function() {
        const input = $(this).parent().parent().find('input');
        const icon = $(this).find('i');

        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            input.attr('type', 'password');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });

    // Password strength checker
    $('#new_password').on('input', function() {
        const password = $(this).val();
        let strength = 0;
        let strengthText = '';
        let strengthColor = '';

        // Check length
        if (password.length >= 8) strength += 25;
        // Check lowercase
        if (password.match(/[a-z]/)) strength += 25;
        // Check uppercase
        if (password.match(/[A-Z]/)) strength += 25;
        // Check numbers/special chars
        if (password.match(/[0-9]/) || password.match(/[^A-Za-z0-9]/)) strength += 25;

        if (strength <= 25) {
            strengthText = 'Weak';
            strengthColor = 'bg-red-500';
        } else if (strength <= 50) {
            strengthText = 'Fair';
            strengthColor = 'bg-yellow-500';
        } else if (strength <= 75) {
            strengthText = 'Good';
            strengthColor = 'bg-blue-500';
        } else {
            strengthText = 'Strong';
            strengthColor = 'bg-green-500';
        }

        $('#password-strength')
            .removeClass('bg-red-500 bg-yellow-500 bg-blue-500 bg-green-500')
            .addClass(strengthColor)
            .css('width', strength + '%');
        $('#password-strength-text').text(strengthText);
    });

    // Password match checker
    $('#new_password_confirmation').on('input', function() {
        const confirmPassword = $(this).val();
        const password = $('#new_password').val();
        const matchText = $('#password-match');

        if (confirmPassword === '') {
            matchText.addClass('hidden');
        } else if (confirmPassword === password) {
            matchText
                .removeClass('hidden text-red-600')
                .addClass('text-green-600')
                .text('Passwords match');
        } else {
            matchText
                .removeClass('hidden text-green-600')
                .addClass('text-red-600')
                .text('Passwords do not match');
        }
    });

    // Form validation before submit
    $('#passwordForm').on('submit', function(e) {
        const newPassword = $('#new_password').val();
        const confirmPassword = $('#new_password_confirmation').val();

        if (newPassword !== confirmPassword) {
            e.preventDefault();
            $('#alert-container').html(`
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> The passwords do not match.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `);
            return false;
        }

        if (newPassword.length < 6) {
            e.preventDefault();
            $('#alert-container').html(`
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Password harus lebih dari 6 karakter.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `);
            return false;
        }
    });
});
</script>

@endsection
