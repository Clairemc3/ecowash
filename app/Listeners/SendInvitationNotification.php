<?php

namespace App\Listeners;

use App\Activation;
use App\Notifications\UserInvitation;
use App\Repositories\ActivationRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendInvitationNotification
{

	public $activation;


	/**
	 * SendInvitationNotification constructor.
	 * @param ActivationRepository $activation
	 */
    public function __construct(ActivationRepository $activation)
    {
		$this->activation = $activation;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
    	$user = $event->user;

    	// Create activation
	    $token = $this->activation->create($user);

	    $user->notify(new UserInvitation($token));
    }
}
