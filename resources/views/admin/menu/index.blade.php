@extends('admin.layout.layout')

@section('specific_tag_header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div>
        @include('admin.layout.errors')
    </div>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Parent</th>
                    <th>Description</th>
                    <th>Content</th>
                    <th>Active</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {!! \App\Helpers\Helper::menu($menus) !!}
            </tbody>
        </table>
@endsection
@section('specific_file_footer')
    <script src="/script/menu.js"></script>
@endsection
