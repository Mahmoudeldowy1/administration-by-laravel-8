@extends('layouts.admin-master')

@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if(session('shop-deleted-message'))
                            <div class="alert alert-danger">{{session('shop-deleted-message')}}</div>
                        @elseif(session('shop-created-message'))
                            <div class="alert alert-success">{{session('shop-created-message')}}</div>
                        @elseif(session('shop-updated-message'))
                            <div class="alert alert-success">{{session('shop-updated-message')}}</div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable For Shops</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Logo</th>
                                        <th>Website</th>
                                        <th>Created At</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($shops as $shop)
                                    <tr>
                                        <td>{{$shop->id}}</td>
                                        <td>{{$shop->name}}</td>
                                        <td>{{$shop->email}}</td>
                                        <td><img src="{{$shop->logo}}" height="100px" width="100px" class="img-fluid" alt="logo" ></td>
                                        <td>{{$shop->website}}</td>
                                        <td>{{$shop->created_at}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="{{route('shops.edit', $shop->id)}}"><button class="btn btn-secondary">Edit</button></a>
                                                </div>
                                                <div class="col-md-6">
                                                    <form action="{{route('shops.destroy', $shop->id)}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Logo</th>
                                        <th>Website</th>
                                        <th>Created At</th>
                                        <th>Options</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.content-header -->

    </div>

    <div class="d-flex">
        <div class="mx-auto">
            {{$shops->links()}}
        </div>
    </div>
@endsection
