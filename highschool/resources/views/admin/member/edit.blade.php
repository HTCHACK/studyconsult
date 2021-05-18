@extends('admin.layouts.master')
@section('title')
    <title>Администратор</title>
@endsection
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Company</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

<section class="content">
<div class="container-fluid">
    <div class="row">
                <!-- /.col -->
                    <div class="col-md-12">
                    <div class="card card-primary card-outline">

                        <!-- /.card-header -->
                        <form method="post" action="{{ route('proud_memebers.update',$proud_memeber->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" class="form-control" value="{{$proud_memeber->name}}" name="name" placeholder="Title..">
                                </div>
                                <div class="form-group">
                                    <label for="name">Job</label>
                                    <input id="name" class="form-control" value="{{$proud_memeber->job}}" name="job" placeholder="Title..">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Language ?</label>
                                        <select name="lang" class="form-control" id="exampleFormControlSelect2">
                                            <option value="uz" {{$proud_memeber->lang=='uz' ? 'selected' : null}}>O'zbek</option>
                                            <option value="en" {{$proud_memeber->lang=='en' ? 'selected' : null}}>English</option>
                                            <option value="ru"  {{$proud_memeber->lang=='ru' ? 'selected' : null}}>русский</option>
                                            <option value="kril"  {{$proud_memeber->lang=='kril' ? 'selected' : null}}>kril</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">description</label>
                                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                                            rows="15" required>{{$proud_memeber->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <img width="100px"
                                            src="{{ asset(str_replace('public', 'storage', $proud_memeber->picture)) }}" alt="">
                                    <label for="exampleFormControlFile1"></label>
                                        <input type="file" name="picture" class="form-control-file"
                                            id="exampleFormControlFile1">
                                </div>
                            </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i>
                                                Update</button>
                                            <a href="{{ route('proud_memebers.index') }}" class="btn btn-default"><i
                                                    class="fas fa-times"></i>
                                                Cancel</a>
                                        </div>
                                    </div>
                                </form>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
</section>

@endsection
