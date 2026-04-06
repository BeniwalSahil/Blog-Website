<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.homecss')

    <style>
        body {
            background: #f4f6fb;
        }

        .form-wrapper {
            max-width: 600px;
            margin: 60px auto;
        }

        .form-card {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .form-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 25px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: .3s;
        }

        .form-control:focus {
            border-color: #ff6a00;
        }

        .submit-btn {
            width: 100%;
            background: #ff6a00;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            transition: .3s;
        }

        .submit-btn:hover {
            background: #222;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <div class="header_section">
        @include('home.header')
    </div>

    <div class="container form-wrapper">
        <div class="form-card">

            <div class="form-title">Add New Blog Post</div>

            <form action="{{ url('user_post') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter post title">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="5" placeholder="Enter description"></textarea>
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div>
                    <button type="submit" class="submit-btn">
                        Publish Post
                    </button>
                </div>

            </form>

        </div>
    </div>

    @include('home.footer')

</body>

</html>
