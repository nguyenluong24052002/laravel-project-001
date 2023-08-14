<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;  

class NewsController extends Controller
{

    protected $newsModel;

    public function __construct(News $newsModel)
    {
        $this->newsModel = $newsModel;
    }

    public function index(Request $request)
    {
        $query = $this->newsModel->query(); // Tạo truy vấn
    
        // Xử lý tìm kiếm theo tên (name) nếu có
        if ($name = $request->input('name')) {
            $query->where('name', 'like', "%$name%");
        }
    
        return view('news.index', [
            'news' => $query->paginate(5), // Thực hiện truy vấn phân trang
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request)
    {
        $this->newsModel->create($request->validated());
        
        return redirect()->route('news.index')->with('success', 'News created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

     public function edit($id)
     {
         return view('news.form',  [
            'news' => $this->newsModel->find($id)
         ]);
     }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(NewsRequest $request, $id)
    {
        $news = $this->newsModel->findOrFail($id);

        $news->update([
            'name' => $request->name,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'is_suspended' => $request->is_suspended,
        ]);

        return redirect()->route('news.index')->with('success', 'News updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->newsModel->findOrFail($id)->delete();

        return redirect()->route('news.index');
    }
}
