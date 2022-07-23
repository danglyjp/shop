@extends('backend.layouts.master')

@section('title','Danh sách category')
@section('main')
<section class="content">
<div class="col-xs-12">
<div class="box">
    <div class="box-header">
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
                <span data-id="{{ $item->id }}" title="Xóa" class="btn btn-flat btn-danger deleteItem"><i class="fa fa-trash"></i></span>
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
      });
  </script>
  
@endsection