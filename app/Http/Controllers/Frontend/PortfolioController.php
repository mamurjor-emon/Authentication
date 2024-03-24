<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\PortfolioSection;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    public function portfolio($id)
    {
        $this->setPageTitle('Portfolio Details');
        $data['breadcrumb']       = ['Home' => url('/'), 'Portfolio Details' => ''];
        $data['portfolioDetails'] = PortfolioSection::with('galleryImages')->where('id',$id)->first();
        return view('frontend.pages.portfolio.portfolio', $data);
    }
}
