<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PortfolioController extends Controller
{
    /**
     * Render the single-page portfolio. All content comes from config/portfolio.php.
     */
    public function index(): View
    {
        return view('portfolio', [
            'owner'     => config('portfolio.owner'),
            'home'      => config('portfolio.home'),
            'about'     => config('portfolio.about'),
            'skills'    => config('portfolio.skills'),
            'interests' => config('portfolio.interests'),
            'education' => config('portfolio.education'),
            'contact'   => config('portfolio.contact'),
            'nav'       => config('portfolio.nav'),
        ]);
    }
}
