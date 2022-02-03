@csrf
<input type="hidden" name="status" id="status" value="1">

<div class="form-group row">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <label>Text *</label>
        <input type="text" class="form-control  @error('text') is-invalid @enderror" placeholder="Example parts"
            name="text" id="text" value="{{ $data->text ?? '' }}" />
        @error('text')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
        <label>Start Time *</label>
        <div class="input-group timepicker">
            <input class="form-control" id="kt_timepicker_2" readonly placeholder="Select time" name="start"
                type="text" />
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="la la-clock-o"></i>
                </span>
            </div>
        </div>
        @error('start')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
        <label>End Time *</label>
        <div class="input-group timepicker">
            <input class="form-control" id="kt_timepicker_3" readonly placeholder="Select time" name="end"
                type="text" />
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="la la-clock-o"></i>
                </span>
            </div>
        </div>
        @error('end')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
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
                // minimum setup
                $('#kt_timepicker_2, #kt_timepicker_2_modal').timepicker({
                    minuteStep: 1,
                    defaultTime: '09:00:00 AM',
                    showSeconds: true,
                    showMeridian: false,
                    snapToStep: true
                });

                $('#kt_timepicker_3, #kt_timepicker_3_modal').timepicker({
                    minuteStep: 1,
                    defaultTime: '10:00:00 AM',
                    showSeconds: true,
                    showMeridian: false,
                    snapToStep: true
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
