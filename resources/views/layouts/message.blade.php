@if(request()->is('contact'))
    @if(session()->has('success'))
        <p class="text-success">
            {{ session()->get('success') }}
        </p>
    @endif

    @if(session()->has('error'))
        <p class="text-danger">
            {{ session()->get('error') }}
        </p>
    @endif
@else
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
@endif


