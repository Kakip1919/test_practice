@extends('layout.bbslayout')

@section('title', 'LaravelPjt BBS 投稿編集ページ')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', '投稿編集ページの説明文')
@section('pageCss')
    <link href="/css/bbs/style.css" rel="stylesheet">
@endsection

@include('layout.bbsheader')

@section('content')

    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="h4 mb-4 font-weight-bold">
                {{ $comments->name }}への返信

            </h1>
            コメント内容：
            {!! nl2br(e($comments->comment)) !!}
                    <div class="mb-4 text-right">
                        <form class="mb-4" method="GET" action="{{ route('comment.edit',$comments->post_id) }}">
                            @csrf
                            <input
                                name="ancestor"
                                type="hidden"
                                value="{{ $comments->id }}"
                            >
                            <input
                                name="post_id"
                                type="hidden"
                                value="{{ $comments->post_id }}"
                            >

                            <div class="form-group">
                                <label for="subject">
                                    名前
                                </label>

                                <input
                                    id="name"
                                    name="name"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    value="{{ $user->name }}"
                                    type="text"
                                >
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="body">
                                    本文
                                </label>

                                <textarea
                                    id="comment"
                                    name="comment"
                                    class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}"
                                    rows="4"
                                >{{ old('comment') }}</textarea>
                                @if ($errors->has('comment'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('comment') }}
                                    </div>
                                @endif

                            </div>
                            @if (session('commentstatus'))
                                <div class="alert alert-success mt-4 mb-4">
                                    {{ session('commentstatus') }}
                                </div>
                            @endif
                            <a href="{{ route('bbs.index') }}" class="btn btn-info">
                                一覧に戻る
                            </a>
                            <div class="mt-4">

                                <button type="submit" class="btn btn-primary">返信する</button>
                            </div>
                        </form>
                    </p>
                </div>
                </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection

@include('layout.bbsfooter')
