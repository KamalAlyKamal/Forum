@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header text-center">Create a new dicussion</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('discussions.store') }}" method="POST" >
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control" type="text" name="title" id="title"></input>
                        </div>

                        <div class="form-group">
                            <label for="channel_id">Select Channel:</label>
                            <select class="form-control" name="channel_id" id="channel_id">
                                @foreach($channels as $channel)
                                    <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="content">Ask a question</label>
                            <textarea class="form-control" name="content" id="content" rows="10" cols="30">
                            </textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success float-right" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
@endsection
