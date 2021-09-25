@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
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
                                    <form action="{{ route('employees.destroy',$item->id) }}" class="form-inline"
                                        method="post">
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
                        <a href="{{ route('print')}}" class="btn btn-sm btn-danger"> Print</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection