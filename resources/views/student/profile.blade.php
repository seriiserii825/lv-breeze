<x-layouts.front-user-layout title="Student Profile">
    <div class="wsus__dashboard_contant">
        <div class="flex-wrap wsus__dashboard_contant_top d-flex justify-content-between">
            <div class="wsus__dashboard_heading">
                <h5>Update Your Information</h5>
                <p>Manage your courses and its update like live, draft and insight.</p>
            </div>
            <div class="wsus__dashboard_profile_delete">
                <a href="#" class="common_btn">Delete Profile</a>
            </div>
        </div>
        <div class="wsus__dashboard_profile wsus__dashboard_profile_avatar">
            <div class="img">
                @if (auth()->user()->image)
                    <img src="{{ auth()->user()->image }}" alt="profile" class="img-fluid w-100">
                @endif
                <label for="profile_photo">
                    <img src="{{ asset('frontend') . '/images/dash_camera.png' }}" alt="camera"
                        class="img-fluid w-100">
                </label>
                <input type="file" name="image" id="profile_photo" hidden="">
            </div>
            <div class="text">
                <h6>Your avatar</h6>
                <p>PNG or JPG no bigger than 400px wide and tall.</p>
            </div>
        </div>
        <form action="{{ route('student.profile.update', auth()->user()->id) }}" method="post" accept-charset="utf-8">
            @csrf
            <div class="row">
                <div class="col-xl-6">
                    <div class="wsus__dashboard_profile_update_info">
                        <x-form.input label="Name" placeholder="Enter your name" name="name"
                            required="{{ true }}" value="{{ auth()->user()->name }}" />
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="wsus__dashboard_profile_update_info">
                        <x-email-component label="Email" placeholder="Enter your email" name="email"
                            required="{{ true }}" value="{{ auth()->user()->email }}" />
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="wsus__dashboard_profile_update_info">
                        <x-form.input label="Headline" placeholder="Enter your headline" name="headline"
                             value="{{ auth()->user()->headline }}" />
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="wsus__dashboard_profile_update_info">
                        <x-form.select label="Gender" name="gender" :options="['male' => 'Male', 'female' => 'Female']"
                            value="{{ auth()->user()->gender ? auth()->user()->gender : 'male' }}" />
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="wsus__dashboard_profile_update_info">
                        <x-form.textarea label="About Me" placeholder="Enter your about me" name="bio"
                             value="{{ auth()->user()->bio }}" />
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="wsus__dashboard_profile_update_info">
                        <x-form.input name="facebook" label="Facebook" placeholder="Enter your facebook link"
                            value="{{ auth()->user()->facebook }}" />
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="wsus__dashboard_profile_update_info">
                        <x-form.input name="twitter" label="Twitter" placeholder="Enter your twitter link"
                            value="{{ auth()->user()->twitter }}" />
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="wsus__dashboard_profile_update_info">
                        <x-form.input name="linkedin" label="Linkedin" placeholder="Enter your linkedin link"
                            value="{{ auth()->user()->linkedin }}" />
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="wsus__dashboard_profile_update_info">
                        <x-form.input name="website" label="Website" placeholder="Enter your website link"
                            value="{{ auth()->user()->website }}" />
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="wsus__dashboard_profile_update_info">
                        <x-form.input name="github" label="Github" placeholder="Enter your github link"
                            value="{{ auth()->user()->github }}" />
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="wsus__dashboard_profile_update_btn">
                        <button type="submit" class="common_btn">Update Profile</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-layouts.front-user-layout>
