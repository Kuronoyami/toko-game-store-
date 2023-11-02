@extends('layouts.dashboard')

@section('title')
    Store Dashboard Transaction Details
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
                <h2 class="dashboard-title">{{ $transaction->code }}</h2>
                <p class="dashboard-subtitle">
                  Transaction Details
                </p>
              </div>
              <div class="dashboard-content" id="transactionDetails">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 col-md-4">
                            <img
                              src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                              alt=""
                              class="w-100 mb-3"
                            />
                          </div>
                          <div class="col-12 col-md-8">
                            <div class="row">
                              <div class="col-12 col-md-6">
                                <div class="product-title">Customer Name</div>
                                <div class="product-subtitle">{{ $transaction->transaction->user->name }}</div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Product Name</div>
                                <div class="product-subtitle">
                                  {{ $transaction->product->name }}
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">
                                  Date of Transaction
                                </div>
                                <div class="product-subtitle">
                                  {{ $transaction->created_at }}
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Payment Status</div>
                                <div class="product-subtitle {{ $transaction->delivery_status === 'SUCCESS' ? 'text-success' : ($transaction->delivery_status === 'DELIVERY' ? 'text-primary' : 'text-danger') }}">
                                  {{-- {{ $transaction->transaction->transaction_status }} --}}
                                  {{ $transaction->delivery_status }}
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Total Amount</div>
                                <div class="product-subtitle">{{-- @money($transaction->transaction->total_price) --}}
                                  @money($transaction->price)
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Mobile</div>
                                <div class="product-subtitle">
                                  {{ $transaction->transaction->user->phone_number }}
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Note</div>
                                <div class="product-subtitle">
                                  ID 
                                  71231231123
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <form action="{{ route('dashboard-transaction-update', $transaction->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="row">
                          <div class="col-12 mt-4">
                            <h5>
                              Delivery Informations
                            </h5>
                            <div class="row">
                              
                              <div class="col-12">
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="product-title">Delivery Status</div>
                                    <select
                                      name="delivery_status"
                                      {{-- id="status" --}}
                                      class="form-control"
                                      {{-- v-model="status" --}}
                                    >
                                      <option value="PENDING" {{ $transaction->delivery_status === 'PENDING' ? 'selected' : '' }}>Pending</option>
                                      <option value="DELIVERY" {{ $transaction->delivery_status === 'DELIVERY' ? 'selected' : '' }}>Delivery</option>
                                      <option value="SUCCESS" {{ $transaction->delivery_status === 'SUCCESS' ? 'selected' : '' }}>Success</option>
                                    </select>
                                  </div>
                                
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary mt-4">
                              Save
                            </button>
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@push('addon-script')
 <script src="/vendor/vue/vue.js"></script>
    <script>
      var transactionDetails = new Vue({
        el: "#transactionDetails",
        data: {
          status: "SHIPPING",
          resi: "BDO12308012132",
        },
      });
    </script>
@endpush
