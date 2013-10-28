<?php

class Custodian
{

	public static function run()
	{
		//clean orders older than 24 hours
		self::clean('Order');

		//clean latesignups older than 24 hours
		self::clean('Latesignup');

		//clean notifications older than 24 hours
		self::clean('Notification');

		//clean coupons older than expiration
		self::clean('Coupon');

		//check lesson spots & waitlist
		foreach (Lesson::all() as $lesson) {
			$waitlist = $lesson->firstInLine();

			if ( ! $waitlist) continue;

			$spots	= $lesson->spots();
			$user 	= $waitlist->user;

			if ($spots > 0) {
				//alert user they have 24 hours to sign up
				$mail = new Email;
				$mail->user_email = $user->email;
				$mail->user_name = $user->first_name.' '.$user->last_name;
				$mail->template = 'email.waitlist';
				$mail->subject = 'Waiting list';
				$mail->data = null;
				$mail->status = 0;

				$mail->save();

				//create order object
				$order = new Order;
				$order->user_id = $user->id;
				$order->child_id = $waitlist->child->id;
				$order->lesson_id = $lesson->id;

				$order->save();

				//create notification object
				$data = [];

				$notification = new Notification;
				$notification->user_id = $user->id;
				$notification->data = serialize($data);
				$notification->template = "first";

				$notification->save();

				//remove waitlist
				$waitlist->delete();
			}
		}
	}

	public static function clean($m)
	{
		$models = $m::all();

		foreach ($models as $model) {
			$created = new DateTime($model->created_at);
			$clock = (new DateTime)->modify('-1 day');

			if ($created < $clock) $model->delete();
		}
	}

	public static function cleanExpired($m)
	{
		$models = $m::all();

		foreach ($models as $model) {
			$date = new DateTime;
			$expiration = new DateTime($model->expires_on);

			if ($expiration < $date) $model->delete();
		}
	}

}