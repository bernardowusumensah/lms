<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\Student;
use App\Models\Professor;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $courses = Course::all();
            return view('courses.index', compact('courses'));
        } catch (\Exception $e) {
            Session::flash('error', 'Error loading courses: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $professors = Professor::all();
        return view('courses.create', compact('professors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        try {
            Course::create($request->validated());
            Session::flash('success', 'Course created successfully');
            return redirect()->route('courses.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Error creating course: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        try {
            $students = $course->students;
            return view('courses.show', compact('course', 'students'));
        } catch (\Exception $e) {
            Session::flash('error', 'Error loading course details: ' . $e->getMessage());
            return redirect()->route('courses.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $professors = Professor::all();
        return view('courses.edit', compact('course', 'professors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        try {
            $course->update($request->validated());
            Session::flash('success', 'Course updated successfully');
            return redirect()->route('courses.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Error updating course: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        try {
            $course->delete();
            Session::flash('success', 'Course deleted successfully');
            return redirect()->route('courses.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Error deleting course: ' . $e->getMessage());
            return redirect()->route('courses.index');
        }
    }

    /**
     * Soft delete course (move to trash)
     */
    public function trash($id)
    {
        try {
            Course::destroy($id);
            Session::flash('success', 'Course moved to trash successfully');
            return redirect()->route('courses.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Error moving course to trash: ' . $e->getMessage());
            return redirect()->route('courses.index');
        }
    }

    /**
     * Show trashed courses
     */
    public function trashed()
    {
        try {
            $courses = Course::onlyTrashed()->get();
            return view('courses.trashed', compact('courses'));
        } catch (\Exception $e) {
            Session::flash('error', 'Error loading trashed courses: ' . $e->getMessage());
            return redirect()->route('courses.index');
        }
    }

    /**
     * Restore trashed course
     */
    public function restore($id)
    {
        try {
            $course = Course::withTrashed()->where('id', $id)->first();
            $course->restore();
            Session::flash('success', 'Course restored successfully');
            return redirect()->route('courses.trashed');
        } catch (\Exception $e) {
            Session::flash('error', 'Error restoring course: ' . $e->getMessage());
            return redirect()->route('courses.trashed');
        }
    }

    /**
     * Permanently delete course
     */
    public function forceDelete($id)
    {
        try {
            $course = Course::withTrashed()->findOrFail($id);
            $course->forceDelete();
            Session::flash('success', 'Course permanently deleted');
            return redirect()->route('courses.trashed');
        } catch (\Exception $e) {
            Session::flash('error', 'Error permanently deleting course: ' . $e->getMessage());
            return redirect()->route('courses.trashed');
        }
    }
}
