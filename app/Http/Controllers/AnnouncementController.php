<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Notifications\AnnouncementCreated;
use Illuminate\Support\Facades\Notification;

class AnnouncementController extends Controller
{
    public function __invoke()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $announcement = Announcement::create([
            'title'=> $request->title,
            'description'=>$request->description,
            'recipient'=>$request->recipient,
        ]);

        // dd($announcement);

        //Sends email to one user
        // $user = User::first();
        // $user->notify(new AnnouncementCreated($announcement));

        //Send email to an array of input from user
        $recipient = $request->input('recipient');
        $data = explode(',', $recipient);

        // dd($data);
        Notification::route('mail', $data)->notify(new AnnouncementCreated($announcement));

        //Sends email to all users
        // Notification::route('mail', User::all())->notify(new AnnouncementCreated($announcement));

        return response()->json($announcement);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
