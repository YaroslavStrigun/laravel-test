@extends('layouts.app')
@section('title', 'List of products')

@section('content')
    <div class="row">
        <div class="col col-md-12">
            <h1>List of products</h1>
        </div>
        <div class="col col-md-12" style="margin-top: 10px">
            <table class="table table-bordered">
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
                        <td style="color: {{ $product->color }}">{{ $product->is_active ? 'True' : 'False' }}</td>
                        <td>
                            <a class="btn btn-primary" style="margin-bottom: 10px" href="{{ route('products.show', [$product]) }}">Edit</a>
                            <form method="POST" action="{{ route('products.destroy', [$product]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $products->links('pagination::bootstrap-4') }}
    </div>
@endsection
