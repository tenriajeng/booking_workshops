<table class="table table-separate table-head-custom collapsed" id="kt_datatable">
    <thead>
        <tr>
            <th>NO</th>
            <th>Keterangan Waktu</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        @endphp
        @foreach ($data as $schedule)
        <tr>
            <td>{{ $no++}}</td>
            <td>{{ $schedule->text }}</td>
            <td>
                {{ $schedule->start }}
            </td>
            <td>{{ $schedule->end }}</td>
            <td>
                <div class="dropdown dropdown-inline">
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
                        <i class="la la-cog"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <ul class="nav nav-hoverable flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('schedule.edit', $schedule->id) }}">
                                    <i class="nav-icon la la-edit"></i>
                                    <span class="nav-text">Edit</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                {{-- <form id="formDelete[{{ $schedule->id }}]" method="GET"
                                    action="{{ route('schedule.destroy', $schedule->id  ) }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $schedule->id }}">
                                </form> --}}
                                {{-- <a href="/admin/schedule/delete/{{ $schedule->id }}" class="nav-link deleteButton"
                                    onclick="deleteFunction({{ $schedule->id }})">
                                    <i class="nav-icon la la-trash"></i>
                                    <span class="nav-text">Delete</span>
                                </a> --}}
                                <a href="/admin/schedule/delete/{{ $schedule->id }}" class="button delete-confirm">
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
            <th>User</th>
            <th>Status</th>
            <th>Order Date</th>
            <th>ACTION</th>
        </tr>
    </tfoot>
</table>

@push('page_script')
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.delete-confirm').on('click', function (event) {
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
</script>

@endpush