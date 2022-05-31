"use strict";
(() => {
    var b = Object.defineProperty;
    var _ = (e, t) => b(e, "name", {
        value: t,
        configurable: !0
    });
    (globalThis.webpackChunk = globalThis.webpackChunk || []).push([
        [5177], {
            24346: (e, t, n) => {
                var s = n(64463);
                const a = new IntersectionObserver(r => {
                    for (const o of r) o.isIntersecting ? o.target.removeAttribute("tabindex") : o.target.setAttribute("tabindex", "-1")
                }, {
                    rootMargin: "0% 0% 0% 0%",
                    threshold: 0
                });
                (0, s.N7)(".js-home-repo-card", r => {
                    a.observe(r)
                })
            }
        },
        e => {
            var t = _(s => e(e.s = s), "__webpack_exec__");
            e.O(0, [5724], () => t(24346));
            var n = e.O()
        }
    ]);
})();

//# sourceMappingURL=home-d041f8a7119c.js.map