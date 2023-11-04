@extends('layouts.app')

@section('title')
    Store Category Page
@endsection

@section('content')

  
<div class="page-content page-categories">
    <div class="container">
  <div class="row">
    <div class="col-md-4">


      <section class="store-trend-categories">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <a href="{{ route('categories') }}" class="text-dark text-decoration-none"><h5>Games</h5></a>
            </div>
          </div>

          <div data-aos="fade-left">
            <ul class="list-group list-group-flush">
              

            @forelse ($categories as $category)
                  
              <a href="{{-- {{ route('categories-detail', $category->slug) }} --}}/categories?category={{ $category->slug}}" class="mb-2 component-categories d-block text-dark border-primary-category shadow-sm"{{--  data-aos="fade-up"
              data-aos-delay="{{ $incrementCategory+= 100 }}" --}}>{{ $category->name }}</a>

            @empty
              <div class="text-center" data-aos="fade-up"
              data-aos-delay="100">
                No Items Found
              </div>
            @endforelse


            </ul>
          </div>
          
        </div>
      </section>
    </div>
    
    
    <div class="col-lg">
      <section class="store-new-products">
        <div class="container">
          <div class="row">
            <div class="col-12 mt-1" data-aos="fade-up">
              
              <br>
              <form action="/categories">

                <h5>{{ $title }}</h5>

                @if (request('category'))

                <input type="hidden" name="category" value="{{ request('category') }}">

                @endif


                <div class="input-group mb-3 shadow-sm">
                  <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                  <button class="btn btn-outline-primary" type="submit" ><i class="fas fa-search"></i></button>
                </div>

              </form>
              
            </div>
          </div>

          <div class="row">
            {{-- <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <a class="component-products d-block" href="/details/1">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
                    style="
                      background-image: url('/images/vc.png');
                    "
                  ></div>
                </div>
                <div class="products-text">AOV - 40 Voucher</div>
                <div class="products-price">Rp. 9.900</div>
              </a>
            </div> --}}

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
                      @if (isset($product->galleries->first()->photos))
                        background-image: url('{{ Storage::url($product->galleries->first()->photos) }}')
                      @else
                        background-image: url('images/bgemptyproduct.png')
                      @endif
                    "
                  ></div>
                </div>
                <div class="products-text">{{ $product->name }}</div>
                <div class="products-price">@money($product->price){{-- {{ $product->price }} --}}</div>
              </a>
            </div>
            @empty
                <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                  No Products Found
                </div>
            @endforelse
          </div>

          <div class="d-flex justify-content-end">
           
              {{ $products->links() }}
            
          </div>

        </div>
      </section>
    </div>
  </div>
</div>
</div>
@endsection