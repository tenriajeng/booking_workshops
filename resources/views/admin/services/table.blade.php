<table class="table table-separate table-head-custom collapsed" id="kt_datatable">
    <thead>
        <tr>
            <th>NO</th>
            <th>Jenis Service</th>
            <th>Price</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($data as $services)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $services->name }}</td>
                <td>@currency($services->price)</td>

                <td>
                    <div class="dropdown dropdown-inline">
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
                            <i class="la la-cog"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <ul class="nav nav-hoverable flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('services.edit', $services->id) }}">
                                        <i class="nav-icon la la-edit"></i>
                                        <span class="nav-text">Edit</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    {{-- create form detele --}}
                                    <form action="{{ route('admin.services.delete', $services->id) }}"
                                        id="formDelete[{{ $services->id }}]" method="get">

                                    </form>
                                    <a class="nav-link deleteButton button delete-confirm"
                                        onclick="deleteFunction({{ $services->id }})">
                                        <i class="nav-icon la la-trash"></i>
                                        <span class="nav-text">Delete</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>NO</th>
            <th>Jenis Service</th>
            <th>Price</th>
            <th>ACTION</th>
        </tr>
    </tfoot>
</table>

@push('page_script')
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.delete-confirm').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
</script> --}}
@endpush
