@extends('layouts.app')

@section('title')
    Store Detail Page
@endsection

@section('content')
<style>
  /***
 *  Simple Pure CSS Star Rating Widget Bootstrap 4 
 * 
 *  www.TheMastercut.co
 *  
 ***/

@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

.starrating > input {display: none;}  /* Remove radio buttons */

.starrating > label:before { 
  content: "\f005";
  margin: 2px;
  font-size: 1.5em;
  font-family: FontAwesome;
  display: inline-block; 
}

.starrating > label
{
  color: #222222; /* Start color when not clicked */
}

.starrating > input:checked ~ label
{ color: #007BFF ; } /* Set yellow color when star checked */

.starrating > input:hover ~ label
{ color: #007BFF ;  } /* Set yellow color when star hover */



/* ======================================================================== */



 /* Remove radio buttons */


.starrating-no-hover > label:before { 
  content: "\f005";
  margin: 2px;
  font-size: 1.5em;
  font-family: FontAwesome;
  display: inline-block; 
}

.starrating-no-hover > label
{
  color: #007BFF; /* Start color when not clicked */
}

.starOff{
  color: #636363 !important;
}

.starOn{
  color: #007BFF !important;
}

.starrating-no-hover {
  pointer-events: none;
}


/* ======================================================================== */


 /* Remove radio buttons */


.starrating-bg > label:before { 
  content: "\f005";
  margin: 2px;
  font-size: 1.5em;
  font-family: FontAwesome;
  display: inline-block; 
}

.starrating-bg > label
{
  color: #636363; /* Start color when not clicked */
}



.starrating-bg {
  pointer-events: none;
}


</style>
<br>
   <!-- Page Content -->
    <div class="page-content page-details">
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
                    Product Details
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="store-gallery" id="gallery">
        <div class="container">
          <div class="row">
            <div class="col-lg-7 mb-4" data-aos="zoom-in">
              {{-- <transition name="slide-fade" mode="out-in"> --}}
                @if ($product->galleries->count() > 0)
                @foreach($product->galleries as $gallery)
                  <img
                    class="w-100 main-image shadow"
                    alt=""
                    style="height: 300px; object-fit: cover;"
                    src="{{ Storage::url($gallery->photos) }}"
                  />
                @endforeach
                @else
                  <img
                    class="w-100 main-image shadow"
                    alt=""
                    style="height: 300px; object-fit: cover;"
                    src="{{ asset('images/bgemptyproduct.png') }}"
                  />
                @endif
              {{-- </transition> --}}
            </div>
            <div class="col-lg-5">
              <section class="store-heading{{--  shadow-sm --}}" data-aos="zoom-in">
             {{--  <div class="row">
                <div
                  class="col-3 col-lg-12 mt-2 mt-lg-0"
                  v-for="(photo, index) in photos"
                  :key="photo.id"
                  data-aos="zoom-in"
                  data-aos-delay="100"
                >
                  <a href="#" @click="changeActive(index)">
                    <img
                      :src="photo.url"
                      class="w-100 thumbnail-image"
                      :class="{ active: index == activePhoto }"
                      alt=""
                    />
                  </a>
                </div>
              </div> --}}
              <div {{-- style="padding: 10px;" --}}>
                <h1>{{ $product->name }}</h1>
                <div class="owner">{{ $product->category->name }}</div>
                
                <h5>Deskripsi Produk</h5>

                
                <h6 class="mt-2">{!! $product->description !!}</h6>

                <div class="price">@money($product->price)</div>

                @auth
                <form action="{{ route('detail-add', $product->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                <button type="submit" class="btn btn-primary px-4 text-white mb-3"
                  href="/cart">Add to Cart</button>
                </form>
                @else
                <a class="btn btn-secondary px-4 text-white mb-3"
                  href="{{ route('login') }}">Sign in to Add</a>
                @endauth
                

              </div>

              </section>
            </div>
          </div>
        </div>
      </section>
      <div class="store-details-container" data-aos="fade-up">
        {{-- <section class="store-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <h1>Ulasan</h1>
                <div class="owner">{{ $product->user->store_name }}</div>
                <div class="price">Rp. 980.900</div>
              </div>
              <div class="col-lg-2" data-aos="zoom-in">
                <a
                  class="btn btn-primary nav-link px-4 text-white btn-block mb-3"
                  href="/cart"
                  >Add to Cart</a
                >
              </div>
              
            </div>
          </div>
        </section> --}}

        <section class="store-review">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8 mt-3 mb-3">
                <h5>Ulasan Pelanggan ({{ $reviewCount }})</h5>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-lg-8">
                <ul class="list-unstyled">
                  @foreach($reviews as $review)
                  <li class="media mb-3">
                    <img
                      src="{{ asset('storage/' . $review->user->img_profile) }}"
                      class="mr-3 rounded-circle"
                      alt=""
                      style="object-fit:cover;"
                    />
                    <div class="media-body">
                      <div class="d-inline">
                        <h5 class="mt-2 mb-1">{{ $review->user->name }}</h5> 
                        <h6>{{ $review->created_at->diffForHumans() }}</h6>
                      </div>
                      {{ $review->comment }}

                      @php
                      $rate = $review->rate;
                      @endphp

                      <div class="starrating-no-hover risingstar d-flex justify-content-start no-pointer">
                        @for ($i = 1; $i <= 5; $i++)
                          @if ($i <= $rate)
                              <label for="star1" title="1 star" class="starOn"></label>
                          @else
                              <label for="starOn" title="starOn" class="starOff"></label>
                          @endif
                        @endfor
                        </div>
                    </div>
                  </li>
                  @endforeach
                </ul>
                <div style="border-radius: 10px; background-color: rgba(0, 116, 240, 0.2);">
                  <div class="p-3">
                    @auth
                    <h5>Review Products : </h5>
                    <form action="{{ route('review-add', $product->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                        <div class="starrating risingstar d-flex justify-content-end flex-row-reverse">
                            <input type="radio" id="star5" name="rate" value="5" required/><label for="star5" title="5 star"></label>
                            <input type="radio" id="star4" name="rate" value="4" required/><label for="star4" title="4 star"></label>
                            <input type="radio" id="star3" name="rate" value="3" required/><label for="star3" title="3 star"></label>
                            <input type="radio" id="star2" name="rate" value="2" required/><label for="star2" title="2 star"></label>
                            <input type="radio" id="star1" name="rate" value="1" required/><label for="star1" title="1 star"></label>
                        </div>
                      <div class="input-group mb-3 shadow-sm">
                        <input type="text" class="form-control" placeholder="Comment..." name="comment" value="" required>
                      </div>
                        @if($errors->any())
                         <div class="alert alert-danger mt-3">
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                          </div>
                    @endif
                      <button class="btn btn-outline-primary" type="submit" ><i class="fas fa-paper-plane"></i> Send Reviews</button>
                    </form>
                    @else
                    <a class="btn btn-secondary px-4 text-white" href="{{ route('login') }}">Sign in to Reviews</a>
                    @endauth
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="store-description">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8">
                {{-- {!! $product->description !!} --}}
                
                {{-- <a
                  class="btn btn-primary px-4 text-white mb-3"
                  href="/cart"
                  >Add to Cart</a
                > --}}
             
              </div>
              
            </div>
          </div>
        </section>
        <section class="store-review">
          {{-- <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8 mt-3 mb-3">
                <h5>Customer Review (3)</h5>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-lg-8">
                <ul class="list-unstyled">
                  <li class="media">
                    <img
                      src="/images/icon-testimonial-1.png"
                      class="mr-3 rounded-circle"
                      alt=""
                    />
                    <div class="media-body">
                      <h5 class="mt-2 mb-1">Hazza Risky</h5>
                      I thought it was not good for living room. I really happy
                      to decided buy this product last week now feels like
                      homey.
                    </div>
                  </li>
                  <li class="media my-4">
                    <img
                      src="/images/icon-testimonial-2.png"
                      class="mr-3 rounded-circle"
                      alt=""
                    />
                    <div class="media-body">
                      <h5 class="mt-2 mb-1">Anna Sukkirata</h5>
                      Color is great with the minimalist concept. Even I thought
                      it was made by Cactus industry. I do really satisfied with
                      this.
                    </div>
                  </li>
                  <li class="media">
                    <img
                      src="/images/icon-testimonial-3.png"
                      class="mr-3 rounded-circle"
                      alt=""
                    />
                    <div class="media-body">
                      <h5 class="mt-2 mb-1">Dakimu Wangi</h5>
                      When I saw at first, it was really awesome to have with.
                      Just let me know if there is another upcoming product like
                      this.
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div> --}}
        </section>
      </div>
    </div>
   
@endsection

{{-- @push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
      var gallery = new Vue({
        el: "#gallery",
        mounted() {
          AOS.init();
        },
        data: {  
          activePhoto: 0,
          photos: [
            @foreach($product->galleries as $gallery)
            {
              id: {{ $gallery->id }},
              url: "{{ Storage::url($gallery->photos) }}",
            },
            @endforeach
          ],
        },
        methods: {
          changeActive(id) {
            this.activePhoto = id;
          },
        },
      });
    </script>
@endpush --}}