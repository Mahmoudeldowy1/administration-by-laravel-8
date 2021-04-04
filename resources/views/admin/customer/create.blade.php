@extends('layouts.admin-master')

@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">New Customer</h3>
                    </div>

                <form method="post" action="{{route('customers.store')}}" >
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{old('firstName')}}" >
                            @error('firstName')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{old('lastName')}}" >
                            @error('lastName')
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
                                <option value="{{$shop->id}}" {{old('shop_id') === $shop->id ? 'selected' : null}}>{{$shop->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
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
