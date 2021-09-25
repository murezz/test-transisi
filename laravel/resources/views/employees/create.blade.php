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
    <h3>Tambah Employee</h3>
    <form method="post" action="{{route('employees.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" value="{{ old('nama') }}" name="nama">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" value="{{ old('email') }}" name="email"
                aria-describedby="emailHelp">
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
        <a type="button" href="/companies" class="btn btn-warning">Back</a>
    </form>
</div>
@endsection