@props(['status'])

<div class="alert alert-{{$status}}">
  <strong>{{ $slot }}</strong> 
</div>