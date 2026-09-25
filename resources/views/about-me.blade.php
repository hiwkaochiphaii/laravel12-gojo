<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Me</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --purple-dark: #6a3fb5;
            --purple-mid: #9b7fe0;
            --purple-light: #e9e1fb;
        }

        html, body {
            height: 100%;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(180deg, var(--purple-dark) 0%, var(--purple-mid) 45%, var(--purple-light) 100%);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        .profile-card {
            max-width: 720px;
            margin: 60px auto;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 12px 32px rgba(90, 45, 160, 0.25);
            padding: 40px;
            border: 1px solid #ecdffb;
        }

        .profile-img {
            width: 160px;
            height: 160px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid var(--purple-mid);
            box-shadow: 0 4px 14px rgba(106, 63, 181, 0.35);
        }

        h3.fw-bold {
            color: #4b2c8a;
        }

        hr {
            border-top: 2px solid var(--purple-light);
            opacity: 1;
        }

        h5.fw-bold {
            color: #6a3fb5;
        }

        .work-link {
            text-decoration: none;
        }

        .work-card {
            border: 1px solid #e6dcfa;
            background: #faf7ff;
            border-radius: 14px;
            padding: 18px 20px;
            transition: all .2s ease;
            height: 100%;
        }

        .work-card:hover {
            border-color: var(--purple-mid);
            background: #f3ecff;
            box-shadow: 0 6px 18px rgba(106, 63, 181, 0.2);
            transform: translateY(-3px);
        }

        .work-card h6 {
            color: #6a3fb5;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .work-card small {
            color: #8a7ba8;
        }
    </style>
</head>
<body>

    <div class="profile-card text-center">
        <!-- รูปภาพส่วนตัว: เปลี่ยน path ให้ตรงกับไฟล์รูปจริงใน public/images -->
        <img src="https://www.meteorologiaenred.com/wp-content/uploads/2020/10/hombre-neandertal.jpg" alt="Profile Picture" class="profile-img mb-3">

        <h3 class="fw-bold mb-1">อนุวัฒน์ สุริยนต์</h3>
        <p class="text-muted mb-4">รหัสนักศึกษา: 68122420015</p>

        <hr class="my-4">

        <h5 class="fw-bold mb-3 text-start">ผลงานที่เคยทำ</h5>

        <div class="row g-3 text-start">

            <div class="col-md-6">
                <a href="{{ url('/gallery') }}" class="work-link">
                    <div class="work-card">
                        <h6>EP02 Hero</h6>
                        <small>route: /gallery</small>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ url('/active/index') }}" class="work-link">
                    <div class="work-card">
                        <h6>EP03 Active Bootstrap</h6>
                        <small>route: /active/index</small>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ Route::has('weights.index') ? route('weights.index') : url('/weights') }}" class="work-link">
                    <div class="work-card">
                        <h6>EP07 Weight</h6>
                        <small>route: /weights</small>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ Route::has('login') ? route('login') : url('/login') }}" class="work-link">
                    <div class="work-card">
                        <h6>EP08 Auth</h6>
                        <small>ปุ่ม Login</small>
                    </div>
                </a>
            </div>

        </div>
    </div>

</body>
</html>