<?php

namespace App\Http\Controllers\pc;

use App\Http\Controllers\Controller;
use Input;

class GetlinkController extends Controller
{
  public function test(){
    libxml_use_internal_errors(true);
    require_once(app_path('Libraries/Curl.php'));

    $proxy = '120.198.233.211:80';
    // $proxyauth = 'user:pass';

    $curl = new \Curl();

    // $curl->setProxy($proxy);
    // $curl->setProxy($proxy, $proxyauth);

    $curl->get('https://www.fshare.vn');
    // $curl->get('http://www.citydo.com/prf/saitama/guide/sg/wg_list.html?c=0410006&p=667');

    var_dump($curl->response);
    exit;
  }

  //------------------------------------------------------------------------------------------------------
  public function get_link(){
    // Check Captcha
    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfXLBwTAAAAAKog-gWVMOmDJKhHGEMCELdR-Ukn&response=" . Input::get('g-recaptcha-response'));
    $obj = json_decode($response);

    if ($obj->success == false) {

      echo 'Captcha error';
      exit;

    } else {

      libxml_use_internal_errors(true);
      require_once(app_path('Libraries/Curl.php'));

      $url = Input::get('url');

      $url = str_replace("http://", "https://", $url);

      // step 1: Login
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

      $curl->setCookie('session_id', $session_id);

      $curl->post('https://www.fshare.vn/login', array(
        "fs_csrf" => $fs_csrf,
        "LoginForm[email]" => "phandung1111059@gmail.com",
        "LoginForm[password]" => "7508286",
        "LoginForm[rememberMe]" => "0",
        "yt0" => "Đăng nhập"
      ));

      $session_id = $curl->getCookie('session_id');

      $curl->setCookie('session_id', $session_id);

      $curl->post('https://www.fshare.vn/login', array(
        "fs_csrf" => $fs_csrf,
        "LoginForm[email]" => "phandung1111059@gmail.com",
        "LoginForm[password]" => "7508286",
        "LoginForm[rememberMe]" => "0",
        "yt0" => "Đăng nhập"
      ));

      echo "Step 1: Login - Done !!! <br>";

      // step 2: Get link download
      $curl->get($url);

      $doc = new \DOMDocument();
      $doc->loadHTML($curl->response);

      $xpath = new \DOMXpath($doc);
      $array = $xpath->query("//*[@id='download-form']/div[1]/input");

      foreach ($array as $value) {
        $fs_csrf = $value->getAttribute('value');
      }

      $split_url = explode('/', $url);

      $curl->post('https://www.fshare.vn/download/get', array(
        "fs_csrf" => $fs_csrf,
        "DownloadForm[pwd]" => "",
        "DownloadForm[linkcode]" => end($split_url),
        "ajax" => "download-form",
        "undefined" => "undefined"
      ));

      echo "Step 2: Get Link Download - Done !!! <br><br>";

      echo "URL: ". @$curl->response->url;

      return redirect()->away($curl->response->url);
    } // END IF CHECK RECAPTCHA

  }
}
