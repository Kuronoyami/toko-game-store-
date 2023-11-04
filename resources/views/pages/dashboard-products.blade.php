@extends('layouts.dashboard')

@section('title')
    Store Dashboard Product
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
                <h2 class="dashboard-title">My Products</h2>
                <p class="dashboard-subtitle">
                  Manage it well and get money
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <a
                      href="{{ route('dashboard-product-create') }}"
                      class="btn btn-primary"
                      >Add New Product</a
                    >
                  </div>
                </div>
                <div class="row mt-4">

                  @foreach ($products as $product)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    
                    <a href="{{ route('dashboard-product-detail', $product->id) }}">
                      <div class="card-body">
                         @if (isset($product->galleries->first()->photos))
                        <img
                          src="{{ Storage::url($product->galleries->first()->photos)}}"
                          alt=""
                          class="w-50 mb-2"
                        />
                        @else
                        <img
                          src="{{ asset('images/bgemptyproduct.png') }}"
                          alt=""
                          class="w-50 mb-2"
                        />
                        @endif
                        <div class="product-title judul-produk">{{ $product->name }}</div>
                        <div class="product-category">{{ $product->category->name }}</div>
                        {{-- <a
                          href="/dashboard/products/create"
                          class="btn btn-danger mt-2"
                          >Delete</a
                          > --}}
                          </div>
                        </a>
                    </div>
                  @endforeach
                  
                </div>
                  
                  
                </div>
              </div>
            </div>
          </div>
@endsection