<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
        .post_title {
            padding-top: 30px;
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            color: #ffffff;
        }

        .div_center {
            text-align: center;
            padding-bottom: 15px;
        }

        label {
            display: inline-block;
            width: 200px;
        }
    </style>
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <div class="page-content">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <h1 class="post_title"> Update Post </h1>
            <div>
                <form action="{{ url('update_post', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_center">
                        <label for="title">Post Title</label>
                        <input type="text" id="title" name="title" value="{{ $post->title }}"
                            placeholder="Post Title" />
                    </div>
                    <div class="div_center">
                        <label for="title">Post Description</label>
                        <textarea id="description" name="description" placeholder="Post Description">{{ $post->description }}</textarea>
                    </div>
                    <div class="div_center">
                        <label for="title">Update Old Image</label>
                        <img src = "postimage/{{ $post->image }}" style="width: 100px; height:100px;" />
                        <input type="file" id="image" name="image" />

                    </div>
                    <div class="div_center">
                        <input type="submit" class="btn btn-primary" value="Update" />
                    </div>
                </form>
            </div>
        </div>
        {{-- ! --}}
        @include('admin.footer')

</body>

</html>
