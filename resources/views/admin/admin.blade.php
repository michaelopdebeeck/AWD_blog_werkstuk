@extends('admin.layouts.index')
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header"><h1>Admin<small>homepage</small></h1></section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3>Statische gegevens</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>

                    </div>
                </div>
                <div class="box-body">
                    <p>Aantal blogposts: {{ count($blogposts) }}</p>
                    <p>Aantal categorieën: {{ count($categorieen) }}</p>
                    <p>Aantal tags: {{ count($tags) }}</p>
                    <p>Aantal gebruikers: {{ count($admins) }}</p>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Footer
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection