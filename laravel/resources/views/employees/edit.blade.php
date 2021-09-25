@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h3>Ubah company</h3>
    <form method="post" action="{{route('employees.update', $employees->id)}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" value="{{ old('nama', $employees->nama) }}" name="nama">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1"
                value="{{ old('email', $employees->email) }}" name="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label class="form-label">Company</label>
            <select name="companies_id" class="form-control" id="">
                @foreach ($companies as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a type="button" href="/employees" class="btn btn-warning">Back</a>
    </form>
</div>
@endsection