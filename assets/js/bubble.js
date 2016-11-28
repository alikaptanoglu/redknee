!function() {
    function n() {
        d = window.innerWidth,
        h = window.innerHeight,
        w = {
            x: 0,
            y: h
        },
        c = document.getElementById("bubble"),
        c.width = d,
        c.height = h,
        l = c.getContext("2d"),
        s = [];

        for (var n = 0; .5 * d > n; n++) {
            var t = new a;
            s.push(t)
        }

        o()
    }

    function t() {
        window.addEventListener("scroll", e), window.addEventListener("resize", i)
    }

    function e() {
        f = document.body.scrollTop > h ? !1 : !0
    }

    function i() {
        d = window.innerWidth, h = window.innerHeight, c.width = d, c.height = h
    }

    function o() {
        if (f) {
            l.clearRect(0, 0, d, h);
            for (var n in s) s[n].draw()
        }

        requestAnimationFrame(o)
    }

    function a() {
        function n() {
            t.pos.x = Math.random() * d, t.pos.y = h + 100 * Math.random(), t.alpha = .1 + .3 * Math.random(), t.scale = .1 + .3 * Math.random(), t.velocity = Math.random()
        }

        var t = this;

        ! function() {
            t.pos = {}, n()
        } (), this.draw = function() {
            t.alpha <= 0 && n(), t.pos.y -= t.velocity, t.alpha -= 5e-4, l.beginPath(), l.arc(t.pos.x, t.pos.y, 10 * t.scale, 0, 2 * Math.PI, !1), l.fillStyle = "rgba(255,255,255," + t.alpha + ")", l.fill()
        }
    }

    var d, h, c, l, s, w, f = !0;

    n(), t()
}();