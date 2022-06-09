@extends('layouts.admin_app')
@section('title', 'Постоматы')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">История</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 30%">
                          Клиент
                      </th>
                      <th style="width: 20%">
                          Действие
                      </th>
                      <th>
                          Дата началы
                      </th>
                      <th style="width: 8%" class="text-center">
                          Деньги
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($all as $al)
                    <tr>
                      <td>
                        {{$al['id']}}
                      </td>
                      <td>    
                        {{$al['id_user']}}
                      </td>
                      <td>
                        
                      {{ $al['is_active'] ? "Закрыть" : "Используется"}}
                      </td>
                      <td>
                          {{ $al['time_start']}}
                      </td>
                      <td class="project-state">
                          {{ $al['money']}}
                      </td>
                      <td class="project-state">
                      <a class="btn btn-info btn-sm" href="#">
                              <i class="">
                              </i>
                              Подробнее
                          </a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
@endsection