 <div class="full-search-2 eclip-search italian-search hero-search-radius shadow-hard">

     <form action="{{ route('properties.index') }}" method="GET">
         <div class="hero-search-content">
             <div class="row">

                 <div class="col-lg-3 col-md-4 col-sm-12 b-r">
                     <div class="form-group">
                         <div class="choose-propert-type">
                             <ul>

                                 <li>
                                     <div class="form-check">
                                         <input class="form-check-input" type="radio" value="location" id="typrent"
                                             name="listing_type"
                                             {{ request('listing_type') == 'location' ? 'checked' : '' }}>
                                         <label class="form-check-label" for="typrent">
                                             @lang('global.For Rent')
                                         </label>
                                     </div>
                                 </li>
                                 <li>
                                     <div class="form-check">
                                         <input class="form-check-input" type="radio" value="vente" id="typbuy"
                                             name="listing_type"
                                             {{ request('listing_type') == 'vente' ? 'checked' : '' }}>
                                         <label class="form-check-label" for="typbuy">
                                             @lang('global.For Buy')
                                         </label>
                                     </div>
                                 </li>

                             </ul>
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-6 col-md-4 col-sm-12 p-md-0 elio">
                     <div class="form-group border-start borders">
                         <div class="position-relative">
                             <input type="text" class="form-control border-0 ps-5" name="location"
                                 placeholder="{{ __('global.Search for a location') }}"
                                 value="{{ request('location') }}">
                             <div class="position-absolute top-50 start-0 translate-middle-y ms-2">
                                 <span class="svg-icon text-main svg-icon-2hx">
                                     <svg width="25" height="25" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                         <path opacity="0.3"
                                             d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z"
                                             fill="currentColor" />
                                         <path
                                             d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z"
                                             fill="currentColor" />
                                     </svg>
                                 </span>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-1 col-md-1 col-sm-2">
                     <div class="form-group">
                         <a class="collapsed ad-search" data-bs-toggle="collapse" data-bs-parent="#search"
                             data-bs-target="#advance-search" href="javascript:void(0);" aria-expanded="false"
                             aria-controls="advance-search"><i class="fa fa-sliders-h"></i></a>
                     </div>
                 </div>

                 <div class="col-lg-2 col-md-3 col-sm-12">
                     <div class="form-group">
                         <button type="submit" class="btn btn-main full-width">Search</button>
                     </div>
                 </div>

             </div>
             <!-- Collapse Advance Search Form -->
             <div class="collapse" id="advance-search" aria-expanded="false" role="banner">

                 <!-- row -->
                 <div class="row">

                     <div class="col-lg-4 col-md-4 col-sm-12">
                         <div class="form-group mb-2">
                             <div class="input-with-icon">
                                 <select id="town" class="form-control" name="locatio">
                                     <option value="">&nbsp;</option>
                                     <option value="1">Savalou</option>
                                     <option value="2">Dassa-Zoume</option>
                                     <option value="3">Abomey-Calavi</option>
                                     <option value="4">Bohicon</option>
                                     <option value="5">Parakou</option>
                                     <option value="6">Cotonou</option>
                                 </select>
                                 <i class="fa-solid fa-location-dot"></i>
                             </div>
                         </div>
                     </div>

                     <div class="col-lg-4 col-md-4 col-sm-12">
                         <div class="form-group mb-2">
                             <div class="input-with-icon">
                                 <select id="bedrooms" name="bedrooms" class="form-control">
                                     <option value="">&nbsp;</option>
                                     @for ($i = 1; $i <= 7; $i++)
                                         <option value="{{ $i }}"
                                             {{ request('bedrooms') == $i ? 'selected' : '' }}>{{ $i }}
                                         </option>
                                     @endfor
                                 </select>
                                 <i class="fas fa-bed"></i>
                             </div>
                         </div>
                     </div>

                     <div class="col-lg-4 col-md-4 col-sm-12">
                         <div class="form-group mb-2">
                             <div class="input-with-icon">
                                 <select id="bathrooms" name="bathrooms" class="form-control">
                                     <option value="">&nbsp;</option>
                                     @for ($i = 1; $i <= 3; $i++)
                                         <option value="{{ $i }}"
                                             {{ request('bathrooms') == $i ? 'selected' : '' }}>{{ $i }}
                                         </option>
                                     @endfor
                                 </select>
                                 <i class="fas fa-bath"></i>
                             </div>
                         </div>
                     </div>

                 </div>
                 <!-- /row -->

                 <!-- row -->
                 <div class="row">

                     <div class="col-lg-3 col-md-6 col-sm-6">
                         <div class="form-group mb-2">
                             <input type="text" class="form-control" value="{{ request('price_min') }}"
                                 name="price_min" placeholder="{{ __('global.Min price') }}" />
                         </div>
                     </div>

                     <div class="col-lg-3 col-md-6 col-sm-6">
                         <div class="form-group mb-2">
                             <input type="text" class="form-control" value="{{ request('price_max') }}"
                                 name="price_max" placeholder="{{ __('global.Max price') }}" />
                         </div>
                     </div>

                     <div class="col-lg-3 col-md-6 col-sm-6">
                         <div class="form-group mb-2">
                             <input type="text" class="form-control" value="{{ request('surface_min') }}"
                                 name="surface_min" placeholder="{{ __('global.Max surface') }}" />
                         </div>
                     </div>

                     <div class="col-lg-3 col-md-6 col-sm-6">
                         <div class="form-group mb-2">
                             <input type="text" class="form-control" value="{{ request('surface_max') }}"
                                 name="surface_max" placeholder="{{ __('global.Min surface') }}" />
                         </div>
                     </div>

                 </div>
                 <!-- /row -->

                 <!-- row -->
                 {{-- <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                         <h6>Advance Price</h6>
                         <div class="rg-slider">
                             <input type="text" class="js-range-slider" name="my_range" value="" />
                         </div>
                     </div>
                 </div> --}}
                 <!-- /row -->

                 <!-- row -->
                 <div class="row">

                     <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                         <h4 class="text-dark fs-6 fw-semibold">Amenities & Features</h4>
                         <ul class="no-ul-list third-row">
                             <li>
                                 <div class="form-check">
                                     <input id="a-1" class="form-check-input" name="garage" type="checkbox"
                                     {{ request('garage') ? 'checked' : '' }}
                                     >
                                     <label for="garage" class="form-check-label">Garage</label>
                                 </div>
                             </li>
                             <li>
                                 <div class="form-check">
                                     <input id="a-2" class="form-check-input" name="swimming_pool" type="checkbox"
                                      {{ request('swimming_pool') ? 'checked' : '' }}
                                     >
                                     <label for="a-2" class="form-check-label"> @lang('label.Swimming pool') </label>
                                 </div>
                             </li>
                             <li>
                                 <input id="a-3" class="form-check-input" name="heating" type="checkbox"
                                 {{ request('heating') ? 'checked' : '' }}
                                 >
                                 <label for="a-3" class="form-check-label"> @lang('label.Heating') </label>
                             </li>
                             <li>
                                 <div class="form-check">
                                     <input id="a-4" class="form-check-input" name="wifi" type="checkbox"
                                     {{ request('wifi') ? 'checked' : '' }}
                                     >
                                     <label for="a-4" class="form-check-label">@lang('label.Wifi')</label>
                                 </div>
                             </li>
                             <li>
                                 <div class="form-check">
                                     <input id="a-5" class="form-check-input" name="parking" type="checkbox"
                                      {{ request('parking') ? 'checked' : '' }}
                                     >
                                     <label for="a-5" class="form-check-label">@lang('label.Parking')</label>
                                 </div>
                             </li>
                             <li>
                                 <div class="form-check">
                                     <input id="a-6" class="form-check-input" name="internet" type="checkbox"
                                     {{ request('internet') ? 'checked' : '' }}
                                     >
                                     <label for="a-6" class="form-check-label"> @lang('label.Internet') </label>
                                 </div>
                             </li>
                             <li>
                                 <div class="form-check">
                                     <input id="a-7" class="form-check-input" name="kitchen" type="checkbox"
                                     {{ request('kitchen') ? 'checked' : '' }}
                                     >
                                     <label for="a-7" class="form-check-label"> @lang('label.Kitchen') </label>
                                </div>
                             </li>
                             <li>
                                 <div class="form-check">
                                     <input id="a-8" class="form-check-input" name="fireplace" type="checkbox"
                                     {{ request('fireplace') ? 'checked' : '' }}
                                     >
                                     <label for="a-8" class="form-check-label">@lang('label.Fireplace')</label>
                                 </div>
                             </li>
                             <li>
                                 <div class="form-check">
                                     <input id="a-9" class="form-check-input" name="elevator" type="checkbox"
                                       {{ request('elevator') ? 'checked' : '' }}
                                     >
                                     <label for="a-9" class="form-check-label">@lang('label.Elevator')</label>
                                 </div>
                             </li>
                             <li>
                                 <div class="form-check">
                                     <input id="a-10" class="form-check-input" name="smoking_allowed" type="checkbox"
                                         {{ request('smoking_allowed') ? 'checked' : '' }}
                                     >
                                     <label for="a-10" class="form-check-label"> @lang('label.Smoking allowed') </label>
                                 </div>
                             </li>
                             <li>
                                 <div class="form-check">
                                     <input id="a-11" class="form-check-input" name="balcony" type="checkbox"
                                      {{ request('balcony') ? 'checked' : '' }}
                                     >
                                     <label for="a-11" class="form-check-label">@lang('label.Balcony')</label>
                                 </div>
                             </li>
                             <li>
                                 <div class="form-check">
                                     <input id="a-12" class="form-check-input" name="terrace" type="checkbox"
                                      {{ request('terrace') ? 'checked' : '' }}
                                     >
                                     <label for="a-12" class="form-check-label">@lang('label.Terrace')</label>
                                 </div>
                             </li>
                         </ul>
                     </div>

                 </div>
                 <!-- /row -->

             </div>
         </div>
     </form>

 </div>
