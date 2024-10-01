<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notification = Notification::whereNull('user_id')
            ->orWhere('user_id', auth()->user()->id)
            ->orderByRaw('is_opened = false DESC') // unopened notifications first
            ->orderBy('title', 'ASC') // sort by type in ascending order
            ->orderBy('created_at', 'DESC') // most recent first
            ->paginate(10);


        return view('users.screens.auth-user.notifikasi.index', [
            'title' => 'Notifikasi',
            'notifikasi' => $notification
        ]);
    }


    public function readNotification($id)
    {
        // Find the notification by ID
        $notification = Notification::findOrFail($id);

        // Update the 'is_opened' field
        $notification->update([
            'is_opened' => true
        ]);

        // Debugging to check the redirect_url (optional)
        // dd($notification->redirect_url);

        // Redirect to the notification's redirect_url
        return redirect()->intended($notification->redirect_url);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNotificationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotificationRequest $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
