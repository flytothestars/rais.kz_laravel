@extends('layouts.admin_app')
@section('title', 'Постоматы')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавить постомат</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects</h3>

          <div class="card-tools">
            <a href="{{ route('postomat.create') }}" type="button" class="btn btn-success" >
              <i class="fas fa-plus"></i> Добавить
            </a>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 30%">
                          Адресс
                      </th>
                      <th style="width: 20%">
                          QR
                      </th>
                      <th>
                          Долгота - Широта
                      </th>
                      <th style="width: 8%" class="text-center">
                          Слот
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($posts as $post)  
                    <tr>
                      <td>
                          {{ $post->id }}
                      </td>
                      <td>
                          {{ $post->address }}
                      </td>
                      <td>
                          {{ $post->qr_code }}
                      </td>
                      <td class="project_progress">
                          {{ $post->lat }} - {{ $post->lng }}
                      </td>
                      <td class="project-state">
                          {{ $post->slot}}
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
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