@if(count($errors ?? '')>0 )
    @foreach ($errors ?? ''->all() as $error)
    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert">
            <strong>{{$error}}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="container">
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert">
            <strong>{{session('success')}}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif