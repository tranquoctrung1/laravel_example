@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('status'))
         <ul>
             <li class="text-danger"> {{ session('status') }}</li>
         </ul>
@endif

@if (session('error'))
         <ul>
             <li class="text-danger"> {{ session('error') }}</li>
         </ul>
@endif

@if (session('success'))
         <ul>
             <li class="text-success"> {{ session('success') }}</li>
         </ul>
@endif
