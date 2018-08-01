@extends('admin.layouts.index')
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Rechten<small>bewerken</small></h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <!-- form start -->
                        @include('partials.errrors')
                        <form role="form" action="{{ route('role.update', $role->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="box-body">
                                <div class="col-lg-offset-1 col-lg-5">
                                    <div class="form-group">
                                        <label for="name">Rechten titel</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}" placeholder="Geef een tag titel in">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="name">Blogpost toestemmingen</label>
                                            @foreach($permissions as $permission)
                                                @if($permission->for == 'blogpost')
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                                            @foreach($role->permissions as $role_permit)
                                                                @if ($role_permit->id == $permission->id)
                                                                    checked
                                                                @endif
                                                            @endforeach
                                                            >{{ $permission->name }}</label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="name">Gebruiker toestemmingen</label>
                                            @foreach($permissions as $permission)
                                                @if($permission->for == 'user')
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                                            @foreach($role->permissions as $role_permit)
                                                            @if ($role_permit->id == $permission->id)
                                                                    checked
                                                                @endif
                                                            @endforeach
                                                            >{{ $permission->name }}</label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="name">Andere toestemmingen</label>
                                            @foreach($permissions as $permission)
                                                @if($permission->for == 'other')
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                                            @foreach($role->permissions as $role_permit)
                                                                @if ($role_permit->id == $permission->id)
                                                                    checked
                                                                @endif
                                                            @endforeach
                                                            >{{ $permission->name }}</label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Voeg toe</button>
                                        <a class="btn btn-default" href="{{ route('role.index') }}">Terug</a>
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