@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">リンクの追加</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('links.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="link_name" class="col-md-4 col-form-label text-md-right">サービス名</label>

                            <div class="col-md-6">
                                <input id="link_name" type="text" class="form-control @error('link_name') is-invalid @enderror" name="link_name" placeholder="Twitter" required autocomplete="link_name" autofocus>

                                @error('link_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="link" class="col-md-4 col-form-label text-md-right">URL</label>

                            <div class="col-md-6">
                                <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" placeholder="https://twitter.com/" required autocomplete="link" autofocus>

                                @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">追加する</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
