define({
  init: function() {
		console.log("INIT");
    var codes = document.querySelectorAll("pre > code");
    for (let code of codes) {
			s = code.innerHTML;
			s = s.replace(/<p>/g, '');
			s = s.replace(/<\/p>/g, '<br>');
			code.innerHTML = s
			console.log(code.innerHTML);
      code.innerHTML = code.innerText.trim();
			console.log(code.innerHTML);
    }
  }
});

