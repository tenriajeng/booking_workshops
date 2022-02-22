<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@stack('title_page')</h5>
            <!--end::Page Title-->
            <!--begin::Action-->
            @stack('sub_title_page')

            <!--end::Action-->
        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->

        <div class="d-flex align-items-center flex-wrap">
            <!--begin::Actions-->
            @stack('tools')

            @php
            $x = App\Models\Booking::where('status', 1)->count();
            $y = App\Models\Booking::where('status', 1)->orderBy('id', 'desc')->get();
            @endphp

            <div class="dropdown dropdown-inline my-2 my-lg-0 position-relative" data-toggle="tooltip"
                title="Daftar Booking" data-placement="left">
                <a href="#" class="btn btn-primary btn-icon" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="svg-icon svg-icon-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-bell" viewBox="0 0 16 16">
                            <path
                                d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                        </svg>
                    </span>
                    @if ($x > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $x }}
                    </span>
                    @endif
                </a>
                <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                    <ul class="navi navi-hover">
                        <li class="navi-header font-weight-bold py-4">
                            <span class="font-size-lg">Daftar Booking :</span>
                            <i class="icon-md text-muted" data-toggle="tooltip" data-placement="right">{{ $x }}</i>
                        </li>
                        <li class="navi-separator mb-3 opacity-70"></li>
                        @foreach ($y as $y)
                        <li class="navi-item">
                            <a href="/admin/booking/edit/{{ $y->id }}" class="navi-link">
                                <span class="navi-text">
                                    <span class="label label-xl label-inline label-light-success">
                                        {{ $y->user->email ?? '-' }}
                                    </span>
                                </span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!--end::Dropdown-->
        </div>
        <!--end::Toolbar-->
    </div>
</div>