<input type="hidden" name="status" id="status" value="1">

<div class="form-group row">
    <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12">
        <label>Name *</label>
        <input type="text" class="form-control  @error('name') is-invalid @enderror" placeholder="Example pliers"
            name="name" id="name" value="{{ $data->name ?? '' }}" />
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <label>Category *</label>
        <select class="form-control select2  @error('category_id') is-invalid @enderror" id="kt_select2_1"
            name="category_id">
            <option></option>
            @foreach (App\Models\Category::all() as $item)
                <option
                    @isset($data) @if ($data->category_id == $item->id)
                    {{ 'selected' }}
            @endif
        @endisset
                    value="{{ $item->id }}">
                    {{ $item->name }}
                </option>
            @endforeach
        </select>

        @error('category_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <label>Stock *</label>
        <input type="number" class="form-control  @error('name') is-invalid @enderror" placeholder="Example 100"
            name="stock" id="stock" value="{{ $data->stock ?? '' }}" />
        @error('stock')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <label>Price *</label>
        <input type="number" class="form-control  @error('price') is-invalid @enderror" placeholder="Example 100000"
            name="price" id="price" value="{{ $data->price ?? '' }}" />

        @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>



<div class="form-group row">
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
        <label>Description *</label>
        <textarea class="summernote  @error('description') is-invalid @enderror" id="kt_summernote_1" name="description">{{ $data->description ?? '' }}</textarea>
        <span class="form-text text-muted"></span>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <label>Product Photo *</label>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar"
                style="background-image: url({{ isset($data->image) ? $data->image : asset('media/users/blank.png') }})">
                <div class="image-input-wrapper"></div>
                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                    data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                    <i class="fa fa-pen icon-sm text-muted"></i>
                    <input type="file" name="file" accept=".png, .jpg, .jpeg">
                    <input type="hidden" name="profile_avatar_remove">
                </label>
                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                    data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                </span>
            </div>
        </div>
        @error('file')
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
    <script>
        // Class definition
        var KTSelect2 = function() {
            // Private functions
            var demos = function() {
                // basic
                $('#kt_select2_1').select2({
                    placeholder: "Select a tag"
                });
            }

            // Public functions
            return {
                init: function() {
                    demos();
                }
            };
        }();
        // Initialization
        jQuery(document).ready(function() {
            KTSelect2.init();
        });
    </script>
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
