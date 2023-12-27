@props(['required' => 'false', 'name'])
<div class="form-group">
    <label for="{{ $name }}">
        Message
        @if ($required)
            <span style="color:red;cursor:pointer" title="Ce champ est obligatoire">*</span>
        @endif
    </label>
    <textarea class="form-control" id="{{ $name }}" name="{{ $name }}" rows="7" required="{{ $required }}" autofocus=""></textarea>
</div>
