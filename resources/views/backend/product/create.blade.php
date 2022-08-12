@extends('backend.layouts.master')

@section('title','Thêm mới Product')
@section('main')
    <!-- Content Header (Page header) -->

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Lỗi !</h4>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thêm mới Sản phẩm</h3>
                        <a href="{{ route('admin.product.index') }}" class="btn btn-info pull-right"><i class="fa fa-list" aria-hidden="true"></i> Danh Sách</a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="image">Chọn ảnh</label>
                                <input type="file" name="image" id="image">
                            </div>

                            <div class="form-group">
                                <label for="stock">Số lượng</label>
                                <input id="stock" name="stock" type="number" min="1" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="price">Giá</label>
                                <input id="price" name="price" type="text" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="sale">Giá sale</label>
                                <input id="sale" name="sale" type="text" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="url">Liên kết</label>
                                <input type="text" class="form-control" id="url" name="url" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="category_id">Danh mục sản phẩm (*): </label>
                                <select id="category_id" name="category_id" class="form-control">
                                    <option value="0">-- Chọn Danh Mục --</option>
                                    @foreach($category as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="vendor_id">Nhà cung cấp</label>
                                <select class="form-control" name="vendor_id" id="vendor_id">
                                    <option value="0">---Chọn Nhà cung cấp---</option>
                                    @foreach($Ven_Bra['vendor'] as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="brand_id">nhãn hiệu</label>
                                <select class="form-control" name="brand_id" id="brand_id">
                                    <option value="0">---Chọn nhãn hiệu---</option>
                                    @foreach($Ven_Bra['brand']  as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="position">Vị trí</label>
                                <input min="0" type="number" class="form-control" id="position" name="position" placeholder="">
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input value="1" type="checkbox" name="is_active" id="is_active"> Trạng thái
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input value="1" type="checkbox" name="is_hot" id="is_hot"> Sản phẩm hot / Flash Sale
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="summary" id="label-summary">Tóm tắt</label>
                                <textarea id="summary" name="summary" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>

                            <div class="form-group">
                                <label for="description" id="label-description">Mô tả</label>
                                <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>

                            <div class="form-group">
                                <label for="meta_title" id="label-meta-title">Meta title</label>
                                <textarea id="meta_title" name="meta_title" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>

                            <div class="form-group">
                                <label for="meta_description" id="label-meta-description">Meta description</label>
                                <textarea id="meta_description" name="meta_description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btnCreate">Thêm</button>
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

@section('js')
    <script type="text/javascript">
        $( document ).ready(function() {
            CKEDITOR.replace( 'description' );
            CKEDITOR.replace( 'summary' );
            CKEDITOR.replace( 'meta-title' );
            CKEDITOR.replace( 'meta-description' );
            $('#price').on('keyup',function (e) {
                var price = $(this).val().replace(/[^0-9]/g,'');// lấy giá trị của textbox giá
                if (price > 0) {
                    price = parseInt(price.replaceAll(',',''));// thay thế dấu ,
                    price = new Intl.NumberFormat('ja-JP').format(price);// fomat định dạng rồi gán giá trị
                }
                $(this).val(price);
            });
            $('#sale').on('keyup',function (e) {
                var price = $(this).val().replace(/[^0-9]/g,'');
                if (price > 0) {
                    price = parseInt(price.replaceAll(',',''));
                    price = new Intl.NumberFormat('ja-JP').format(price);
                }
                $(this).val(price);
            });
            if($('#sale').val !== '') {
                var price = $('#sale').val().replace(/[^0-9]/g,'');
                if (price > 0) {
                    price = parseInt(price.replaceAll(',',''));
                    price = new Intl.NumberFormat('ja-JP').format(price);
                }
                $('#sale').val(price);
            }
            if($('#price').val !== '') {
                var price = $('#price').val().replace(/[^0-9]/g,'');
                if (price > 0) {
                    price = parseInt(price.replaceAll(',',''));
                    price = new Intl.NumberFormat('ja-JP').format(price);
                }
                $('#price').val(price);
            }
            $('.btnCreate').click(function () {
                if ($('#name').val() === '') {
                    $('#name').notify('Bạn nhập chưa nhập tên sản phẩm','error');
                    document.getElementById('name').scrollIntoView();
                    return false;
                }
                if ($('#image').val() === '') {
                    $('#image').notify('Bạn nhập chưa chọn ảnh ','error',{ position:"right" });
                    document.getElementById('image').scrollIntoView();{{--sử dụng scrollIntoView để trỏ đến khu bị lỗi--}}
                        return false;
                }
                if ($('#stock').val() === '') {
                    $('#stock').notify('Bạn nhập chưa nhập số lượng','error');
                    document.getElementById('stock').scrollIntoView();
                    return false;
                }
                if ($('#price').val() === '') {
                    $('#price').notify('Bạn nhập chưa nhập giá','error');
                    document.getElementById('price').scrollIntoView();
                    return false;
                }
                if ($('#sale').val() === '') {
                    $('#sale').notify('Bạn nhập chưa nhập giảm giá','error');
                    document.getElementById('sale').scrollIntoView();
                    return false;
                }
                if ($('#category_id').val() === '0') {
                    $('#category_id').notify('Bạn nhập chưa chọn danh mục','error',{ position:"right" });
                    document.getElementById('category_id').scrollIntoView();{{--sử dụng scrollIntoView để trỏ đến khu bị lỗi--}}
                        return false;
                }
                if ($('#vendor_id').val() === '0') {
                    $('#vendor_id').notify('Bạn nhập chưa chọn nhà cung cấp','error',{ position:"right" });
                    document.getElementById('category_id').scrollIntoView();{{--sử dụng scrollIntoView để trỏ đến khu bị lỗi--}}
                        return false;
                }
                if ($('#brand_id').val() === '0') {
                    $('#brand_id').notify('Bạn nhập chưa chọn thương hiệu','error');
                    document.getElementById('vendor_id').scrollIntoView();
                    return false;
                }
                if ($('#position').val() === '') {
                    $('#position').notify('Bạn nhập chưa nhập vị trí','error');
                    document.getElementById('price').scrollIntoView();
                    return false;
                }
                var summary = CKEDITOR.instances['summary'].getData();
                if (summary === '') {
                    $('#label-summary').notify('Bạn nhập chưa nhập tóm tắt','error',{ position:"right" });
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
