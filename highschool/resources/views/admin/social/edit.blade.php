@extends('admin.layouts.master')
@section('title')
    <title>Администратор</title>
@endsection
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Social Link</h1>
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
                        <form method="post" action="{{ route('socials.update',$social->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Telegram</label>
                                    <input id="name" class="form-control" value="{{$social->telegram}}" name="telegram" placeholder="Telegram Link..">
                                </div>
                                <div class="form-group">
                                    <label for="name">Facebook</label>
                                    <input id="name" class="form-control" value="{{$social->facebook}}" name="facebook" placeholder="Facebook Link..">
                                </div>
                                <div class="form-group">
                                    <label for="name">Instagram</label>
                                    <input id="name" class="form-control" value="{{$social->instagram}}" name="instagram" placeholder="Instagram Link..">
                                </div>
                                <div class="form-group">
                                    <label for="name">TikTok</label>
                                    <input id="name" class="form-control" value="{{$social->tiktok}}" name="tiktok" placeholder="tiktok Link..">
                                </div>
                                <div class="form-group">
                                    <label for="name">Twitter</label>
                                    <input id="name" class="form-control" value="{{$social->twitter}}" name="twitter" placeholder="twitter Link..">
                                </div>
                            </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-info"><i class="fas fa-edit    "></i>
                                                Update</button>
                                            <a href="{{ route('socials.index') }}" class="btn btn-default"><i
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
