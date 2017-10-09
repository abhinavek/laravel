<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\HTTP\Request;

class DemoController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($name)
    {
        echo "hii ".$name;
    }
    public function post(Request $request)
    {
        $name = $request->input('name');
        if ($request->isMethod('post')){
            return response()->json(['response' => 'This is post method','name' => $name]);
        }

        return response()->json(['response' => 'This is get method']);

    }
}