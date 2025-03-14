<form method="POST" action="{{ route('register', ['type' => 'student']) }}">
    @csrf
    <h2>Sign Up<span>!</span></h2>
    <p class="new_user">Already have an account? <a href="sign_in.html">Sign In</a></p>
    <div class="row">
        <div class="col-xl-12">
            <div class="wsus__login_form_input">
                <x-form.input name="name" label="Name" placeholder="Name" required />
            </div>
        </div>
        <div class="col-xl-12">
            <div class="wsus__login_form_input">
                <x-email-component name="email" label="Email" placeholder="Email"
                    required />
            </div>
        </div>
        <div class="col-xl-12">
            <div class="wsus__login_form_input">
                <x-password-component name="password" label="Password"
                    placeholder="Password" required />
            </div>
        </div>
        <div class="col-xl-12">
            <div class="wsus__login_form_input">
                <x-password-component name="password_confirmation" label="Confirm Password"
                    placeholder="Password" required />
            </div>
        </div>
        <div class="col-xl-12">
            <div class="wsus__login_form_input">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value=""
                        id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault"> By clicking
                        Create account, I agree that I have read and accepted the <a
                            href="#">Terms of Use</a> and <a href="#">Privacy
                            Policy.</a> </label>
                </div>
                <button type="submit" class="common_btn">Sign Up</button>
            </div>
        </div>
    </div>
</form>
