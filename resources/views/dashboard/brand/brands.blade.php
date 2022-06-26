
@extends('dashboard.layout')


@section('body')
<div class="container">

<div class="row">
    <div class="col-12">
       <div class="add-cat m-2">
        <a class="btn btn-success " href="{{url('add/brand')}}">اضافة نوع جديد </a>
       </div>
            <div class="card">
                <div class="card-header">

                    <h3 class="card-title">عرض انواع السيارات </h3>


                    <div class="card-tools ">
                  <form action="{{url('dashboard/search/brand/')}}" method="get">
                    <div class="form-group ">
                        <input type="text" name="search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                        <button type="submit" class="btn btn-success m-2"><i class="fas fa-search">  بحث </i></button>
                        </div>
                    </div>
                  </form>
                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                    <thead>


                        <tr>
                        <th>ID</th>
                        <th>نوع السياره  </th>
                        <th>الماركه </th>


                        <th>الاكشن </th>

                        </tr>
                    </thead>
                    <tbody>




                       <tr>
                        @foreach ($brands as $brand )

                        <td>{{$brand->id}}</td>

                      <td>{{$brand->name}}</td>
                     {{--  <td><img src='{{asset("uploads/$brand->img}")}}' alt="" srcset=""> {{$brand->img}}</td> --}}
                      <td><img src='{{asset("uploads/$brand->img")}}' style="width:100px" alt="" srcset=""></td>




                        <td>
                            <a href="{{url('edit/brand',$brand->id)}}" target="_blank" class="btn btn-info" rel="noopener noreferrer">تعديل </a>
                            <a href="{{url('delete/brand',$brand->id)}}" class="btn btn-danger" rel="noopener noreferrer">حذف</a>
                        </td>
                        </tr>

                        @endforeach



{{-- <tr>
    <h1 class="alert alert-danger text-center">
        لم يتم اضافة انواع للسيارات بعد

    </h1>
</tr>
 --}}











                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
 </div>
</div>
</div>

@endsection














