@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (session('errors'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('errors') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="py-2">
        <a href="{{ route('companies.create') }}" class="btn btn-primary">Tambah</a>
        <a href="{{ route('employees.create') }}" class="btn btn-info">Tambah employees</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <td>logo</td>
                <td>Nama</td>
                <td>Email</td>
                <td>Website</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $item)
            <tr>
                <td><img src="{{ Storage::url($item->logo) }}" width="100" height="100" alt=""></td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->website }}</td>
                <td class="d-flex">

                    <a href="{{ route('companies.edit', $item->id) }}" class="btn btn-success">Edit</a>
                    |
                    <a href="{{ route('employees.show', $item->id) }}" class="btn btn-warning">employees</a>
                    |
                    <form action="{{ route('companies.destroy',$item->id) }}" class="form-inline" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('sure you want to delete')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-5">
        {{ $companies->links() }}
    </div>
</div>
@endsection