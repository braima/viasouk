@extends('layouts.header') <!-- Extend your existing layout -->

@section('content') <!-- Define a section for the content -->
    <div class="container">
        <h1>Parameters List</h1>
        <a href="{{ route('admin.parameters.create') }}" class="btn btn-primary">Add New Parameter</a> <!-- Link to create new parameter -->

        @if($parameters->isEmpty())
            <p>No parameters found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Value</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($parameters as $parameter)
                        <tr>
                            <td>{{ $parameter->id }}</td>
                            <td>{{ $parameter->name }}</td>
                            <td>{{ $parameter->value }}</td>
                            <td>
                                <a href="{{ route('admin.parameters.edit', $parameter->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.parameters.destroy', $parameter->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection