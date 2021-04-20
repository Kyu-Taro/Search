@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('contact.create') }}">新規登録</a>
                    <br/>
                    <form class="d-flex" method="GET" action="{{ route('contact.index') }}">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">詳細</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($contacts as $contact)
                          <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->your_name }}</td>
                            <td><a href="{{ route('contact.show', ['id' => $contact->id]) }}">詳細を見る</a></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
