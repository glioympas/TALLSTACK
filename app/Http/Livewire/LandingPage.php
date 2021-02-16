<?php

namespace App\Http\Livewire;

use App\Models\Subscriber;
use Illuminate\Auth\Notifications\VerifyEmail;

use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Illuminate\Http\Request;

class LandingPage extends Component
{
    public $email = 'example@example.com';
    public $showSubscribe = false;
    public $showSuccess = false;
    public $successMessage = "";

    protected $rules = [
    	'email' => 'required|email:filter|unique:subscribers,email'
    ];

    public function mount(Request $request) {
      if($request->has('verified') && $request->verified == 1) {
         $this->showSuccess = 1;
         $this->successMessage = "Thanks for confirming your email";
      }
    }

    public function subscribe() {

       $this->validate();	

       $subscriber = Subscriber::create(['email' => $this->email]);

       $notification = new VerifyEmail;
       $notification->createUrlUsing(function($notifiable){
       		return URL::temporarySignedRoute(
       			'subscribers.verify',
       			now()->addMinutes(30),
       			[
       				'subscriber' => $notifiable->getKey(),
       				''
       			]
       		);
       });

       $subscriber->notify($notification);
      
       $this->successMessage = "Thank for the information $this->email";

       $this->reset('email');

       $this->showSuccess = true;
    }

    public function render()
    {
        return view('livewire.landing-page');
    }
}
