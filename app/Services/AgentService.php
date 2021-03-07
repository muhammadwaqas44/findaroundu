<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 3/8/2019
 * Time: 4:37 PM
 */

namespace App\Services;


use App\User;

class AgentService
{

    private $agentPagination = 5;

    public function getAllAgentDataAdmin($request)
    {
        if ($request->sort_by == "oldest" && $request->has('search') && $request->search != "")
        {

            $data['all_users'] = User::withoutGlobalScopes()->OnlyAgent()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->simplePaginate($this->agentPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->OnlyAgent()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->paginate($this->agentPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->OnlyAgent()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->count();

        }

        elseif (($request->has('user_id') && !$request->has('sort_by') && ($request->search == "" || !$request->has('search'))) || ($request->has('user_id') && $request->has('sort_by') == "asc") && ($request->search == "" || !$request->has('search'))) {

            $data['all_users'] = User::withoutGlobalScopes()->OnlyAgent()->where('user_id', $request->user_id)->orderBy('id', 'asc')->simplePaginate($this->agentPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->OnlyAgent()->where('user_id', $request->user_id)->orderBy('id', 'asc')->paginate($this->agentPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->OnlyAgent()->where('user_id', $request->user_id)->orderBy('id', 'asc')->count();

        }

        elseif ($request->has('user_id') && $request->sort_by == "oldest" && ($request->search == "" || !$request->has('search'))) {

            $data['all_users'] = User::withoutGlobalScopes()->OnlyAgent()->where('user_id', $request->user_id)->orderBy('id', 'desc')->simplePaginate($this->agentPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->OnlyAgent()->where('user_id', $request->user_id)->orderBy('id', 'desc')->paginate($this->agentPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->OnlyAgent()->where('user_id', $request->user_id)->orderBy('id', 'desc')->count();

        }

        elseif ($request->has('search') && $request->sort_by == "") {

            $data['all_users'] = User::withoutGlobalScopes()->OnlyAgent()->where('name', 'like', '%' . $request->search . '%')->simplePaginate($this->agentPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->OnlyAgent()->where('name', 'like', '%' . $request->search . '%')->paginate($this->agentPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->OnlyAgent()->where('company_name', 'like', '%' . $request->search . '%')->orWhere('name', 'like', '%' . $request->search . '%')->count();

        }

        elseif ($request->has('search') && $request->sort_by == "latest") {

            $data['all_users'] = User::withoutGlobalScopes()->OnlyAgent()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->simplePaginate($this->agentPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->OnlyAgent()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate($this->agentPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->OnlyAgent()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->count();

        }

        elseif ($request->has('search') && $request->sort_by == "oldest") {

            $data['all_users'] = User::withoutGlobalScopes()->OnlyAgent()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->simplePaginate($this->agentPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->OnlyAgent()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate($this->agentPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->OnlyAgent()->where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->count();

        }

        elseif ($request->search = "" && $request->sort_by == "oldest") {

            $data['all_users'] = User::withoutGlobalScopes()->OnlyAgent()->orderBy('id', 'asc')->simplePaginate($this->agentPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->OnlyAgent()->orderBy('id', 'asc')->paginate($this->agentPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->OnlyAgent()->orderBy('id', 'asc')->count();

        }

        elseif ($request->search == "" && $request->sort_by == "latest") {

            $data['all_users'] = User::withoutGlobalScopes()->OnlyAgent()->orderBy('id', 'desc')->simplePaginate($this->agentPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->OnlyAgent()->orderBy('id', 'desc')->paginate($this->agentPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->OnlyAgent()->orderBy('id', 'desc')->count();

        }

        else {

            $data['all_users'] = User::withoutGlobalScopes()->OnlyAgent()->orderBy('id', 'desc')->simplePaginate($this->agentPagination);
            $data['total_pages'] = User::withoutGlobalScopes()->OnlyAgent()->orderBy('id', 'desc')->paginate($this->agentPagination);
            $data['all_users_count'] = User::withoutGlobalScopes()->OnlyAgent()->orderBy('id', 'desc')->count();
        }


        $request->flash();
        return $data;
    }

}