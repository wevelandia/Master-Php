@php
    $avatarClass = $avatarClass ?? '';
@endphp

@if(auth()->user() && auth()->user()->image)
    <div class="container-avatar {{ $containerClass ?? '' }}">
        <img src="{{ route('user.avatar', ['filename' => auth()->user()->image]) }}" class="avatar {{ $avatarClass }}">
    </div>
@endif

