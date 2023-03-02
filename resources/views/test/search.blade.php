<!DOCTYPE html>
<html>

<head>
    <meta name="_token" content="{{ csrf_token() }}">
    <title>Live Search</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Products info </h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <input type="text" class="form-controller" id="search" name="search"></input>
                        <select name="province_id" id="province_id">
                            <option value="" disabled selected>Tỉnh/Thành phố</option>
                            @foreach($provinces as $province)
                            <option value="{{$province->code}}">{{$province->name}}</option>
                            @endforeach
                        </select>
                        <div class="fastsearch">
                            <select name="district_id" id="district_id">
                                <option value="" disabled selected>Quận/Huyện</option>
                                @if (isset($districts))
                                @foreach($districts as $district)
                                <option value="{{$district->code}}">{{$district->name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="fastsearch">
                            <select name="ward_id" id="ward_id">
                                <option value="" disabled selected>Xã/Phường/Thị trấn</option>
                                @if (isset($wards))
                                @foreach($wards as $ward)
                                <option value="{{$ward->code}}">{{$ward->name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>new Name</th>
                                <th>Description</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($news)
                            @foreach ($news as $new)
                            <tr>
                                <td>{{$new->id}}</td>
                                <td>{{$new->news_header}}</td>
                                <td>{{$new->description}}</td>
                                <td>{{$new->price}}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/search.js') }}"></script>

    {{-- <script type="text/javascript">
        $('#search').on('keyup',function(){
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{ route("search_news") }}',
                    data: {
                        'search': $value
                    },
                    success:function(data){
                        $('tbody').html(data);
                    }                    
                });
            })

        $('#province_id').on('change',function(){
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{ route('search_districts') }}',
                    data: {
                        'province_code': $value
                    },
                    success:function(data){
                        $('#district_id').html(data);
                    }
                });
            })

        $('#district_id').on('change',function(){
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{ route('search_wards') }}',
                    data: {
                        'district_code': $value
                    },
                    success:function(data){
                        $('#ward_id').html(data);
                    }
                });
            })
       
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

    </script> --}}
</body>

</html>