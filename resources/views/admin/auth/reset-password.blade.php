{{-- <x-guest-layout> --}}
{{--     <form method="POST" action="{{ route('password.store') }}"> --}}
{{--         @csrf --}}
{{--  --}}
{{--         <!-- Password Reset Token --> --}}
{{--         <input type="hidden" name="token" value="{{ $request->route('token') }}"> --}}
{{--  --}}
{{--         <!-- Email Address --> --}}
{{--         <div> --}}
{{--             <x-input-label for="email" :value="__('Email')" /> --}}
{{--             <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" /> --}}
{{--             <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
{{--         </div> --}}
{{--  --}}
{{--         <!-- Password --> --}}
{{--         <div class="mt-4"> --}}
{{--             <x-input-label for="password" :value="__('Password')" /> --}}
{{--             <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" /> --}}
{{--             <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
{{--         </div> --}}
{{--  --}}
{{--         <!-- Confirm Password --> --}}
{{--         <div class="mt-4"> --}}
{{--             <x-input-label for="password_confirmation" :value="__('Confirm Password')" /> --}}
{{--  --}}
{{--             <x-text-input id="password_confirmation" class="block mt-1 w-full" --}}
{{--                                 type="password" --}}
{{--                                 name="password_confirmation" required autocomplete="new-password" /> --}}
{{--  --}}
{{--             <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /> --}}
{{--         </div> --}}
{{--  --}}
{{--         <div class="flex items-center justify-end mt-4"> --}}
{{--             <x-primary-button> --}}
{{--                 {{ __('Reset Password') }} --}}
{{--             </x-primary-button> --}}
{{--         </div> --}}
{{--     </form> --}}
{{-- </x-guest-layout> --}}


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sign in - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <!-- CSS files -->
    <link href="{{ asset('admin/assets/dist/css/tabler.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/dist/css/tabler-flags.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/dist/css/tabler-payments.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/dist/css/tabler-vendors.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/dist/css/demo.min.css?1692870487') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>
<body class=" d-flex flex-column">
    <script src="./dist/js/demo-theme.min.js?1692870487"></script>
    <div class="page page-center">
        <div class="container py-4 container-tight">
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="mb-4 text-center h2">Reset password</h2>
                    <form action="{{ route('admin.password.store') }}" method="POST" autocomplete="off" novalidate>
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="mb-3">
                            <x-email-component name="email" label="Email" placeholder="Your email" required="true"
                                error_name="email" />
                        </div>
                        <div class="mb-2">
                            <x-password-component name="password" label="Password" placeholder="Your password"
                                required="true" />
                        </div>
                        <div class="mb-2">
                            <x-password-component name="password_confirmation" label="Confirm password" placeholder="Confirm password"
                                required="true" />
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('admin/assets/dist/js/tabler.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('admin/assets/dist/js/demo.min.js?1692870487') }}" defer></script>
</body>
</html>

