<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Message;
use Carbon\Carbon;


class ContactController extends Controller
{
    public function contactPage()
    {
        return view('frontend.home.contact');
    }

    public function storeMessage(Request $request)
    {
        Message::insert([

            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Your Message has been sent. We will contact you ASAP', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function customerMessage()
    {
        $messages = Message::latest()->get();
        return view('backend.message.index',compact('messages'));
    }

    public function messageDelete($id)
    {
        Message::findOrFail($id)->delete();

        $notification = array(
                'message' => 'This Message Deleted Successfully', 
                'alert-type' => 'success'
            );

        return redirect()->back()->with($notification);
    }

    public function inActive($id)
    {
        Message::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'This message has been read',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function active($id)
    {
        Message::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'This message has not been read',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function contactSetting()
    {
        $data = Contact::find(1);
        return view('backend.contact.manage', compact('data'));
    }


    public function updateContactSite(Request $request)
    {
        $contact_id = $request->id;

        Contact::findorfail($contact_id)->update([
            'rinart_address' => $request->rinart_address,
            'rinart_phone' => $request->rinart_phone,
            'rinart_email' => $request->rinart_email,
            'rinart_adv' => $request->rinart_adv,
            'rinart_opening_hours' => $request->rinart_opening_hours,
            'rinart_opening_hours_2' => $request->rinart_opening_hours_2,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Contact Site Data Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function messageDetail($message_id)
    {
        $message_detail = Message::where('id', $message_id)->first();

        return view('backend.message.message_detail', compact('message_detail'));
    }


    public function notReadMessage()
    {
        $not_read_message = Message::where('status', 1)->orderBy('id', 'DESC')->get();

        return view('backend.message.not_read_message', compact('not_read_message'));
    }


    public function readMessage()
    {
        $read_message = Message::where('status', 0)->orderBy('id', 'DESC')->get();

        return view('backend.message.read_message', compact('read_message'));
    }















}
















































