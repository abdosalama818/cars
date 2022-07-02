@extends('dashboard.layout')


@section('body')
<div class="container">

<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">تعديل</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="post" action = '{{route('update_last',$last->id)}}' enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="exampleInputEmail1">ادخل الخبر  </label>
                    <input type="text" value="{{$last->name}}"  name="name" class="form-control" id="exampleInputEmail1" >
                  </div>




                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">معلومات تفاصيل الخبر </label>
                    <textarea name="desc" class="form-control" placeholder="ادخل  تفاصيل الخبر  " id="exampleFormControlTextarea1" rows="5">{{$last->desc}}</textarea>
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
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">تحديث</button>
            </div>
          </form>
        </div>
        <!-- /.card -->

        <!-- Form Element sizes -->

      </div>

</div>
</div>

@endsection



