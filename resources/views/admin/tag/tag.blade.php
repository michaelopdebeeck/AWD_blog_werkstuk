@extends('admin.layouts.index')
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Nieuwe tag<small>nieuwe tag aanmaken</small></h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">

                        <!-- /.box-header -->
                        <!-- form start -->
                        @include('partials.errrors')
                        <form role="form" action="{{ route('tag.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="col-lg-offset-1 col-lg-5">
                                    <div class="form-group">
                                        <label for="name">Tag titel</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Geef een tag titel in">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Tag slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug van de tag">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Voeg toe</button>
                                        <a class="btn btn-default" href="{{ route('tag.index') }}">Terug</a>
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
@endsection