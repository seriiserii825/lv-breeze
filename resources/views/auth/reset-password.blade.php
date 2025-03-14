{{--  --}}
{{--         <!-- Email Address --> --}}
{{--         <div> --}}
{{--             <x-input-label for="email" :value="__('Email')" /> --}}
{{--             <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" /> --}}
{{--             <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
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

<x-layouts.empty-layout>
    <section class="wsus__sign_in">
        <div class="row align-items-center">
            <div class="col-xxl-5 col-xl-6 col-lg-6 wow fadeInLeft">
                <div class="wsus__sign_img">
                    <img src="{{ asset('frontend/images/login_img_1.jpg') }}" alt="login" class="img-fluid">
                    <a href="index.html">
                        <img src="{{ asset('frontend/images/logo.png') }}" alt="EduCore" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-9 m-auto wow fadeInRight">
                <div class="wsus__sign_form_area">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <form method="POST" action="{{ route('password.store') }}">
                                @csrf
                                <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <h2>Reset password</h2>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <x-email-component name="email" label="Email" placeholder="Email"
                                                                                          value="{{ $request->email }}"
                                                :required="true" />
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <x-password-component name="password" label="Password"
                                                placeholder="Password" :required="true" />
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <x-password-component name="password_confirmation" label="Confirm Password"
                                                placeholder="Confirm Password" :required="true" />
                                        </div>
                                    </div>
                                    <div class="col-xl-12 mb-3">
                                        <div class="wsus__login_form_input">
                                            <button type="submit" class="common_btn">Sign In</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.empty-layout>
