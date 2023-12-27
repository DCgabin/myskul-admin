@props(['name', 'label', 'type' => 'text', 'error' => '', 'required' => false, 'badge' => ''])

<div class="form-group">
    <label for="{{ $name }}">
        {{ $label }}
        @if ($required)
            <span style="color:red;cursor:pointer" title="Ce champ est obligatoire">*</span>
        @endif
    </label>
    <div class="input-group">
        <input type="{{ $type }}" {{ $attributes->merge(['class' => 'form-control']) }} id="{{ $name }}" name="{{ $name }}">
        @if($badge != '')
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white">{{ $badge }}</span>
            </div>
        @endif
    </div>
    @if ($error != '')
        <span class="text-sm" style="color:red;">{{ $error }}</span>
    @endif
</div>
