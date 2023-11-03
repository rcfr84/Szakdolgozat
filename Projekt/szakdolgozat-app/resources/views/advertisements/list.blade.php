@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-15">
                @if(session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('List of advertisements') }}</div>
                   
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Eladó</th>
                                    <th>Város</th>
                                    <th>Vármegye</th>
                                    <th>Kategória</th>
                                    <th>Kép</th>
                                    <th>Cím</th>
                                    <th>Leírás</th>
                                </tr>
                            </thead>
                            @foreach ($advertisements as $advertisement)
                                <tbody>
                                    <tr>
                                        <td>{{ $advertisement->user_id }}</td>
                                        <td>{{ $advertisement->city_id }}</td>
                                        <td>{{ $advertisement->county_id }}</td>
                                        <td>{{ $advertisement->category_id }}</td>
                                        <td>{{ $advertisement->picture_id }}</td>
                                        <td>{{ $advertisement->title }}</td>
                                        <td>{{ $advertisement->price }}</td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
