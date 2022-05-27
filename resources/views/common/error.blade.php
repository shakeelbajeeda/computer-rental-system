<style>
    .alert {
        position:  fixed;
        max-width: 27rem;
        top:       2rem;
        right:     0;
    }
</style>

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert" onclick="$(this).remove()">

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (isset($msg)&&$msg!='')
    <div class="alert alert-{{$msg_type??"info"}} alert-dismissible fade show" role="alert" onclick="$(this).remove()">
        <p>{{$msg}}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
