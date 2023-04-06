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
        $request->validate([
            'editHeadline' => 'max:255|required',
            'editStory' => 'required',
            'editBackground' => 'sometimes|required|max:2000|mimes:jpg,jpeg,png'
        ]);

        $new = Story::findOrFail($request->storyId);
        if($request->editBackground) {

            if($new->background && file_exists(public_path('uploads/' . $new->background))) {
                unlink(public_path('uploads/' . $new->background));
            }

            $stories = Story::orderBy('created_at', 'desc')->first();
            if($stories)$unique = $stories->id + 1;
            else $unique = 1;
            $destination = 'uploads';
            $backgroundImg = $unique . '-' . $request->editBackground->getClientOriginalName();
            $request->editBackground->move(public_path($destination), $backgroundImg);
        }

        $new->headline = $request->editHeadline;
        $new->story = $request->editStory;
        $new->background = $backgroundImg ?? $new->background;
        $new->save();

        $new->stories()->detach();
        if($request->relation) {
            foreach ($request->relation as $rel) {
                $new->stories()->attach($rel);
            }
        }
        // dd($request);
        return back()->with('success', 'saved');
    }

    public function story($storyId) {
        if($storyId == 0) {
            $story = Story::first();
        } else {
            $story = Story::findOrFail($storyId);
        }
        return view('story')->with([
            'story' => $story
        ]);
    }


    public function showDeleteStory(Request $request) {
        //dd($request);
        $story = Story::findOrFail($request->storyId);
        return view('modals.deleteStory')->with([
            'story' => $story
        ]);
    }

    public function deleteStory(Request $request) {
        //dd($request);
        $delete = Story::findOrFail($request->storyId);
        if($delete->background && file_exists(public_path('uploads/' . $delete->background))) {
            unlink(public_path('uploads/' . $delete->background));
        }
        $delete->stories()->detach();
        $delete->delete();


        return back()->with('wrong', 'deleted');
    }
}
