<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
//models
use App\Models\Category;
use App\Models\Article;
use App\Models\Page;
Use App\Models\Contact;
use Dotenv\Validator as DotenvValidator;
use Livewire\Attributes\Validate;

class Homepage extends Controller
{
    public function index(){
    $articles = Article::orderBy("created_at","desc")->paginate(2);
    $articles->withPath(url('sayfa'));
    $categories = Category::inRandomOrder()->get();
    return view('front.Homepage', compact('categories','articles'));
    }

    public function single($category,$slug){
        $category = Category::whereSlug($category)->first() ?? abort(403,'Böyle bir kategori bulunamadı.');
        $article = Article::where('slug', $slug)->first() ?? abort(404,'Böyle bir yazı bulunamadı.');
        $categories = Category::inRandomOrder()->get();
        return view('front.single',compact('categories','article'));
    }

    public function category($slug){
        $category = Category::whereSlug($slug)->first() ?? abort(403,'Böyle bir kategori bulunamadı.');
        $data['category']=$category;
        $data['articles']=Article::where('category', $category->id)->orderBy("created_at","desc")->paginate(1);
        $data['categories'] = Category::inRandomOrder()->get();
        return view('front.category', $data);
    }

    public function page($slug){
        $page = Page::whereSlug($slug)->first() ?? abort(403,'Böyle bir sayfa bulunamadı.');
        $data['page']=$page;

        return view('front.page', $data);
    }

    public function contact(){
        return view('front.contact');
    }



public function contactPost(Request $request){
    $validator = Validator::make($request->all(), [
        'name' => 'required|min:5',
        'email' => 'required|email',
        'topic' => 'required',
        'message' => 'required|min:10'
    ]);

    if($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $contact = new Contact();
    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->topic = $request->topic;
    $contact->message = $request->message;
    $contact->save();

    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'topic' => $request->topic,
        'message' => $request->message,
    ];

    // Sana gelen mail
    Mail::send('mails.contact', ['data' => $data], function($mail) use ($request) {
    $mail->to('yunus@gmail.com')
         ->subject('Yeni İletişim Mesajı: ' . $request->topic);
});


    // Kullanıcıya onay maili
    Mail::send('mails.confirm', ['data' => $data], function($mail) use ($request) {
        $mail->to($request->email)
             ->subject('Mesajınız Alındı');
    });

    return response()->json(['success' => true]);
    
}
}
