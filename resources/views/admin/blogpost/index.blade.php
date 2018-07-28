@extends('admin.layouts.index')
@section('headSection')
    <link rel="stylesheet" href="{{ asset('public/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Blogposts<small>lijst van alle blogposts</small></h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <a class="btn btn-success" href="{{ route('blogpost.create') }}">Nieuwe blogpost toevoegen</a>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Blogpost nummer</th>
                                <th>Titel</th>
                                <th>Subtitel</th>
                                <th>Slug</th>
                                <th>Aangemaakt op</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogposts as $blogpost)
                                <tr>
                                    <td>{{ $blogpost->id }}</td>
                                    <td>{{ $blogpost->title }}</td>
                                    <td>{{ $blogpost->subtitle }}</td>
                                    <td>{{ $blogpost->slug }}</td>
                                    <td>{{ $blogpost->created_at }}</td>
                                    <td><a href="{{ route('blogpost.edit', $blogpost->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                                    <td>
                                        <form id="delete-form-{{ $blogpost->id  }}" method="post" action="{{ route('blogpost.destroy', $blogpost->id) }}" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                        <a href="#" onclick="if(confirm('Bent u zeker dat u de blogpost wilt verwijderen?')) {
                                            event.preventDefault(); document.getElementById('delete-form-{{ $blogpost->id }}').submit();
                                        } else {
                                            event.preventDefault();
                                        }"><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Blogpost nummer</th>
                                <th>Titel</th>
                                <th>Subtitel</th>
                                <th>Slug</th>
                                <th>Aangemaakt op</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
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
@section('footerSection')
    <!-- DataTables -->
    <script src="{{ asset('public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- page script -->
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection