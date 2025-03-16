<form method="POST" action="{{ route('register', ['type' => 'instructor']) }}" enctype="multipart/form-data">
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
                <x-form.input-file name="document" label="Document Education/Certificate(pdf,docx,rtf) (max 10mb)" required />
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
