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

## Development server

Before running the dev server, we need to run `npm install` (or `yarn install`)
in the theme root folder.

```bash
# will install the necessary node modules
$ npm instal
```

When all node modules are installed we can run the development server.

```bash
$ npm run dev
```

The assets will be available from your chosen url at port 3000. The scheme is
https, and the certificate needs to be added to the list of exceptions.
Navigate with your browser to [https://website.local:3000](https://website.local:3000)
where website.local is the url to your local vm or localhost. Accept the
certificate and navigate to your wordpress setup. The assets will be loaded
from the dev server with hot module reloading enabled.

## Compile for production

```bash
# will compile all assets for production
$ npm run build:production
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
