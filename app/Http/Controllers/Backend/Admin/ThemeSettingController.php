<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ThemeSettingController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Theme Settings');
            $data['parentCompanyMenu']  = 'expanded';
            $data['parentEmailSubMenu'] = 'style="display: block;"';
            $data['themeSettings']      = 'active';
            $data['breadcrumb']         = ['Theme Settings' => '',];
            return view('backend.pages.settings.settings', $data);
        } else {
            abort(401);
        }
    }

    public function store(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->file('theme_primary_logo')) {
                $theme_primary_logo = $this->imageUpload($request->file('theme_primary_logo'), 'images/theme-image/', null, null);
            } else {
                $theme_primary_logo = config('settings.theme_primary_logo');
            }

            if ($request->file('theme_secondary_logo')) {
                $theme_secondary_logo = $this->imageUpload($request->file('theme_secondary_logo'), 'images/theme-image/', null, null);
            } else {
                $theme_secondary_logo = config('settings.theme_secondary_logo');
            }
            Setting::updateOrCreate(['option_key' => 'theme_phone'], ['option_value' => $request->theme_phone]);
            Setting::updateOrCreate(['option_key' => 'theme_email'], ['option_value' => $request->theme_email]);
            Setting::updateOrCreate(['option_key' => 'theme_primary_logo'], ['option_value' => $theme_primary_logo]);
            Setting::updateOrCreate(['option_key' => 'theme_secondary_logo'], ['option_value' => $theme_secondary_logo]);
            Setting::updateOrCreate(['option_key' => 'theme_btn_text'], ['option_value' => $request->theme_btn_text]);
            Setting::updateOrCreate(['option_key' => 'theme_btn_url'], ['option_value' => $request->theme_btn_url]);

            return back()->with('success', 'Theme Setting Store Successfully !');
        } else {
            abort(401);
        }
    }

    public function feautesStore(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            Setting::updateOrCreate(['option_key' => 'feautes_title'], ['option_value' => $request->feautes_title]);
            Setting::updateOrCreate(['option_key' => 'feautes_description'], ['option_value' => $request->feautes_description]);
            return back()->with('success', 'Feautes Setting Store Successfully !');
        } else {
            abort(401);
        }
    }

    public function funFactStore(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->hasFile('funfact_image')) {
                $this->imageDelete(config('settings.funfact_image'));
                $image = $this->imageUpload($request->file('funfact_image'), 'images/theme-image/', null, null);
            } else {
                $image = config('settings.funfact_image');
            }
            Setting::updateOrCreate(['option_key' => 'funfact_image'], ['option_value' => $image]);
            return back()->with('success', 'Fun Fact Image Store Successfully!');
        } else {
            abort(401);
        }
    }

    public function whyChooseStore(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->hasFile('why_choose_image')) {
                $this->imageDelete(config('settings.why_choose_image'));
                $why_choose_image = $this->imageUpload($request->file('why_choose_image'), 'images/theme-image/', null, null);
            } else {
                $why_choose_image = config('settings.why_choose_image');
            }
            Setting::updateOrCreate(['option_key' => 'why_choose_section_title'], ['option_value' => $request->why_choose_section_title]);
            Setting::updateOrCreate(['option_key' => 'why_choose_section_description'], ['option_value' => $request->why_choose_section_description]);
            Setting::updateOrCreate(['option_key' => 'why_choose_title'], ['option_value' => $request->why_choose_title]);
            Setting::updateOrCreate(['option_key' => 'why_choose_youtube_url'], ['option_value' => $request->why_choose_youtube_url]);
            Setting::updateOrCreate(['option_key' => 'why_choose_f_title'], ['option_value' => $request->why_choose_f_title]);
            Setting::updateOrCreate(['option_key' => 'why_choose_s_title'], ['option_value' => $request->why_choose_s_title]);
            Setting::updateOrCreate(['option_key' => 'why_choose_t_title'], ['option_value' => $request->why_choose_t_title]);
            Setting::updateOrCreate(['option_key' => 'why_choose_image'], ['option_value' => $why_choose_image]);
            return back()->with('success', 'Who Choose Settings Store Successfully!');
        } else {
            abort(401);
        }
    }

    public function callToStore(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->hasFile('call_action_image')) {
                $this->imageDelete(config('settings.call_action_image'));
                $call_action_image = $this->imageUpload($request->file('call_action_image'), 'images/theme-image/', null, null);
            } else {
                $call_action_image = config('settings.call_action_image');
            }
            Setting::updateOrCreate(['option_key' => 'call_to_title'], ['option_value' => $request->call_to_title]);
            Setting::updateOrCreate(['option_key' => 'call_to_f_btn_title'], ['option_value' => $request->call_to_f_btn_title]);
            Setting::updateOrCreate(['option_key' => 'call_to_f_btn_url'], ['option_value' => $request->call_to_f_btn_url]);
            Setting::updateOrCreate(['option_key' => 'call_to_f_btn_target'], ['option_value' => $request->call_to_f_btn_target]);
            Setting::updateOrCreate(['option_key' => 'call_to_l_btn_title'], ['option_value' => $request->call_to_l_btn_title]);
            Setting::updateOrCreate(['option_key' => 'call_to_l_btn_url'], ['option_value' => $request->call_to_l_btn_url]);
            Setting::updateOrCreate(['option_key' => 'call_to_l_btn_target'], ['option_value' => $request->call_to_l_btn_target]);
            Setting::updateOrCreate(['option_key' => 'call_to_sub_title'], ['option_value' => $request->call_to_sub_title]);
            Setting::updateOrCreate(['option_key' => 'call_action_image'], ['option_value' => $call_action_image]);
            return back()->with('success', 'Call To Action Settings Store Successfully!');
        } else {
            abort(401);
        }
    }

    public function portfolioStore(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            Setting::updateOrCreate(['option_key' => 'portfolio_section_title'], ['option_value' => $request->portfolio_section_title]);
            Setting::updateOrCreate(['option_key' => 'portfolio_section_description'], ['option_value' => $request->portfolio_section_description]);
            return back()->with('success', 'Portfolio Settings Store Successfully!');
        } else {
            abort(401);
        }
    }

    public function servicesStore(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            Setting::updateOrCreate(['option_key' => 'services_section_title'], ['option_value' => $request->services_section_title]);
            Setting::updateOrCreate(['option_key' => 'services_section_description'], ['option_value' => $request->services_section_description]);
            return back()->with('success', 'Services Settings Store Successfully!');
        } else {
            abort(401);
        }
    }

    public function testimonialsStore(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->hasFile('testimonials_image')) {
                $this->imageDelete(config('settings.testimonials_image'));
                $testimonials_image = $this->imageUpload($request->file('testimonials_image'), 'images/theme-image/', null, null);
            } else {
                $testimonials_image = config('settings.testimonials_image');
            }
            Setting::updateOrCreate(['option_key' => 'testimonials_section_title'], ['option_value' => $request->testimonials_section_title]);
            Setting::updateOrCreate(['option_key' => 'testimonials_image'], ['option_value' => $testimonials_image]);
            return back()->with('success', 'Testimonials Settings Store Successfully!');
        } else {
            abort(401);
        }
    }

    public function departmentsStore(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            Setting::updateOrCreate(['option_key' => 'departments_section_title'], ['option_value' => $request->departments_section_title]);
            return back()->with('success', 'Departments Settings Store Successfully!');
        } else {
            abort(401);
        }
    }

    public function pricingStore(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            Setting::updateOrCreate(['option_key' => 'pricing_section_title'], ['option_value' => $request->pricing_section_title]);
            Setting::updateOrCreate(['option_key' => 'pricing_section_description'], ['option_value' => $request->pricing_section_description]);
            return back()->with('success', 'Pricing Settings Store Successfully!');
        } else {
            abort(401);
        }
    }

    public function teamStore(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->hasFile('team_image')) {
                $this->imageDelete(config('settings.team_image'));
                $team_image = $this->imageUpload($request->file('team_image'), 'images/theme-image/', null, null);
            } else {
                $team_image = config('settings.team_image');
            }
            Setting::updateOrCreate(['option_key' => 'team_section_title'], ['option_value' => $request->team_section_title]);
            Setting::updateOrCreate(['option_key' => 'team_section_description'], ['option_value' => $request->team_section_description]);
            Setting::updateOrCreate(['option_key' => 'team_image'], ['option_value' => $team_image]);
            return back()->with('success', 'Team Settings Store Successfully!');
        } else {
            abort(401);
        }
    }

    public function blogStore(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            Setting::updateOrCreate(['option_key' => 'blog_section_title'], ['option_value' => $request->blog_section_title]);
            Setting::updateOrCreate(['option_key' => 'blog_section_description'], ['option_value' => $request->blog_section_description]);
            return back()->with('success', 'Blog Settings Store Successfully!');
        } else {
            abort(401);
        }
    }

    public function clientStore(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->hasFile('client_image')) {
                $this->imageDelete(config('settings.client_image'));
                $client_image = $this->imageUpload($request->file('client_image'), 'images/theme-image/', null, null);
            } else {
                $client_image = config('settings.client_image');
            }
            Setting::updateOrCreate(['option_key' => 'client_image'], ['option_value' => $client_image]);
            return back()->with('success', 'Client Settings Store Successfully!');
        } else {
            abort(401);
        }
    }

    public function appointmentStore(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->hasFile('appointment_image')) {
                $this->imageDelete(config('settings.appointment_image'));
                $appointment_image = $this->imageUpload($request->file('appointment_image'), 'images/theme-image/', null, null);
            } else {
                $appointment_image = config('settings.appointment_image');
            }
            Setting::updateOrCreate(['option_key' => 'appointment_section_title'], ['option_value' => $request->appointment_section_title]);
            Setting::updateOrCreate(['option_key' => 'appointment_section_description'], ['option_value' => $request->appointment_section_description]);
            Setting::updateOrCreate(['option_key' => 'appointment_title'], ['option_value' => $request->appointment_title]);
            Setting::updateOrCreate(['option_key' => 'appointment_btn_title'], ['option_value' => $request->appointment_btn_title]);
            Setting::updateOrCreate(['option_key' => 'appointment_image'], ['option_value' => $appointment_image]);
            return back()->with('success', 'Appointment Settings Store Successfully!');
        } else {
            abort(401);
        }
    }

    public function newsletterStore(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            Setting::updateOrCreate(['option_key' => 'newsletter_section_title'], ['option_value' => $request->newsletter_section_title]);
            Setting::updateOrCreate(['option_key' => 'newsletter_section_description'], ['option_value' => $request->newsletter_section_description]);
            return back()->with('success', 'Newsletter Settings Store Successfully!');
        } else {
            abort(401);
        }
    }

    public function sosalMediaStore(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            Setting::updateOrCreate(['option_key' => 'facebook'], ['option_value' => $request->facebook]);
            Setting::updateOrCreate(['option_key' => 'twitter'], ['option_value' => $request->twitter]);
            Setting::updateOrCreate(['option_key' => 'linkedin'], ['option_value' => $request->linkedin]);
            Setting::updateOrCreate(['option_key' => 'instagram'], ['option_value' => $request->instagram]);
            Setting::updateOrCreate(['option_key' => 'youtube'], ['option_value' => $request->youtube]);
            Setting::updateOrCreate(['option_key' => 'whatsapp'], ['option_value' => $request->whatsapp]);
            Setting::updateOrCreate(['option_key' => 'tiktok'], ['option_value' => $request->tiktok]);
            Setting::updateOrCreate(['option_key' => 'telegram'], ['option_value' => $request->telegram]);
            Setting::updateOrCreate(['option_key' => 'pinterest'], ['option_value' => $request->pinterest]);
            Setting::updateOrCreate(['option_key' => 'reddit'], ['option_value' => $request->reddit]);
            Setting::updateOrCreate(['option_key' => 'quora'], ['option_value' => $request->quora]);
            return back()->with('success', 'Sosal Media Settings Store Successfully!');
        } else {
            abort(401);
        }
    }

    public function footerStore(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            Setting::updateOrCreate(['option_key' => 'footer_title'], ['option_value' => $request->footer_title]);
            Setting::updateOrCreate(['option_key' => 'quik_links_left'], ['option_value' => $request->quik_links_left]);
            Setting::updateOrCreate(['option_key' => 'quik_links_right'], ['option_value' => $request->quik_links_right]);
            Setting::updateOrCreate(['option_key' => 'open_hours_title'], ['option_value' => $request->open_hours_title]);
            Setting::updateOrCreate(['option_key' => 'open_hours_time'], ['option_value' => $request->open_hours_time]);
            Setting::updateOrCreate(['option_key' => 'newslettter_title'], ['option_value' => $request->newslettter_title]);
            Setting::updateOrCreate(['option_key' => 'copy_rignts'], ['option_value' => $request->copy_rignts]);
            return back()->with('success', 'Sosal Media Settings Store Successfully!');
        } else {
            abort(401);
        }
    }

}
