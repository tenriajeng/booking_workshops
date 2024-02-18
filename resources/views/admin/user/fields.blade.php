@csrf
<div class="form-group row">
    <label class="col-form-label col-lg-3 col-sm-3 col-3 text-right">Name *</label>
    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
        <div class="input-group">
            <input type="text" value="{{ $data->name ?? '' }}"
                class="form-control col-9 @error('email') is-invalid @enderror" placeholder="Name" name="name" />
        </div>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-lg-3 col-sm-3 col-3 text-right">Email *</label>
    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
        <div class="input-group">
            <input type="email" value="{{ $data->email ?? '' }}" class="form-control col-9" placeholder="Email"
                name="email" />
        </div>
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-lg-3 col-sm-3 col-3 text-right">Password *</label>
    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
        <div class="input-group">
            <input type="password" class="form-control col-9" placeholder="Password" name="password" />
        </div>
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-lg-3 col-sm-3 col-3 text-right">Surname *</label>
    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
        <div class="input-group">
            <input type="text" value="{{ $data->name_on_certificate ?? '' }}" class="form-control col-9"
                placeholder="Surname" name="name_on_certificate" />
        </div>
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-lg-3 col-sm-3 col-3 text-right">Role *</label>
    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
        <div class="input-group">
            <select class="form-control select2 col-9" id="kt_select2_102" name="role">
                <option></option>
                @foreach (App\Models\Role::all() as $item)
                    @if ($item->name == 'user')
                        @php
                            if (isset($data)) {
                                foreach (App\Models\User::find($data->id)->getRoleNames() as $role) {
                                    if ($role == $item->name) {
                                        echo 'selected';
                                    }
                                }
                            }
                        @endphp
                        <option value="{{ $item->id }}">
                            {{ $item->name }}
                        </option>
                    @endif
                @endforeach
            </select>
            <span class="form-text text-muted"></span>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-lg-3 col-sm-3 col-3 text-right">Avatar *</label>
    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
        <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar"
            style="background-image: url({{ isset($data->avatar_url) ? secure_asset('Image/User/' . $data->avatar_url) : secure_asset('media/users/blank.png') }})">
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
</div>

@push('page_style')
    <link href="{{ secure_asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('css/pages/wizard/wizard-4.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('page_script')
    <script src="{{ secure_asset('js/pages/custom/user/edit-user.js') }}"></script>
    <script src="{{ secure_asset('js/pages/crud/forms/validation/form-widgets.js') }}"></script>
    <script>
        // Class definition
        var KTSelect2 = function() {
            // Private functions
            var demos = function() {
                // basic
                $('#kt_select2_1').select2({
                    placeholder: "Select a tag"
                });
                // nested
                $('#kt_select2_2').select2({
                    placeholder: "Select a state"
                });
                // multi select
                $('#kt_select2_3').select2({
                    placeholder: "Select a tag",
                });
                $('#kt_select2_101').select2({
                    placeholder: "Select a content",
                });
                $('#kt_select2_102').select2({
                    placeholder: "Choose category",
                });
                // basic
                $('#kt_select2_4').select2({
                    placeholder: "Select a lecture",
                    allowClear: true
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
@endpush
