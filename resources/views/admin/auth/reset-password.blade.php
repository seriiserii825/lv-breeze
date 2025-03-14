<x-layouts.admin-empty-layout>
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
                            <x-password-component name="password_confirmation" label="Confirm password"
                                placeholder="Confirm password" required="true" />
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin-empty-layout>
