<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActionsController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'user.name' => 'required',
            'user.email' => 'required|email|unique:users,email',
            'user.password' => 'required|min:8|alpha_dash|confirmed',
        ], [
            'user.name.required' => 'Поле "Имя" обязательно для заполнения',
            'user.email.reqired' => 'Поле "Электронная почта" обязательно для заполнения',
            'user.email.email'=> 'Поле "Электронная почта" должно быть предоставлено в виде валидного адреса электронной почты',
            'user.password.required'=> 'Поле "Пароль" обязательно для заполнения',
            'user.password.min'=> 'Поле "Пароль" должно быть не менее, чем 8 символов',
            'user.password.alpha_dash'=> 'Поле "Пароль" должно содержать только строчные и прописные символы латиницы, цифры, а также символы "-" и "_"',
            'user.password.confirmed'=> 'Поле "Пароль" и "Повторите пароль" не совпадает',
        ]);

        $user = User::create($request -> input('user'));
        Auth::login($user);
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function login(Request $request)
    {
        $request->validate([
            'user.email'=> 'required|email',
            'user.password'=> 'required|min:8|alpha_dash',
        ], [
            'user.email.reqired' => 'Поле "Электронная почта" обязательно для заполнения',
            'user.email.email'=> 'Поле "Электронная почта" должно быть предоставлено в виде валидного адреса электронной почты',
            'user.password.required'=> 'Поле "Пароль" обязательно для заполнения',
            'user.password.min'=> 'Поле "Пароль" должно быть не менее, чем 8 символов',
            'user.password.alpha_dash'=> 'Поле "Пароль" должно содержать только строчные и прописные символы латиницы, цифры, а также символы "-" и "_"',
        ]);
        if(Auth::attempt($request -> input('user'))) {
            return redirect('/');
        } else {
            return back() -> withErrors([
                'user.email' => 'Предоставленная почта или пароль не подходят'
            ]);
        }
    }

    public function create_resume(Request $request)
    {
        $request->validate([
            'resume.name' => 'required',
            'resume.surname' => 'required',
            'resume.patronymic' => 'nullable',
            'resume.resume_title' => 'required',
            'resume.email' => 'required|email|unique:resumes,email',
            'resume.phone' => 'nullable',
            'resume.summary' => 'nullable',
            'resume.experience' => 'nullable',
            'resume.education' => 'nullable',
            'resume.skills' => 'nullable',
        ], [
            'resume.name.required' => 'Поле "Имя" обязательно для заполнения',
            'resume.surname.required' => 'Поле "Фамилия" обязательно для заполнения',
            'resume.patronymic.nullable' => 'Поле "Отчество" должно быть предоставлено в виде строки',
            'resume.resume_title.required' => 'Поле "Заголовок резюме" обязательно для заполнения',
            'resume.email.required' => 'Поле "Электронная почта" обязательно для заполнения',
            'resume.email.email' => 'Поле "Электронная почта" должно быть предоставлено в виде валидного адреса электронной почты',
            'resume.email.unique' => 'Поле "Электронная почта" должно быть уникальным',
            'resume.phone.nullable' => 'Поле "Телефон" должно быть предоставлено в виде строки',
            'resume.summary.nullable' => 'Поле "Резюме" должно быть предоставлено в виде строки',
            'resume.experience.nullable' => 'Поле "Опыт работы" должно быть предоставлено в виде строки',
            'resume.education.nullable' => 'Поле "Образование" должно быть предоставлено в виде строки',
            'resume.skills.nullable' => 'Поле "Навыки" должно быть предоставлено в виде строки',
        ]);

        $resume = new Resume;
        $resume->name = $request->input('resume.name');
        $resume->surname = $request->input('resume.surname');
        $resume->patronymic = $request->input('resume.patronymic');
        $resume->resume_title = $request->input('resume.resume_title');
        $resume->email = $request->input('resume.email');
        $resume->phone = $request->input('resume.phone');
        $resume->summary = $request->input('resume.summary');
        $resume->experience = $request->input('resume.experience');
        $resume->education = $request->input('resume.education');
        $resume->skills = $request->input('resume.skills');
        $resume->user_id = Auth::id();
        $resume->save();
        return redirect('/');
    }

    public function add_like(int $resume_id)
    {
        $resume = Resume::find($resume_id);
        $like = $resume->likes()->where('user_id', auth()->id())->first();

        if ($like) {
            $like->delete();
        } else {
            $resume->likes()->create([
                'user_id' => auth()->id(),
                'resume_id' => $resume_id
            ]);
        }

        return back();
    }

    public function add_comment(int $resume_id, Request $request) {
        $request->validate([
            'body' => 'required',
        ]);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = auth()->id();
        $comment->resume_id = $resume_id;
        $comment->save();

        return back();
    }
}
