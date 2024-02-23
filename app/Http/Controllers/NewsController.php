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
}
