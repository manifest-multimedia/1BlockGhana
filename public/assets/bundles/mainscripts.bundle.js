if ("undefined" == typeof jQuery)
    throw new Error("jQuery plugins need to be before this file");
($.AdminCompass = {}),
    ($.AdminCompass.options = {
        colors: {
            red: "#ec3b57",
            pink: "#E91E63",
            purple: "#ba3bd0",
            deepPurple: "#673AB7",
            indigo: "#3F51B5",
            blue: "#2196f3",
            lightBlue: "#03A9F4",
            cyan: "#00bcd4",
            green: "#4CAF50",
            lightGreen: "#8BC34A",
            yellow: "#ffe821",
            orange: "#FF9800",
            deepOrange: "#f83600",
            grey: "#9E9E9E",
            blueGrey: "#607D8B",
            black: "#000000",
            blush: "#dd5e89",
            white: "#ffffff",
        },
        leftSideBar: {
            scrollColor: "rgba(0,0,0,0.5)",
            scrollWidth: "4px",
            scrollAlwaysVisible: !1,
            scrollBorderRadius: "0",
            scrollRailBorderRadius: "0",
        },
        dropdownMenu: { effectIn: "fadeIn", effectOut: "fadeOut" },
    }),
    ($.AdminCompass.leftSideBar = {
        activate: function () {
            var t = this,
                s = $("body"),
                r = $(".overlay");
            $(window).on("click", function (e) {
                var a = $(e.target);
                "i" === e.target.nodeName.toLowerCase() &&
                    (a = $(e.target).parent()),
                    !a.hasClass("bars") &&
                        t.isOpen() &&
                        0 === a.parents("#leftsidebar").length &&
                        (a.hasClass("js-right-sidebar") || r.fadeOut(),
                        s.removeClass("overlay-open"));
            }),
                $.each($(".menu-toggle.toggled"), function (e, a) {
                    $(a).next().slideToggle(0);
                }),
                $.each($(".menu .list li.active"), function (e, a) {
                    var t = $(a).find("a:eq(0)");
                    t.addClass("toggled"), t.next().show();
                }),
                $(".menu-toggle").on("click", function (e) {
                    var a = $(this),
                        t = a.next();
                    if ($(a.parents("ul")[0]).hasClass("list")) {
                        var s = $(e.target).hasClass("menu-toggle")
                            ? e.target
                            : $(e.target).parents(".menu-toggle");
                        $.each(
                            $(".menu-toggle.toggled").not(s).next(),
                            function (e, a) {
                                $(a).is(":visible") &&
                                    ($(a).prev().toggleClass("toggled"),
                                    $(a).slideUp());
                            }
                        );
                    }
                    a.toggleClass("toggled"), t.slideToggle(320);
                }),
                t.checkStatuForResize(!0),
                $(window).resize(function () {
                    t.checkStatuForResize(!1);
                }),
                Waves.attach(".menu .list a", ["waves-block"]),
                Waves.init();
        },
        checkStatuForResize: function (e) {
            var a = $("body"),
                t = $(".navbar .navbar-header .bars"),
                s = a.width();
            e &&
                a
                    .find(".content, .sidebar")
                    .addClass("no-animate")
                    .delay(1e3)
                    .queue(function () {
                        $(this).removeClass("no-animate").dequeue();
                    }),
                s < 1170
                    ? (a.addClass("ls-closed"), t.fadeIn())
                    : (a.removeClass("ls-closed"), t.fadeOut());
        },
        isOpen: function () {
            return $("body").hasClass("overlay-open");
        },
    }),
    ($.AdminCompass.rightSideBar = {
        activate: function () {
            var t = this,
                s = $("#rightsidebar"),
                r = $(".overlay");
            $(window).on("click", function (e) {
                var a = $(e.target);
                "i" === e.target.nodeName.toLowerCase() &&
                    (a = $(e.target).parent()),
                    !a.hasClass("js-right-sidebar") &&
                        t.isOpen() &&
                        0 === a.parents("#rightsidebar").length &&
                        (a.hasClass("bars") || r.fadeOut(),
                        s.removeClass("open"));
            }),
                $(".js-right-sidebar").on("click", function () {
                    s.toggleClass("open"),
                        t.isOpen() ? r.fadeIn() : r.fadeOut();
                });
        },
        isOpen: function () {
            return $(".right-sidebar").hasClass("open");
        },
    }),
    ($.AdminCompass.navbar = {
        activate: function () {
            var e = $("body"),
                a = $(".overlay");
            $(".bars").on("click", function () {
                e.toggleClass("overlay-open"),
                    e.hasClass("overlay-open") ? a.fadeIn() : a.fadeOut();
            }),
                $('.nav [data-close="true"]').on("click", function () {
                    var e = $(".navbar-toggle").is(":visible"),
                        a = $(".navbar-collapse");
                    e &&
                        a.slideUp(function () {
                            a.removeClass("in").removeAttr("style");
                        });
                });
        },
    }),
    /* ($.AdminCompass.select = {
        activate: function () {
            $.fn.selectpicker && $("select:not(.ms)").selectpicker();
        },
    }), */
    $(".boxs-close").on("click", function () {
        $(this).parents(".card").addClass("closed").fadeOut();
    });
var edge = "Microsoft Edge",
    ie10 = "Internet Explorer 10",
    ie11 = "Internet Explorer 11",
    opera = "Opera",
    firefox = "Mozilla Firefox",
    chrome = "Google Chrome",
    safari = "Safari";
function skinChanger() {
    $(".right-sidebar .choose-skin li").on("click", function () {
        var e = $("body"),
            a = $(this),
            t = $(".right-sidebar .choose-skin li.active").data("theme");
        $(".right-sidebar .choose-skin li").removeClass("active"),
            e.removeClass("theme-" + t),
            a.addClass("active"),
            e.addClass("theme-" + a.data("theme"));
    });
}
function CustomScrollbar() {
    $(".navbar-right .dropdown-menu .body .menu").slimscroll({
        height: "254px",
        color: "rgba(0,0,0,0.2)",
        size: "3px",
        alwaysVisible: !1,
        borderRadius: "3px",
        railBorderRadius: "0",
    }),
        $(".chat-widget").slimscroll({
            height: "300px",
            color: "rgba(0,0,0,0.4)",
            size: "2px",
            alwaysVisible: !1,
            borderRadius: "3px",
            railBorderRadius: "2px",
        }),
        $(".right-sidebar .slim_scroll").slimscroll({
            height: "calc(100vh - 70px)",
            color: "rgba(0,0,0,0.4)",
            size: "2px",
            alwaysVisible: !1,
            borderRadius: "3px",
            railBorderRadius: "0",
        });
}
($.AdminCompass.browser = {
    activate: function () {
        "" !== this.getClassName() && $("html").addClass(this.getClassName());
    },
    getBrowser: function () {
        var e = navigator.userAgent.toLowerCase();
        return /edge/i.test(e)
            ? edge
            : /rv:11/i.test(e)
            ? ie11
            : /msie 10/i.test(e)
            ? ie10
            : /opr/i.test(e)
            ? opera
            : /chrome/i.test(e)
            ? chrome
            : /firefox/i.test(e)
            ? firefox
            : navigator.userAgent.match(/Version\/[\d\.]+.*Safari/)
            ? safari
            : void 0;
    },
    getClassName: function () {
        var e = this.getBrowser();
        return e === edge
            ? "edge"
            : e === ie11
            ? "ie11"
            : e === ie10
            ? "ie10"
            : e === opera
            ? "opera"
            : e === chrome
            ? "chrome"
            : e === firefox
            ? "firefox"
            : e === safari
            ? "safari"
            : "";
    },
}),
    $(function () {
        $.AdminCompass.browser.activate(),
            $.AdminCompass.leftSideBar.activate(),
            $.AdminCompass.rightSideBar.activate(),
            $.AdminCompass.navbar.activate(),
            $.AdminCompass.select.activate(),
            setTimeout(function () {
                $(".page-loader-wrapper").fadeOut();
            }, 50);
    }),
    $(function () {
        skinChanger(), CustomScrollbar();
    }),
    $(".theme-light-dark .t-light").on("click", function () {
        $("body").removeClass("menu_dark");
    }),
    $(".theme-light-dark .t-dark").on("click", function () {
        $("body").addClass("menu_dark");
    }),
    $(".ls-toggle-btn").on("click", function () {
        $("body").toggleClass("ls-toggle-menu");
    }),
    $(function () {
        $(".chat-launcher").on("click", function () {
            $(".chat-launcher").toggleClass("active"),
                $(".chat-wrapper").toggleClass("is-open");
        });
    }),
    $(".form-control")
        .on("focus", function () {
            $(this).parent(".input-group").addClass("input-group-focus");
        })
        .on("blur", function () {
            $(this).parent(".input-group").removeClass("input-group-focus");
        });
var Tawk_API = Tawk_API || {},
    Tawk_LoadStart = new Date();
!(function () {
    var e = document.createElement("script"),
        a = document.getElementsByTagName("script")[0];
    (e.async = !0),
        (e.src = "https://embed.tawk.to/5c6d4867f324050cfe342c69/default"),
        (e.charset = "UTF-8"),
        e.setAttribute("crossorigin", "*"),
        a.parentNode.insertBefore(e, a);
})(),
    $(function () {
        "use strict";
        if (
            ($("#supported").text("Supported/allowed: " + !!screenfull.enabled),
            !screenfull.enabled)
        )
            return !1;
        $("#request").on("click", function () {
            screenfull.request($("#container")[0]);
        }),
            $("#exit").on("click", function () {
                screenfull.exit();
            }),
            $('[data-provide~="boxfull"]').on("click", function () {
                screenfull.toggle($(".box")[0]);
            }),
            $('[data-provide~="fullscreen"]').on("click", function () {
                screenfull.toggle($("#container")[0]);
            });
        var e = '[data-provide~="fullscreen"]';
        function a() {
            var e = screenfull.element;
            $("#status").text("Is fullscreen: " + screenfull.isFullscreen),
                e &&
                    $("#element").text(
                        "Element: " + e.localName + (e.id ? "#" + e.id : "")
                    ),
                screenfull.isFullscreen ||
                    ($("#external-iframe").remove(),
                    (document.body.style.overflow = "auto"));
        }
        $(e).each(function () {
            $(this).data("fullscreen-default-html", $(this).html());
        }),
            document.addEventListener(
                screenfull.raw.fullscreenchange,
                function () {
                    screenfull.isFullscreen
                        ? $(e).each(function () {
                              $(this).addClass("is-fullscreen");
                          })
                        : $(e).each(function () {
                              $(this).removeClass("is-fullscreen");
                          });
                }
            ),
            screenfull.on("change", a),
            a();
    });
