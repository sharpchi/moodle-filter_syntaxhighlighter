define({
	init: function() {
		console.log("INIT HLJS HELPER");
		var attos = document.querySelectorAll(".editor_atto");
		var pres = document.querySelectorAll("pre");
		for (let pre of pres) {
			var is_editor = false;
			for (let atto of attos) {
				if (atto.contains(pre)) {
					is_editor = true;
					break;
				}
			}
			if (is_editor) continue;
			s = pre.innerHTML;
			var hl_re = /%highlight=(\w+)(\n|<br>)/;
			var lang = s.match(hl_re);
			if (lang && lang.length > 1) {
				s = s.replace(hl_re, '');
				s = s.replace(/<br>/g, '\n');
				var code = document.createElement("CODE");
				code.className = lang[1];
				code.innerHTML = s;
				pre.innerHTML = '';
				pre.appendChild(code);
			}
		}
	}
});

