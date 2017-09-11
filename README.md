# moodle-filter_syntaxhighlighter

This is a filter plugin that uses a 3rd party Javascript module called [highlight.js](https://highlightjs.org/) to make your code look like something you'd see in an IDE.

Once activated, you just need to wrap your code in: `<pre><code></code></pre>` tags (You will need to activate html mode in Atto), or use the MarkDown style of using three back-ticks to wrap code (\```Code\```) and the javascript will style it.

The settings allows you to choose which style to use.

## Install
1.  Unzip
2.  Copy contents to `/filter/syntaxhighlighter`
3.  Activate from Manage filters.

## Change requests
Since this is a 3rd party plugin, any change requests that relate to the the styles and features of the highlighting should be directed to the [plugin author](https://github.com/isagalaev/highlight.js/issues).
