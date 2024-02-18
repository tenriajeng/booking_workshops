<!-- Scroll top -->
<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
@auth
    @include('layouts.firebase_script')
@endauth
<!--Plugins-->
<script src="{{ secure_asset('user-template/js/jquery.js') }}"></script>
<script src="{{ secure_asset('user-template/js/plugins.js') }}"></script>
<!--Template functions-->
<script src="{{ secure_asset('user-template/js/functions.js') }}"></script>
