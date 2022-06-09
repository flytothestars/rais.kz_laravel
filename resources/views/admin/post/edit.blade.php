@extends('layouts.admin_app')
@section('title', 'Добавить постомат')
@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактировать</h1>
          </div>
        </div><!-- /.row -->
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" clase="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
            </div>
          @endif
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card card-primary">
              
              <!-- form start -->
              <form action="{{ route('postomat.update', $postomat['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="address">Адрес</label>
                    <input type="text" value="{{ $postomat['address']}}" name="address" class="form-control" id="address" placeholder="Адрес">
                  </div>
                  <div class="form-group">
                    <label for="qrcode">QR код</label>
                    <input type="text" value="{{ $postomat['qr_code']}}" name="qrcode" class="form-control" id="qrcode" placeholder="qr:d325fv">
                  </div>
                  <div class="form-group">
                    <label for="lng">Долгота</label>
                    <input type="text" value="{{ $postomat['lng']}}" name="lng" class="form-control" id="lng" placeholder="Долгота">
                  </div>
                  <div class="form-group">
                    <label for="lat">Широта</label>
                    <input type="text" value="{{ $postomat['lat']}}" name="lat" class="form-control" id="lat" placeholder="Широта">
                  </div>
                  <div class="form-group">
                    <label for="slot">Слот количество</label>
                    <input type="number" value="{{ $postomat['slot']}}" name="slot" class="form-control" id="slot" placeholder="Слот">
                  </div>
                  <div class="form-group">
                    <label for="freeslot">Заполненый слот</label>
                    <input type="number" value="{{ $postomat['freeslot']}}" name="freeslot" class="form-control" id="freeslot" placeholder="Заполненый слот">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Обновить</button>
                </div>
              </form>
            </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection