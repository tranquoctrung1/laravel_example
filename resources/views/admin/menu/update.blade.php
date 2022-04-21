@extends('admin.layout.layout')
@section('specific_file_header')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Item {{$menu->name}}</h3>
              </div>
              <div>
                  @include('admin.layout.errors')
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="{{$menu->name}}" id="name" name="name" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="parent_id">Parent</label>
                    <select name="parent_id"  class="form-control" id="parent_id">
                        <option value="0">Parent</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description"  class="form-control" id="description" >{{$menu->description}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content"  id="content" >{{$menu->content}}</textarea>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="active" name="active" {{$menu->active ? 'checked="true"' : ""}}>
                    <label class="form-check-label" for="active">Active</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
                @csrf
              </form>
            </div>
@endsection

@section('specific_file_footer')
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection
