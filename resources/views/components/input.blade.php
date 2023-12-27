@props([
'disabled' => false,
])
<div class="form-group">
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => "form-control form-control-lg" ]) !!} >
</div>
