@extends('layouts.dashboard')

@section('title')
    Store Dashboard Product Create
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
                      href="/dashboard/products/create"
                      class="btn btn-primary"
                      >Add New Product</a
                    >
                  </div>
                </div>
                <div class="row mt-4">

                  <!-- COBA STYLE -->
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div
                      class="card card-dashboard-product d-block"
                    >
                    <a href="/dashboard/products/1">
                      <div class="card-body">
                        <img
                          src="/images/produk-admin.png"
                          alt=""
                          class="w-100 mb-2"
                        />
                        <div class="product-title judul-produk">AOV - 40 Voucher</div>
                        </a>
                        <div class="product-category">Arena of Valor</div>
                        <a
                      href="/dashboard/products/create"
                      class="btn btn-danger mt-2"
                      >Delete</a
                    >
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div
                      class="card card-dashboard-product d-block"
                    >
                    <a href="/dashboard/products/1">
                      <div class="card-body">
                        <img
                          src="/images/produk-admin.png"
                          alt=""
                          class="w-100 mb-2"
                        />
                        <div class="product-title judul-produk">AOV - 90 Voucher</div>
                        </a>
                        <div class="product-category">Arena of Valor</div>
                        <a
                      href="/dashboard/products/create"
                      class="btn btn-danger mt-2"
                      >Delete</a
                    >
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div
                      class="card card-dashboard-product d-block"
                    >
                    <a href="/dashboard/products/1">
                      <div class="card-body">
                        <img
                          src="/images/produk-admin.png"
                          alt=""
                          class="w-100 mb-2"
                        />
                        <div class="product-title judul-produk">AOV - 230 Voucher</div>
                        </a>
                        <div class="product-category">Arena of Valor</div>
                        <a
                      href="/dashboard/products/create"
                      class="btn btn-danger mt-2"
                      >Delete</a
                    >
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div
                      class="card card-dashboard-product d-block"
                    >
                    <a href="/dashboard/products/1">
                      <div class="card-body">
                        <img
                          src="/images/produk-admin.png"
                          alt=""
                          class="w-100 mb-2"
                        />
                        <div class="product-title judul-produk">AOV - 470 Voucher</div>
                        </a>
                        <div class="product-category">Arena of Valor</div>
                        <a
                      href="/dashboard/products/create"
                      class="btn btn-danger mt-2"
                      >Delete</a
                    >
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div
                      class="card card-dashboard-product d-block"
                    >
                    <a href="/dashboard/products/1">
                      <div class="card-body">
                        <img
                          src="/images/produk-admin.png"
                          alt=""
                          class="w-100 mb-2"
                        />
                        <div class="product-title judul-produk">AOV - 950 Voucher</div>
                        </a>
                        <div class="product-category">Arena of Valor</div>
                        <a
                      href="/dashboard/products/create"
                      class="btn btn-danger mt-2"
                      >Delete</a
                    >
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div
                      class="card card-dashboard-product d-block"
                    >
                    <a href="/dashboard/products/1">
                      <div class="card-body">
                        <img
                          src="/images/produk-admin.png"
                          alt=""
                          class="w-100 mb-2"
                        />
                        <div class="product-title judul-produk">AOV - 1430 Voucher</div>
                        </a>
                        <div class="product-category">Arena of Valor</div>
                        <a
                      href="/dashboard/products/create"
                      class="btn btn-danger mt-2"
                      >Delete</a
                    >
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div
                      class="card card-dashboard-product d-block"
                    >
                    <a href="/dashboard/products/1">
                      <div class="card-body">
                        <img
                          src="/images/produk-admin.png"
                          alt=""
                          class="w-100 mb-2"
                        />
                        <div class="product-title judul-produk">AOV - 2390 Voucher</div>
                        </a>
                        <div class="product-category">Arena of Valor</div>
                        <a
                      href="/dashboard/products/create"
                      class="btn btn-danger mt-2"
                      >Delete</a
                    >
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
@endsection

@push('addon-script')
 <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script>
      CKEDITOR.replace("editor");
    </script>
@endpush