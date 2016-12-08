!function() {
    function n() {
        width = window.innerWidth,
        height = window.innerHeight,
        canvas = document.getElementById("bubble"),
        canvas.width = width,
        canvas.height = height,
        context = canvas.getContext("2d"),
        arr = [];

        for (var n = 0; .5 * width > n; n++) {
            var t = new bubble;

            arr.push(t)
        }

        rect()
    }

    function t() {
        window.addEventListener("scroll", e),
        window.addEventListener("resize", i)
    }

    function e() {
        f = document.body.scrollTop > height ? !1 : !0
    }

    function i() {
        width = window.innerWidth,
        height = window.innerHeight,
        canvas.width = width,
        canvas.height = height
    }

    function rect() {
        if (f) {
            context.clearRect(0, 0, width, height);

            for (var n in arr) arr[n].draw()
        }

        requestAnimationFrame(rect)
    }

    function bubble() {
        function n() {
            t.pos.x = Math.random() * width,
            t.pos.y = height + 100 * Math.random(),
            t.alpha = .1 + .3 * Math.random(),
            t.scale = .1 + .3 * Math.random(),
            t.velocity = Math.random()
        }

        var t = this;

        ! function() {
            t.pos = {}, n()
        } (), this.draw = function() {
            t.alpha <= 0 && n(),
            t.pos.y -= t.velocity,
            t.alpha -= 5e-4,
            context.beginPath(),
            context.arc(
                t.pos.x,
                t.pos.y,
                10 * t.scale,
                0,
                2 * Math.PI,
                !1
            ),
            context.fillStyle = "rgba(255,255,255," + t.alpha + ")",
            context.fill()
        }
    }

    var width,
        height,
        canvas,
        context,
        arr,
        f = !0;

    n(),
    t()
}();