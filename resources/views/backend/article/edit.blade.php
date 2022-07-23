@extends('backend.layouts.master')

@section('title','CHỈNH SỬA BÀI VIẾT')
@section('main')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-fw fa-edit"></i>
            CHỈNH SỬA BÀI VIẾT
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{asset('/admin')}}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
            <li><a href="{{route('admin.article.index')}}"><i class="fa fa-dashboard"></i> Quản lý bài viết</a></li>
            <li class="active">Chỉnh Sửa bài viết</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('admin.article.update', ['article' => $model->id]) }}" enctype="multipart/form-data"> <!--enctype sử dụng để upload file -->
                        @csrf<!-- phòng chống hack thông qua cookie (quyền chứng thực) -->
                        @method('PUT')
                        <div class="box-body">

                            <div class="form-group">
                                <label for="title">Tiêu Đề (*): </label>
                                <input name="title" class="form-control" id="title" placeholder="Nhập tiêu đề" value="{{ $model->title }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Chọn ảnh</label>
                                <input type="file" name="image" id="image">
                            </div>

                            @if($model->image && file_exists(public_path($model->image)))
                                <img src="{{ asset($model->image) }}" width="100" height="75" alt="">
                            @else
                                <img src="{{ asset('upload/404.png') }}" width="100" height="75" alt="">
                            @endif

                            <div class="form-group">
                                <label for="url">URL: </label>
                                <input name="url" class="form-control" id="url" placeholder="Nhập link" value="{{ $model->url }}">
                            </div>

                            <div class="form-group">
                                <label for="category_id">Danh Mục Bài Viết (*): </label>
                                <select id="category_id" name="category_id" class="form-control">
                                    <option value="0">-- Chọn Danh Mục Bài Viết --</option>
                                    @foreach($Categories as $item)
                                        <option {{ $model->category_id ==  $item->id ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

{{--                            <div class="form-group">--}}
{{--                                <label for="position">Vị trí Bài Viết: </label>--}}
{{--                                <select id="position" name="position" class="form-control">--}}
{{--                                    @foreach($cbdata as $item)--}}
{{--                                        <option @if($item->position == $model->position) selected @endif value="{{$item->position}}">{{$item->position}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}

                            <div class="form-group">
                                <label for="position">Vị trí</label>
                                <input value="{{ $model->position }}" min="0" type="number" class="form-control" id="position" name="position" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="is_active">Trạng Thái Kích Hoạt: </label>
                                <select id="is_active" name="is_active" class="form-control">
                                    <option @if($model->is_active == 0) selected @endif value="0">Tắt</option>
                                    <option @if($model->is_active == 1) selected @endif value="1">Kích Hoạt</option>


                                </select>
                            </div>

                            <div class="form-group">
                                <label id="label-summary" for="summary">Mô tả (*):</label>
                                <textarea id="summary" name="summary" class="form-control" rows="3"
                                          placeholder="Enter ...">{{ $model->summary }}</textarea>
                            </div>

                            <div class="form-group">
                                <label id="label-description" for="description">Nội Dung Bài Viết (*):</label>
                                <textarea id="description" name="description" class="form-control" rows="3"
                                          placeholder="Enter ...">{{ $model->description }}</textarea>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btnupdate">Cập Nhật</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

{{--Tạo Validate theo kiểu JS--}}
@section('js')
    <script type="text/javascript">
        $( document ).ready(function() {
            CKEDITOR.replace( 'summary' );
            CKEDITOR.replace( 'description' );
            $('.btnupdate').click(function () {
                if ($('#title').val() === '') {
                    $('#title').notify('Bạn nhập chưa nhập tiêu đề bài viết','error',{ position:"right" });
                    document.getElementById('title').scrollIntoView();{{--sử dụng scrollIntoView để trỏ đến khu bị lỗi--}}
                        return false;
                }

                if ($('#category_id').val() === '0') {
                    $('#category_id').notify('Bạn nhập chưa chọn danh mục','error',{ position:"right" });
                    document.getElementById('category_id').scrollIntoView();{{--sử dụng scrollIntoView để trỏ đến khu bị lỗi--}}
                        return false;
                }

                var summary = CKEDITOR.instances['summary'].getData();
                if (summary === '') {
                    $('#label-summary').notify('Bạn nhập chưa nhập mô tả','error',{ position:"right" });
                    document.getElementById('label-summary').scrollIntoView();
                    return false;
                }

                var description = CKEDITOR.instances['description'].getData();
                if (description === '') {
                    $('#label-description').notify('Bạn nhập chưa nhập Nội Dung Bài Viết','error',{ position:"right" });
                    document.getElementById('label-description').scrollIntoView();
                    return false;
                }
            });
        });
    </script>
@endsection
