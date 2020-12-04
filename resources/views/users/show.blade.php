@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="d-inline-flex">
                    <div class="p-3 d-flex flex-column">
                        <img src="{{ asset('storage/profile_image/' .$user->profile_image) }}" class="rounded-circle" width="100" height="100">
                        <div class="mt-3 d-flex flex-column">
                            <h4 class="mb-0 font-weight-bold">{{ $user->screen_name }}</h4>
                            <span class="text-secondary">＠{{ $user->name }}</span>
                        </div>
                    </div>
                    <div class="p-3 d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-end">
                            <div class="p-2 d-flex flex-column align-items-center">
                                @if ($user->id === Auth::user()->id)
                                    <a href="{{ url('users/' .$user->id .'/edit') }}" class="btn btn-primary">プロフィールを編集する</a>
                                @endif
                            </div>
                            <div class="p-2 d-flex flex-column align-items-center">
                                @if ($user->id === Auth::user()->id)
                                    <a href="{{ url('links/create') }}" class="btn btn-primary">リンクを追加する</a>
                                @endif
                            </div>
                            <div class="p-2 d-flex flex-column align-items-center">
                                @if ($user->id === Auth::user()->id)
                                    <a href="{{ url('links/') }}" class="btn btn-primary">リンクを編集する</a>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="p-2 d-flex flex-column align-items-center">
                                <p class="font-weight-bold">最終更新日</p>
                                <span>{{ $lastUpdateDate->format('Y-m-d H:i') }}</span>
                            </div>
                            <div class="p-2 d-flex flex-column align-items-center">
                                <p class="font-weight-bold">アカウント登録日</p>
                                <span>{{ $user->created_at->format('Y-m-d H:i') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- リンク一覧 --}}
        @if (isset($links))
            <div class="col-md-8 mb-3">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        @foreach ($links as $link)
                        <a href="{{ $link->link }}">
                            <li class="list-group-item text-center">
                                {{ $link->link_name }}
                            </li>
                        </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
