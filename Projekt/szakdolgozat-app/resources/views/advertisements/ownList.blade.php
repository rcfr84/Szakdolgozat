@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-15">
                @if(session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                <div class="card">
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
                                    <th>Módosítás</th>
                                    <th>Törlés</th>
                                </tr>
                            </thead>
                            @forelse ($advertisements as $advertisement)
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
                                        <td>
                                            <a href="{{ route('advertisements.edit', $advertisement->advertisement_id) }}" class="btn btn-primary">Módosítás</a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('advertisements.destroy', $advertisement->advertisement_id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Törlés</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            @empty
                                <tbody>
                                    <tr>
                                        <td colspan="10">Nincs hirdetés</td>
                                    </tr>
                                </tbody>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
