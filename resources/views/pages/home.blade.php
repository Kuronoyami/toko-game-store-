@extends('layouts.app')

@section('title')
    Store Home
@endsection

@section('content')
<br>
<br>
    <div class="page-content page-home">
      <section class="store-carousel">
        <div class="container">
          <div class="row">
            <div class="col-lg-12" data-aos="zoom-in">
              <div
                id="storeCarousel"
                class="carousel slide"
                data-ride="carousel"
              >
                <ol class="carousel-indicators">
                  <li
                    data-target="#storeCarousel"
                    data-slide-to="0"
                    class="active"
                  ></li>
                  <li data-target="#storeCarousel" data-slide-to="1"></li>
                  <li data-target="#storeCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img
                      src="/images/banner2.jpg"
                      class="d-block w-100"
                      alt="Carousel Image"
                      style="border-radius: 1%"
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      src="/images/banner_1.png"
                      class="d-block w-100"
                      alt="Carousel Image"
                      style="border-radius: 1%"
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      src="/images/banner.jpg"
                      class="d-block w-100"
                      alt="Carousel Image"
                      style="border-radius: 1%"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

 

      <section class="store-trend-categories">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>Games</h5>
            </div>
          </div>
          <div class="row">
            @php $incrementCategory = 0 @endphp

            @forelse ($categories as $category)
                
            <div
            class="col-4 col-md-3 col-lg-2"
            data-aos="fade-up"
            data-aos-delay="{{ $incrementCategory+= 100 }}">
            <a class="component-categories d-block" href="{{-- {{ route('categories-detail', $category->slug) }} --}}/categories?category={{ $category->slug}}">
              <div class="categories-image">
                <img
                src="{{ Storage::url($category->photo) }}"
                alt="Gadgets Categories"
                class="w-100 border-bottom-primary shadow"
                />
              </div>
              <div class="overlay">
                <div class="content">
                  <p >{{ $category->name }}</p>
                </div>
              </div>
              {{--  <p class="categories-text">Arena of Valor</p> --}}
            </a>
          </div>

          @empty
            <div class="col-12 text-center py-5" data-aos="fade-up"
            data-aos-delay="100">
              No Items Found
            </div>
          @endforelse
                  
          </div>
        </div>
      </section>

      <section class="store-new-products">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>New Items</h5>
            </div>
          </div>
          <div class="row">
            @php $incrementProduct = 0 @endphp
            @forelse ($products as $product)
                <div
                class="col-6 col-md-4 col-lg-3"
                data-aos="fade-up"
                data-aos-delay="{{ $incrementProduct += 100 }}">
              <a class="component-products d-block" href="{{ route('detail', $product->slug) }}">
                <div class="products-thumbnail shadow-sm">
                  <div
                    class="products-image"
                    style="
                      @if ($product->galleries->count())
                        background-image: url('{{ Storage::url($product->galleries->first()->photos) }}')
                      @else
                        background-image: url('images/bgemptyproduct.png')
                      @endif
                    "
                  ></div>
                </div>
                <div class="products-text">{{ $product->name }}</div>
                <div class="products-price">@money($product->price)</div>
              </a>
            </div>
            @empty
                <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                  No Products Found
                </div>
            @endforelse

          </div>
        </div>
      </section>
    </div>
@endsection