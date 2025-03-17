<x-layouts.front-user-layout title="Student Profile">
    <div class="wsus__dashboard_contant">
        <div class="wsus__dashboard_contant_top d-flex flex-wrap justify-content-between">
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
                <img src="{{ asset('frontend').'/images/dashboard_profile_img.png' }}" alt="profile" class="img-fluid w-100">
                <label for="profile_photo">
                    <img src="{{ asset('frontend').'/images/dash_camera.png' }}" alt="camera" class="img-fluid w-100">
                </label>
                <input type="file" id="profile_photo" hidden="">
            </div>
            <div class="text">
                <h6>Your avatar</h6>
                <p>PNG or JPG no bigger than 400px wide and tall.</p>
            </div>
        </div>
        <form action="#" class="wsus__dashboard_profile_update">
            <div class="row">
                <div class="col-xl-6">
                    <div class="wsus__dashboard_profile_update_info">
                        <label>First name</label>
                        <input type="text" placeholder="Enter your first name">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="wsus__dashboard_profile_update_info">
                        <label>Last name</label>
                        <input type="text" placeholder="Enter your last name">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="wsus__dashboard_profile_update_info">
                        <label>Phone</label>
                        <input type="text" placeholder="Enter your number">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="wsus__dashboard_profile_update_info">
                        <label>Email</label>
                        <input type="email" placeholder="Enter your mail">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="wsus__dashboard_profile_update_info">
                        <label>Birthday</label>
                        <input type="text" placeholder="Enter birthday date">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="wsus__dashboard_profile_update_info">
                        <label>Zip Code</label>
                        <input type="text" placeholder="Enter zip code ">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="wsus__dashboard_profile_update_info">
                        <label>City</label>
                        <input type="text" placeholder="Enter your city">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="wsus__dashboard_profile_update_info">
                        <label>Country</label>
                        <input type="text" placeholder="Enter your country">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="wsus__dashboard_profile_update_info">
                        <label>Present Address</label>
                        <input type="text" placeholder="Enter your address">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="wsus__dashboard_profile_update_info">
                        <label>Permanent Address</label>
                        <input type="text" placeholder="Enter your address">
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="wsus__dashboard_profile_update_info">
                        <label>About Me</label>
                        <textarea rows="7" placeholder="Your text here"></textarea>
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
