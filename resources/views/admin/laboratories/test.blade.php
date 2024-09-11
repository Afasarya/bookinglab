@extends('admin.components.base')
@section('title', 'edit lab')

@section('content')
    <h1>Edit Laboratorium</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('laboratories.update', $laboratory->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nama Laboratorium:</label>
        <input type="text" name="name" id="name" value="{{ $laboratory->name }}" required><br>

        <label for="capacity">Kapasitas:</label>
        <input type="number" name="capacity" id="capacity" value="{{ $laboratory->capacity }}" required><br>

        <button type="submit">Update</button>
    </form>
@endsection
