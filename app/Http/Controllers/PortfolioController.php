<?php

namespace App\Http\Controllers;

use App\Business;
use App\BusinessPortFolio;
use App\Scopes\ActiveScope;
use App\Scopes\IsApproveScope;
use App\Service;
use Illuminate\Http\Request;
use App\Helpers\ImageHelpers;

class PortfolioController extends Controller
{
    public function addPortfolio($businessId, Request $request)
    {
        $businessModel = Business::withoutGlobalScope(ActiveScope::Class)->withoutGlobalScope(IsApproveScope::Class)->find($businessId);
        $fileName = time() . "-" . $request->title . ".png";
        ImageHelpers::updateProfileImage('project-assets/images/business/portfolios/', $request->file('profile_image'), $fileName);
        BusinessPortFolio::create(array_merge($request->all(), ['business_id' => $businessModel->id, 'profile_image' => "project-assets/images/business/portfolios/" . $fileName]));
        $data['business_detail'] = $businessModel;
        return response()->json(['status' => 'success', 'message' => 'Portfolio Added.', 'response_html' => view('home.Partials.ajax_response_show_portfolio')->with('data', $data)->render()]);
    }


    function deletePortfolio($portfolioId, Request $request)
    {
        $businessModel = Business::withoutGlobalScope(ActiveScope::Class)->withoutGlobalScope(IsApproveScope::Class)->find($request->business_id);
        BusinessPortFolio::find($portfolioId)->delete();
        $data['business_detail'] = $businessModel;
        return response()->json(['status' => 'success', 'message' => 'Portfolio Deleted.','response_html' => view('home.Partials.ajax_response_show_portfolio')->with('data', $data)->render()]);
    }

}
