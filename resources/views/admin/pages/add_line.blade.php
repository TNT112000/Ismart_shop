@extends('admin.layouts.main')

@section('content')
    <div id="main-content-wp" class="add-cat-page">
        <div class="wrap clearfix">
            @include('admin.layouts.sidebar')
            <div id="content" class="fl-right">

                <div class="section" id="title-page">
                    <div class="clearfix">
                        <h3 id="index" class="fl-left">Thêm mới thương hiệu</h3>
                    </div>
                </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <form action="{{ route('line.store') }}" method="Post">
                            @csrf
                            <div class="request_input">
                                <label for="title">Tên Thương hiệu</label>
                                <input type="text" name="name" id="title">

                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="request_input">
                                <select name="category_id">
                                <option value="">--- Chọn danh mục ---</option>
                                @foreach ($data as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                                </select>
                                @error('category')
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
