<?php

function check_already_login()
{
    $ci = &get_instance();
    $session = $ci->session->userdata();
    if (!empty($session['fullname'])) {
        redirect(base_url('/dashboard'));
    }
}

function check_not_login()
{
    $ci = &get_instance();
    $session = $ci->session->userdata('fullname');
    if (!$session) {
        redirect('auth');
    }
}
