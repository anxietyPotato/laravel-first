@extends('layout')


<form method="POST" action="{{ route('product.update', ['id' => $product->id]) }}" enctype="multipart/form-data">



        {{csrf_field()}}

        <div class="mb-3">
            <label for="productName" class="form-label">Name</label>
            <input type="text" class="form-control" id="productName" name="name" value="{{$product->name}}" required>
        </div>


        <div class="mb-3">
            <label for="productDesc" class="form-label" >Description</label>
            <textarea class="form-control" id="productDesc" name="description"  required>{{$product->description}}</textarea>
        </div>


        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" min="1" value="{{$product->amount}}" required>
        </div>


        <div class="mb-3">
            <label for="price" class="form-label">Price </label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" value="{{$product->price}}" required>
        </div>


        <div class="mb-3">
            <label for="image" class="form-label">Image </label>
            <input type="url" class="form-control" id="image" name="image" value="{{$product->image}}" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary px-5">submit changes</button>
        </div>
    </form>

