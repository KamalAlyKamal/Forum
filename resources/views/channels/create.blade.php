@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header">Create a new channel</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('channels.store') }}" method="POST"> 
                        {{ csrf_field() }}
                        <div class="form-control">
                            <label for="name">Title</label>
                            <input type="text" name="title" class="form-control">
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
