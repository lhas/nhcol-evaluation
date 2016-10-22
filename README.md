# NHCOL Evaluation WP Plugin

A plugin for evaluations in WordPress.

## Shortcodes

* [nhcol-evaluation-badge] - It generates the Badge for user.
* [nhcol-evaluation-input] - It generates the Input Form.
* [nhcol-evaluation-output] - It generates the Output Data.

## Contents

The NHCOL Evaluation includes the following files:

* `.gitignore`. Used to exclude certain files from the repository.
* `CHANGELOG.md`. The list of changes to the core project.
* `README.md`. The file that you’re currently reading.
* A `nhcol-evaluation` directory that contains the source code - a fully executable WordPress plugin.

## Features

* All classes, functions, and variables are documented so that you know what you need to be changed.
* The project includes a `.pot` file as a starting point for internationalization.

## Installation

The NHCOL Evaluation can be installed directly into your plugins folder "as-is".

Note that this will activate the source code of the Boilerplate, but because the Boilerplate has no real functionality so no menu  items, meta boxes, or custom post types will be added.

## Recommended Tools

### i18n Tools

The NHCOL Evaluation uses a variable to store the text domain used when internationalizing strings throughout the plugin. To take advantage of this method, there are tools that are recommended for providing correct, translatable files:

* [Poedit](http://www.poedit.net/)
* [makepot](http://i18n.svn.wordpress.org/tools/trunk/)
* [i18n](https://github.com/grappler/i18n)

Any of the above tools should provide you with the proper tooling to internationalize the plugin.


## Important Notes

### Includes

Note that if you include your own classes, or third-party libraries, there are three locations in which said files may go:

* `nhcol-evaluation/includes` is where functionality shared between the admin area and the public-facing parts of the site reside
* `nhcol-evaluation/admin` is for all admin-specific functionality
* `nhcol-evaluation/public` is for all public-facing functionality

# Credits

NCHOL

## Documentation, FAQs, and More

Incoming.
