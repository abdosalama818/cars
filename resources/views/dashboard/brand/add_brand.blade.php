@extends('dashboard.layout')


@section('body')
<div class="container">

<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">اضافه انواع </h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->

          @if ($errors->any())
         <div class="alert alert-danger">
            <ul>
            @foreach ( $errors->all() as $error)
               <li> <h3>{{$error}}</h3></li>
            @endforeach
        </ul>
         </div>



          @endif
          <form role="form" method="post" action = "{{url('/store/brand')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">


                <div class="form-group">
                  <label for="exampleInputEmail1">ادخل  نوع السياره </label>
                  <input type="text"  name="name" class="form-control" id="exampleInputEmail1" placeholder="ادخل نوع السياره ">
                </div>




              <div class="form-group">
                <label for="exampleInputFile"> رفع صوره</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="img" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">اختيار صوره </label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text" id="">رفع </span>
                  </div>
                </div>
              </div>

            </div>






                  </div>




            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">اضافه</button>
            </div>
          </form>
        </div>
        <!-- /.card -->

        <!-- Form Element sizes -->

      </div>

</div>
</div>

@endsection



