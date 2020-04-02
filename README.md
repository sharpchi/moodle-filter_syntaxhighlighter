# moodle-filter_syntaxhighlighter

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

apache, bash, coffeescript, cpp, cs, css, diff, http, ini, java, javascript, json, makefile, markdown, nginx, objectivec, perl, php, python, ruby, shell, sql, xml

## Install

1.  Unzip
2.  Copy contents to `/filter/syntaxhighlighter`
3.  Activate from Manage filters.

## Change requests

Since this is a 3rd party plugin, any change requests that relate to the the styles and features of the highlighting should be directed to the [plugin author](https://github.com/isagalaev/highlight.js/issues).

## Contributors

Thanks to the following contributors for improving this project:

- [lukeXcze](https://github.com/lukeXcze)