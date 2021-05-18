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
                            <a href="{{ route('galleries.create') }}" class="btn btn-primary">Add Gallery</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Titile</th>
                                        <th>Language</th>
                                        <th>Img</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($galleries as $key => $gallery)
                                        <tr>
                                            <td>{{ $key+1}}</td>
                                            <td>{{ $gallery->name }}</td>
                                            <td>{{ $gallery->lang }}</td>
                                            <td><img width="100px"
                                                    src="{{ asset(str_replace('public', 'storage', $gallery->picture)) }}"
                                                    alt="">
                                            </td>

                                                <td><form action="{{ route('galleries.destroy', $gallery->id) }}" class="inline-flex"
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
                                        {{$galleries->links()}}
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
