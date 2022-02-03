<table class="table table-separate table-head-custom collapsed" id="kt_datatable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->status == 1 ? 'Publish' : 'Draft' }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <div class="dropdown dropdown-inline">
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
                            <i class="la la-cog"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <ul class="nav nav-hoverable flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('category.edit', $category->id) }}">
                                        <i class="nav-icon la la-edit"></i>
                                        <span class="nav-text">Edit</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/category/delete/{{ $category->id }}"
                                        class="nav-link deleteButton button delete-confirm">
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
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>description</th>
            <th>Actions</th>
        </tr>
    </tfoot>
</table>

@push('page_script')
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
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
    </script>

@endpush
