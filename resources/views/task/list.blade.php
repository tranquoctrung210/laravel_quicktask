@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('test') }}</div>

                    <div class="card-body">
                        <form action="{{ route('tasks.store') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="task" class="col-md-4 col-form-label text-md-right">{{ __('task') }}</label>

                                <div class="col-md-6">
                                    <input type="text" name="name" id="task-name" class="form-control" required autofocus>
                                    <br>
                                    @include('common.errors')

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('btnSubmit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('listTasks') }}</div>

                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ __($message) }} {{ __('success') }}</p>
                            </div>
                        @elseif ($message = Session::get('danger'))
                            <div class="alert alert-danger">
                                <p>{{ __($message) }} {{ __('failed') }}</p>
                            </div>
                        @endif
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="20%" scope="col">ID</th>
                                    <th scope="col">{{ __('task') }}</th>
                                    <th width="20%" scope="col">{{ __('action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task => $taskDetails)
                                    <tr>
                                        <th scope="row">{{ $task + 1 }}</th>
                                        <td>{{ $taskDetails->name }}</td>
                                        <td>
                                            <form action="{{ route('tasks.destroy', ['task' => $taskDetails->id]) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">{{ __('delete') }}</button->
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
