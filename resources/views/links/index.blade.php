@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (isset($linkLists))
            @foreach ($linkLists as $linkList)
                <div class="col-md-8 mb-3">
                    <div class="card">
                        <div class="card-haeder p-3 w-100 d-flex">
                            <div class="d-flex justify-content-end flex-grow-1">
                                <p class="mb-0 text-secondary">最終更新日時：{{ $linkList->created_at->format('Y-m-d H:i') }}</p>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <a href="{{ $linkList->link }}">{{ $linkList->link_name }}</a>
                        </div>
                        <div class="card-footer py-1 d-flex justify-content-end bg-white">
                            <div class="d-flex justify-content-end flex-grow-1">
                                <a href="{{ url('links/' .$linkList->id .'/edit') }}" class="btn">編集</a>
                                <form method="POST" action="{{ url('links/' .$linkList->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn">削除</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="my-4 d-flex justify-content-center">
        {{-- 広告スペース予定 --}}
    </div>
</div>
@endsection
