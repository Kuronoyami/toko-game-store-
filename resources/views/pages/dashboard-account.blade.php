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
                      <div class="card">
                        <div class="card-body">
                          <div class="row mb-2">
                            <div class="col-md-6">
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
                            <div class="col-md-6">
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
                            
                            <div class="col-md-6">
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
                          <div class="row">
                            <div class="col text-right">
                              <button
                                type="submit"
                                class="btn btn-success px-5"
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