<?php

namespace App\Http\Controllers\Admin;

use App\Services\AgentService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgentController extends Controller
{

    public function index(Request $request,AgentService $agentService)
    {
        $data['all_users'] = $agentService->getAllAgentDataAdmin($request);

        return view('Admin.Agent.all-agents', compact('data'));
    }

    public function create()
    {
        $data['roles'] = Role::where('id','=',3)->get();

        return view('Admin.Agent.new-agent',compact('data'));
    }

    public function save(Request $request)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

    }

    public function delete($id)
    {

    }


}
