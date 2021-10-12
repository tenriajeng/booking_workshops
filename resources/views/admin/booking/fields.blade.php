@csrf
<div class="form-group row">
	<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 pt-2">
		<label>User *</label>
		<select class="form-control select2  @error('user_id') is-invalid @enderror" id="kt_select2_1" name="user_id">
			<option></option>
			@foreach (App\Models\User::all() as $item)
			<option @isset($bookData) @if ($bookData->user_id == $item->id)
				{{ "selected" }}
				@endif
				@endisset
				value="{{ $item->id }}">
				{{ $item->name }}
			</option>
			@endforeach
		</select>

		@error('user_id')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		@enderror
	</div>
	<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 pt-2">
		<label>Order Date *</label>
		<div class="input-group date" id="kt_datepicker_1" data-target-input="nearest">
			<input type="text" name="order_date"
				class="form-control datetimepicker-input @error('order_date') is-invalid @enderror"
				placeholder="Select date & time" data-target="#kt_datepicker_1" />
			<div class="input-group-append" data-target="#kt_datepicker_1" data-toggle="datetimepicker">
				<span class="input-group-text">
					<i class="ki ki-calendar"></i>
				</span>
			</div>
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
			<option value="{{ $schedule->id }}">{{ $schedule->start }}-{{ $schedule->end }}</option>
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
			<option></option>
			<option @isset($bookData) @if ($bookData->status == 1) {{ "selected" }} @endif @endisset value="1">
				Book
			</option>
			<option @isset($bookData) @if ($bookData->status == 2) {{ "selected" }} @endif @endisset value="2">
				Process
			</option>
			<option @isset($bookData) @if ($bookData->status == 3) {{ "selected" }} @endif @endisset value="3">
				Finished
			</option>
		</select>
		@error('status')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		@enderror
	</div>
</div>

<div id="item">
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
	let i = 0; 
	function add(data,id) {
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