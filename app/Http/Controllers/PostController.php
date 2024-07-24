<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostTable;

class PostController extends Controller
{
    public function index(PostTable $post)
    {
        return $post->get();
    }
}
