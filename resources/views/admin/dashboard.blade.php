@extends('admin.layouts.master')
@section('title')
    <title>Tổng quan</title>
@endsection
@section('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{count($products)}}</h3>

                        <p>Sản phẩm</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('admin.products.list')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        {{-- <h3>{{number_format($turnover,0,'.',',')}}đ</h3> --}}
                        <h3>{{number_format(50000000,0,'.',',')}}đ</h3>

                        <p>Doanh thu trong 1 năm qua</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">Chi tiết ở phần thống kê doanh thu </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{count($users)}}</h3>

                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('admin.users.list')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
        <div class="container-fluid">
{{--            <h3>Thống kê doanh thu</h3>--}}

{{--            <form class="row" action="" autocomplete="off">--}}
{{--                @csrf--}}
{{--                <div class="col-2">--}}
{{--                    <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>--}}

{{--                </div>--}}
{{--                <div class="col-2">--}}
{{--                    <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>--}}
{{--                    <p><input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả"></p>--}}
{{--                </div>--}}
{{--                <div class="col-2">--}}
{{--                    <p>Lọc theo: <select class="form-control dashboard-filter" style="width:100%; border-color:#ccc;" name="" id="">--}}
{{--                            <option value="" selected disabled>--Chọn--</option>--}}
{{--                            <option value="7ngay" >7 ngày</option>--}}
{{--                            <option value="thangtruoc" >Tháng trước</option>--}}
{{--                            <option value="thangnay" >Tháng này</option>--}}
{{--                            <option value="365ngayqua" >365 ngày qua</option>--}}

{{--                        </select></p>--}}
{{--                </div>--}}
{{--            </form>--}}

            <div class="col-12">
                <div id="myfirstchart" style="height: 250px;"></div>
            </div>

        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
{{--    <script>--}}

{{--        $( function() {--}}
{{--            $( "#datepicker" ).datepicker({--}}
{{--                dateFormat:"yy-mm-dd"--}}
{{--            });--}}
{{--            $( "#datepicker2" ).datepicker({--}}
{{--                dateFormat:"yy-mm-dd"--}}
{{--            });--}}
{{--        });--}}


{{--    </script>--}}
    <script>
        $(document).ready(function(){
        {{--    filter30day();--}}
        {{--    $('#btn-dashboard-filter').click(function(){--}}
        {{--        var _token = $('input[name = "_token"]').val();--}}
        {{--        var from_date = $('#datepicker').val();--}}
        {{--        var to_date = $('#datepicker2').val();--}}

        {{--        $.ajax({--}}
        {{--            url:'{{route('admin.dashboard.statistic.day')}}',--}}
        {{--            method:"POST",--}}
        {{--            dataType:"JSON",--}}
        {{--            data:{from_date:from_date,to_date:to_date,_token:_token},--}}

        {{--            success:function(data){--}}
        {{--                chart.setData(data);--}}
        {{--            }--}}
        {{--        });--}}
        {{--    });--}}
        {{--    $('.dashboard-filter').change(function(){--}}
        {{--        var dashboard_value = $(this).val();--}}
        {{--        var _token = $('input[name = "_token"]').val();--}}


        {{--        $.ajax({--}}
        {{--            url:'{{route('admin.dashboard.statistic.fillter')}}',--}}
        {{--            method:"POST",--}}
        {{--            dataType:"JSON",--}}
        {{--            data:{dashboard_value:dashboard_value, _token:_token},--}}

        {{--            success:function(data){--}}
        {{--                if(data==null){--}}
        {{--                    data=[--}}
        {{--                        {period: "Không có dữ liệu", order: 0, sales: "0", profit: "0", quantity: 0}--}}
        {{--                    ]--}}
        {{--                }--}}
        {{--                chart.setData(data);--}}

        {{--            }--}}
        {{--        });--}}
        {{--    });--}}

        {{--    var chart = new Morris.Line({--}}
        {{--        // ID of the element in which to draw the chart.--}}
        {{--        element: 'myfirstchart',--}}
        {{--        parseTime:false,--}}

        {{--        xkey: 'period',--}}

        {{--        ykeys: ['order','sales', 'profit', 'quantity'],--}}
        {{--        behaveLikeLine: true,--}}

        {{--        labels: ['đơn hàng', 'doanh số', 'lợi nhuận', 'số lượng']--}}
        {{--    });--}}
        {{--    function filter30day() {--}}
        {{--        let dashboard_value = 'thangnay';--}}
        {{--        var _token = $('input[name = "_token"]').val();--}}
        {{--        $.ajax({--}}
        {{--            url:'{{route('admin.dashboard.statistic.fillter')}}',--}}
        {{--            method:"POST",--}}
        {{--            dataType:"JSON",--}}
        {{--            data:{dashboard_value:dashboard_value, _token:_token},--}}
        {{--            success:function(data){--}}
        {{--                chart.setData(data);--}}
        {{--            }--}}
        {{--        });--}}
        {{--    }--}}
            new Morris.Line({
                // ID of the element in which to draw the chart.
                element: 'myfirstchart',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [
                    { year: '2008', value: 20 },
                    { year: '2009', value: 10 },
                    { year: '2010', value: 5 },
                    { year: '2011', value: 5 },
                    { year: '2012', value: 20 }
                ],
                // The name of the data record attribute that contains x-values.
                xkey: 'year',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['value'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Value']
            });
        });
    </script>
@endsection
