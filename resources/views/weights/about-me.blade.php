<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Me</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f6f9;
        }
        .profile-card {
            max-width: 720px;
            margin: 60px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
            padding: 40px;
        }
        .profile-img {
            width: 160px;
            height: 160px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #0d6efd;
        }
        .work-link {
            text-decoration: none;
        }
        .work-card {
            border: 1px solid #e3e6eb;
            border-radius: 12px;
            padding: 18px 20px;
            transition: all .2s ease;
            height: 100%;
        }
        .work-card:hover {
            border-color: #0d6efd;
            box-shadow: 0 4px 14px rgba(13,110,253,0.15);
            transform: translateY(-2px);
        }
        .work-card h6 {
            color: #0d6efd;
            margin-bottom: 4px;
        }
        .work-card small {
            color: #6c757d;
        }
    </style>
</head>
<body>

    <div class="profile-card text-center">
        <!-- รูปภาพส่วนตัว: เปลี่ยน path ให้ตรงกับไฟล์รูปจริงใน public/images -->
        <img src="{{ asset('images/profile.jpg') }}" alt="Profile Picture" class="profile-img mb-3">

        <h3 class="fw-bold mb-1">อนุวัฒน์ สุริยนต์</h3>
        <p class="text-muted mb-4">รหัสนักศึกษา: 68122420015</p>

        <hr class="my-4">

        <h5 class="fw-bold mb-3 text-start">ผลงานที่เคยทำ</h5>

        <div class="row g-3 text-start">

            <div class="col-md-6">
                <a href="{{ route('gallery') }}" class="work-link">
                    <div class="work-card">
                        <h6>EP02 Hero</h6>
                        <small>route: /gallery</small>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ route('active.index') }}" class="work-link">
                    <div class="work-card">
                        <h6>EP03 Active Bootstrap</h6>
                        <small>route: /active/index</small>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ route('weights') }}" class="work-link">
                    <div class="work-card">
                        <h6>EP07 Weight</h6>
                        <small>route: /weights</small>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ route('login') }}" class="work-link">
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
