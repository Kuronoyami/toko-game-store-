@extends('layouts.app')

@section('title')
    Store Home
@endsection

@section('content')
    <div class="page-content page-cart">
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Frequently Asked Questions
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="store-cart">
        <div class="container">
            <div style="background: linear-gradient(to bottom, #53a2f7, #007BFF); opacity: 85%; border-radius: 13px;">
                <div class="p-3 text-white">
                    <h6>Q : Lorem ipsum dolor sit amet consectetur adipisicing elit ?.</h6>
                    <h6>A : Lorem ipsum dolor sit amet</h6>
                </div>
                <div class="p-3 text-white">
                    <h6>Q : Lorem ipsum dolor sit amet consectetur adipisicing elit ?.</h6>
                    <h6>A : Lorem ipsum dolor sit amet</h6>
                </div>
                <div class="p-3 text-white">
                    <h6>Q : Lorem ipsum dolor sit amet consectetur adipisicing elit ?.</h6>
                    <h6>A : Lorem ipsum dolor sit amet</h6>
                </div>
                <div class="p-3 text-white">
                    <h6>Q : Lorem ipsum dolor sit amet consectetur adipisicing elit ?.</h6>
                    <h6>A : Lorem ipsum dolor sit amet</h6>
                </div>
                <div class="p-3 text-white">
                    <h6>Q : Lorem ipsum dolor sit amet consectetur adipisicing elit ?.</h6>
                    <h6>A : Lorem ipsum dolor sit amet</h6>
                </div>
            </div>
        </div>
      </section>
    </div>
@endsection