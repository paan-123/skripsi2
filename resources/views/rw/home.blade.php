@extends('layout/rolerw',[
"InfoPage" => [
"Navbar" => '/home'
]
])
@section('title', 'Dashboard')

@section('container')
<style>
    .counter {
        background-color: #f5f5f5;
        padding: 20px 0;
        border-radius: 5px;
    }

    .count-title {
        font-size: 40px;
        font-weight: normal;
        margin-top: 10px;
        margin-bottom: 0;
        text-align: center;
    }

    .count-text {
        font-size: 13px;
        font-weight: normal;
        margin-top: 10px;
        margin-bottom: 0;
        text-align: center;
    }

    .fa-2x {
        size: 50px;
        margin: 0 auto;
        float: none;
        display: table;
        color: #00c3ff;
    }
</style>
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            {{-- <li><a href="#">Transaksi</a></li>
                                    <li><a href="#">Input Data Kartu Keluarga</a></li> --}}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body card-block">
                        <h2><strong>Rekap Data Warga</strong></h2>
                        <hr> <br>
                        <div class="row justify-content-md-center">
                            <section class="wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                                <div class="container">
                                    <div class="row">
                                        <br />
                                        <div class="col text-center">
                                            <h2>Rekap Data</h2>
                                            <p>Data Warga RW 1 Dusun Sanggrahan</p>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row text-center">
                                        <div class="col">
                                            <div class="counter">
                                                <i class="fa fa-users fa-2x"> <br>{{ $counter['total'] }}</i>
                                                {{-- <h2 class="timer count-title count-number" data-to="100" data-speed="1500"></h2> --}}
                                                <p class="count-text ">Jumlah Warga </p>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="counter">
                                                <i class="fa fa-database fa-2x"> <br> {{$data_kk}}</i>
                                                {{-- <h2 class="timer count-title count-number" data-to="1700" data-speed="1500"></h2> --}}
                                                <p class="count-text ">Data Kartu Keluarga</p>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="counter">
                                                <i class="fa fa-male fa-2x"> <br> {{$laki}}</i>
                                                {{-- <h2 class="timer count-title count-number" data-to="11900" data-speed="1500"></h2> --}}
                                                <p class="count-text ">Laki-laki</p>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="counter">
                                                <i class="fa fa-female fa-2x"> <br> {{$perempuan}}</i>
                                                {{-- <h2 class="timer count-title count-number" data-to="157" data-speed="1500"></h2> --}}
                                                <p class="count-text ">Perempuan</p>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="counter">
                                                <i class="fa fa-home fa-2x"><br> {{$rumah}}</i>
                                                {{-- <h2 class="timer count-title count-number" data-to="11900" data-speed="1500"></h2> --}}
                                                <p class="count-text ">Rumah</p>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="counter">
                                                <i class="fa fa-child fa-2x"> <br>{{ $counter['age']['Anak-anak'] }}</i>
                                                {{-- <h2 class="timer count-title count-number" data-to="11900" data-speed="1500"></h2> --}}
                                                <p class="count-text ">Anak-anak </p>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="counter">
                                                <i class="fa fa-user fa-2x"> <br>{{ $counter['age']['Remaja'] }}</i>
                                                {{-- <h2 class="timer count-title count-number" data-to="11900" data-speed="1500"></h2> --}}
                                                <p class="count-text ">Remaja</p>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="counter">
                                                <i class="fa fa-users fa-2x"> {{ $counter['age']['Dewasa'] }}</i>
                                                {{-- <h2 class="timer count-title count-number" data-to="11900" data-speed="1500"></h2> --}}
                                                <p class="count-text ">Dewasa</p>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="counter">
                                                <i class="fa fa-wheelchair fa-2x"> <br> {{ $counter['age']['Manula'] }}</i>
                                                {{-- <h2 class="timer count-title count-number" data-to="11900" data-speed="1500"></h2> --}}
                                                <p class="count-text ">Manula</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('customscript')
<script>
    (function($) {
        $.fn.countTo = function(options) {
            options = options || {};

            return $(this).each(function() {
                // set options for current element
                var settings = $.extend({}, $.fn.countTo.defaults, {
                    from: $(this).data('from'),
                    to: $(this).data('to'),
                    speed: $(this).data('speed'),
                    refreshInterval: $(this).data('refresh-interval'),
                    decimals: $(this).data('decimals')
                }, options);

                // how many times to update the value, and how much to increment the value on each update
                var loops = Math.ceil(settings.speed / settings.refreshInterval),
                    increment = (settings.to - settings.from) / loops;

                // references & variables that will change with each update
                var self = this,
                    $self = $(this),
                    loopCount = 0,
                    value = settings.from,
                    data = $self.data('countTo') || {};

                $self.data('countTo', data);

                // if an existing interval can be found, clear it first
                if (data.interval) {
                    clearInterval(data.interval);
                }
                data.interval = setInterval(updateTimer, settings.refreshInterval);

                // initialize the element with the starting value
                render(value);

                function updateTimer() {
                    value += increment;
                    loopCount++;

                    render(value);

                    if (typeof(settings.onUpdate) == 'function') {
                        settings.onUpdate.call(self, value);
                    }

                    if (loopCount >= loops) {
                        // remove the interval
                        $self.removeData('countTo');
                        clearInterval(data.interval);
                        value = settings.to;

                        if (typeof(settings.onComplete) == 'function') {
                            settings.onComplete.call(self, value);
                        }
                    }
                }

                function render(value) {
                    var formattedValue = settings.formatter.call(self, value, settings);
                    $self.html(formattedValue);
                }
            });
        };

        $.fn.countTo.defaults = {
            from: 0, // the number the element should start at
            to: 0, // the number the element should end at
            speed: 1000, // how long it should take to count between the target numbers
            refreshInterval: 100, // how often the element should be updated
            decimals: 0, // the number of decimal places to show
            formatter: formatter, // handler for formatting the value before rendering
            onUpdate: null, // callback method for every time the element is updated
            onComplete: null // callback method for when the element finishes updating
        };

        function formatter(value, settings) {
            return value.toFixed(settings.decimals);
        }
    }(jQuery));

    jQuery(function($) {
        // custom formatting example
        $('.count-number').data('countToOptions', {
            formatter: function(value, options) {
                return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
            }
        });

        // start all the timers
        $('.timer').each(count);

        function count(options) {
            var $this = $(this);
            options = $.extend({}, options || {}, $this.data('countToOptions') || {});
            $this.countTo(options);
        }
    });
</script>
@endsection