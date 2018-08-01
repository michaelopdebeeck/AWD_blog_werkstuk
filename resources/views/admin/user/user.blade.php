@extends('admin.layouts.index')
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Nieuwe user<small>maak een nieuwe user aan</small></h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <!-- form start -->
                        @include('partials.errrors')
                        <form role="form" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="col-lg-offset-1 col-lg-5">
                                    <div class="form-group">
                                        <label for="name">Gebruikersnaam</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Geef een naam in">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Geef een e-mailadres in">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Wachtwoord</label>
                                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Geef een wachtwoord in">
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Herhaal wachtwoord</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Geef uw wachtwoord opnieuw in">
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="status"
                                                          @if (old('status') == 1)
                                                            checked
                                                          @endif
                                                          value="1">Status</label>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label>Wijs rechten toe</label>
                                        <div class="row">
                                            @foreach($roles as $role)
                                                <div class="col-lg-3">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="role[]" value="{{ $role->id }}">{{ $role->name }}</label>
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