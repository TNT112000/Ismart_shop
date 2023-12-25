@extends('admin.layouts.main')
@php

@endphp
@section('content')
    <div id="main-content-wp" class="add-cat-page">
        <div class="wrap clearfix">
            @include('admin.layouts.sidebar')
            <div id="content" class="fl-right">

                <div class="section" id="title-page">
                    <div class="clearfix">
                        <h3 id="index" class="fl-left">Chỉnh sửa danh mục</h3>
                    </div>
                </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <form action="{{ route('category.update',['category'=>$data->id]) }}" method="Post">
                            @csrf
                            <div class="request_input">
                                <label for="title">Tên danh mục</label>
                                <input type="text" name="name" id="title" value="{{$data->name}}">

                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="request_input">
                                <label for="title">Slug ( Friendly_url )</label>
                                <input type="text" name="url" id="slug" value="{{$data->url}}">

                                @error('url')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" name="btn-submit" class="btn_submit" id="btn-submit">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
