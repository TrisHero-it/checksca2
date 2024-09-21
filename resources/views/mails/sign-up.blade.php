<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
    </style>
    <title>Email</title>
</head>
<body style="background: #091E22">
    <div class="cangiua" style="padding: 24px">
        <div style="display: flex;justify-content: space-between">
            <img src="{{asset('images/design/mail/logo.png')}}" style="width: 170px; height: auto">
        </div>
        <p style="margin-bottom: unset; font-size: 14px; text-align: end; margin-top: -16px;
        color: var(--60, rgba(255, 255, 255, 0.60));
        font-family: 'League Spartan';
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        line-height: 100%;">Chúng tôi luôn sẵn sàng phục vụ bạn!</p>

        <div style="height: 23px; border-bottom: 0.5px solid rgba(255, 255, 255, 0.24)"></div>
        <img width="100%" style="border-radius: 12px; margin-top: 24px" src="{{asset('images/design/mail/title.png')}}" alt="">

        <h5 style="color: var(--White, #F8F8F8);
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        margin-top: 24px;">Xác minh Email</h5>
        <p style="color: var(--White, #F8F8F8);
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 140%; /* 19.6px */ margin-top: 16px;">Để hoàn thành Đăng ký tài khoản và bắt đầu mua hàng, vui lòng xác minh email bằng cách bấm vào link dưới đây:</p>
        <a href="{{$link}}" style="display: flex;width: 177px;margin: 24px auto; background: var(--Light-primary, #009571); text-decoration: none;color: #FFF;
        border-radius: 100px;
        padding: 12px 4px;" >Xác minh Email</a>
        <p style="color: white; margin-bottom: 5px">Nếu nút bên trên không hoạt động, vui lòng sử dụng liên kết bên dưới:</p>
        <a style="text-decoration: none; color: #4F95FF" href="{{$link}}">{{$link}}</a>
        <p style="color: white; margin-top: 24px;">Cảm ơn bạn</p>
        <div style="height: 23px; border-bottom: 0.5px solid rgba(255, 255, 255, 0.24)"></div>

        <p class="text-center" style="color: white; margin-top: 24px;">Đối với các yêu cầu hỗ trợ, vui lòng liên hệ với chúng tôi tại <a class="text-decoration-none">hotro@muakey.com</a>
            <br>
            hoặc Hotline hỗ trợ: <a class=" AR   SERtext-decoration-none">0982 636 800</a></p>
        <div class="d-flex text-center" style="gap: 12px; width:max-content; margin: 0 auto; margin-top:12px">
            <img style="width: 40px; height: 40px;padding:4px; border-radius:100px; background: var(--Dark-Grey, #272450);" src="{{asset('images/design/mail/Social (4).png')}}" alt="">
            <img style="width: 40px; height: 40px;padding:4px; border-radius:100px; background: var(--Dark-Grey, #272450);" src="{{asset('images/design/mail/Vector.png')}}" alt="">
            <img style="width: 40px; height: 40px;padding:4px; border-radius:100px; background: var(--Dark-Grey, #272450);" src="{{asset('images/design/mail/Social (5).png')}}" alt="">
            <img style="width: 40px; height: 40px;padding:4px; border-radius:100px; background: var(--Dark-Grey, #272450);" src="{{asset('images/design/mail/Social (6).png')}}" alt="">
            <img style="width: 40px; height: 40px;padding:4px; border-radius:100px; background: var(--Dark-Grey, #272450);" src="{{asset('images/design/mail/zalo.png')}}" alt="">
        </div>
    </div>
</body>
</html>
