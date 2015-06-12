<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class PostController extends Controller
{
    public $categories = [
        'PvM' => 'PvM',
        'Pking' => 'Pking',
        'Skilling' => 'Skilling',
        'Minigames' => 'Minigames',
        'Ironmen' => 'Ironmen',
        'Questing' => 'Questing',
        'Other' => 'Other'];

    public $combats = [
        'Any' => 'Any',
        '3-20' => '3-20',
        '20-40' => '20-40',
        '40-60' => '40-60',
        '60-80' => '60-80',
        '80-100' => '80-100',
        '100-126' => '100-126'];

    public $ages = [
        'Any' => 'Any',
        '10-15' => '10-15',
        '15-20' => '15-20',
        '20-25' => '20-25',
        '25-30' => '25-30',
        '30-40' => '30-40',
        '40+' => '40+'];

    
    public function search(Request $request)
    {
        $form_expanded = false;

        $filter = $request->input('filter');
        $category = $request->input('category');
        $combat = $request->input('combat');
        $age = $request->input('age');
        
        $query = DB::table('posts');
        
        if($filter != '' && $filter != NULL) {
            $query = $query->where(function($query) use(&$filter)
            {
                $query->where('title', 'like', '%' . $filter . '%')
                      ->orWhere('description', 'like', '%' . $filter . '%');
            });

        }

        if($category != 'Any' && $category != NULL) {
            $query = $query->where('category', '=', $category);
        }
        
        if($combat != 'Any' && $combat != NULL) {
            $query = $query->where('combat', '=', $combat);
            $form_expanded = true;
        }
        
        if($age != 'Any' && $age != NULL) {
            $query = $query->where('age', '=', $age);
            $form_expanded = true;
        }

        $query = $query->orderBy('created_at', 'asc');
        $posts = $query->paginate(2);
        $posts->setPath('');
        
        return view('search')->with('posts', $posts)
                             ->with('categories', $this->categories)
                             ->with('combats', $this->combats)
                             ->with('ages', $this->ages)
                             ->with('form_expanded', $form_expanded);
    }
    
    public function create()
    {
        return view('create')->with('categories', $this->categories)
                             ->with('combats', $this->combats)
                             ->with('ages', $this->ages);
    }
    
    public function store(CreatePostRequest $request)
    {
        $post = new Post;
        $post->title = $request->input('title');
        $post->name = $request->input('name');
        $post->description = $request->input('description');
        $post->category = $request->input('category');
        $post->combat = $request->input('combat');
        $post->age = $request->input('age');
        
        $post->save();
        
        Session::flash('message', 'Your post has been created successfully. Now, turn your private chat on in-game and wait until someone messages you!');
        return Redirect::to('post/' . $post->id);
    }

    public function show($id) {
        $post = Post::find($id);

        if($post == NULL) {
            return view('errors/post_not_found');
        }

        return view('post')->with('post', $post);
    }
}