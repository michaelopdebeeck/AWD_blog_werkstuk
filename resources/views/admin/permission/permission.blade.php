@extends('admin.layouts.index')
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Nieuwe toestemmingen<small>nieuwe toestemmingen aanmaken</small></h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <!-- form start -->
                        @include('partials.errrors')
                        <form role="form" action="{{ route('permission.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="col-lg-offset-1 col-lg-5">
                                    <div class="form-group">
                                        <label for="name">Toestemming naam</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Geef een toestemming titel in">
                                    </div>
                                    <div class="form-group">
                                        <label for="for">Toestemming voor</label>
                                        <select name="for" id="for" class="form-control">
                                            <option selected disabled>Selecteer toestemming voor</option>
                                            <option value="user">Gebruiker</option>
                                            <option value="blogpost">blogpost</option>
                                            <option value="other">Andere</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Voeg toe</button>
                                        <a class="btn btn-default" href="{{ route('permission.index') }}">Terug</a>
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