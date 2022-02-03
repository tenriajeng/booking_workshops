{{-- @extends('layouts.app') --}}
@extends('pimpinan.layout.home')

@push('subheader')
@push('title_page')
User
@endpush
@push('sub_title_page')
<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
    <li class="breadcrumb-item text-muted">
        <a href="" class="text-muted">Form</a>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="" class="text-muted">Update</a>
    </li>
</ul>
@endpush

@section('content')
<div class="card card-custom example example-compact">
    <div class="card-header">
        <h3 class="card-title">Update Admin</h3>
    </div>
    <!--begin::Form-->
    <form action="/pimpinan/update/{{ $data->id }}" method="post" enctype="multipart/form-data" class="form"
        id="kt_form">
        <div class="card-body">
            @include('admin.user.fields')
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-9 ml-lg-auto">
                    <button type="submit" class="btn btn-primary mr-2">Save</button>
                    <button type="reset" class="btn btn-light-primary">Cancel</button>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>
@endsection