 <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
     <div class="agents-grid card rounded-3 border p-4">
         <div class="agents-grid-wrap mb-4">
             <div class="fr-grid-thumb mx-auto text-center mt-4 mb-3">
                 <a href="{{ route('dashboard.agents.show', $agent) }}" class="d-inline-flex p-1 circle border">
                     <img src="{{ asset($agent->image) }}" class="img-fluid circle" width="100"
                         alt="" />
                 </a>
             </div>
             <div class="fr-grid-deatil text-center">
                 <div class="rating-wrap d-block">
                     <div class="d-flex align-items-center justify-content-center gap-2">
                         <span class="text-warning"><i class="bi bi-star-fill"></i></span>
                         <span class="text-dark fw-semibold"> {{ $agent->averageRating() }} </span>
                         {{-- <span class="text-muted fw-medium text-sm">(1.12k)</span> --}}
                     </div>
                 </div>
                 <div class="fr-grid-deatil-flex">
                     <h5 class="fr-can-name lh-base mb-0"><a href="{{ route('dashboard.agents.show', $agent) }}"> {{ $agent->name }} </a></h5>
                     <span class="agent-location text-muted"><i class="bi bi-geo-alt me-2"></i> {{ $agent->city }} </span>
                 </div>
             </div>
         </div>

         {{-- <div class="fr-grid-info d-flex align-items-center justify-content-center">
             <a href="agents.html#" class="btn btn-outline-gray rounded-pill border-2 w-100">View Profile<i
                     class="bi bi-arrow-up-right ms-2"></i></a>
         </div> --}}

     </div>
 </div>
