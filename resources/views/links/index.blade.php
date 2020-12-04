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
                                <form method="POST" action="{{ url('links/' .$linkList->id .'/edit') }}" class="mb-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item btn">編集</button>
                                </form>

                                <form method="POST" action="{{ url('links/' .$linkList->id) }}" class="mb-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item del-btn">削除</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="my-4 d-flex justify-content-center">
        {{-- {{ $linkLists->links() }} --}}
    </div>
</div>
@endsection
