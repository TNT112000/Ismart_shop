@extends('admin.layouts.main')

@section('content')
    <div id="main-content-wp" class="add-cat-page">
        <div class="wrap clearfix">
            @include('admin.layouts.sidebar')
            <div id="content" class="fl-right">
                <div class="section" id="title-page">
                    <div class="clearfix">
                        <h3 id="index" class="fl-left">Giới thiệu</h3>
                    </div>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @foreach($data as $item)
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <form method="POST" action="{{route('introduce.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="request_input">
                                <label for="title">Tiêu đề</label>
                                <input type="text" name="title" id="title" value="{{$item->title}}">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="request_input">
                                <label for="title">Đại chỉ</label>
                                <input type="text" name="address" id="title" value="{{$item->address}}"> 
                               
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="request_input">
                                <label for="title">Số điện thoại</label>
                                <input type="text" name="phone" id="title" value="{{$item->phone}}">

                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="request_input">
                                <label for="title">Email</label>
                                <input type="email" name="email" id="title" value="{{$item->email}}">

                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="request_input">
                                <label for="desc">Mô tả</label>
                                <textarea name="content" id="desc" class="ckeditor" > {{$item->content}}</textarea>
                                @error('content')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            

                            <button type="submit" name="btn-submit" id="btn-submit" class="btn_submit">Thêm mới</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
