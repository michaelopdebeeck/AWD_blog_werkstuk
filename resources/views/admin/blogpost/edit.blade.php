@extends('admin.layouts.index')
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Blogpost<small>blogpost bewerken</small></h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <!-- form start -->
                        @include('partials.errrors')
                        <form role="form" action="{{ route('blogpost.update', $blogpost->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="box-body">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="titel">Blogpost titel</label>
                                        <input type="text" class="form-control" id="titel" name="titel" value="{{ $blogpost->title }}" placeholder="Geef een titel in">
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitel">Subtitel</label>
                                        <input type="text" class="form-control" id="subtitel" name="subtitel" value="{{ $blogpost->subtitle }}" placeholder="Geef een subtitel in">
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" value="{{ $blogpost->slug }}" placeholder="Slug">
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="image">File input</label>
                                        <input type="file" name="image"id="image">
                                    </div>
                                    <br>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="status" @if( $blogpost->status == 1 ) checked @endif> Publiceer blogpost?
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Blogpost body</h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fa fa-minus"></i></button>
                                    </div>
                                    <!-- /. tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body pad">
                                    <textarea class="textarea" name="body" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1">{{ $blogpost->body }}</textarea>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary">
                                <a href="{{ route('blogpost.index') }}" class="btn btn-default">Terug</a>
                            </div>
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