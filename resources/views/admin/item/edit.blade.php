@extends('layouts.admin-master')

@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Item</h3>
                    </div>

                    <form method="post" action="{{route('items.update',$item->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Item Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$item->name}}" >
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Price Item</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$item->price}}" >
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description Item</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="5" rows="5">{{$item->description}}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="shop">Shop</label><br>
                                <select name="shop_id" >
                                    <option value="">choose shop</option>
                                    @foreach($shops as $shop)
                                        <option value="{{$shop->id}}" {{$item->shop_id === $shop->id ? 'selected' : null}}>{{$shop->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>



                </div>

            </div>
        </div>
        <!-- /.content-header -->

    </div>


@endsection
