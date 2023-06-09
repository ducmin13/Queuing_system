@extends('welcome')
@section('content')


<div class="container mt-4" >
    <div class="mt-3">
<div class="mt-3">
    <h5 style="padding-left: 70px;color: #FF7506; font-size: 28px;">Quản lý dịch vụ</h5>
    <div class="row" style="width: 1200px;">
        <div class="col-lg-10">
            <div class="row">
            <div class="col-lg-4">
                <form action="/service/filterbystatus" method="post" id="filterForm1">
                    @csrf
                    <p style="padding-left: 70px;font-weight: 600; line-height: 40px;">
                        Trạng thái hoạt động
                        <span class="dropdown-icon">
                            <select name="status" class="dropd" id="statusDropdown1">
                                <option value="" selected>Tất cả</option>
                                <option {!! (request()->input('status')) == 'active' ? 'selected' : '' !!}
                                    value="active">Hoạt động</option>
                                <option {!! (request()->input('status')) == 'inactive' ? 'selected' : '' !!}
                                    value="inactive">Ngưng hoạt động</option>
                            </select>
                            <span class="icon_dropd"><i class="fa-solid fa-caret-down"></i></span>
                        </span>
                    </p>
                </form>
                </div>
            <div style=" padding-left: 50px;" class="col-lg-4">
                <p style="font-weight: 600; margin-bottom: 5px; margin-top: 11px;">Chọn thời gian</p>
                <p style="display: flex; align-items: center;">
                    <input type="date" class="chonthoigian" name="thoigian_dau">
                    <span style="font-size: 16px; margin: 0px 10px;"><i class="fa-solid fa-caret-right"></i></span>
                    <input type="date" class="chonthoigian" name="thoigian_cuoi">
                </p>
            </div>
                <div class="col-lg-4">
                    <form action="/service/search" method="post">
                        @csrf
                        <p style="font-weight: 600; line-height: 40px; margin-left: 150px;">Từ khóa
                            <span class="dropdown-icon">
                                <input type="search" class="dropd" name="keyword" placeholder="Nhập từ khóa">
                                <span class="icon_search"><i class="fa-solid fa-magnifying-glass"></i></span>
                                <button type="submit" id="hidden-button" style="display: none;"></button>
                            </span>
                        </p>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
    <!--  -->
    <div class="content-device" style="display: flex;">
        <div class="table-list-device">
            <a href="/service/new">
            <div class="button-add-device">
                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M18.8884 2.33301H9.11171C4.86504 2.33301 2.33337 4.86467 2.33337 9.11134V18.8763C2.33337 23.1347 4.86504 25.6663 9.11171 25.6663H18.8767C23.1234 25.6663 25.655 23.1347 25.655 18.888V9.11134C25.6667 4.86467 23.135 2.33301 18.8884 2.33301ZM18.6667 14.8747H14.875V18.6663C14.875 19.1447 14.4784 19.5413 14 19.5413C13.5217 19.5413 13.125 19.1447 13.125 18.6663V14.8747H9.33337C8.85504 14.8747 8.45837 14.478 8.45837 13.9997C8.45837 13.5213 8.85504 13.1247 9.33337 13.1247H13.125V9.33301C13.125 8.85467 13.5217 8.45801 14 8.45801C14.4784 8.45801 14.875 8.85467 14.875 9.33301V13.1247H18.6667C19.145 13.1247 19.5417 13.5213 19.5417 13.9997C19.5417 14.478 19.145 14.8747 18.6667 14.8747Z"
                        fill="#FF9138" />
                </svg>
                <p>Thêm dịch vụ</p>
            </a>
            </div>
            <table>
                <thead>
                    <tr>
                    <td class="th-border-left" style="color: #ffffff; font-size: 16px;">Mã dịch vụ</td>
                    <td class="border-table" style="color: #ffffff; font-size: 16px;">Tên dịch vụ</td>
                    <td class="text-light" style="color: #ffffff; font-size: 16px;">Mô tả</td>
                    <td class="border-table" style="color: #ffffff; font-size: 16px;">Trạng thái hoạt động</td>
                    <td class="border-table" style="color: #ffffff; font-size: 16px;"></td>
                    <td class="th-border-right" style="color: #ffffff; font-size: 16px;"></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                    <tr class="color-tr-white">
                        <td>{{ $service->service_id }}</td>
                        <td class="border-table">{{ $service->service_name }}</td>
                        <td>{{ $service->service_desc }}</td>
                        <td class="border-table">
                            @if($service->service_status == 'active') 
                                <svg width="8" height="9" viewBox="0 0 8 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="4.5" r="4" fill="#35c75a" />
                                </svg>
                                    Hoạt động
                            @else
                                <svg width="8" height="9" viewBox="0 0 8 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="4.5" r="4" fill="#EC3740" />
                                </svg>
                                    Ngưng hoạt động
                            @endif</td>
                        <td class="border-table"><a href="/service/info/{{ $service->id }}">Chi tiết</a></td>
                        <td><a href="/service/fupdate/{{ $service->id }}">Cập nhật</a></td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
            </div>

            <div class="themthietbi">
                <a href="insert-service" style="text-decoration: none; color: orangered;">
                    <div>
                        <p><i class="fa-solid fa-square-plus"></i><br>
                        Thêm dịch vụ</p>
                    </div>
                </a>
            </div>
        </div>
    <!--  -->

        <div class="navigation">
          <ul class="pagination mt-50 mb-70">
            {{-- Hiển thị nút Previous --}}
            <li class="page-item"><a class="page-link" href="{{ $services->previousPageUrl() }}"><i class="fa-solid fa-caret-left"></i></a></li>

            {{-- Hiển thị các nút số trang --}}
            @for ($i = 1; $i <= $services->lastPage(); $i++)
              @if ($i >= $services->currentPage() - 2 && $i <= $services->currentPage() + 2)
                <li class="page-item {{ ($i == $services->currentPage()) ? 'active' : '' }}"><a class="page-link" href="{{ $services->url($i) }}">{{ $i }}</a></li>
              @endif
            @endfor

            <li class="page-item"><a class="page-link" href="{{ $services->nextPageUrl() }}"><i class="fa-solid fa-caret-right"></i></a></li>
          </ul>
        </div>
    </div>
</div>

<script>
    const statusDropdown1 = document.getElementById('statusDropdown1');

    statusDropdown1.addEventListener('change', function () {
        document.getElementById('filterForm1').submit();
    });


</script>
<link rel="stylesheet" href="{{ asset('css/service.css') }}">
<link rel="stylesheet" href="{{ asset('css/device.css') }}">
@endsection