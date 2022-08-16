@if ($errors->any())
    <div class=" alert alert-danger p-2 ">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif