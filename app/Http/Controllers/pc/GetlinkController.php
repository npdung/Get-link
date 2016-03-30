<?php

namespace App\Http\Controllers\pc;

use App\Http\Controllers\Controller;
use Input;

class GetlinkController extends Controller
{
  public function get_link(){
    libxml_use_internal_errors(true);
    require_once(app_path('Libraries/Curl.php'));

    $url = Input::get('url');

    $url = str_replace("http://", "https://", $url);
    // step 1
    $curl = new \Curl();
    $curl->get('https://www.fshare.vn');

    $session_id = $curl->getCookie('session_id');

    $doc = new \DOMDocument();
    $doc->loadHTML($curl->response);

    $xpath = new \DOMXpath($doc);
    $array = $xpath->query("//*[@id='login-form']//*[@name='fs_csrf']");

    foreach ($array as $value) {
      $fs_csrf = $value->getAttribute('value');
    }

    echo "step 1: Done \n";

    // step 2
    $curl->setCookie('session_id', $session_id);

    $curl->post('https://www.fshare.vn/login', array(
      "fs_csrf" => $fs_csrf,
      "LoginForm[email]" => "phandung1111059@gmail.com",
      "LoginForm[password]" => "7508286",
      "LoginForm[rememberMe]" => "0",
      "yt0" => "Đăng nhập"
    ));

    $session_id = $curl->getCookie('session_id');

    echo "step 2: Done \n";

    $curl->setCookie('session_id', $session_id);

    $curl->post('https://www.fshare.vn/login', array(
      "fs_csrf" => $fs_csrf,
      "LoginForm[email]" => "phandung1111059@gmail.com",
      "LoginForm[password]" => "7508286",
      "LoginForm[rememberMe]" => "0",
      "yt0" => "Đăng nhập"
    ));

    // step 3
    $curl->get($url);

    $doc = new \DOMDocument();
    $doc->loadHTML($curl->response);

    $xpath = new \DOMXpath($doc);
    $array = $xpath->query("//*[@id='download-form']/div[1]/input");

    foreach ($array as $value) {
      $fs_csrf = $value->getAttribute('value');
    }
    echo "step 3: Done \n";

    // step 4

    $split_url = explode('/', $url);

    $curl->post('https://www.fshare.vn/download/get', array(
      "fs_csrf" => $fs_csrf,
      "DownloadForm[pwd]" => "",
      "DownloadForm[linkcode]" => end($split_url),
      "ajax" => "download-form",
      "undefined" => "undefined"
    ));

    echo "step 4: Done \n\n";

    echo "URL: ". @$curl->response->url;

    return redirect()->away($curl->response->url);
  }
}
