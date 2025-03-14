<form method="POST" action="{{ route('register', ['type' => 'instructor']) }}">
    @csrf
    <h2>Sign Up<span>!</span></h2>
    <p class="new_user">Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
    <div class="row">
        <div class="col-xl-12">
            <div class="wsus__login_form_input">
                <x-form.input name="name" label="Name" placeholder="Name" required />
            </div>
        </div>
        <div class="col-xl-12">
            <div class="wsus__login_form_input">
                <x-email-component name="email" label="Email" placeholder="Email" required />
            </div>
        </div>
        <div class="col-xl-12">
            <div class="wsus__login_form_input">
                <label>Document(Education/Certificate)</label>
                <input type="file" name="document" required />
            </div>
            <x-input-error :messages="$errors->get('document')" class="mt-2" />
        </div>
        <div class="col-xl-12">
            <div class="wsus__login_form_input">
                <x-password-component name="password" label="Password" placeholder="Password" required />
            </div>
        </div>
        <div class="col-xl-12">
            <div class="wsus__login_form_input">
                <x-password-component name="password_confirmation" label="Confirm Password" placeholder="Password"
                    required />
            </div>
        </div>
        <div class="col-xl-12">
            <div class="wsus__login_form_input">
                <button type="submit" class="common_btn">Sign Up</button>
            </div>
        </div>
    </div>
</form>
