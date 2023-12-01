<h1>FindJobVN</h1>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu</title>
</head>
<body>
<div style="max-width: 600px; margin: 0 auto; padding: 20px;">
    <h2>Đặt lại mật khẩu</h2>
    <p>Xin chào,</p>
    <p>Bạn đã gửi một yêu cầu đặt lại mật khẩu? Click vào link:</p>
    <p><a href="{{ route('reset.password.get', $token) }}">Đặt lại mật khẩu</a></p>
    <p>Nếu bạn không làm điều đó, hãy bỏ qua email này.</p>
    <p>Kính báo,</p>
    <p>FindJobVN</p>
</div>
</body>
</html>
