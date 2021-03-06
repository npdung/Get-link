@extends('pc.layout.application')

@section('content')
  <div id="welcome">
    <h2 class="title"><a href="#">Get Link Fshare</a></h2>
    <div class="entry" style="text-align:center">
      Copy url cần tải vào đây | Mật khẩu (nếu có): <br />
      <form method="post" style="text-align:center" action="{{ url('/get-link') }}">
        <div style="margin-bottom: 15px">
          <input type="text" size="80" name="url" id="url" placeholder="http://www.fshare.vn/file/WOH1FSFHWT2M | 123456" />
        </div>
        <div class="g-recaptcha" data-sitekey="6LfXLBwTAAAAAM5r8n_imoGG7NprXUT4Y3Ri-Q45" data-theme="dark" align="center"></div>
        <div id="html_element" align="center"></div>
        <input type="submit" value="Get link" />
        {{ csrf_field() }}
      </form>
      <span class="result" id="loading"></span>
    </div>
  </div>
  <div id="page">
    <div id="page-bgtop">
      <div id="page-bgbtm">
        <div id="content">
          <div class="post">
            <h2 class="title"><a href="#">Get link là gì ?</a></h2>
            <div class="entry">
              <p>
                Nhằm phục vụ cho mục đích download tại các host như: fshare, ... Chúng tôi đã lập nên trang web downloadvip.xyz nhằm hỗ trợ các bạn có thể download với tài khoản vip.<br /><br />
              </p>
            </div>
          </div>
        </div>
        <!-- end #content -->
        <div id="sidebar">
          <!-- banner quảng cáo -->
        </div>
        <!-- end #sidebar -->
        <div style="clear: both;">&nbsp;</div>
      </div>
    </div>
  </div>
@stop