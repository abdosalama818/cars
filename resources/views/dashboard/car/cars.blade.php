
@extends('dashboard.layout')


@section('body')
<div class="container">

<div class="row">
    <div class="col-12">
       <div class="add-cat m-2">
        <a class="btn btn-success " href="{{url('add/car')}}">اضافه سياره </a>
       </div>
            <div class="card">
                <div class="card-header">

                    <h3 class="card-title">@lang('routes.show all categories')</h3>


                    <div class="card-tools ">
                  <form action="{{url('search/car/')}}" method="get">
                    <div class="form-group ">
                        <input type="text" name="search" class="form-control float-right" placeholder="بحث ">

                        <div class="input-group-append">
                        <button type="submit" class="btn btn-success m-2"><i class="fas fa-search"> بحث </i></button>
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

                        <th>اسم السياره </th>
                        <th>نوع السياره </th>
                        <th>صورة السياره </th>


                        <th>الاكشن </th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($cars as $car )



                <tr>
                    <td>{{$car->id}}</td>


                     <td>{{$car->name}}</td>



                     <td>{{$car->brand->name}}</td>
                     <td><img src='{{asset("uploads/$car->img")}}' style="width:100px" alt="" srcset=""></td>









                    <td>
                        <a href="{{url('edit/car',$car->id)}}" target="_blank" class="btn btn-info" rel="noopener noreferrer">تعديل </a>
                        <a href="{{url('delete/car',$car->id)}}" class="btn btn-danger" rel="noopener noreferrer">حذف </a>
                    </td>
                    </tr>


@endforeach
















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














