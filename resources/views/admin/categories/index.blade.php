{{-- @extends('admin.master') --}}
@extends('layouts.DeliveryAgent.Header')
@extends('layouts.DeliveryAgent.LinkHeader')
@extends('layouts.DeliveryAgent.LinkJs')
@extends('layouts.DeliveryAgent.Sidebar')

{{-- @php
    $name = 'name_'.app()->currentLocale();
@endphp --}}

@section('title', 'Categories | ' . env('APP_NAME'))

@section('content')

    <h1>All Categories</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($categories as $category)
                    <td>{{ $category->id }}</td>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                        {{ $category->type }}
                    </td>



                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.categories.edit', $category->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
