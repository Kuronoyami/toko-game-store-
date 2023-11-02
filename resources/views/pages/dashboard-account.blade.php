@extends('layouts.dashboard')

@section('title')
    Account Settings
@endsection

@section('content')
<br>
<br>
    <!-- section content-->
   <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">My Account</h2>
                <p class="dashboard-subtitle">
                  Update your current profile
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="{{ route('dashboard-settings-redirect','dashboard-settings-account') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="card">
                        <div class="card-body">
                          <div class="row mb-2">
                           <div class="col-md-3" style="display:flex; justify-content: center; align-items: center;">
                            {{-- Col Photo Profile --}}
                            <div class="col-md-12">
                              <div class="profile-pic-wrapper">
                              <div class="pic-holder">
                                <input type="hidden" name="oldImage" value="{{ $user->img_profile }}">
                                @if ($user->img_profile)
                                    <img id="profilePic" class="pic" src="{{ asset('storage/' . Auth::user()->img_profile) }}">
                                @else
                                    <img id="profilePic" class="pic" src="{{ asset('images/bgemptyprofile.png') }}">
                                @endif
                                <input class="uploadProfileInput" type="file" name="img_profile" id="newProfilePhoto" accept="image/*" style="opacity: 0;" />
                                <label for="newProfilePhoto" class="upload-file-block">
                                  <div class="text-center">
                                    <div class="mb-2">
                                      <i class="fa fa-camera fa-2x"></i>
                                    </div>
                                    <div class="text-uppercase">
                                      Update <br /> Profile Photo
                                    </div>
                                  </div>
                                </label>

                              </div>

                              <p class="text-info text-center medium">Upload Your Photo Profile</p>
                            </div>

                            </div>
                           </div>

                           <div class="col-md-9">
                            {{-- Col Form Name e.g --}}
                               <div class="col-md-12">
                              <div class="form-group">
                                <label for="name">Your Name</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="name"
                                  aria-describedby="emailHelp"
                                  name="name"
                                  value="{{ $user->name }}"
                                />
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="email">Your Email</label>
                                <input
                                  type="email"
                                  class="form-control"
                                  id="email"
                                  aria-describedby="emailHelp"
                                  name="email"
                                  value="{{ $user->email }}"
                                />
                              </div>
                            </div>
                            
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="mobile"
                                  name="phone_number"
                                  value="{{ $user->phone_number }}"
                                />
                              </div>
                            </div>
                           </div>
                         

                          </div>
                          <div class="row">
                            <div class="col text-right">
                              <button
                                type="submit"
                                class="btn btn-primary px-5"
                              >
                                Save Now
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
@endsection

@push('addon-script')
<script>
  document.querySelector(".uploadProfileInput").addEventListener("change", function (event) {
    var triggerInput = event.target;
    var holder = triggerInput.closest(".pic-holder");
    var currentImg = holder.querySelector(".pic").src;
    var file = triggerInput.files[0];

    if (file && /^image/.test(file.type)) {
      var reader = new FileReader();

      reader.onload = function () {
        holder.querySelector(".pic").src = this.result;
      };

      reader.readAsDataURL(file);
    } else {
      // Tampilkan pesan kesalahan jika bukan gambar
      alert("Please choose a valid image.");
      triggerInput.value = "";
    }
  });
</script>

{{-- <script>
  document.addEventListener("change", function (event) {
  if (event.target.classList.contains("uploadProfileInput")) {
    var triggerInput = event.target;
    var currentImg = triggerInput.closest(".pic-holder").querySelector(".pic")
      .src;
    var holder = triggerInput.closest(".pic-holder");
    var wrapper = triggerInput.closest(".profile-pic-wrapper");

    var alerts = wrapper.querySelectorAll('[role="alert"]');
    alerts.forEach(function (alert) {
      alert.remove();
    });

    triggerInput.blur();
    var files = triggerInput.files || [];
    if (!files.length || !window.FileReader) {
      return;
    }

    if (/^image/.test(files[0].type)) {
      var reader = new FileReader();
      reader.readAsDataURL(files[0]);

      reader.onloadend = function () {
        holder.classList.add("uploadInProgress");
        holder.querySelector(".pic").src = this.result;

        var loader = document.createElement("div");
        loader.classList.add("upload-loader");
        loader.innerHTML =
          '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>';
        holder.appendChild(loader);

        setTimeout(function () {
          holder.classList.remove("uploadInProgress");
          loader.remove();

          var random = Math.random();
          if (random < 0.9) {
            wrapper.innerHTML +=
              '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Profile image updated successfully</div>';
            triggerInput.value = "";
            setTimeout(function () {
              wrapper.querySelector('[role="alert"]').remove();
            }, 3000);
          } else {
            holder.querySelector(".pic").src = currentImg;
            wrapper.innerHTML +=
              '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There is an error while uploading! Please try again later.</div>';
            triggerInput.value = "";
            setTimeout(function () {
              wrapper.querySelector('[role="alert"]').remove();
            }, 3000);
          }
        }, 1500);
      };
    } else {
      wrapper.innerHTML +=
        '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose a valid image.</div>';
      setTimeout(function () {
        var invalidAlert = wrapper.querySelector('[role="alert"]');
        if (invalidAlert) {
          invalidAlert.remove();
        }
      }, 3000);
    }
  }
});
</script> --}}

@endpush