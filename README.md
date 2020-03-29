# Fresh: Wordpress Starter Theme

This is a simple starting point for modern Wordpress theme development. 
It has support for cleaner templating via Twig (Timber plugin), and support for a modren CSS/JS workflow.

## Live Demo

https://fresh.webfresh.dev/

Bear in mind this is not intended to be a fully-featured theme. It is designed with flexibility in mind, with as little "bloat" as possible. The spacing and colors are all `_variables` in SASS, and the initial set of templates/views is very basic. 

For the sake of argument, this is just using a default color scheme similar to my portfolio website at: https://webfresh.dev 

## Required Wordpress Plugins

- Timber

## Development Dependencies

- Node/Npm
- Yarn

## Workflow

- Edit Twig templates in the `views` directory.
- Edit JS/CSS in the /src directory. 
- Run `yarn assets:build` to compile your changes. 
- You may alternatively run `yarn assets:watch` if you wish to watch the assets files for changes.
