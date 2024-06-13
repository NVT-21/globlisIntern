@extends('layouts.app')

@section('title', 'Create Country')

@section('content')
    <h1>Edit Country</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form  action="{{ route('countries.update', $currentCountry->id) }}" method="POST">
    @csrf
    @method("PUT")
    <x-molecules.text-input-field id="code" name="code" label="Code" :value="$currentCountry->code ?? old('code')" />


    <x-molecules.text-input-field id="name" name="name" label="Name" :value="$currentCountry->name ?? old('name')" />
    <x-molecules.textarea-field id="description" name="description" label="Description" :value=" $currentCountry->description "/>
           
       
    <button type="submit">edit</button>
</form>
@endsection