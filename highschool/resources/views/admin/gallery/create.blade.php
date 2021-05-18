@extends('admin.layouts.master')
@section('title')
    <title>Администратор</title>
@endsection
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Gallery</h1>
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
                        <form method="post" action="{{ route('galleries.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" class="form-control" name="name" placeholder="Title..">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Language?</label>
                                    <select name="lang" class="form-control" id="exampleFormControlSelect2">
                                        <option value="uz">O'zbek</option>
                                        <option value="en" selected>English</option>
                                        <option value="ru" selected>русский</option>
                                        <option value="kril" selected>Kril</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Choose Image</label>
                                        <input type="file" name="picture" class="form-control-file"
                                            id="exampleFormControlFile1">
                                </div>
                            </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-info"><i class="fas fa-plus"></i>
                                                Add</button>
                                            <a href="{{ route('galleries.index') }}" class="btn btn-default"><i
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
