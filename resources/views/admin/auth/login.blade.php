<x-layouts.admin-empty-layout>
    <div class="page page-center">
        <div class="container py-4 container-tight">
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="mb-4 text-center h2">Login to your account</h2>
                    <form action="{{ route('admin.login.store') }}" method="POST" autocomplete="off" novalidate>
                        @csrf
                        <div class="mb-3">
                            <x-email-component name="email" label="Email" placeholder="Your email" required="true"
                                error_name="email" />
                        </div>
                        <div class="mb-2">
                            <x-password-component name="password" label="Password" placeholder="Your password"
                                required="true" error_name="password" />
                        </div>
                        <label class="form-label">
                            <span class="form-label-description">
                                <a href="{{ route('admin.password.request') }}">I forgot password</a>
                            </span>
                        </label>
                        <div class="mb-2">
                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" />
                                <span class="form-check-label">Remember me on this device</span>
                            </label>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin-empty-layout>
