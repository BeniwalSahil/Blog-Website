<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.homecss')
    <style>
        .blog-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            transition: 0.3s;
            margin-bottom: 30px;
            height: 100%;
        }

        .blog-card:hover {
            transform: translateY(-8px);
        }

        .blog-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .blog-content {
            padding: 20px;
        }

        .blog-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #222;
            height: 50px;
            overflow: hidden;
        }

        .blog-author {
            font-size: 14px;
            color: #777;
            margin-bottom: 15px;
        }

        .read-btn {
            background: #ff6a00;
            color: #fff;
            padding: 8px 18px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
            display: inline-block;
        }

        .read-btn:hover {
            background: #222;
            color: #fff;
        }
    </style>
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
        @include('home.header')

    </div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="services_section layout_padding">
        <div class="container">
            <h1 class="services_taital">My Blogs Post</h1>
            <div class="services_section_2">
                <div class="row">
                    @if ($posts->isEmpty())
                        <p>You haven't created any posts yet. <a href="{{ url('create_post') }}">Create your first
                                post!</a></p>
                    @else
                        @foreach ($posts as $postss)
                            <div class="col-md-4">

                                <div class="blog-card">

                                    <img src="postimage/{{ $postss->image }}" class="blog-img">

                                    <div class="blog-content">

                                        <div class="blog-title">
                                            {{ Str::limit($postss->description, 80) }}
                                        </div>

                                        <div class="blog-author">
                                            Post By <b>{{ $postss->name }}</b>
                                        </div>

                                        <a href="{{ url('post_details', $postss->id) }}" class="read-btn">
                                            Read More →
                                        </a>
                                        <a href="{{ url('my_post_delete', $postss->id) }}"
                                            class="btn btn-danger">Delete</a>
                                        <a href="{{ url('my_update_post', $postss->id) }}"
                                            class="btn btn-primary">Update</a>
                                    </div>

                                </div>

                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>


        <!-- footer section start -->
        @include('home.footer')
        <!-- footer section end -->
</body>

</html>
