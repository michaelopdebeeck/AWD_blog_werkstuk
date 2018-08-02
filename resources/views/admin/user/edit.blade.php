@extends('admin.layouts.index')
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>User<small>Bewerk gebruiker</small></h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <!-- form start -->
                        @include('partials.errrors')
                        <form role="form" action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="box-body">
                                <div class="col-lg-offset-1 col-lg-5">
                                    <div class="form-group">
                                        <label for="name">Gebruikersnaam</label>
                                        <input type="text" class="form-control" id="name" name="name" value="@if(old('name')){{old('name')}}@else{{$user->name}}@endif" placeholder="Geef een naam in">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="text" class="form-control" id="email" name="email" value="@if(old('email')){{old('email')}}@else{{$user->email}}@endif" placeholder="Geef een e-mailadres in">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="status"
                                                          @if (old('status')==1 || $user->status == 1)
                                                          checked
                                                          @endif value="1">Status</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Wijs rechten toe</label>
                                        <div class="row">
                                            @foreach($roles as $role)
                                                <div class="col-lg-3">
                                                    <div class="checkbox">
                                                        <label ><input type="checkbox" name="role[]" value="{{ $role->id }}"
                                                                       @foreach ($user->roles as $user_role)
                                                                            @if ($user_role->id == $role->id)
                                                                                checked
                                                                            @endif
                                                                       @endforeach>{{ $role->name }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Voeg toe</button>
                                        <a class="btn btn-default" href="{{ route('user.index') }}">Terug</a>
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