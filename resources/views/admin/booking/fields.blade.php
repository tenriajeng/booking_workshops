@csrf
<div class="form-group row">
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 pt-2">
        <label>User *</label>
        <select class="form-control select2  @error('user_id') is-invalid @enderror" id="kt_select2_1" name="user_id">
            <option></option>
            @foreach (App\Models\User::all() as $item)
                @if (request()->is('admin/booking/create'))
                    <option
                        @isset($bookData) @if ($bookData->user_id == $item->id)
                {{ 'selected' }}
                @endif
                @endisset
                        value="{{ $item->id }}">
                        {{ $item->name }}
                    </option>
                @else
                    <option {{ $item->id == $data->user_id ? 'selected' : '' }} value="{{ $item->id }}">
                        {{ $item->name }}
                    </option>
                @endif
            @endforeach
        </select>

        @error('user_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 pt-2">
        <label>Jenis Services *</label>
        <select class="form-control select2  @error('services') is-invalid @enderror" id="kt_select2_4"
            name="services_id">
            @foreach (App\Models\Services::all() as $services)
                @if (request()->is('admin/booking/create'))
                    <option value="{{ $services->id }}">
                        {{ $services->name }}
                    </option>
                @else
                    <option {{ $data->services_id == $services->id ? 'selected' : '' }} value="{{ $services->id }}">
                        {{ $services->name }}
                    </option>
                @endif
            @endforeach
        </select>
        @error('services')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 pt-2">
        <label for="keterangan">Keterangan</label>
        @if (request()->is('admin/booking/create'))
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan">
        @else
            <input type="text" class="form-control" name="keterangan" id="keterangan"
                value="{{ $data->keterangan }}" placeholder="Keterangan">
        @endif
    </div>

    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 pt-2">
        <label for="price">Price</label>
        <input type="text" class="form-control" disabled name="price" id="price"
            value="{{ $data->price ?? '' }}" placeholder="price">
    </div>

    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 pt-2">
        <label>Order Date *</label>
        <div class="input-group date">
            @if (request()->is('admin/booking/create'))
                <input class="form-control" onchange="dateChange()" type="date" name="order_date" value="2021-10-11"
                    id="example-date-input">
            @else
                @php
                    $order_date = $data->order_date;
                    $order_date = substr($order_date, 0, 10);
                @endphp
                <input class="form-control" onchange="dateChange()" type="date" name="order_date"
                    value="{{ $order_date }}" id="example-date-input">
            @endif

            {{-- <input type="text" name="order_date"
                class="form-control datetimepicker-input @error('order_date') is-invalid @enderror"
                placeholder="Select date & time" data-target="#kt_datepicker_1" value="" /> --}}
            {{-- {{ $data->order_date }} --}}
            {{-- <div class="input-group-append" data-target="#kt_datepicker_1" data-toggle="datetimepicker">
                <span class="input-group-text">
                    <i class="ki ki-calendar"></i>
                </span>
            </div> --}}
        </div>
        @error('order_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 pt-2">
        <label>Time *</label>
        <select class="form-control select2  @error('schedule') is-invalid @enderror" id="kt_select2_3"
            name="schedule_id">
            @foreach (App\Models\Schedule::all() as $schedule)
                @if (request()->is('admin/booking/create'))
                    <option value="{{ $schedule->id }}">
                        {{ $schedule->start }}-{{ $schedule->end }}
                    </option>
                @else
                    <option {{ $data->schedule_id == $schedule->id ? 'selected' : '' }} value="{{ $schedule->id }}">
                        {{ $schedule->start }}-{{ $schedule->end }}
                    </option>
                @endif
            @endforeach
        </select>
        @error('schedule')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 col-12 pt-2">
        <label>status *</label>
        <select class="form-control select2  @error('status') is-invalid @enderror" id="kt_select2_2" name="status">
            @if (request()->is('admin/booking/create'))
                <option
                    @isset($bookData) @if ($bookData->status == 1) {{ 'selected' }} @endif @endisset
                    value="1">
                    Book
                </option>
                <option
                    @isset($bookData) @if ($bookData->status == 2) {{ 'selected' }} @endif @endisset
                    value="2">
                    Process
                </option>
                <option
                    @isset($bookData) @if ($bookData->status == 3) {{ 'selected' }} @endif @endisset
                    value="3">
                    Finished
                </option>
                <option
                    @isset($bookData) @if ($bookData->status == 4) {{ 'selected' }} @endif @endisset
                    value="4">
                    Cancel
                </option>
                <option
                    @isset($bookData) @if ($bookData->status == 5) {{ 'selected' }} @endif @endisset
                    value="5">
                    di Setujui
                </option>
            @else
                <option {{ $data->status == 1 ? 'selected' : '' }} value="1">Book</option>
                <option {{ $data->status == 2 ? 'selected' : '' }} value="2">Process</option>
                <option {{ $data->status == 3 ? 'selected' : '' }} value="3">Finished</option>
                <option {{ $data->status == 4 ? 'selected' : '' }} value="4">Cancel</option>
                <option {{ $data->status == 5 ? 'selected' : '' }} value="5">di Setujui</option>
            @endif
        </select>
        @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div id="item">
    @isset($booking_products)

        @foreach ($booking_products as $key => $booking_product)
            <div class="form-group row align-items-center" id="row[{{ $key }}]">
                <input type="hidden" value="{{ $booking_product->product_id }}" name="product[{{ $key }}]">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 pt-2">
                    <label>Product {{ $key }}</label>
                    <input disabled type="text"
                        value="{{ App\Models\Product::find($booking_product->product_id)->name }}" class="form-control" />
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-12 pt-2">
                    <label>Category </label>
                    <input disabled type="text"
                        value="{{ App\Models\Product::find($booking_product->product_id)->category->name }}"
                        class="form-control" />
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-12 pt-2">
                    <label>Price </label>
                    <input disabled type="text"
                        value="{{ App\Models\Product::find($booking_product->product_id)->price }}" class="form-control" />
                </div>
                <div class="col-lg-2 col-md-2 col-sm-6 col-6 pt-2">
                    <a href="javascript:;" onclick="deleteBtn({{ $key }})"
                        class="btn btn-sm font-weight-bolder btn-light-danger mt-7">
                        <i class="la la-trash-o"></i>Delete
                    </a>
                </div>
            </div>
        @endforeach
    @endisset
</div>

@include('admin.booking.product')

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
        let i = "{{ count($booking_products) }}";

        function add(data, id) {
            console.log(data);
            let item = `
        <div class="form-group row align-items-center" id="row[${i}]">
			<input type="hidden" value="${data.id}" name="product[${i}]"> 
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 pt-2">
				<label>Product </label>
                <input disabled type="text" value="${data.name}" class="form-control"  />
            </div> 
			<div class="col-lg-3 col-md-3 col-sm-12 col-12 pt-2">
				<label>Category </label>
                <input disabled type="text" value="${data.category.name}" class="form-control"  />
            </div> 
			<div class="col-lg-2 col-md-2 col-sm-12 col-12 pt-2">
				<label>Price </label>
                <input disabled type="text" value="${data.price}" class="form-control"  />
            </div>  
            <div class="col-lg-2 col-md-2 col-sm-6 col-6 pt-2">   
                <a href="javascript:;" onclick="deleteBtn(${i})" class="btn btn-sm font-weight-bolder btn-light-danger mt-7">
                    <i class="la la-trash-o"></i>Delete
                </a>
            </div>
        </div>
        `;
            i++;
            $("#item").append(item);
        }

        function deleteBtn(id) {
            let myobj = `row[${id}]`
            myobj = document.getElementById(myobj);
            myobj.remove();
        }

        function formSubmit() {
            document.getElementById("kt_form").submit();
        }
    </script>
    <script>
        // Class definition
        var KTSelect2 = function() {
            // Private functions
            var demos = function() {
                // basic
                $('#kt_select2_1').select2({
                    placeholder: "Select a user"
                });

                $('#kt_select2_2').select2({
                    placeholder: "Select Status"
                });

                $('#kt_select2_3').select2({
                    placeholder: "Select Time"
                });
                $('#kt_select2_4').select2({
                    placeholder: "Select Service"
                });

                $('#kt_select2_103').select2({
                    placeholder: "Select Status"
                });

                // $('#kt_datetimepicker_1').datetimepicker();
                $('#kt_datepicker_1').datepicker({
                    rtl: KTUtil.isRTL(),
                    todayHighlight: true,
                    orientation: "bottom left",
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

@push('page_style')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('page_script')
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/pages/crud/datatables/extensions/responsive_content.js') }}"></script>
@endpush
