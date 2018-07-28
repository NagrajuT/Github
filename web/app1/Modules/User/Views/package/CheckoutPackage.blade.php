@extends('User::layouts.bodyLayout')

@section('title','Dashboard')

@section('headcontent')

    <link href="/assets/user/css/pricing-table.css" rel="stylesheet" type="text/css"/>
    <style>

        .breadcrumb > li + li::before {
            display: inline;
        }
        .carousel-inner.onebyone-carosel { margin: auto; width: 90%; }
        .onebyone-carosel .active.left { left: -33.33%; }
        .onebyone-carosel .active.right { left: 33.33%; }
        .onebyone-carosel .next { left: 10.33%; }
        .onebyone-carosel .prev { left: -10.33%; }
    </style>

@endsection

@section('active_profilePromotions','active')
@section('content')
    {{dd("checkouts")}}

    @endsection

    @section('pagejavascripts')
            <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script src="/assets/user/js/loadingoverlay.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script type="text/javascript">
        $(function () {
            $('a[title]').tooltip();
        });
    </script>
    <script type="text/javascript">
        // Hide the extra content initially, using JS so that if JS is disabled, no problemo:
        $('.read-more-content').addClass('hide')
        $('.read-more-show, .read-more-hide').removeClass('hide')

        // Set up the toggle effect:
        $('.read-more-show').on('click', function (e) {
            $(this).next('.read-more-content').removeClass('hide');
            $(this).addClass('hide');
            e.preventDefault();
        });

        // For Tolltip:
        $(document).ready(function () {

            $(".T1").Tooltip();

            $(".T2").Tooltip({
                content: function ($element, $tooltip) {
                    return $element.parent().find('.Html').html();
                }
            });

        });

        // JQuery
        (function ($) {

            // Tooltip
            $.fn.Tooltip = function (options) {

                var defaults = {
                    class: 'Tooltip',
                    content: '',
                    delay: [200, 200],
                    cursor: false,
                    offset: [0, 1],
                    hide: function ($element, $tooltip) {
                        $tooltip.fadeOut(200);
                    },
                    show: function ($element, $tooltip) {
                        $tooltip.fadeIn(200);
                    }
                };

                var options = $.extend({}, defaults, options);

                var identity = "Tooltip_" + Math.floor(Math.random() * (9999 - 2000 + 1) + 2000);

                var info = { ready: false, shown: false, timer: null, title: '' };

                $(this).each(function (e) {

                    var $this = $(this);
                    info.title = $this.attr('title') || '';

                    // Mouse enter
                    $this.mouseenter(function (e) {

                        if (info.ready) {

                            var $tooltip = $("#" + identity);

                        } else {

                            var $tooltip = $("<div>").attr("id", identity).attr("class", options.class).appendTo('body');

                            $tooltip.html(options.content != '' ? (typeof options.content == 'string' ? options.content : options.content($this, $tooltip)) : this.title);

                            info.ready = true;
                            $this.attr('title', '');

                        }

                        if (options.cursor) {

                            var position = [e.clientX + options.offset[0], e.clientY + options.offset[1]];

                        } else {

                            var coordinates = $this[0].getBoundingClientRect();

                            var position = [

                                (function () {

                                    if (options.offset[0] < 0)
                                        return coordinates.left - Math.abs(options.offset[0]) - $tooltip.outerWidth();
                                    else if (options.offset[0] === 0)
                                        return coordinates.left - (($tooltip.outerWidth() - $this.outerWidth()) / 2);
                                    else
                                        return coordinates.left + $this.outerWidth() + options.offset[0];

                                })(),

                                (function () {

                                    if (options.offset[1] < 0)
                                        return coordinates.top - Math.abs(options.offset[1]) - $tooltip.outerHeight();
                                    else if (options.offset[1] === 0)
                                        return coordinates.top - (($tooltip.outerHeight() - $this.outerHeight()) / 2);
                                    else
                                        return coordinates.top + $this.outerHeight() + options.offset[1];

                                })()

                            ];
                        }

                        $tooltip.css({ left: position[0] + 'px', top: position[1] + 'px' });

                        timer = window.setTimeout(function () {
                            options.show($this, $tooltip.stop(true, true));
                        }, options.delay[0] || 0);

                        $("#" + identity).mouseenter(function() {
                            window.clearTimeout(timer);
                            timer = null;
                        });

                        $("#" + identity).mouseleave(function () {
                            timer = setTimeout(function () {
                                options.hide($this, $tooltip);
                            }, options.delay[1]);
                        });

                    }), // Mouse enter

                            $this.mouseleave(function (e) {
                                window.clearTimeout(timer);
                                timer = null;
                                options.hide($this, $("#" + identity).stop(true, true));
                            }) // Mouse leave

                }); // Each

            }; // Tooltip

        })(jQuery); // JQuery

        // Changes contributed by @diego-rzg
    </script>
    <!-- END PAGE LEVEL PLUGINS -->
@endsection