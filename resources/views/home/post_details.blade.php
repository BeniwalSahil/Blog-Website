<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('home.homecss')

    <style>
        body {
            background: #f5f7fb;
        }

        .post-wrapper {
            max-width: 1100px;
            margin: 60px auto;
        }

        .post-card {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            transition: 0.3s ease;
        }

        .post-card:hover {
            transform: translateY(-5px);
        }

        .post-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-box {
            height: 100%;
            min-height: 350px;
            overflow: hidden;
        }

        .content-box {
            padding: 30px;
        }

        .post-title {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #222;
        }

        .post-description {
            font-size: 16px;
            line-height: 1.8;
            color: #666;
        }

        .badge-custom {
            background: linear-gradient(45deg, #ff6a00, #ee0979);
            color: #fff;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 12px;
            display: inline-block;
            margin-bottom: 15px;
        }

        .back-btn {
            margin-bottom: 20px;
        }

        @media(max-width:768px) {
            .image-box {
                min-height: 250px;
            }
        }
    </style>
</head>

<body>

    <div class="header_section">
        @include('home.header')
    </div>

    <div class="container post-wrapper">

        <a href="{{ url('/') }}" class="btn btn-dark back-btn">← Back</a>

        <div class="post-card">
            <div class="row g-0">

                <!-- Image -->
                <div class="col-md-5">
                    <div class="image-box">
                        <img src="postimage/{{ $post->image }}" class="post-image">
                    </div>
                </div>

                <!-- Content -->
                <div class="col-md-7">
                    <div class="content-box">

                        <span class="badge-custom">Featured Post</span>

                        <h2 class="post-title">
                            {{ $post->title }}
                        </h2>

                        <div class="post-description">
                            {!! $post->description !!}
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

    @include('home.footer')

</body>

</html>
