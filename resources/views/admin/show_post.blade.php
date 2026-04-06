<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('admin.css')
    <style type="text/css">
        .title_deg {
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            padding: 30px;
            color: #ffff;
        }

        .table_deg {
            border: 1px solid #ffff;
            width: 100%;
            text-align: center;
            margin-left: 0px;
        }

        .th_deg {
            background-color: skyblue;
        }
    </style>
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <h1 class="title_deg">All Post</h1>
            @if (session()->has('message'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" arir-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <table class="table_deg">
                <tr class="th_deg">
                    <th>Post Title</th>
                    <th>Description</th>
                    <th>Post By</th>
                    <th>Post Status</th>
                    <th>User Type</th>
                    <th>Image</th>
                    <th>Action</th>
                    <th>Status Accept</th>
                    <th>Status Reject</th>
                </tr>
                @foreach ($post as $posts)
                    <tr>
                        <td>{{ $posts->title }}</td>
                        <td>{{ $posts->description }}</td>
                        <td>{{ $posts->name }}</td>
                        <td>{{ $posts->post_status }}</td>
                        <td>{{ $posts->usertype }}</td>
                        <td><img src="postimage/{{ $posts->image }}" alt=""
                                style="height: 130px; width:130px; onject-fit:cover;"></td>
                        </td>
                        <td>
                            <a href="{{ url('edit_page', $posts->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('delete_post', $posts->id) }}" class="btn btn-danger"
                                onclick="confirmation(event)">Delete</a>
                        </td>
                        <td>
                            <a href="{{ url('accept_post', $posts->id) }}" class="btn btn-success">Status Accept</a>
                        </td>
                        <td>
                            <a href="{{ url('reject_post', $posts->id) }}" class="btn btn-danger">Status Reject</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        {{-- ! --}}
        @include('admin.footer')
        <script type="text/javascript">
            function confirmation(ev) {
                ev.preventDefault();
                var urlToRedirect = ev.currentTarget.getAttribute('href');
                console.log(urlToRedirect);
                swal({
                    title: "Are you sure to delete this post?",
                    text: "If you delete this, it will be gone forever,",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willCancel) => {
                    if (willCancel) {
                        window.location.href = urlToRedirect;
                    }
                });
            }
        </script>
</body>

</html>
