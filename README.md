# template-wp-vue-webpack

> A modern starter theme for Wordpress which uses Vue 2, Vuex, Vue-router and Webpack 2

## Features

- Webpack 2
- Vue 2 / Vue-router / Vuex
- Hot reloading for single-file components
- Split vendor code from your app
- ESLint
- Babel 6
- SASS
- A boilerplate which is small and focuses on wordpress theme development

## Get Started

Make sure to install `node >=4` and `npm >=3`.

### For Windows users

Install `git with unix tools` before getting started.

## Usage

Install [SAO](https://github.com/egoist/sao) first.

Installing with yarn yields an error when running sao, so using npm for now.

```bash
$ sudo npm i -g sao
```

### From git

```bash
# will install the theme in the current directory
$ sao ilanco/template-wp-vue-webpack

# specify the target folder instead of using ./
$ sao ilanco/template-wp-vue-webpack new-theme
```

### From npm

```bash
# will install the theme in the current directory
$ sao wp-vue-webpack

# specify the target folder instead of using ./
$ sao wp-vue-webpack new-theme
```

## Folder Structure

The destination folder is `./dist`.

```bash
├── assets          # theme assets
├── build           # webpack config and build scripts
├── dist            # bundled files and index.html
│    ├── index.html
│    └── [...other bundled files]
├── lib             # wordpress specific functions
├── templates       # wordpress template files
├── tests           # tests
├── node_modules    # dependencies
├── config.json     # theme configuration
├── package.json    # package info
└── style.css       # wordpress style.css
```

## License

MIT &copy; [ilanco](https://github.com/ilanco)

## Credits
Made possible by [Orthodox Union](https://ou.org).
