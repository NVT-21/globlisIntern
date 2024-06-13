<!-- resources/views/components/molecules/textarea-field.blade.php -->
<div class="form-group">
    <x-atoms.label for="{{ $id }}">{{ $label }}</x-atoms.label>
    <x-atoms.textarea id="{{ $id }}" name="{{ $name }}">{{ $value }}</x-atoms.textarea>
</div>
