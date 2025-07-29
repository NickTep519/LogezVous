 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 <script>
     toastr.options = {
         "closeButton": true,
         "progressBar": true,
         "positionClass": "toast-top-right",
         "timeOut": "10000"
     };

     @if (session('success'))
         toastr.success("{{ session('success') }}", "{{ __('global.Success') }}", );
     @endif

     @if (session('error'))
         toastr.error("{{ session('error') }}", "{{ __('global.Error') }}", );
     @endif

     @if (session('info'))
         toastr.info("{{ session('info') }}", "{{ __('global.Info') }}", );
     @endif

     @if (session('warning'))
         toastr.warning("{{ session('warning') }}", "{{ __('global.Warning') }}", );
     @endif
 </script>
