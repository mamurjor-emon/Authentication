<?php

use App\Models\User;
use App\Models\EmailTemplate;
use Illuminate\Support\Facades\Auth;

define('STATUS', [1 => 'Active', 2 => 'Inactive']);
define('ACCESS', ['2' => 'Approved', '1' => 'Pending', '5' => 'Suspend', '6' => 'Unsuspend']);
define('__FILE_PATH__', 'uploads/');


/**
 * tooltip
 *
 * @param $tooltrip
 * @return \Illuminate\Http\Response
 */
if (!function_exists('tooltrip')) {
    function tooltrip($tooltrip)
    {
        return 'data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="' . $tooltrip . '"';
    }
}


function get_option($option_key, $default = NULL)
{
    $system_settings = config('settings');

    if ($option_key && isset($system_settings[$option_key])) {
        return $system_settings[$option_key];
    } elseif ($option_key && isset($system_settings[strtolower($option_key)])) {
        return $system_settings[strtolower($option_key)];
    } elseif ($option_key && isset($system_settings[strtoupper($option_key)])) {
        return $system_settings[strtoupper($option_key)];
    } else {
        return $default;
    }
}

/**
 * unique id generated
 *
 * @param $offset
 * @param $length
 * @return \Illuminate\Http\Response
 */
if (!function_exists('id_generate')) {
    function id_generate($offset, $length)
    {
        // unique order id generate
        $chars = 'ABCDEFG123456789';
        return substr(str_shuffle($chars), $offset, $length);
    }
}

/**
 * blog total view
 *
 * @param $formatNumber
 * @param \Illuminate\Http\Response
 */
if (!function_exists('formatNumber')) {
    function formatNumber($number)
    {
        $suffix = '';
        if ($number >= 1000000) {
            $number = $number / 1000000;
            $suffix = 'M';
        } elseif ($number >= 1000) {
            $number = $number / 1000;
            $suffix = 'K';
        }
        return number_format($number) . $suffix;
    }
}
/**
 * user role name get
 *
 * @param $status
 * @param \Illuminate\Http\Response
 */
if (!function_exists('userStatus')) {
    function userStatus($status)
    {
        if ($status == 1) {
            $badgeClass = 'badge-warning';
            $badgeTitle = 'Pending';
        } else if ($status == 2) {
            $badgeClass = 'badge-success';
            $badgeTitle = 'Approved';
        } else if ($status == 3) {
            $badgeClass = 'badge-muted';
            $badgeTitle = 'Puse';
        } else if ($status == 4) {
            $badgeClass = 'badge-primary';
            $badgeTitle = 'Resume';
        } else if ($status == 5) {
            $badgeClass = 'badge-danger';
            $badgeTitle = 'Suspend';
        } else {
            $badgeClass = 'badge-info';
            $badgeTitle = 'Unsuspend';
        }
        return '<span class="badge badge-sm ' . $badgeClass . ' py-1 px-2">' . $badgeTitle . '</span>';
    }
}
/**
 * Status
 *
 * @param $status
 * @param \Illuminate\Http\Response
 */
if (!function_exists('status')) {
    function status($status)
    {
        if ($status == 1) {
            $badgeClass = 'badge-success';
            $badgeTitle = 'Active';
        } else {
            $badgeClass = 'badge-danger';
            $badgeTitle = 'Pending';
        }
        return '<span class="badge badge-sm ' . $badgeClass . ' py-1 px-2">' . $badgeTitle . '</span>';
    }
}

/**
 * side
 *
 * @param $side
 * @param \Illuminate\Http\Response
 */
if (!function_exists('side')) {
    function side($side)
    {
        if ($side == 1) {
            $badgeClass = 'badge-success';
            $badgeTitle = 'Right Side';
        } else {
            $badgeClass = 'badge-danger';
            $badgeTitle = 'Left Side';
        }

        return '<span class="badge badge-sm ' . $badgeClass . ' py-1 px-2">' . $badgeTitle . '</span>';
    }
}

/**
 * Target
 *
 * @param $target
 * @param \Illuminate\Http\Response
 */
if (!function_exists('target')) {
    function target($target)
    {
        if ($target == 0) {
            $badgeClass = 'badge-success';
            $badgeTitle = 'Same Page';
        } else {
            $badgeClass = 'badge-danger';
            $badgeTitle = 'New Page';
        }
        return '<span class="badge badge-sm ' . $badgeClass . ' py-1 px-2">' . $badgeTitle . '</span>';
    }
}


// For form short code show
if (!function_exists('emalTemplateShortcodeConverter')) {
    function emalTemplateShortcodeConverter($template)
    {
        if ($template == 'NEW_USER_MAIL') {
            $shortcodeName = '[name], [email], [role-name], [verify-token-button], [verify-token]';
        } elseif ($template == 'NEW_USER_NOTIFICATION_MAIL') {
            $shortcodeName = '[name], [email], [role-name], [full-profile-button]';
        } elseif ($template == 'USER_APPROVE_MAIL') {
            $shortcodeName = '[name], [email], [account-login-button], [role-name]';
        } elseif ($template == 'PASSWORD_RESET_MAIL') {
            $shortcodeName = '[name], [email], [reset-password-button], [reset-token]';
        } elseif ($template == 'PACKAGE_ACTIVATE_EMAIL') {
            $shortcodeName = '[name], [email], [redirect-dashboard-button]';
        } elseif ($template == 'PACKAGE_ACTIVATE_NOTIFICATION') {
            $shortcodeName = '[name], [email], [redirect-orders-button]';
        }
        return $shortcodeName;
    }
}

// For form body button short code convarter
if (!function_exists('emailTemplateBodyShortCodeForm')) {
    function emailTemplateBodyShortCodeForm($template_name, $body)
    {
        if ($template_name == 'NEW_USER_MAIL') {
            $button = "<a href='' class='account-button' target='_blank'><span class='account-span'><span style='font-size: 18px; line-height: 21.6px;'>Click Here To Verify Email </span></span></a>";
            $shortcode = str_replace('[verify-token-button]', $button, $body);
        } elseif ($template_name == 'NEW_USER_NOTIFICATION_MAIL') {
            $button = "<a href='' class='account-button' target='_blank'><span class='account-span'><span style='font-size: 18px; line-height: 21.6px;'>View Full Profile</span></span></a>";
            $shortcode = str_replace('[full-profile-button]', $button, $body);
        } elseif ($template_name == 'USER_APPROVE_MAIL') {
            $button = "<a href='' class='account-button' target='_blank'><span class='account-span'><span style='font-size: 18px; line-height: 21.6px;'>Login to your profile</span></span></a>";
            $shortcode = str_replace('[account-login-button]', $button, $body);
        } elseif ($template_name == 'PASSWORD_RESET_MAIL') {
            $button = "<a href='' class='account-button' target='_blank'><span class='account-span'><span style='font-size: 18px; line-height: 21.6px;'>Reset Password</span></span></a>";
            $shortcode = str_replace('[reset-password-button]', $button, $body);
        } elseif ($template_name == 'PACKAGE_ACTIVATE_EMAIL') {
            $button = "<a href='' class='account-button' target='_blank'><span class='account-span'><span style='font-size: 18px; line-height: 21.6px;'>Got To Dashboard</span></span></a>";
            $shortcode = str_replace('[redirect-dashboard-button]', $button, $body);
        } elseif ($template_name == 'PACKAGE_ACTIVATE_NOTIFICATION') {
            $button = "<a href='' class='account-button' target='_blank'><span class='account-span'><span style='font-size: 18px; line-height: 21.6px;'>Got To Order List</span></span></a>";
            $shortcode = str_replace('[redirect-orders-button]', $button, $body);
        }
        return $shortcode;
    }
}

if (!function_exists('emailSubjectTemplate')) {
    function emailSubjectTemplate($template, $request)
    {
        $data = EmailTemplate::where('name', '=', $template)->first();
        $shortcode = str_replace('[name]', $request->full_name, $data->subject);
        $shortcode = str_replace('[email]', $request->email, $shortcode);
        $shortcode = str_replace('[role-name]', $request->roleName, $shortcode);
        return $shortcode;
    }
}

if (!function_exists('emailBodyTemplate')) {
    function emailBodyTemplate($template, $request)
    {
        // verify button
        $emailVerifyBtn = '<a href="' . htmlspecialchars($request->button_url) . '" class="account-button" target="_blank" ><span class="account-span"><span style="font-size: 18px; line-height: 21.6px;">' . $request->button_title . '</span></span></a>';

        $emailNotyBtn = '<a href="' . $request->button_url_noty . '" class="account-button" target="_blank" ><span class="account-span"><span style="font-size: 18px; line-height: 21.6px;">' . $request->button_title_noty . '</span></span></a>';

        $emailApprovedBtn = '<a href="' . $request->button_url_approve . '" class="account-button" target="_blank" ><span class="account-span"><span style="font-size: 18px; line-height: 21.6px;">' . $request->button_title_approve . '</span></span></a>';

        $emailResetBtn = '<a href="' . $request->button_reset_url . '" class="account-button" target="_blank" ><span class="account-span"><span style="font-size: 18px; line-height: 21.6px;">' . $request->button_reset_title . '</span></span></a>';

        $verifyToken = '<a href="' . $request->button_url . '" target="_blank" >' . $request->button_url . '</a>';

        $data = EmailTemplate::where('name', '=', $template)->first();

        $shortcode = str_replace('[name]', $request->full_name, $data->body);
        $shortcode = str_replace('[email]', $request->email, $shortcode);
        $shortcode = str_replace('[role-name]', $request->roleName, $shortcode);

        // email verify token
        $shortcode = str_replace('[verify-token-button]', $emailVerifyBtn, $shortcode);
        $shortcode = str_replace('[full-profile-button]', $emailNotyBtn, $shortcode);
        $shortcode = str_replace('[account-login-button]', $emailApprovedBtn, $shortcode);
        $shortcode = str_replace('[reset-password-button]', $emailResetBtn, $shortcode);
        $shortcode = str_replace('[redirect-orders-button]', $emailNotyBtn, $shortcode);
        $shortcode = str_replace('[redirect-dashboard-button]', $emailVerifyBtn, $shortcode);
        $shortcode = str_replace('[verify-token]', $verifyToken, $shortcode);
        $shortcode = str_replace('[reset-token]', $verifyToken, $shortcode);
        return $shortcode;
    }
}

if (!function_exists('emailHeadingTemplate')) {
    function emailHeadingTemplate($template, $request)
    {
        $data = EmailTemplate::where('name', '=', $template)->first();
        $shortcode = str_replace('[name]', $request->full_name, $data->heading);
        $shortcode = str_replace('[email]', $request->email, $shortcode);
        $shortcode = str_replace('[role-name]', $request->roleName, $shortcode);

        return $shortcode;
    }
}

/**
 * unique id generated
 *
 * @param $offset
 * @param $length
 * @return \Illuminate\Http\Response
 */
if (!function_exists('id_generate')) {
    function id_generate($offset, $length)
    {
        // unique order id generate
        $chars = '123456789ABCDEFG';
        return substr(str_shuffle($chars), $offset, $length);
    }
}

/**
 * Number format short
 *
 * @param $n
 */
if (!function_exists('number_format_short')) {
    function number_format_short($n, $precision = 1)
    {
        if ($n < 900) {
            $n_format = number_format($n, $precision);
            $suffix = '';
        } else if ($n < 900000) {
            $n_format = number_format($n / 1000, $precision);
            $suffix = 'K';
        } else if ($n < 900000000) {
            $n_format = number_format($n / 1000000, $precision);
            $suffix = 'M';
        } else if ($n < 900000000000) {
            $n_format = number_format($n / 1000000000, $precision);
            $suffix = 'B';
        } else {
            $n_format = number_format($n / 1000000000000, $precision);
            $suffix = 'T';
        }
        if ($precision > 0) {
            $dotzero = '.' . str_repeat('0', $precision);
            $n_format = str_replace($dotzero, '', $n_format);
        }
        return $n_format . $suffix;
    }
}
