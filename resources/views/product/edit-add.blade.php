@extends('layouts.app')

@if(isset($product))
    @section('title', "Edit product #{$product->id}")
@else
    @section('title', 'Add new product')
@endif

@section('content')
    <div class="row">
        <div class="col-md-6">
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
        </div>
        <div class="col-md-8">
            <form method="POST" action="{{ isset($product) ? route('products.update', [$product]) : route('products.create') }}">
                @csrf
                @if(isset($product))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="textInput">Name</label>
                    <input type="text"  class="form-control" name="name" id="textInput" value="{{ $product->name ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="priceInput">Price</label>
                    <input type="number" step="0.01"  class="form-control" name="price" id="priceInput" value="{{ $product->price ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="descriptionInput">Description</label>
                    <textarea name="description" class="form-control" id="descriptionInput" rows="3">{{ $product->description ?? '' }}</textarea>
                </div>
                <div class="form-check">
                    <label for="isActiveInput">Is Active</label>
                    <input type="checkbox" name="is_active" value="1" @if(isset($product) && $product->is_active) checked="checked" @endif id="isActiveInput">
                </div>
                <div class="form-group" style="margin-top: 10px">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
