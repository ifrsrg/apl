## What needs to be done?

Most articles are stubs, with a couple links to pages to be used as a reference when writing the page.  The idea is to use the information on those links to help write the new ones.  Some of the old useradmin pages can probably be mostly copied, with a few improvements, others will be better to be completely rewritten.  If you ever have questions, please feel free to jump in the kohana irc channel.

## adminlines

Documentation should use complete sentences, good grammar, and be as clear as possible.  Use lots of example code, but make sure the examples follow the Kohana conventions and style.

Try to commit often, with each commit only changing a file or two, rather than changing a ton of files and commiting it all at once.  This will make it easier to offer feedback and merge your changes.   Make sure your commit messages are clear and descriptive.  Good: "Added initial draft of hello world tutorial."  Bad: "working on docs".

If you feel a menu needs to be rearranged or a module needs new pages, please open a [bug report](http://dev.kohanaframework.org/projects/useradmin3/issues/new) to discuss it.

## A brief explanation of how the useradmin works:

The useradmin uses [Markdown](http://daringfireball.net/projects/markdown/) and [Markdown Extra](http://michelf.com/projects/php-markdown/extra/) for the documentation.  Here is a short intro to [Markdown syntax](http://kohanut.com/docs/using.markdown), as well as the [complete admin](http://daringfireball.net/projects/markdown/syntax), and the things [Markdown Extra adds](http://michelf.com/projects/php-markdown/extra/).  Also read what the useradmin adds to markdown at the end of this readme.

### Useradmin pages

Useradmin pages are in the module they apply to, in `admin/<module>`. Documentation for Kohana is in `system/admin/kohana` and documentation for orm is in `modules/orm/admin/orm`, etc.

Each module has an index page at `admin/<module>/index.md`.

Each module's menu is in `admin/<module>/menu.md`. 

### Images

Any images used in the useradmin pages must be in `media/admin/<module>/`.  For example, if a useradmin page has `![Image Title](hello-world.jpg)` the image would be located at `media/admin/<module>/hello-world.jpg`.  Images for the ORM module are in `modules/orm/media/admin/orm`, and images for the Kohana docs are in `system/media/admin/kohana`.

### API browser

The API browser is generated from the actual source code.  The descriptions for classes, constants, properties, and methods is extracted from the comments and parsed in Markdown.  For example if you look in the comment for [Kohana_Core::init](http://github.com/kohana/core/blob/c443c44922ef13421f4a/classes/kohana/core.php#L5) you can see a markdown list and table.  These are parsed and show correctly in the API browser.  `@param`, `@uses`, `@throws`, `@returns` and other tags are parsed as well.

## How to Contribute

### If you don't know git, or you don't feel like you are a good documentation writer:

Just submit a [bug report](http://dev.kohanaframework.org/projects/useradmin3/issues/new) and explain what you think can be improved.  If you are a good writer but don't know git, just provide some content in your bug report and we will merge it in.

### If you know git:

**Bluehawk's forks all have a `docs` branch.  Please do all work in that branch.**

To make pulling all the docs branches easier, the "docs" branch of [http://github.com/bluehawk/kohana](http://github.com/bluehawk/kohana) contains git submodule links to all the other "docs" branches, so you can clone that to easily get all the docs.  The main Kohana docs are in [http://github.com/bluehawk/core/tree/docs/admin/kohana/], and docs for each module are in each module in the admin folder. (Again, make sure you are in the `docs` branch.)

**Short version**: Fork bluehawk's fork of the module whose docs you wish to improve (e.g. `git://github.com/bluehawk/orm.git` or `git://github.com/bluehawk/core.git`), checkout the `docs` branch, make changes, and then send bluehawk a pull request.

**Long version:**  (This still assumes you at least know your way around git, especially how submodules work.)

 1. Fork the specific repo you want to contribute to on github. (For example go to http://github.com/bluehawk/core and click the fork button.)

 1. To make pulling the new useradmin changes easier, I have created a branch of `kohana` called `docs` which contains git submodules of all the other doc branchs.  You can either manually add my remotes to your existing kohana repo, or create a new kohana install from mine by doing these commands:
	
		git clone git://github.com/bluehawk/kohana
		
		# Get the docs branch
		git checkout origin/docs
		
		# Fetch the system folder and all the modules
		git submodule init
		git submodule update

 1. Now go into the repo of the area of docs you want to contribute to and add your forked repo as a new remote, and push to it.
 
		cd system
		
		# make sure we are up to date with the docs branch
		git merge origin/docs
		(if this fails or you can't commit later type "git checkout -b docs" to create a local docs branch)
		
		# add your repository as a new remote
		git remote add <your name> git@github.com:<your name>/core.git
		
		# (make some changes to the docs)
		
		# now commit the changes and push to your repo
		git commit
		git push <your name> docs

 1. Send a pull request on github.


# What the useradmin adds to markdown:

In addition to the features and syntax of [Markdown](http://daringfireball.net/projects/markdown/) and [Markdown Extra](http://michelf.com/projects/php-markdown/extra/) the following apply to useradmin pages and api documentation:

### Namespacing

The first thing to note is that all urls are "namespaced". The name of the module is automatically added to links and image urls, you do not need to include it.  For example, to link to the hello world tutorial page from another page in the Kohana useradmin, you should use `[Hello World Tutorial](tutorials/hello-world)` rather than `(kohana/tutorials/hello-world)`.  To link to pages in a different section of the admin, you can use `../`, for example `[Cache](../cache/usage)`.

### Notes

If you put [!!] in front of line it will be a note, put in a box with a lightbulb.

    [!!] This is a note.

### Headers automatically get IDs

Headers are automatically assigned an id, based on the content of the header, so each header can be linked to.  You can manually assign a different id using the syntax as defined in Markdown Extra.  If multiple headers have the same content, like if more than one header is "Examples", only the first will get be automatically assigned an id, so you should manually assign more descriptive ids.  For example:

    ### Examples     {#header-id-examples}

### API links

You can make links to the api browser by wrapping any class name in brackets.  You may also include a function and it will link to that function.  All of the following will link to the API browser:

    [Request]
	[Request::factory]
	[Request::factory()]

If you want to have parameters, only put the brackets around the class and function (not the params), and put a backslash in front of the opening parenthesis. 

	[Kohana::$config]\('foobar','baz')

### Including Views

You may include a view by putting the name of the view in double curly brackets.  **If the view is not found, no exception or error will be shown!** The curly brackets and view will simply be shown an the page as is.

    {{some/view}}