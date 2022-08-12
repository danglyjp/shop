@extends('backend.layouts.master')

@section('title','Danh sách category')
@section('main')
<section class="content">
<div class="col-xs-12">
<div class="box">
    <div class="box-header">
        @if(Auth::user()->role_id == 1)
        <div class="form-group" style="width: 150px;float: left;margin: 0">
            <select class="form-control" id="filter_type" name="filter_type">
                <option {{ $filter_type == 1 ? 'selected' : '' }} value="1">Tất cả</option>
                <option {{ $filter_type == 2 ? 'selected' : '' }} value="2">Đang Sử Dụng</option>
                <option {{ $filter_type == 3 ? 'selected' : '' }} value="3">Đã Bị Xóa</option>
            </select>
        </div>
        @endif
      <div class="btn-group pull-right grid-create-btn" style="margin-right: 10px">
        <a href="{{route('admin.category.create')}}" class="btn btn-sm btn-success" title="New">
            <i class="fa fa-plus"></i><span class="hidden-xs">&nbsp;&nbsp;New</span>
        </a>
    </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
      <table class="table table-hover">
        <tbody>
          <tr>
            <th style="width: 10px">ID</th>
            <th>Hình ảnh</th>
            <th>Tên</th>
            <th>Danh mục cha</th>
            <th>trạng thái</th>
            <th>Sắp xếp</th>
            <th>Hành động</th>
        </tr>
        @foreach($data as $key => $item)
        @php
            @endphp
        <tr class="item-{{ $item->id }}">
            <td>{{ $key + 1 }}</td>
            <td>
                @if($item->image && file_exists(public_path($item->image)))
                    <img src="{{ asset($item->image) }}" width="100" height="75" alt="">
                @else
                    <img src="{{ asset('upload/404.png') }}" width="100" height="75" alt="">
                @endif
            </td>
            <td>{{ $item->name }}</td>
            <td>
                {{ !empty($item->parent->name) ? $item->parent->name : '' }}
            </td>
            <td>
                {!! $item->is_active == 1 ? '<span class="badge bg-green">ON</span>' : '<span class="badge bg-danger">OFF</span>' !!}
            </td>
            <td>
                {{ $item->position }}
            </td>
            <td>
                <a href="{{ route('admin.category.edit', ['category' => $item->id]) }}"><span title="Chỉnh sửa" type="button" class="btn btn-flat btn-primary"><i class="fa fa-edit"></i></span></a>
        
                @if($item->deleted_at == null)
                <span data-id="{{ $item->id }}" title="Xóa" class="btn btn-flat btn-danger deleteItem"><i class="fa fa-trash"></i></span>
                @else
                <span data-id="{{ $item->id }}" title="Khôi phục" class="btn btn-flat btn-warning restoreItem"><i class="fa fa-refresh"></i></span>
                @endif
            </td>
        </tr>
    @endforeach
      </tbody>
    </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
      <ul class="pagination pagination-sm no-margin pull-right">
          {{ $data->links() }}
      </ul>
  </div>
  </div>
</div>
</section>
@endsection

@section('js')
  <script type="text/javascript">
      $( document ).ready(function() {

          $('.deleteItem').click(function () {
              var id = $(this).attr('data-id');

              Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                  if (result.isConfirmed) {
                      $.ajax({
                          url : '/admin/category/'+id,
                          type: 'DELETE',
                          data: {},
                          success: function (res) {
                              if(res.status) {
                                  $('.item-'+id).remove();
                              }
                          },
                          error: function (res) {

                          }
                      });
                  }
              });
          });



          $('.restoreItem').click(function () {
                var id = $(this).attr('data-id');

                Swal.fire({
                    title: 'Bạn có muốn khôi phục ?',
                    text: "Dữ liệu khôi phục sẽ được nhìn thấy bởi tất cả các thành viên",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url : '/admin/category/restore/'+id,
                            type: 'POST',
                            data: {},
                            success: function (res) {
                                if(res.status) {
                                    Swal.fire(
                                        'Thông báo !',
                                        'Khôi phục thành công',
                                        'success'
                                    )
                                } else {
                                    Swal.fire(
                                        'Thông báo !',
                                        'Có lỗi xảy ra',
                                        'error'
                                    )
                                }
                            },
                            error: function (res) {

                            }
                        });
                    }
                });
            });

            $('#filter_type').change(function () {
                var filter_type = $('#filter_type').val();

                window.location.href = "{{ route('admin.category.index') }}?filter_type="+filter_type;
            });
        
      });
  </script>
  
@endsection