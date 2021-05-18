@extends('admin.layouts.master')
@section('title')
    <title>Администратор</title>
@endsection
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Post </h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-warning" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('posts.create') }}" class="btn btn-primary">Add Post</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Titile</th>
                                        <th>Category</th>
                                        <th>Language</th>
                                        <th>Img</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $key => $post)
                                        <tr>
                                            <td>{{ $key+1}}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->postCategory->name }}</td>
                                            <td>{{ $post->lang }}</td>
                                            <td><img width="100px"
                                                    src="{{ asset(str_replace('public', 'storage', $post->picture)) }}"
                                                    alt="">
                                            </td>
                                            <td>
                                                <a href="{{ route('posts.edit', $post->id) }}"
                                                    class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a></td>
                                                <td><form action="{{ route('posts.destroy', $post->id) }}" class="inline-flex"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button onclick="return confirm('A Вы уверены, что удалите это?');"
                                                        class="btn btn-outline-danger btn-rounded" type="submit">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                        {{$posts->links()}}
                                    </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>


@endsection
