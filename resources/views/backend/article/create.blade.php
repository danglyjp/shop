@extends('backend.layouts.master')

@section('title','THÊM MỚI BÀI VIẾT')
@section('main')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            THÊM MỚI BÀI VIẾT
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{asset('/admin')}}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
            <li><a href="{{route('admin.article.index')}}"><i class="fa fa-dashboard"></i> Quản lý bài viết</a></li>
            <li class="active">Tạo mới bài viết</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Error Message -->
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Cảnh Báo !</h4>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div><!-- End Error Message -->

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{route('admin.article.store')}}" enctype="multipart/form-data"> <!--enctype sử dụng để upload file -->
                    @csrf<!-- phòng chống hack thông qua cookie (quyền chứng thực) -->
                        <div class="box-body">

                            <div class="form-group">
                                <label for="title">Tiêu Đề (*): </label>
                                <input name="title" class="form-control" id="title" placeholder="Nhập tiêu đề">
                            </div>

                            <div class="form-group">
                                <label for="image">Chọn hình ảnh (*): </label>
                                <input type="file" name="image" id="image">
                            </div>

                            <div class="form-group">
                                <label for="url">URL: </label>
                                <input name="url" class="form-control" id="url" placeholder="Nhập link">
                            </div>

                            <div class="form-group">
                                <label for="category_id">Danh Mục Bài Viết (*): </label>
                                <select id="category_id" name="category_id" class="form-control">
                                    <option value="0">-- Chọn Danh Mục Bài Viết --</option>
                                    @foreach($data as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="position">Vị trí</label>
                                <input min="0" type="number" class="form-control" id="position" name="position" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="is_active">Trạng Thái Kích Hoạt: </label>
                                <select id="is_active" name="is_active" class="form-control">
                                    <option selected value="0">Tắt</option>
                                    <option value="1">Kích Hoạt</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label id="label-summary" for="summary">Mô tả (*):</label>
                                <textarea id="summary" name="summary" class="form-control" rows="3"
                                          placeholder="Enter ..."></textarea>
                            </div>

                            <div class="form-group">
                                <label id="label-description" for="description">Nội Dung Bài Viết (*):</label>
                                <textarea id="description" name="description" class="form-control" rows="3"
                                          placeholder="Enter ..."></textarea>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btnCreate">Tạo Mới Bài Viết</button>
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
            $('.btnCreate').click(function () {
                if ($('#title').val() === '') {
                    $('#title').notify('Bạn nhập chưa nhập tiêu đề bài viết','error',{ position:"right" });
                    document.getElementById('title').scrollIntoView();{{--sử dụng scrollIntoView để trỏ đến khu bị lỗi--}}
                        return false;
                }

                if ($('#image').val() === '') {
                    $('#image').notify('Bạn nhập chưa chọn ảnh bài viết','error',{ position:"right" });
                    document.getElementById('image').scrollIntoView();{{--sử dụng scrollIntoView để trỏ đến khu bị lỗi--}}
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
