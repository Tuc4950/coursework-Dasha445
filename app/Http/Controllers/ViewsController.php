<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function index()
    {
        return view("index", ['resumes' => Resume::all()]);
    }

    public function register()
    {
        return view("register");
    }

    public function login()
    {
        return view("login");
    }

    public function create_resume()
    {
        return view("pages.resume.create_resume");
    }

    public function resume_site(int $resume_id){
        $resume = Resume::where('id', $resume_id)->get();
        return view('pages.resume.show_resume', ['resume' => $resume]);
    }
}
