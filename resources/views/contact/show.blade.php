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
                    {{ $contact->your_name }}<br/>
                    {{ $contact->title }}<br/>
                    {{ $contact->email }}<br/>
                    {{ $contact->url }}<br/>
                    {{ $contact->gender }}<br/>
                    {{ $contact->age }}<br/>
                    {{ $contact->contact }}<br/>
                    <form method="GET" action="{{ route('contact.edit', ['id' => $contact->id]) }}">
                        @csrf
                        <input type="submit" value="変更する">
                    </form>
                    <form method="POST" action="{{ route('contact.delete', ['id' => $contact->id]) }}" id="delete_{{ $contact->id }}">
                        @csrf
                        <input type="submit" value="削除">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
