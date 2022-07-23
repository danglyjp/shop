<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Cách 1 : lấy dữ liệu mới nhất và phân trang - mỗi trang 10 bản ghi
        $data = Articles::latest()->paginate(10);

        //Cách 2: Lấy dữ liệu phân trang - mỗi trang 10 bản ghi
        //$data = Articles::paginate(10);

        //kiểm tra dữ liệu
        //dd($data);

        //Cách 3: lấy toàn bộ dữ liệu
        //$data = article::all(); // tương đương với câu lệnh SELECT * FORM articles

        // truyền dữ liệu sang view với 2 tham số 1 tên view và 2 là mảng dữ liệu truyền sang
        return view('backend.article.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //lấy tất cả dữ liệu từ bản article
        $data = Category::all(); // => Select * form article

        // truyền dữ liệu thấy dc qua view create
        return view('backend.article.create', ['data'=> $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // xác thực dữ liệu - validate từ phía server (ưu điểm user ko thể tắt validate - nhược điểm gây chậm server)
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'category_id' => 'required',
            'summary' => 'required|max:255',
            'description' => 'required|max:5000',
        ],[
            'name.required' => 'Bạn cần phải nhập vào tiêu đề bài viết',
            'image.required' => 'Bạn chưa chọn file ảnh',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
            'category_id.category_id' => 'Bạn chưa chọn danh mục bài viết',
            'summary.summary' => 'Bạn chưa nhập nội dung',
            'description.description' => 'Bạn chưa nhập nội dung bài viết',
        ]);

        $Articles = new Articles();
        $Articles->title = $request->input('title');

        //  Trong laravel sử dụng <use Illuminate\Support\Str;> để chuyển đổi tiêu đề thành dạng slug
        //  :: trong laravel tượng trưng cho hàm static
        $Articles->slug = Str::slug($request->input('title'));

        if($request->hasFile('image')){// kiểm tra xem có ảnh dc chọn ko

            // get file - tạo ra 1 biến file đại diện cho file ảnh dc up lên
            $file = $request->file('image');

            // đặt tên cho file ảnh (thời gian tạo + tên ảnh)
            $filename = time().'_'.$file->getClientOriginalName();

            // định nghĩa đường dẫn lưu trữ file ảnh
            $path_upload = 'frontend/img/blog/';

            // thực hiện chuyển file ảnh (thông qua hàm move()) vào thư mục đã cấu hình
            $file->move($path_upload,$filename);

            //lưu lại trên
            $Articles->image = $path_upload.$filename;
        }

        $Articles->url = $request->input('url');
        $Articles->category_id = $request->input('category_id');
        $Articles->position = $request->input('position');
        $Articles->is_active = $request->input('is_active');

        $Articles->summary = $request->input('summary');
        $Articles->description = $request->input('description');

        $Articles->created_at = date('Y-m-d H:i:s');

        $Articles->save();

        //sau khi thêm dữ liệu Category vào db thành công chuyển hướng về trang danh sách
        // hàm redirect() tương tự hàm header() dùng chuyễn hướng trang
        return redirect()->route('admin.article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Articles::findOrFail($id);

        //lấy tất cả dữ liệu từ bản Articles mục đích sử dụng get data vào cb vị trí trong bài viết
        $cbdata = Articles::all();
        //lấy tất cả dữ liệu từ bản category
        $Categories = Category::all(); // => Select * form category

        // sau khi tìm dữ liệu thành công, bắt đầu chuyên dữ liệu đó sang view edit
        return view('backend.article.edit', ['model' => $model,'cbdata'=>$cbdata , 'Categories' => $Categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Articles = Articles::findOrFail($id);
        $Articles->title = $request->input('title');

        //  Trong laravel sử dụng <use Illuminate\Support\Str;> để chuyển đổi tiêu đề thành dạng slug
        //  :: trong laravel tượng trưng cho hàm static
        $Articles->slug = Str::slug($request->input('title'));

        if($request->hasFile('image')){// kiểm tra xem có ảnh dc chọn ko
            // Sử Dụng Hàm unlink() để xoá file ảnh củ khi thực hiện upload ảnh mới
            @unlink(public_path($Articles->image));

            // get file - tạo ra 1 biến file đại diện cho file ảnh dc up lên
            $file = $request->file('image');

            // đặt tên cho file ảnh (thời gian tạo + tên ảnh)
            $filename = time().'_'.$file->getClientOriginalName();

            // định nghĩa đường dẫn lưu trữ file ảnh
            $path_upload = 'frontend/img/blog/';

            // thực hiện chuyển file ảnh (thông qua hàm move()) vào thư mục đã cấu hình
            $file->move($path_upload,$filename);

            //lưu lại trên
            $Articles->image = $path_upload.$filename;
        }

        $Articles->url = $request->input('url');
        $Articles->category_id = $request->input('category_id');
        $Articles->position = $request->input('position');
        $Articles->is_active = $request->input('is_active');

        $Articles->summary = $request->input('summary');
        $Articles->description = $request->input('description');

        $Articles->updated_at = date('Y-m-d H:i:s');

        $Articles->save();

        //sau khi thêm dữ liệu Category vào db thành công chuyển hướng về trang danh sách
        // hàm redirect() tương tự hàm header() dùng chuyễn hướng trang
        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Articles = Articles::findOrFail($id);
        // xóa ảnh cũ
        @unlink(public_path($Articles->image));

        $Articles::destroy($id); // => DELETE * FORM Articles Where id = $id

        return response()->json(['status' => true, 'msg' => 'Xóa thành công']);
    }
}
