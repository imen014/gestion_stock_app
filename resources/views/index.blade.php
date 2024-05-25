@extends('base')
@section('content')
<ul>

       @foreach ($products as $product) <li>
       Product Name: {{ $product->product_name  }}
        Quantity: {{ $product->quantity  }}
        Price: {{ $product->price  }}
        Fournisseur: {{ $product->fournisseur  }}
        Category: {{ $product->category  }}

        <a class="bg-dark" href="{{ route('edit_product', ['id'=>$product->id])  }}">update</a>
        <a href="{{ route('destroy_product', ['id'=>$product->id])  }}">delete</a>



</li>  @endforeach
</ul>
@endsection