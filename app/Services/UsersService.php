<?php
/**
 * Created by PhpStorm.
 * User: bilal
 * Date: 4/27/18
 * Time: 12:22 PM
 */

namespace App\Services;

use App\Helpers\ImageHelpers;
use App\UserInfo;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use App\User;
use App\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class UsersService
{
    private $usersPagination = 5;


    public function changeCustomerPassword($userId, $request)
    {

        $request->validate([
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
        User::withoutGlobalScopes()->find($userId)->update(['password' => bcrypt($request->password)]);

    }

    public function getAllUsersDataAdmin($request)
    {
        if ($request->sort_by == "oldest" && $request->has('search') && $request->search != "") {

            $data['all_users'] = User::withoutGlobalScopes()->NotAdmin()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->simplePaginate($this->usersPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->NotAdmin()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->paginate($this->usersPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->NotAdmin()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->count();

        } elseif (($request->has('user_id') && !$request->has('sort_by') && ($request->search == "" || !$request->has('search'))) || ($request->has('user_id') && $request->has('sort_by') == "asc") && ($request->search == "" || !$request->has('search'))) {

            $data['all_users'] = User::withoutGlobalScopes()->NotAdmin()->where('user_id', $request->user_id)->orderBy('id', 'asc')->simplePaginate($this->usersPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->NotAdmin()->where('user_id', $request->user_id)->orderBy('id', 'asc')->paginate($this->usersPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->NotAdmin()->where('user_id', $request->user_id)->orderBy('id', 'asc')->count();

        } elseif ($request->has('user_id') && $request->sort_by == "oldest" && ($request->search == "" || !$request->has('search'))) {

            $data['all_users'] = User::withoutGlobalScopes()->NotAdmin()->where('user_id', $request->user_id)->orderBy('id', 'desc')->simplePaginate($this->usersPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->NotAdmin()->where('user_id', $request->user_id)->orderBy('id', 'desc')->paginate($this->usersPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->NotAdmin()->where('user_id', $request->user_id)->orderBy('id', 'desc')->count();

        } elseif ($request->has('search') && $request->sort_by == "") {

            $data['all_users'] = User::withoutGlobalScopes()->NotAdmin()->where('name', 'like', '%' . $request->search . '%')->simplePaginate($this->usersPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->NotAdmin()->where('name', 'like', '%' . $request->search . '%')->paginate($this->usersPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->NotAdmin()->where('company_name', 'like', '%' . $request->search . '%')->orWhere('name', 'like', '%' . $request->search . '%')->count();

        } elseif ($request->has('search') && $request->sort_by == "latest") {

            $data['all_users'] = User::withoutGlobalScopes()->NotAdmin()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->simplePaginate($this->usersPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->NotAdmin()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate($this->usersPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->NotAdmin()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->count();

        } elseif ($request->has('search') && $request->sort_by == "oldest") {

            $data['all_users'] = User::withoutGlobalScopes()->NotAdmin()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->simplePaginate($this->usersPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->NotAdmin()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate($this->usersPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->NotAdmin()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->count();

        } elseif ($request->search = "" && $request->sort_by == "oldest") {

            $data['all_users'] = User::withoutGlobalScopes()->NotAdmin()->orderBy('id', 'asc')->simplePaginate($this->usersPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->NotAdmin()->orderBy('id', 'asc')->paginate($this->usersPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->NotAdmin()->orderBy('id', 'asc')->count();

        } elseif ($request->search == "" && $request->sort_by == "latest") {

            $data['all_users'] = User::withoutGlobalScopes()->NotAdmin()->orderBy('id', 'desc')->simplePaginate($this->usersPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->NotAdmin()->orderBy('id', 'desc')->paginate($this->usersPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->NotAdmin()->orderBy('id', 'desc')->count();

        } else {

            $data['all_users'] = User::withoutGlobalScopes()->NotAdmin()->orderBy('id', 'desc')->simplePaginate($this->usersPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->NotAdmin()->orderBy('id', 'desc')->paginate($this->usersPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->NotAdmin()->orderBy('id', 'desc')->count();
        }


        $request->flash();
        return $data;
    }

    public function getAllAgentData($request)
    {
        if ($request->sort_by == "oldest" && $request->has('search') && $request->search != "") {

            $data['all_users'] = Auth::user()->myUsers->withoutGlobalScopes()->NotAdmin()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->simplePaginate($this->usersPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->NotAdmin()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->paginate($this->usersPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->NotAdmin()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->count();

        } elseif (($request->has('user_id') && !$request->has('sort_by') && ($request->search == "" || !$request->has('search'))) || ($request->has('user_id') && $request->has('sort_by') == "asc") && ($request->search == "" || !$request->has('search'))) {

            $data['all_users'] = User::withoutGlobalScopes()->NotAdmin()->where('user_id', $request->user_id)->orderBy('id', 'asc')->simplePaginate($this->usersPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->NotAdmin()->where('user_id', $request->user_id)->orderBy('id', 'asc')->paginate($this->usersPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->NotAdmin()->where('user_id', $request->user_id)->orderBy('id', 'asc')->count();

        } elseif ($request->has('user_id') && $request->sort_by == "oldest" && ($request->search == "" || !$request->has('search'))) {

            $data['all_users'] = User::withoutGlobalScopes()->NotAdmin()->where('user_id', $request->user_id)->orderBy('id', 'desc')->simplePaginate($this->usersPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->NotAdmin()->where('user_id', $request->user_id)->orderBy('id', 'desc')->paginate($this->usersPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->NotAdmin()->where('user_id', $request->user_id)->orderBy('id', 'desc')->count();

        } elseif ($request->has('search') && $request->sort_by == "") {

            $data['all_users'] = User::withoutGlobalScopes()->NotAdmin()->where('name', 'like', '%' . $request->search . '%')->simplePaginate($this->usersPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->NotAdmin()->where('name', 'like', '%' . $request->search . '%')->paginate($this->usersPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->NotAdmin()->where('company_name', 'like', '%' . $request->search . '%')->orWhere('name', 'like', '%' . $request->search . '%')->count();

        } elseif ($request->has('search') && $request->sort_by == "latest") {

            $data['all_users'] = User::withoutGlobalScopes()->NotAdmin()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->simplePaginate($this->usersPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->NotAdmin()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate($this->usersPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->NotAdmin()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->count();

        } elseif ($request->search = "" && $request->sort_by == "oldest") {

            $data['all_users'] = User::withoutGlobalScopes()->NotAdmin()->orderBy('id', 'asc')->simplePaginate($this->usersPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->NotAdmin()->orderBy('id', 'asc')->paginate($this->usersPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->NotAdmin()->orderBy('id', 'asc')->count();

        } elseif ($request->search == "" && $request->sort_by == "latest") {

            $data['all_users'] = User::withoutGlobalScopes()->NotAdmin()->orderBy('id', 'desc')->simplePaginate($this->usersPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->NotAdmin()->orderBy('id', 'desc')->paginate($this->usersPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->NotAdmin()->orderBy('id', 'desc')->count();

        } else {

            $data['all_users'] = Auth::user()->myUsers()->orderBy('id', 'desc')->simplePaginate($this->usersPagination);
            $data['total_pages'] = Auth::user()->myUsers()->orderBy('id', 'desc')->paginate($this->usersPagination);
            $data['all_users_count'] = Auth::user()->myUsers()->orderBy('id', 'desc')->count();
        }


        $request->flash();
        return $data;
    }

    public function getUsersData()
    {
        $users = User::withoutGlobalScopes()->get();
        $result['users'] = [];
        foreach ($users as $user) {
            $status = 'active';
            $urlForActive = route('admin.change-status.user', [$user->id]);
            $active = "<a class=\"btn btn-xs  btn-danger\"onclick=\"changeStatus(" . $user->id . ",'all-users')\">Deactive</a>";
            if ($user->is_active == 0) {
                $status = 'deactive';
                $active = "<a class=\"btn btn-xs  btn-success\" onclick=\"changeStatus(" . $user->id . ",'all-users')\">Active </a>";
            }

            $result['users'][] = [
                'action' => $active,
                'name' => $user->name,
                'profile_image' => $user->profile_image,
                'email' => $user->email,
                'current_plan' => "testing static",
                'id' => $user->id,
                'created_at' => $user->created_at,
                'status' => $status
            ];
        }

        return Datatables::of($result['users'])->make(true);

    }

    public function addUserByAdmin($request)
    {
        if ($request->email == null && $request->phone == null) {
            throw new \Exception("Phone Number and Email both can not be Empty...");
        } else {
            $user = User::create(array_merge($request->except(['_token', 'password']), ['email_verified_at' => Carbon::now(), 'password' => bcrypt($request->password)]));

            Address::create(array_merge(['user_id' => $user->id], $request->all()));

            UserInfo::create(['first_name' => $request->first_name,
                'user_id' => $user->id,
                'last_name' => $request->last_name]);

        }
    }


    public function addUserByAgent($request)
    {
        if ($request->email == null && $request->phone == null) {
            throw new \Exception("Phone Number and Email both can not be Empty...");
        } else {
            // dd(Auth::user()->id);
            $user = User::create(array_merge($request->except(['_token', 'password']), ['created_by' => Auth::user()->id, 'role_id' => 2, 'password' => bcrypt($request->password)]));
//dd($user->id);
            Address::create(['address' => $request->address,
                'user_id' => $user->id,
                'main_city_id' => $request->main_city_id,
                'main_state_id' => $request->main_state_id,
                'main_country_id' => $request->main_country_id]);
        }
        UserInfo::create(array_merge($request->except(['_token', 'password']), ['first_name' => $request->first_name, 'last_name' => $request->last_name, 'age' => $request->age, 'user_id' => $user->id]));
    }

    public function changeUserStatus($id)
    {
        $user = User::withoutGlobalScopes()->find($id);

        if ($user->is_active == 0) {
            $user->update(['is_active' => 1]);
            session()->flash('degree-status-active', $user->name . " Activated.");

        } else {
            $user->update(['is_active' => 0]);
            session()->flash('degree-status-deactive', $user->name . " DeActivated.");
        }
    }

    public function addUser($request)
    {
        User::create([$request->except('_token')]);
    }

    public function editUser($request, $user)
    {
        $user->update($request->all());
        $user->userInfo->update($request->all());
        if (!empty($user->address)) {
            //dd(12);
            $user->address->update($request->all());
            // dd($user->address);
        } else {
            Address::create(array_merge(['user_id' => $user->id, $request->all()]));
        }


    }

    public function addAddress($request)
    {

        if (Auth::user()->address()->first() == null) {
            Address::create(array_merge($request->except('_token'), ['user_id' => Auth::user()->id]));
        } else {
            Auth::user()->address()->first()->update(
                ['main_country_id' => $request->main_country_id,
                    'main_city_id' => $request->main_city_id,
                    'main_state_id' => $request->main_state_id,
                    'user_id' => Auth::user()->id,
                    'address' => $request->address
                ]
            );
        }
    }

    public function imageUpload($request)
    {
        $fileName = time() . "-" . 'profile_image' . ".png";
        ImageHelpers::updateProfileImage('main-user/images/', $request->file('image_profile'), $fileName);

        $user_info = UserInfo::where('user_id', '=', $request->user_id)->update(['profile_image' => 'main-user/images/' . $fileName]);
        if ($user_info) {
            return 'success';
        }

    }


}