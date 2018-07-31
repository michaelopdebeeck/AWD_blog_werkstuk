@extends('admin.layouts.index')
@section('headSection')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('public/admin/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Blogpost<small>Nieuwe blogpost aanmaken</small></h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <!-- form start -->
                        @include('partials.errrors')
                        <form role="form" action="{{ route('blogpost.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="titel">Blogpost titel</label>
                                        <input type="text" class="form-control" id="titel" name="titel" placeholder="Geef een titel in">
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitel">Subtitel</label>
                                        <input type="text" class="form-control" id="subtitel" name="subtitel" placeholder="Geef een subtitel in">
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="image">File input</label>
                                        <input type="file" name="image"id="image">
                                    </div>
                                    <div class="form-group" style="margin-top: 30px;">
                                        <label>Categorie</label>
                                        <select class="form-control select2" multiple="multiple" name="categorieen[]" data-placeholder="Kies een categorie" style="width: 100%;">
                                            @foreach($categorieen as $categorie)
                                                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" style="margin-top: 18px;">
                                        <label>Tags</label>
                                        <select class="form-control select2" multiple="multiple" name="tags[]" data-placeholder="Kies tags" style="width: 100%;">
                                            @foreach($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="status" value="1"> Publiceer blogpost?
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
                                    <textarea name="body" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1"></textarea>
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
@section('footerSection')
    <!-- Select2 -->
    <script src="{{ asset('public/admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- CK Editor -->
    <script src="//cdn.ckeditor.com/4.10.0/full/ckeditor.js"></script>    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
@endsection