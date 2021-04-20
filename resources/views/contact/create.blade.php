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
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    </div>
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        氏名
                        <input type="text" name="your_name">
                        <br>
                        件名
                        <input type="text" name="title">
                        <br>
                        メールアドレス
                        <input type="email" name="email">
                        <br>
                        ホームページ
                        <input type="url" name="url">
                        <br>
                        性別<br>
                        <input type="radio" name="gender" value="0">男性<br>
                        <input type="radio" name="gender" value="1">女性<br>
                        <br>
                        年齢
                        <select name="age">
                            <option value="">選択てください</option>
                            <option value="1">〜19歳</option>
                            <option vlaue="2">20歳〜29歳</option>
                            <option vlaue="3">30歳〜39歳</option>
                            <option value="4">40歳〜49歳</option>
                            <option value="5">50歳〜59歳</option>
                            <option value="6">60歳</option>
                        </select>
                        <br>
                        お問い合わせ内容<br>
                        <textarea name="contact"></textarea>
                        <br>
                        <input type="checkbox" name="caution" value="1">同意する
                        <br>
                        <input class="btn btn-info" type="submit" vlaue="送信">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
