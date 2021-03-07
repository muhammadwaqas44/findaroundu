<?php

namespace App\Services;

use App\SocialAccounts;
use App\User;
use App\UserInfo;
use App\Helpers\ImageHelpers;
use Laravel\Socialite\Contracts\User as ProviderUser;

class GoogleAccountService
{

    private $profileImagePath;

    public function __construct()
    {
        $this->profileImagePath = "project-assets/images/users/";
    }


    /// This function will locate the user in SocialAccounts table if found then it will return user object to login
    ///  if not found the  it will locate the user in user table and then it will enter user record, enter player ino record, and will associate the
    ///   SocialAccount table to user table
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccounts::whereProvider('google')
            ->whereProviderUserId($providerUser->email)
            ->first();

        if ($account) {
            return $account->user;
        }else{

            $account = new SocialAccounts([
                'provider_user_id' => $providerUser->email,
                'provider' => 'google'
            ]);

            $user = User::whereEmail($providerUser->email)->first();

            if(!$user) {
                $fileName = time().'-'.$providerUser->getName().".png";
                $user = User::create([
                    'email' => $providerUser->email,
                    'name' => $providerUser->name,
                    'profile_image'=>$this->profileImagePath.$fileName,
                    'password' => md5(rand(1,10000)),
                ]);

                /////   This is going to save te file in required directory
                ImageHelpers::updateProfileImage($this->profileImagePath,$providerUser->avatar,$user->name,'link', $fileName);
                UserInfo::create(['user_id' => $user->id, 'auth_code' => rand(1000000, 9000000),'']);

            }
            $account->user()->associate($user);
            $account->save();
            return $user;
        }

        // $existUser = User::where('email',$googleUser->email)->first();




    }
}