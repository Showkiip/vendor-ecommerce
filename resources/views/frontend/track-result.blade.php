<link type='text/css' rel='stylesheet' href='https://shippo-static.s3.amazonaws.com/css/branded-trackpage.css?v=2'>
<style>


</style>

<div class="TrackContainer">
    <main class="TrackPanel">
        <section class="Eta TrackPanel-body TrackPanel-body--flush">
            <header class="Eta-heading">Estimated Arrival</header>
            <div class='Eta-banner' >
                <h2 style="color: royalblue">
                    <time datetime="2021-09-18T07:26:44.083580+00:00" data-dateformat="l, F jS, Y">
                        &nbsp;
                        @php
                            $date= date('l, F jS, Y', strtotime($tracking->tracking_status->status_date));
                        @endphp
                        {{ $date }}
                    </time>
                </h2>
                {{-- <p>{{$tracking->tracking_status->status_details}}</p> --}}
                <p style="color: red">Your order is in {{$tracking->tracking_status->status}}</p>
            </div>
        </section>
        <div class="TrackPanel-body">
            <section>
                <h5 class="TrackPanel-heading">Items</h5>
                <ul class="list-unstyled">
                    @foreach ($order as $ord)


                    <li class="LineItem">
                        {{ $ord->brand_name }}  {{ $ord->model_name }}
                        <span class="pull-right">x  {{ $ord->quantity }}</span>
                    </li>
                    {{-- <li class="LineItem">
                        Goose
                        <span class="pull-right">x 1</span>
                    </li> --}}
                    @endforeach
                </ul>
            </section>
            <section>
                <h5 class="TrackPanel-heading">Tracking</h5>
                <div class="border-bottom">
                    <div class="Timeline">
                        @foreach ($tracking->tracking_history as $track)
                        <div class="Timeline-item">
                            <div class="Timeline-itemDate">
                                <time datetime="{{ $track->status_date }}" data-dateformat="l, M j"
                                    data-title-dateformat="g:i a">

                                    &nbsp;

                                    @php
                                    $date= date('l, F jS, Y', strtotime($track->status_date));
                                @endphp
                                {{ $date }}
                            </time>
                            </div>
                            <div class="Timeline-itemContent">
                                <header>{{$track->status_details}}</header>
                                <p>{{$track->status}}<br>
                                    {{ $track->location->city ?? 'shipped' }}, {{ $track->location->state ?? ''}}
                                </p>




                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
                <div style="padding-top: 20px;">
                    <input type="hidden" id="orderIDs" name="orderIDs" value="{{ $orderID }}">
                    <button type="button" class="btn btn-default btn-default--muted btn-rounded center-block" onclick="confirmOrder()">
                        Complete Shipping
                    </button>

                </div>
            </section>
        </div>
        <section class="TrackPanel-body SocialIcons">
            <ul class="list-inline text-center">
            </ul>
        </section>
    </main>
    {{-- <footer class="TrackFooter">
        <a href="/">
            <img src="https://shippo-static.s3.amazonaws.com/img/branded-pages/poweredbyshippo.svg?v=2"
                alt="Powered by Shippo">
        </a>
    </footer> --}}
</div>
<script src="https://cdn.jsdelivr.net/npm/php-date-formatter@1.3.4/js/php-date-formatter.min.js"></script>
<script>
    $(document).ready(function() {
        // Adjust timestamps to be in local timezone
        // Using php-date-formatter because it matches django template date filter syntax
        $('time').each(function() {
            var formatter = new DateFormatter();
            var $el = $(this);

            // Convert date
            var ts = new Date($el.attr('datetime'));
            if (isNaN(ts.getTime())) {
                // Skip if invalid / blank
                return;
            }

            // Format text
            var dateformat = $el.data('dateformat');
            $el.text(formatter.formatDate(ts, dateformat));

            // Format title
            var title_dateformat = $el.data('titleDateformat');
            if (title_dateformat) {
                $el.attr('title', formatter.formatDate(ts, title_dateformat));
            }
        });
    });
</script>
