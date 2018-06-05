@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header text-center">Channels</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">
                                    #
                                </th>
                                <th scope="col">
                                    Title
                                </th>
                                <th scope="col">
                                    Edit
                                </th>
                                <th scope="col">
                                    Delete
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($channels as $key => $channel)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$channel->title}}</td>
                                    <td><a href="{{route('channels.edit',['channel' => $channel->id])}}" class="btn btn-info">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('channels.destroy', ['channel' => $channel->id]) }}" method="POST">
                                            {{csrf_field()}}
                                            {{-- BECAUSE IT IS A DELETE REQUEST --}}
                                            {{method_field('DELETE')}}

                                            <button class="btn btn-danger" type="submit">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
@endsection
