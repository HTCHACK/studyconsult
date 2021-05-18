@extends('admin.layouts.master')
@section('title')
    <title>Администратор</title>
@endsection
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Banner</h1>
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
                        <form method="post" action="{{ route('banners.update',$banner->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Title Post</label>
                                    <input id="name" class="form-control" value="{{$banner->title}}" name="title" placeholder="Title..">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Language ?</label>
                                        <select name="lang" class="form-control" id="exampleFormControlSelect2">
                                            <option value="uz" {{$banner->lang=='uz' ? 'selected' : null}}>O'zbek</option>
                                            <option value="en" {{$banner->lang=='en' ? 'selected' : null}}>English</option>
                                            <option value="ru"  {{$banner->lang=='ru' ? 'selected' : null}}>русский</option>
                                            <option value="kril"  {{$banner->lang=='kril' ? 'selected' : null}}>kril</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Content</label>
                                        <textarea name="content" class="form-control" id="exampleFormControlTextarea1"
                                            rows="15" required>{{$banner->content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <img width="100px"
                                            src="{{ asset(str_replace('public', 'storage', $banner->picture)) }}" alt="">
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
                                            <a href="{{ route('banners.index') }}" class="btn btn-default"><i
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
