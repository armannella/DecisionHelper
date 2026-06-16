@props(['route','color','icon'])


<div class="col-md-3 col-6 mb-3">
    <a href="{{ $route }}" class="tile bgc-{{ $color }}"> 
        <i class="bi {{ $icon }}"></i>
        <span>{{ $slot }}</span>
    </a>
</div>