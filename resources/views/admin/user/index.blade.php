@extends('admin.layouts.index')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Users<small>lijst van alle users</small></h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <a class="btn btn-success" href="{{ route('user.create') }}">Nieuwe user toevoegen</a>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        @include('partials.errrors')
                        <thead>
                        <tr>
                            <th>Gebruikersnummer</th>
                            <th>Naam</th>
                            <th>Toegekende rechten</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                    {{ $role->name }},
                                    @endforeach
                                </td>
                                <td>{{ $user->status? 'Actief' : 'Niet actief' }}</td>
                                <td><a class="col-lg-offset-5" href="{{ route('user.edit', $user->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                                <td>
                                    <form id="delete-form-{{ $user->id  }}" method="post" action="{{ route('user.destroy', $user->id) }}" style="display: none;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <a class="col-lg-offset-5" href="#" onclick="if(confirm('Bent u zeker dat u de categorie wilt verwijderen?')) {
                                            event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();
                                            } else {
                                            event.preventDefault();
                                            }"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Gebruikersnummer</th>
                            <th>Naam</th>
                            <th>Toegekende rechten</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection