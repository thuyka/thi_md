<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-3">Thêm mới nhân viên</h1>
        <form method="post" action="{{route('staffs.store')}}">
            @csrf

            <div class="card">
                <!-- <div class="card-body"> -->
                <div class="col-12">
                    <div class="row">
                        <div class=" col-6 ">
                            <div class=" form-group">
                                <label>Mã nhân viên</label>
                                <input type="text" name="id" class="form-control" placeholder="id">
                            </div>
                            <div class="form-group">
                                <label>Nhóm nhân viên</label>
                                <select class="custom-select" name="group">
                                    <option selected value="">Chọn vị trí</option>
                                    <option value="Quan ly he thong">Quản lý hệ thống</option>
                                    <option value="Quan ly nhan su">Quản lý nhân sự</option>
                                    <option value="Le tan">Lễ tân</option>
                                    <option value="Quan ly phong">Quản lý phòng</option>
                                    <option value="Quan ly nhan su">Quản lý dịch vụ</option>
                                </select>
                                @if ($errors->any())
                                <p style="color:red">{{ $errors->first('group') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input type="text" class="form-control" placeholder="Tên" name="name">
                                @if ($errors->any())
                                <p style="color:red">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input type="date" class="form-control" placeholder="Ngày sinh" name="date_of_birth">
                                @if ($errors->any())
                                <p style="color:red">{{ $errors->first('date_of_birth') }}</p>
                                @endif
                            </div>
                            <div class="col-6 form-group">
                                <label>Giới tính</label>
                                <input type="radio" placeholder="Giới tính" name="gender" value="Nam"> Nam
                                <input type="radio" placeholder="Giới tính" name="gender" value="Nu"> Nữ
                                @if ($errors->any())
                                <p style="color:red">{{ $errors->first('gender') }}</p>
                                @endif
                            </div>
                        </div>
                    <!-- </div>
                    <div class="row"> -->
                        <div class=" col-6 ">
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" placeholder="Điện thoại" name="phone">
                                @if ($errors->any())
                                <p style="color:red">{{ $errors->first('phone') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Chứng minh</label>
                                <input type="text" class="form-control" placeholder="Chứng minh" name="card">
                                @if ($errors->any())
                                <p style="color:red">{{ $errors->first('card') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email">
                                @if ($errors->any())
                                <p style="color:red">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" placeholder="Địa chỉ" name="address">
                                @if ($errors->any())
                                <p style="color:red">{{ $errors->first('address') }}</p>
                                @endif
                            </div>
                        </div>
                </div>

                <div class="form-actions">
                    <button class="btn btn-primary" type="submit" class="btn btn-primary">Lưu</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Quay lại</button>
                </div>
            </div>
            <!-- </div> -->
    </div>
    </form>
    </div>

</body>

</html>