<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{

    // GET: /home
    public function viewHomePage()
    {
        // Dữ liệu bản tin
        $allNews = DB::table('news')
            ->select(['id', 'title', 'created_at'])
            ->get();
        return view('news.home-page', ['allNews' => $allNews]);
    }

    // GET: /home/create:
    public function viewCreateNewsPage()
    {
        return view('news.create-news-page');
    }

    //POST: /home/create
    public function createNews(Request $request)
    {
        $title = $request->get('title');
        $content = $request->get('content');
        // Tao tin -> chuyen huong ve home
        DB::table('news')->insert([
            'title' => $title,
            'content' => $content,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/home');
    }

    // GET: /home/news/{id}
    public function viewNewsById($id)
    {
        // Lấy ra dc chi tiết 1 bản tin
        $news = DB::table('news')->find($id);
        return view('news.news-detail', ['news' => $news]);
    }

    // DELETE: /home/news/{id}
    public function deleteNewsById($id)
    {
        DB::table('news')->delete($id);
        return redirect()->back();
    }

    // GET: /home/news/{id}/edit
    public function viewEditNewsById($id)
    {
        // Buoc 1: Kiem tra xem bai viet co ton tai hay ko?
        $news = DB::table('news')->find($id);
        if ($news == null) {
            // Ko ton tai
            return redirect('/home');
        }
        // Buoc 2: Tra thong tin bai viet cho form cap nhat
        return view('news.edit-news-page', ['news' => $news]);

    }

    public function editNewsById($id, Request $request)
    {
        // Buoc 1: Kiem tra xem bai viet co ton tai hay ko?
        $news = DB::table('news')->find($id);
        if ($news == null) {
            // Ko ton tai
            return redirect('/home');
        }
        // Buoc 2 cap nhat thong tin
        $title = $request->get('title');
        $content = $request->get('content');
        // Buoc 3: cap nhat
        $rs = DB::table('news')->where('id', '=', $id)->update(
            [
                'title' => $title,
                'content' => $content
            ]
        );
        // Buoc 4: Thong bao -> chuyen huong ve home
        if ($rs == 0) {
            flash()->addError('Cập nhật thất bại!');
        } else {
            flash()->addSuccess('Cập nhật thành công!');
        }
        return redirect('/home');
    }
}
