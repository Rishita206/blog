@extends('admin.layout.master')
@section('contain')
    <div class="container pt-3 ">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            @foreach ($user as $user)
                <tbody>
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        
                        <td>
                            @if ($user->isUserOnline())
                                <span class="btn btn-success">Online</span>
                            @else
                                <span class="btn btn-warning">Offline</span>
                            @endif

                        </td>

                        <td>
                            {{-- <a href="{{ route('user.edit') }}/{{ $user->id }}"class="btn btn-sm btn-success">Edit</a> --}}
                            <a href="{{ route('user.delete') }}/{{ $user->id }}"class="btn btn-sm btn-danger">Delete</a>

                        </td>

                    </tr>


                </tbody>
            @endforeach
        </table>
    </div>
@endsection
