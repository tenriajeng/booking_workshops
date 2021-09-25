<table class="table table-separate table-head-custom collapsed" id="kt_datatable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Creator</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $category)
        <tr>
            <td>{{ $category->id  }}</td>
            <td>{{ $category->name  }}</td>
            <td>{{ $category->slug  }}</td>
            <td>{{ $category->status == 1 ? 'Publish' : 'Draft' }}</td>
            <td>{{ $category->user->name }}</td>
            <td>
                <div class="dropdown dropdown-inline">
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
                        <i class="la la-cog"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <ul class="nav nav-hoverable flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.category.edit', $category->slug) }}">
                                    <i class="nav-icon la la-edit"></i>
                                    <span class="nav-text">{{ trans('admin.crud.update') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.category.edit', $category->slug) }}">
                                    <i class="nav-icon la la-eye"></i>
                                    <span class="nav-text">{{ trans('admin.crud.read') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <form id="formDelete[{{ $category->id }}]" method="POST"
                                    action="{{ route('admin.category.destroy', $category->id  ) }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $category->id }}">
                                </form>
                                <a class="nav-link deleteButton" onclick="deleteFunction({{ $category->id }})">
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
            <th>Slug</th>
            <th>Status</th>
            <th>Creator</th>
            <th>Actions</th>
        </tr>
    </tfoot>
</table>