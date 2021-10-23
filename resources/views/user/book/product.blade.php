<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Product</th>
            <th scope="col">Category</th>
            <th scope="col">Stock</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $key => $product)
        <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td> <img src="{{ $product->image }}" height="50"></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->stock }}</td>
            <td>
                <a class="btn btn-primary" onclick="add({{ $product, $product->category->name }})">Add</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>