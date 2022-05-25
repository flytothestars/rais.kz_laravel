@extends('layouts.admin_app')
@section('title', 'Пользователи')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Пользователи</h1>
          </div>
        </div>
      </div>
    </div>
    
    <section class="content">

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
                          Номер
                      </th>
                      <th style="width: 20%">
                          Зарегистрирован
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($users as $user)  
                    <tr>
                      <td>
                          {{ $user->id }}
                      </td>
                      <td>
                          {{ $user->email }}
                      </td>
                      <td>
                          {{ $user->created_at }}
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-ban">
                              </i>
                              Заблокировать
                          </a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
      </div>
      
    </section>
@endsection