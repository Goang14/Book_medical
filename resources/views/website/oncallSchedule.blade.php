@extends('layouts.app')

@section('content')

<div class="s009">
    <div class="container">
        <a class="title back ">Chọn bác sĩ &nbsp; &nbsp; </a> <i class="fas fa-angle-right title"></i> <a class="title"> &nbsp; &nbsp;Bác sĩ</a>
        <div class="row justify-content-center">
            <script type="text/javascript">
                $(document).ready(function() {
                    $('.back').click(function() {
                        parent.history.back();
                        return false;
                    });
                });
            </script>
            <div class="col-lg-6">
                <div class="section-tittle text-center mb-100">
                    @foreach($dayOnCall as $key => $value)
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                            <img height="200" width="200" src="{{ asset('storage/avatar/'. $value->image) }}" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{($value->name_degree)}}</h5>
                                    <p class="card-text">{{($value->name)}}</p>
                                    <p class="card-text">{{($value->department_name)}}</p>
                                    <p class="card-text">{{($value->name_room)}}</p>
                                    <p id="date"></p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
        <div class="section-tittle text-center ">
            <span> Ca trực </span>
            <br>
            <?php if ($c > 0) { ?>
                @foreach($oncall as $key => $value)
                    <input id="tessssss" type="submit" data-session="{{$value->session= 1 ? 'Sáng' : 'Chiều'}}" data-id="{{($value->id)}}" class="btnx" value="{{$value->session= 1 ? 'Sáng' : 'Chiều'}} {{($value->onAll_day)}}"/>
                @endforeach
            <?php
            } else { ?>
                <a class="btnxx"> Không có ca trực </a>
            <?php } ?>
            <br>
            <div id="time">
            </div>
        </div>
    </div>

</div>
@endsection

<script type="text/javascript">
    $(document).ready(function() {
        $('#tessssss').click(function() {
            console.log('3333');
        })
    });
    // function selectTime() {
    // const id = $(this).data('id');
    // const session = $(this).data('session');
    // $.ajax({
    //     url: 'select_time',
    //     method: 'GET',
    //     dataType: 'json',
    //     success: function(data) {
    //         let resultajax = '';
    //         data = JSON.parse(data);
    //         console.log(data);
    //         $('#time').show();
    //     },
    //     error: function(jqXHR, textStatus, errorThrown) {
    //         console.log('AJAX error: ' + textStatus + ' ' + errorThrown);
    //     }
    // });
}
</script>


