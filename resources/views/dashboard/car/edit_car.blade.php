@extends('dashboard.layout')


@section('body')
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">تعديل سياره </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ url('update/car',$car->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">اسم السياره </label>

                                        <input type="text" name="name" value="{{$car->name}}" class="form-control" id="exampleInputEmail1"
                                            placeholder="ادخل اسم السياره ">
                                    </div>

                                </div>



                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> معلومات عن المحرك </label>

                                        <input type="text"  value="{{$car->engin}}" name="engin" class="form-control" id="exampleInputEmail1"
                                            placeholder="ادخل معلومات المحرك ">
                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <div class="form-group ">
                                        <label for="exampleFormControlSelect1">اختار الماركه "نوع السياره "</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
                                            <option >
                                                <h4>اختار ماكة السياره جيدا </h4>
                                            </option>
                                            @foreach ($brands as $brand )
                                                <option value="{{$brand->id}}">
                                                   {{$brand->name}}
                                                </option>

                                            @endforeach



                                        </select>

                                    </div>
                                </div>


                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> سعر السياره </label>

                                        <input type="text"  value="{{$car->price}}" name="price" class="form-control" id="exampleInputEmail1"
                                            placeholder="  سعر السياره ">
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> رقم الموديل </label>

                                        <input type="number"  value="{{$car->model_number}}" name="model_number" class="form-control" id="exampleInputEmail1"
                                            placeholder="ادخل رقم الموديل ">
                                    </div>
                                </div>



                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">سرعة السياره </label>

                                        <input type="number"  value="{{$car->speed}}" name="speed" class="form-control" id="exampleInputEmail1"
                                            placeholder="ادخل سرعة السياره ">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> سعة التانك </label>

                                        <input value="{{$car->fual_tank}}"  type="number" name="tank" class="form-control" id="exampleInputEmail1"
                                            placeholder="ادخل سعة التانك ">
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> عدد المقاعد </label>

                                        <input value="{{$car->seats}}"  type="number" name="seats" class="form-control" id="exampleInputEmail1"
                                            placeholder="ادخل عدد المقاعد ">
                                    </div>
                                </div>

                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> المسافه المستهلكه  </label>

                                <input value="{{$car->kilos}}"  type="number" name="kilos" class="form-control" id="exampleInputEmail1"
                                    placeholder="ادخل المسافه المستهلكه ">
                            </div>

                        </div>
                                <div class="col-md-6 ">

                                    <h6 class="">نوع السياره </h6>

                                    <div class="form-check ">

                                        <input class="form-check-input " type="radio" name="is_automatic" id="exampleRadios1"
                                            value="automatic" checked>
                                        <label class="form-check-label text-bold" for="exampleRadios1">
                                            سياره اوتوماتيك
                                        </label>
                                    </div>
                                    <div class="form-check">

                                        <input class="form-check-input" type="radio" name="is_automatic" id="exampleRadios2"
                                            value="manual">
                                        <label class="form-check-label  text-bold" for="exampleRadios2">
                                            سياره مانوال
                                        </label>
                                    </div>

                                </div>


                                <div class="col-md-6 ">

                                    <h6 class="">حالة السياره </h6>

                                    <div class="form-check ">

                                        <input class="form-check-input " type="radio" name="status" id="exampleRadios1"
                                            value="new" checked>
                                        <label class="form-check-label text-bold" for="exampleRadios1">
                                            سياره جديده
                                        </label>
                                    </div>
                                    <div class="form-check">

                                        <input class="form-check-input" type="radio" name="status" id="exampleRadios2"
                                            value="used">
                                        <label class="form-check-label  text-bold" for="exampleRadios2">
                                            سياره مستعمله
                                        </label>
                                    </div>

                                </div>





                                <div class="col-md-12 mt-5">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">معلومات اضافيه عن السياره </label>
                                        <textarea name="desc" class="form-control" placeholder="ادخل وصف السياره " id="exampleFormControlTextarea1" rows="5">{{$car->desc}} </textarea>
                                      </div>
                                </div>

                                <div class="col-md-12">

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
































                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">تحديث  </button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->

                <!-- Form Element sizes -->

            </div>

        </div>
    </div>

@endsection
