<form method="POST" action="{{ isset($product) ? route('products.update', [$product]) : route('products.create') }}">
    @csrf
    @if(isset($product))
        @method('PUT')
    @endif
    <input type="text" name="name" value="{{ $product->name ?? '' }}">
    <input type="text" name="description" value="{{ $product->description ?? '' }}">
    <input type="number" min="0.00" max="10000.00" step="0.01" name="price" value="{{ $product->price ?? 0 }}">
    <input type="checkbox" name="is_active" value="1" @if(isset($product) && $product->is_active ) checked="checked" @endif>
    <button type="submit">Save</button>
</form>
