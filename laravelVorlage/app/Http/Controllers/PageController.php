<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;

class PageController extends Controller
{
    //

    public function dashboard() {
        return view('dashboard')->with([
            'stories' => Story::get()
        ]);
    }

    public function addStory(Request $request) {
        $request->validate([
            'addHeadline' => 'max:255|required',
            'addStory' => 'required',
            'addBackground' => 'sometimes|required|max:2000|mimes:jpg,jpeg,png'
        ]);

        $new = new Story();
        if($request->addBackground) {
            $stories = Story::orderBy('created_at', 'desc')->first();
            if($stories)$unique = $stories->id + 1;
            else $unique = 1;
            $destination = 'uploads';
            $backgroundImg = $unique . '-' . $request->addBackground->getClientOriginalName();
            $request->addBackground->move(public_path($destination), $backgroundImg);
        }
        $new->headline = $request->addHeadline;
        $new->story = $request->addStory;
        $new->background = $backgroundImg ?? NULL;
        $new->save();
        if($request->relation) {
            foreach ($request->relation as $rel) {

                $new->stories()->attach($rel);
            }
        }
        // dd($request);
        return back()->with('success', 'saved');
    }

    public function showStory(Request $request) {
        $story = Story::findOrFail($request->storyId);
        return view('modals.editStory')->with([
            'entry' => $story,
            'stories' => Story::get()
        ]);
    }

    public function editStory(Request $request) {
        // ToDo
    }
}
