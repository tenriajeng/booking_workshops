<input type="hidden" name="status" id="status" value="1">

<div class="form-group row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <label>Name *</label>
        <input type="text" class="form-control  @error('name') is-invalid @enderror" placeholder="Example parts"
            name="name" id="name" value="{{ $data->name ?? '' }}" />
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <label>Description *</label>
        <textarea class="summernote" id="kt_summernote_1" name="description">{{ $data->description ?? '' }}</textarea>
        <span class="form-text text-muted"></span>
    </div>
</div>

@push('page_style')
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/pages/wizard/wizard-4.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('page_script')
    <script src="{{ asset('js/pages/custom/user/edit-user.js') }}"></script>
    <script src="{{ asset('js/pages/crud/forms/validation/form-widgets.js') }}"></script>
    <script src="{{ asset('js/pages/crud/forms/editors/summernote.js') }}"></script>
    <script>
        function formSubmit(value) {
            document.getElementById("status").value = value;
            document.getElementById("kt_form").submit();
        }
    </script>
    <script>
        // Class definition
        var KTSummernoteDemo = function() {
            // Private functions
            var demos = function() {
                $('.summernote').summernote({
                    height: 200,
                    name: "summary"
                });
            }
            return {
                // public functions
                init: function() {
                    demos();
                }
            };
        }();
        // Initialization
        jQuery(document).ready(function() {
            KTSummernoteDemo.init();
        });
    </script>
@endpush
