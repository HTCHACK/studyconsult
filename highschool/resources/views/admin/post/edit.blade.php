@extends('admin.layouts.master')
@section('title')
    <title>Администратор</title>
@endsection
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Post</h1>
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
                        <form method="post" action="{{ route('posts.update',$post->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Title Post</label>
                                    <input id="name" class="form-control" value="{{$post->title}}" name="title" placeholder="Title..">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input id="slug" type="text" value="{{$post->slug}}" name="slug" placeholder="Slug" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="tour_category_id">Category </label>
                                    <select id="category_id" name="category_id" class="form-control" required>
                                        @foreach ($categories as $key => $category)
                                            <option value="{{ $category->id }}"
                                                {{ $post->category_id == $category->id ? 'selected' : null }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Language ?</label>
                                    <select name="lang" class="form-control" id="exampleFormControlSelect2">
                                        <option value="uz" {{$post->lang=='uz' ? 'selected' : null}}>O'zbek</option>
                                        <option value="en" {{$post->lang=='en' ? 'selected' : null}}>English</option>
                                        <option value="ru"  {{$post->lang=='ru' ? 'selected' : null}}>русский</option>
                                        <option value="kril"  {{$post->lang=='kril' ? 'selected' : null}}>kril</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Publish?</label>
                                    <select name="is_published" class="form-control" id="exampleFormControlSelect2">
                                        <option value="0" {{ $post->is_published ? '' : 'selected' }}>no</option>
                                        <option value="1" {{ $post->is_published ? 'selected' : '' }}>yes</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Content</label>
                                        <textarea name="content" class="form-control" id="exampleFormControlTextarea1"
                                            rows="15" required>{{$post->content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <img width="100px"
                                            src="{{ asset(str_replace('public', 'storage', $post->picture)) }}" alt="">
                                    <label for="exampleFormControlFile1"></label>
                                        <input type="file" name="picture" class="form-control-file"
                                            id="exampleFormControlFile1">
                                </div>
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input id="author" type="text" name="author" placeholder="author" class="form-control" value="{{$post->author}}" required>
                                </div>
                            </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i>
                                                Update</button>
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
