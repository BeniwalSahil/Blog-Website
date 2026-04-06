<div class="services_section layout_padding">
    <div class="container">
        <h1 class="services_taital">Blogs Post</h1>
        <p class="services_text">
            Latest articles and updates from our blog
        </p>

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

        <div class="services_section_2">
            <div class="row">

                @foreach ($post as $posts)
                    <div class="col-md-4">

                        <div class="blog-card">

                            <img src="postimage/{{ $posts->image }}" class="blog-img">

                            <div class="blog-content">

                                <div class="blog-title">
                                    {{ Str::limit($posts->description, 80) }}
                                </div>

                                <div class="blog-author">
                                    Post By <b>{{ $posts->name }}</b>
                                </div>

                                <a href="{{ url('post_details', $posts->id) }}" class="read-btn">
                                    Read More →
                                </a>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
