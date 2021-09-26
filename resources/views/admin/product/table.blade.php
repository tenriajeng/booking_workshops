<table class="table table-separate table-head-custom collapsed" id="kt_datatable">
    <thead>
        <tr>
            <th>#</th>
            <th>image</th>
            <th>category</th>
            <th>name</th>
            <th>price</th>
            <th>stock</th>
            <th>duration</th>
            <th>description</th>
            <th>status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        @endphp
        @foreach ($data as $value)
        <tr>
            <td>{{ $no++}}</td>
            <td>
                <div class="symbol symbol-50 symbol-light mr-2">
                    <span class="symbol-label">
                        <img src="{{ $value->image ?? ''  }}" style="height: 20px;" class="h-50 align-self-center"
                            alt="">
                    </span>
                </div>
            </td>
            <td>{{ App\Models\Category::find( $value->category_id)->name }}</td>
            <td>{{ $value->name }}</td>
            <td>@currency($value->price)</td>
            <td>{{ $value->stock }}</td>
            <td>{{ $value->duration  }} Minutes</td>
            <td>{{ $value->description  }}</td>
            <td>{{ $value->status == 1 ? 'Publish' : 'Draft' }}</td>
            <td>
                <div class="dropdown dropdown-inline">
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
                        <i class="la la-cog"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <ul class="nav nav-hoverable flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('product.edit', $value->id) }}">
                                    <i class="nav-icon la la-edit"></i>
                                    <span class="nav-text">Edit</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link deleteButton" onclick="deleteFunction({{ $value->id }})">
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
            <th>#</th>
            <th>image</th>
            <th>category_id</th>
            <th>name</th>
            <th>price</th>
            <th>stock</th>
            <th>duration</th>
            <th>description</th>
            <th>status</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>