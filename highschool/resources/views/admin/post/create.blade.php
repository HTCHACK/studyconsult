@extends('admin.layouts.master')
@section('title')
    <title>Администратор</title>
@endsection
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Post</h1>
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
                        <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Title Post</label>
                                    <input id="name" class="form-control" name="title" placeholder="Title..">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input id="slug" type="text" name="slug" placeholder="Slug" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="tour_category_id">Category</label>
                                    <select id="category_id" name="category_id" class="form-control" required>
                                        @foreach ($categories as $key => $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
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
                                    <label for="exampleFormControlSelect2">Ready To Publish?</label>
                                    <select name="is_published" class="form-control" id="exampleFormControlSelect2">
                                        <option value="0">NO</option>
                                        <option value="1" selected>YES</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Content</label>
                                        <textarea name="content" class="form-control" id="exampleFormControlTextarea1"
                                            rows="15" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Choose Image</label>
                                        <input type="file" name="picture" class="form-control-file"
                                            id="exampleFormControlFile1">
                                </div>
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input id="author" type="text" name="author" placeholder="author" class="form-control" required>
                                </div>
                            </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-info"><i class="fas fa-plus"></i>
                                                Add</button>
                                            <a href="{{ route('posts.index') }}" class="btn btn-default"><i
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
