<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-5">Danh sách nhân viên</h1>

        <div class="col-lg-12 mt-3">
            <div class="col-lg-12 mt-6">
                <form class="navbar-form navbar-left" action="" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                                <a href="{{route('staffs.create')}}" class="btn btn-primary col-2">Thêm nhân viên</a>
                                <input class="col-6" type="text" placeholder="Nhập id hoặc tên nhân viên" name="search" />
                                <button type="submit" class="btn btn-primary col-1">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        @if (Session::has('success'))
        <div class="alert alert-success">{{session::get('success')}}</div>
        @endif
        <br>
        <!-- <div class="container">
        </div> -->
        <table class="table table-bordered mt-3">
            <thead>
                <tr class="text-center">
                    <th>Mã nhân viên</th>
                    <th>Nhóm nhân viên</th>
                    <th>Họ tên</th>
                    <!-- <th>Ngày sinh</th> -->
                    <th>Giới tính</th>
                    <th>Số điện thoại</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staffs as $staff)
                <tr class="text-center">
                    <td>{{ $staff->id }}</td>
                    <td>{{ $staff->group }}</td>
                    <td>{{ $staff->name }}</td>
                    <!-- <td>{{ $staff->date_of_birth }}</td> -->
                    <td>{{ $staff->gender }}</td>
                    <td>{{ $staff->phone }}</td>
                    <td>
                        <a href="{{ route('staffs.edit',$staff->id )}}" class="btn btn-warning"><i class="fas fa-edit">Sửa</i></a>
                        <form action="{{ route('staffs.destroy',$staff->id )}}" style="display:inline" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Xóa {{$staff->name}} ?')">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>