<div class="form-group row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <table class="table table-separate table-head-custom collapsed" id="kt_datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>image</th>
                    <th>category</th>
                    <th>name</th>
                    <th>price</th>
                    <th>stock</th>
                    <th>description</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($products as $value)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            <div class="symbol symbol-50 symbol-light mr-2">
                                <span class="symbol-label">
                                    <img src="{{ $value->image ?? '' }}" style="height: 20px;"
                                        class="h-50 align-self-center" alt="">
                                </span>
                            </div>
                        </td>
                        <td>{{ App\Models\Category::find($value->category_id)->name }}</td>
                        <td>{{ $value->name }}</td>
                        <td>@currency($value->price)</td>
                        <td>{{ $value->stock }}</td>
                        <td>{!! $value->description !!}</td>
                        <td>{{ $value->status == 1 ? 'Publish' : 'Draft' }}</td>
                        <td>
                            <a class="btn btn-primary" onclick="add({{ $value, $value->category->name }})">Add</a>
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
                    <th>description</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
