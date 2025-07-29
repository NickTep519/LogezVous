 <div class="col-xl-6 col-lg-6 col-md-12">
     <div class="property-listing property-1 bg-white p-2 rounded">

         <div class="listing-img-wrapper">
             <a href="single-property-2.html">
                 <img src="{{ asset('users/assets/img/p-1.jpg') }}" class="img-fluid mx-auto rounded" alt="" />
             </a>
         </div>

         <div class="listing-content">

             <div class="listing-detail-wrapper-box">
                 <div class="listing-detail-wrapper d-flex align-items-center justify-content-between">
                     <div class="listing-short-detail">
                         <span class="label for-rent d-inline-flex mb-1">
                             @if ($property?->listing_type === 'vente')
                                    @lang('global.For Buy')
                                @else
                                    @lang('global.For Rent')
                                @endif
                         </span>
                         <h4 class="listing-name mb-0"><a href="single-property-2.html"> {{ Str::limit($property?->title, 15) }} </a></h4>
                         <div class="fr-can-rating">
                             <i class="fas fa-star fs-xs filled"></i>
                             <i class="fas fa-star fs-xs filled"></i>
                             <i class="fas fa-star fs-xs filled"></i>
                             <i class="fas fa-star fs-xs filled"></i>
                             <i class="fas fa-star fs-xs"></i>
                             <span class="reviews_text fs-sm text-muted ms-2">(36 Reviews)</span>
                         </div>

                     </div>
                     <div class="list-price">
                         <h6 class="listing-card-info-price text-main">{{ $property->formatted_abb_price }}</h6>
                     </div>
                 </div>
             </div>

             <div class="price-features-wrapper">
                 <div class="list-fx-features d-flex align-items-center justify-content-between">
                     <div class="listing-card d-flex align-items-center">
                         <div class="square--30 text-muted-2 fs-sm circle gray-simple me-2"><i
                                 class="fa-solid fa-building-shield fs-sm"></i></div><span
                             class="text-muted-2">{{ $property->configuration_code }} </span>
                     </div>
                     <div class="listing-card d-flex align-items-center">
                         <div class="square--30 text-muted-2 fs-sm circle gray-simple me-2"><i
                                 class="fa-solid fa-bed fs-sm"></i></div><span class="text-muted-2"> {{ $property?->bedrooms }} C </span>
                     </div>
                     <div class="listing-card d-flex align-items-center">
                         <div class="square--30 text-muted-2 fs-sm circle gray-simple me-2"><i
                                 class="fa-solid fa-clone fs-sm"></i></div><span class="text-muted-2"> {{  number_format($property->surface, 0, ',', ' ')  }} m²  </span>
                     </div>
                 </div>
             </div>

             <div class="listing-footer-wrapper">
                 <div class="listing-locate">
                     <span class="listing-location text-muted-2"><i class="fa-solid fa-location-pin me-1"></i> {{ $property?->city }}, {{ $property?->neighborhood }}</span>
                 </div>
                 <div class="listing-detail-btn">
                     <a href="{{ route('properties.show', $property) }}" class="btn btn-sm px-4 fw-medium btn-main">@lang('global.See more')</a>
                 </div>
             </div>

         </div>

     </div>
 </div>
