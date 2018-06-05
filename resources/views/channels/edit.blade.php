@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header">Edit channel: {{ $channel->title }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('channels.update', ['channel' => $channel->id]) }}" method="POST"> 
                        {{ csrf_field() }}
                        {{-- BECAUSE UPDATE ROUTE IS PUT NOT POST NEED TO INCLUDE THIS --}}
                        {{ method_field('PUT') }}

                        <div class="form-control">
                            <label for="name">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $channel->title }}">
                        </div>
                        <br>
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
@endsection
