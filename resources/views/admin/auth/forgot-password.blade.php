<x-layouts.admin-empty-layout>
    <div class="page page-center">
        <div class="container py-4 container-tight">
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <div class="card card-md">
                <div class="card-body">
                    <p class="text-sm">Forgot your password? No problem. Just let us know your email address and we will
                        email you a password reset link that will allow you to choose a new one.</p>
                    <form action="{{ route('admin.password.email') }}" method="POST" autocomplete="off" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" :value="old('email')" required
                                placeholder="your@email.com" autocomplete="off">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Email Password Reset Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin-empty-layout>
