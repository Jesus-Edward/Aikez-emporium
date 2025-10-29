<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\NewsletterDataTable;
use App\Http\Controllers\Controller;
use App\Mail\Newsletter;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class NewsletterController extends Controller
{
    public function subscribeToNewsletter(Request $request)
    {
        // dd($request->email);
        $request->validate([
            'email' => 'required|email|lowercase|max:255'
        ]);

        $emailExist = Subscriber::where('email', $request->email)->where('status', 1)->exists();
        if ($emailExist) {
            return response()->json(['status' => 'error', 'message' => 'Already subscribed to our newsletter']);
        }

        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->unsubscribe_token = Str::random();
        $subscriber->save();

        return response()->json(['status' => 'success', 'message' => 'Thanks for subscribing to our newsletter']);
    }

    public function unsubscribeNewsletter($unsubscribe_token) {
        if (!$unsubscribe_token) {
            return to_route('frontend.index')->with('Something went wrong, try again');
        }

        $subscriber = Subscriber::where('unsubscribe_token', $unsubscribe_token)->first();
        $subscriber->update(['status' => 0]);
        return redirect('/')->with('Successfully unsubscribe to our newsletter');
    }

    public function index(NewsletterDataTable $dataTable) {
        return $dataTable->render('admin.newsletter.index');
    }

    function sendNewsletter(Request $request)
    {
        $request->validate([
            'subject' => ['required', 'max:255'],
            'message' => ['required'],
            'title' => 'required|string|max:255'
        ]);

        $subscribers = Subscriber::where('status', 1)->select('email', 'unsubscribe_token')->get();

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new Newsletter($request->subject, $request->message, $request->title, $subscriber->unsubscribe_token));
        }

        $notification = array('message' => 'Newsletter sent successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id) {
        try {
            $subscriber = Subscriber::findOrFail($id);
            if ($subscriber->status === 0) {
                $subscriber->delete();
                $table = "#newsletter-table";
                return response()->json(['status' => 'success', 'message' => 'Subscriber deleted successfully', 'table' => $table]);
            }
        } catch (\Exception $e) {
            logger($e);
            return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
        }
    }
}
