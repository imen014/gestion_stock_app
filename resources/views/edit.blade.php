@extends('base')
@section('content')
        <form action="{{ route('update_products',['id'=>$product->id]) }}" method="POST">
            @csrf
            @method('PUT')

            product name<input type="text" name="product_name" value="{{ old('product_name',$product->product_name)  }}" />
            fournisseur <input type="text" name="fournisseur" value="{{ old('fournisseur', $product->fournisseur) }}"/>
            quantity <input type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}" />
            category <input type="text" name="category" value="{{ old('category', $product->category) }}" />
            price <input type="number" name="price" value="{{ old('price', $product->price) }}" />
            <input type="submit" value="validate" />
        </form>
@endsection