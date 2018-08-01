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
                        <form role="form" action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="col-lg-offset-1 col-lg-5">
                                    <div class="form-group">
                                        <label for="name">Gebruikersnaam</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Geef een naam in">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Geef een e-mailadres in">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Wachtwoord</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Geef een wachtwoord in">
                                    </div>
                                    <div class="form-group">
                                        <label for="herhaal_password">Herhaal wachtwoord</label>
                                        <input type="password" class="form-control" id="herhaal_password" name="herhaal_password" placeholder="Geef uw wachtwoord opnieuw in">
                                    </div>

                                    <div class="form-group">
                                        <label for="role">Wijs rechten toe</label>
                                        <select name="role" id="role" class="form-control">
                                            <option value="1">Publisher</option>
                                            <option value="0">Editor</option>
                                            <option value="3">Writer</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Voeg toe</button>
                                        <a class="btn btn-default" href="{{ route('admin.index') }}">Terug</a>
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