@extends('admin.layouts.master')
@section('title')
    <title>Администратор</title>
@endsection
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Category</h1>
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
                    <form method="post" action="{{ route('categories.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <input class="form-control" name="name" placeholder="category..">
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
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="float-right">
                                <button type="submit" class="btn btn-info"><i class="fas fa-plus"></i>
                                    Add</button>
                                <a href="{{ route('categories.index') }}" class="btn btn-default"><i
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
