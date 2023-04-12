<?php

namespace App\Http\Controllers\Actions\Auth;

use App\User;
use App\Http\Helpers\Utilities;
use Config;
use Auth;
use Carbon\Carbon;

class RegisterUserAction
{
	public function __construct()
	{
		//
	}

	public function execute(array $data): User
	{
		// Store the image if provided
		if (isset($data['image'])) {
			$data['image'] = Utilities::storeFile($data['image'], 'storage/profile_images', Config::get('constants.default_image'));
		} else {
			$data['image'] = 'front/assets/img/1.png';
		}
		if (isset($data['commercial_registry'])) {
			$data['commercial_registry'] = Utilities::storeFile($data['commercial_registry'], 'storage/profile_commercial_registries', 'public');
		}
		if (isset($data['letter_of_appointment'])) {
			$data['letter_of_appointment'] = Utilities::storeFile($data['letter_of_appointment'], 'storage/profile_letter_of_appointment', 'public');
		}

		if (isset($data['license'])) {
			$data['license'] = Utilities::storeFile($data['license'], 'storage/profile_license', 'public');
		}
		if (Auth::check() && auth()->user()->hasPermission('create-user')) {
			$data['email_verified_at'] = Carbon::now();
		}
		// Encrypt the password
		$password = $data['password'];
		$data['password'] = bcrypt($data['password']);

		// Create the user
		$user = User::create($data);

		// Attaching the permissions
		if (isset($data['permissions'])) {
			$user->permissions()->sync($data['permissions']);
		} else {
			$user->permissions()->sync($user->group->permissions);
		}

		$user = User::find($user->id); // To unload the permissions relation

		return $user;
	}
}
