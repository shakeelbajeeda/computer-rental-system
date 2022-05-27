@if ($errors->any())
    <style>
        .alert {
            position:  fixed;
            top:       6rem;
            right:     0;
            max-width: 30vw;
            z-index:   99999;
        }
    </style>
    <div class="alert alert-danger alert-dismissible fade show" role="alert" onclick="$(this).remove()">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@php
    if (!isset($msg)) {
        $msg=Session::has('msg') ? Session::get('msg') : '';
    }
@endphp
@if ($msg!='')
    <style>
        .alert {
            position:  fixed;
            top:       6rem;
            right:     0;
            max-width: 30vw;
            z-index:   99999;
        }
    </style>
    @php
        if (strpos($msg,'|') !== false) {
            list($msg_type,$msg) = explode('|',$msg);
        }
    @endphp
    <div class="alert alert-{{isset($msg_type)?$msg_type:"light"}} {{isset($msg_type) ? '' : "text-dark" }} alert-dismissible fade show" role="alert" onclick="$(this).remove()">
        {!! $msg !!}
    </div>
@endif
