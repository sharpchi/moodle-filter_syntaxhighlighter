define({
	init: function() {
		console.log("INIT HLJS HELPER");
		var pres = document.querySelectorAll("pre");
		for (let pre of pres) {
			s = pre.innerHTML;
			var hl_re = /%highlight=(\w+)\n/;
			var lang = s.match(hl_re);
			if (lang && lang.length > 1) {
				s = s.replace(hl_re, '');
				var code = document.createElement("CODE");
				code.className = lang[1];
				code.innerHTML = s;
				pre.innerHTML = '';
				pre.appendChild(code);
			}
		}
	}
});

