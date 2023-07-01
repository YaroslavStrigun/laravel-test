<table>
    <thead>
    <th>Name</th>
    <th>Description</th>
    <th>Price</th>
    <th>Is active</th>
    <th>Actions</th>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->is_active ? 'True' : 'False' }}</td>
            <td>
                <a href="{{ route('products.show', [$product]) }}">Edit</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
