@if ($errors->any())
    <div class=" alert alert-danger p-2 ">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if (session('Message'))
    <div class=" alert alert-success p-2 ">
        {{ session('Message') }}
    </div>
@endif

@if (session('status') == 'verification-link-sent')
    <div class=" alert alert-success p-2 ">
        A new email verification link has been emailed to you!
    </div>
@endif

@if (session('status')) 
    <div class="alert alert-success p-2 ">
        {{ session('status') }}
    </div>
@endif

@if (session('success'))
    <div class=" alert alert-success p-2 ">
        {{ session('success') }}
    </div>
@endif