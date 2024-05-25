@extends('base')
@section('content')
<ul>
       
<li> Product Name: {{ $product->product_name  }} </li> 
<li>Quantity: {{ $product->quantity  }} </li> 
<li>   Price: {{ $product->price  }} </li> 
<li> Fournisseur: {{ $product->fournisseur  }} </li> 
<li> Category: {{ $product->category  }} </li> 



</ul>
@endsection