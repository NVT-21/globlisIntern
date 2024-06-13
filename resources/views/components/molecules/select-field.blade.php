
<div class="form-group">
    <x-atoms.label for="{{ $id }}">{{ $label }}</x-atoms.label>
    <x-atoms.select-input id="{{ $id }}" name="{{ $name }}">
        {{ $slot }}
    </x-atoms.select-input>
</div>
