# phpBB Http Rewriter

tested and designed for phpBB 3.2.x

## What does this extension do?

Say you want your forum to run over https instead of http, you'll likely have users posting images 
loading over http. This will generate the mixed content errors and render your https practically 
useless. 

Using this simple extension postcontent is checked and cleaned from any http used in the `[img][/img]` tags.

Very simple and effective. Feel free to use this extension, if you have suggestions or complaints feel free to
open issues and/or to contact me. 