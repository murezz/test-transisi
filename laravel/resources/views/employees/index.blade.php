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
        <a href="{{ route('employees.create') }}" class="btn btn-primary">Tambah</a>
        <a type="button" href="/companies" class="btn btn-warning">Back</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <td>Nama</td>
                <td>Email</td>
                <td>company</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->companies->nama }}</td>
                <td class="d-flex">
                    <a href="{{ route('employees.edit', $item->id) }}" class="btn btn-success">Edit</a>
                    |
                    <form action="{{ route('employees.destroy',$item->id) }}" class="form-inline" method="post">
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
        {{ $employees->links() }}
    </div>
</div>
@endsection