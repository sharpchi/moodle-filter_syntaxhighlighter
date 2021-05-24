moodle-filter_syntaxhighlighter
===============================

[![Moodle Plugin CI](https://github.com/sharpchi/moodle-filter_syntaxhighlighter/workflows/Moodle%20Plugin%20CI/badge.svg?branch=master)](https://github.com/sharpchi/moodle-filter_syntaxhighlighter/actions?query=workflow%3A%22Moodle+Plugin+CI%22+branch%3Amaster)

This is a filter plugin that uses a 3rd party Javascript module called [highlight.js](https://highlightjs.org/) to make your code look like something you'd see in an IDE.

Once activated, you just need to wrap your code in: `<pre><code></code></pre>` tags (You will need to activate html mode in Atto), or use the MarkDown style of using three back-ticks to wrap code (\`\`\`Code\`\`\`) and the javascript will style it.

The settings allows you to choose which style to use.

## Specify language

Syntaxhighlighter will automatically detect which language you are using, but if you wish to specify a language, you can do so like this:
<pre><code>
```lang:php;;
echo "Hello world!";
```
</code></pre>

Alternatively, you can specify the language in a `<code>` tag: `<pre><code class="language-php">echo "Hello world";</code></pre>`

## Available languages

apache, arduino, bash, coffeescript, cpp, cs, css, delphi, diff, django, dockerfile, dsconfig, erb, fortran, gauss, gherkin, go, haml, handlebars, haskell, http, ini, java, javascript, json, kotlin, less, lisp, livescript, lua, makefile, markdown, mathematica, matlab, nginx, objectivec, perl, php, plaintext, powershell, prolog, properties, puppet, python, qml, r, ruby, rust, scala, scss, shell, swift, sql, tcl, twig, typescript, vala, vbnet, vbscript, vbscript-html, xml, x86asm, yaml

## Turning off the filter in context

If you want more control over the presentation of `<pre><code></code></pre>` contexts, change the filter's settings at the *site level* to 'Off, but available'. You can then switch it on in the contexts you wish.

Alternatively, by adding the class 'nohighlight' to the code tag, highlighting is stopped. i.e.

`<pre><code class="nohighlight">My code</code></pre>`

## Install

1.  Unzip
2.  Copy contents to `/filter/syntaxhighlighter`
3.  Activate from Manage filters.

## Change requests

Since this is a 3rd party plugin, any change requests that relate to the the styles and features of the highlighting should be directed to the [plugin author](https://github.com/isagalaev/highlight.js/issues).

## Contributors

Thanks to the following contributors for improving this project:

- [lucaboesch](https://github.com/lucaboesch)
- [lukeXcze](https://github.com/lukeXcze)