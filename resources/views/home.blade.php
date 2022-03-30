@extends('layouts.app')


<div>{{ phpinfo() }}</div>
<div>{{ xdebug_info() }}</div>

@section('content')
    <div class="flex-1">
        <the-chat :current-user="{{ auth()->id() }}"></the-chat>
    </div>
@endsection
