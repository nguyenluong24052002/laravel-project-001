<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $courseModel;

    public function __construct(Course $courseModel)
    {
        $this->courseModel = $courseModel;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $this->courseModel->query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%'.$request->input('name').'%');
        }

        return view('courses.index', [
            'courses' => $query->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        $this->courseModel->create($request->validated());

        return redirect()->route('course.index')->with('success', 'Course created successfully.');
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
        return view('courses.form', [
            'course' => $this->courseModel->find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, $id)
    {
        $course = $this->courseModel->findOrFail($id);

        $inputs = $request->all();

        $course->update($inputs);

        return redirect()->route('course.index')->with('success', 'Course created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->courseModel->findOrFail($id)->delete();

        return redirect()->route('course.index');
    }
}
