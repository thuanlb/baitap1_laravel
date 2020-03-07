@extends('backend.layouts')

@section('contents')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Posts Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Posts Table</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a  href="{{route('posts.create')}}" class="btn btn-success col-md-1">Create</a>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Content</th>
                      <th>Likes</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($posts as $post)
                    <tr>
                      <td>{{ $post->id }}</td>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->content}}</td>
                      <td>{{ $post->like }}</td>
                      <td>
                        <a class="btn btn-primary" href="{{route('posts.edit', [$post->id])}}">Update</a>
                        <button id="btn_delete_{{ $post->id }}" class="btn btn-danger">Xóa</button>
                        <form id="delete_form_{{ $post->id }}" action="{{ route('posts.destroy', $post->id) }}"
                         method="POST" style="display: none;">
                         @method('DELETE')
                         @csrf
                        </form>
                      </td>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@push('scripts')
<script>
    $("button[id^='btn_delete_']").click(function (event) {
        id = event.currentTarget.attributes.id.value.replace('btn_delete_', '');
        console.log('id', id);

        $("#delete_form_" + id).submit();
    });

</script>
@endpush
