@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-15">
                @if(session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('List of own advertisements') }}</div>
                   
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Város</th>
                                    <th>Vármegye</th>
                                    <th>Kategória</th>
                                    <th>Kép</th>
                                    <th>Cím</th>
                                    <th>Ár</th>
                                    <th>Leírás</th>
                                    <th>Telefonszám</th>
                                </tr>
                            </thead>
                            @foreach ($advertisements as $advertisement)
                                @if ($advertisement->user_id == Auth::user->user_id)
                                    <tbody>
                                        <tr>
                                            <td>{{ $advertisement->city->name}}</td>
                                            <td>{{ $advertisement->city->county->name }}</td>
                                            <td>{{ $advertisement->category->name }}</td>
                                            <td>
                                                @if ($advertisement->picture_id != null)
                                                    <img src="{{ asset('storage/images/' . $advertisement->pictures->first()->src) }}">
                                                @else
                                                    Nincs kép
                                                @endif
                                            </td>
                                            <td>{{ $advertisement->title }}</td>
                                            <td>{{ $advertisement->price }}</td>
                                            <td>{{ $advertisement->description }}</td>
                                            <td>{{ $advertisement->mobile_number }} </td>
                                        </tr>
                                    </tbody>
                                @else
                                    <tbody>
                                        <tr>
                                            <td>Nincs hirdetés</td>
                                        </tr>
                                    </tbody>    
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
