 <div class="row justify-content-center">
     <div class="col-lg-12 col-md-12">
         <div class="item-shorting-box">
             <div class="item-shorting clearfix">
                 <div class="left-column pull-left">
                     <h4 class="m-0 fs-6">
                         {!! __('pagination.Showing') !!}
                         @if ($properties->firstItem())
                             <span class="font-medium">{{ $properties->firstItem() }}</span>
                             {!! __('pagination.to') !!}
                             <span class="font-medium">{{ $properties->lastItem() }}</span>
                         @else
                             {{ $properties->count() }}
                         @endif
                         {!! __('pagination.of') !!}
                         <span class="font-medium">{{ $properties->total() }}</span>
                         {!! __('pagination.results') !!}
                     </h4>
                 </div>
             </div>
             <div class="item-shorting-box-right">
                <form action="{{ route('properties.index') }}" method="GET">
                    <div class="shorting-by">
                     <select id="shorty" class="form-control">
                         <option value="">&nbsp;</option>
                         <option value="1">Low Price</option>
                         <option value="2">High Price</option>
                         <option value="3">Most Popular</option>
                     </select>
                 </div>
                </form>

                 <ul class="shorting-list">
                     <li>
                         <a href="{{ route('properties.index', ['show' => 'grid']) }}" class="w-12 h-12">
                             <span class="svg-icon text-muted-2 svg-icon-2hx">
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                     <rect x="2" y="2" width="9" height="9" rx="2"
                                         fill="currentColor" />
                                     <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
                                         fill="currentColor" />
                                     <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
                                         fill="currentColor" />
                                     <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
                                         fill="currentColor" />
                                 </svg>
                             </span>
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('properties.index', ['show' => 'list']) }}" class="active w-12 h-12">
                             <span class="svg-icon text-seegreen svg-icon-2hx">
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                     <path opacity="0.3"
                                         d="M14 10V20C14 20.6 13.6 21 13 21H10C9.4 21 9 20.6 9 20V10C9 9.4 9.4 9 10 9H13C13.6 9 14 9.4 14 10ZM20 9H17C16.4 9 16 9.4 16 10V20C16 20.6 16.4 21 17 21H20C20.6 21 21 20.6 21 20V10C21 9.4 20.6 9 20 9Z"
                                         fill="currentColor" />
                                     <path
                                         d="M7 10V20C7 20.6 6.6 21 6 21H3C2.4 21 2 20.6 2 20V10C2 9.4 2.4 9 3 9H6C6.6 9 7 9.4 7 10ZM21 6V3C21 2.4 20.6 2 20 2H3C2.4 2 2 2.4 2 3V6C2 6.6 2.4 7 3 7H20C20.6 7 21 6.6 21 6Z"
                                         fill="currentColor" />
                                 </svg>
                             </span>
                         </a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </div>
