@extends('layouts.app')

@section('title')
    Store Cart Page
@endsection

@section('content')
    <!-- Page Content -->
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
                    Cart
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 table-responsive">
              <table
                class="table table-borderless table-cart"
                aria-describedby="Cart"
              >
                <thead>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name {{-- &amp; Seller --}}</th>
                    <th scope="col">Owner</th>
                    <th scope="col">Price</th>
                    <th scope="col">Menu</th>
                  </tr>
                </thead>
                <tbody>
                  @php $totalPrice = 0 @endphp
                  @php $tempTax = 2500 @endphp
                  @php $Total = 0 @endphp
                  @foreach ($carts as $cart)
                      
                  
                  <tr>
                    <td style="width: 25%;">
                      @if ($cart->product->galleries)
                        <img
                        src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                        alt=""
                        class="cart-image"
                      />
                      @endif
                    </td>
                    <td style="width: 35%;">
                      <div class="product-title">{{ $cart->product->name }}</div>
                      <div class="product-subtitle">{{ $cart->product->category->name }}</div>
                    </td>
                    <td style="width: 20%;">
                      <div class="product-title">{{ $cart->product->user->name }}</div>
                    </td>
                    <td style="width: 35%;">
                      <div class="product-title">@money($cart->product->price)</div>
                      {{-- <div class="product-subtitle">USD</div> --}}
                    </td>
                    <td style="width: 20%;">
                      <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-remove-cart">
                        Remove
                      </button>
                      </form>
                    </td>
                  </tr>

                  @php $totalPrice += $cart->product->price @endphp
                  @php $Total = $totalPrice + $tempTax @endphp

                  @endforeach
                
                </tbody>
              </table>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-4">Confirmation</h2>
            </div>
          </div>

          <form action="{{ route('checkout') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" name="total_price" value="{{ $Total }}">
            <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
            
            @auth
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">E-mail</label>
                <fieldset disabled>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                  value="{{ Auth::user()->email }}"
                />
              </fieldset>
              </div>
            </div>
            @endauth

            <div class="col-md-6">
              <div class="form-group">
                <label for="phone_number">Mobile</label>
                <input
                  type="text"
                  class="form-control"
                  id="phone_number"
                  name="phone_number"
                  value="+628 2020 11111"
                />
              </div>
            </div>

            @auth
            <div class="col-md-6">
              <div class="form-group">
                <label for="mobile">Name</label>
                <fieldset disabled>
                <input
                  type="text"
                  class="form-control"
                  id="mobile"
                  name="mobile"
                  value="{{ Auth::user()->name }}"
                />
                </fieldset>
              </div>
            </div>
            @endauth

            <div class="col-md-6">
              <div class="form-group">
                <label for="province">Metode Pembayaran</label>
                <select name="metode_pembayaran" id="province" class="form-control">
                  <option value="DANA">DANA</option>
                  <option value="OVO">OVO</option>
                  <option value="GOPAY">GOPAY</option>
                </select>
              </div>
            </div>
           
            <div class="col-lg-12">
              <div class="form-group">
                <label for="catatan_beli">Catatan</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="catatan_beli"></textarea>
              </div>
            </div>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2>Payment Informations</h2>
            </div>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="200">
            <div class="col-4 col-md-2">
              <div class="product-title">Rp. 2.500</div>
              <div class="product-subtitle">{{-- Country  --}}Pajak Admin</div>
            </div>
           
            <div class="col-4 col-md-2">
              <div class="product-title text-success">@money($Total ?? 0)</div>
              <div class="product-subtitle">Total</div>
            </div>
            <div class="col-8 col-md-3">
              <button
                type="submit"
                class="btn btn-primary mt-4 px-4 btn-block"
              >
                Checkout Now
            </button>
            </div>
          </div>
          </form>

        </div>
      </section>
    </div>
@endsection