@extends('backend.layouts.master')

@section('title','Danh sách banner')
@section('main')
<section class="content">
<div class="col-xs-12">
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Striped Full Width Table</h3>
      <div class="btn-group pull-right grid-create-btn" style="margin-right: 10px">
        <a href="{{route('admin.banner.create')}}" class="btn btn-sm btn-success" title="New">
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
            <th>Loại</th>
            <th>Hành động</th>
        </tr>
        @foreach($data as $key => $item)
        <tr class="item-{{ $item->id }}">
          <td>{{ $item->id }}</td>
          <td>
            @if($item->image && file_exists(public_path($item->image)))
                <img src="{{ asset($item->image) }}" width="100" height="75" alt="">
            @else
                <img src="{{ asset('upload/404.png') }}" width="100" height="75" alt="">
            @endif
        </td>
        <td>{{ $item->title }}</td>
        <td>
            @if($item->type == 1)
                Banner home
            @elseif($item->type == 2)
                Banner left
            @elseif($item->type ==3)
                Banner right
            @elseif($item->type == 4)
                Background
            @else
                None
            @endif
        </td>
        <td>
          <a href="{{ route('admin.banner.edit', ['banner' => $item->id]) }}"><span title="Chỉnh sửa" type="button" class="btn btn-flat btn-primary"><i class="fa fa-edit"></i></span></a>
          <span onclick="deleteItem({{ $item->id }})" data-id="{{ $item->id }}" title="Xóa" class="btn btn-flat btn-danger deleteItem"><i class="fa fa-trash"></i></span>
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
                  title: 'Bạn có chắn muốn xóa?',
                  text: "Dữ liệu bị xóa sẽ không thể khôi phục lại",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes'
              }).then((result) => {
                  if (result.isConfirmed) {
                      $.ajax({
                          url : '/admin/banner/'+id,
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