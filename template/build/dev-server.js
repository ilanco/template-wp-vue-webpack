const express = require('express')
const fs = require('fs')
const https = require('https')
const path = require('path')
const webpack = require('webpack')

const config = require('../config')
const webpackConfig = require('./webpack.dev.conf')

var projectRoot = path.resolve(__dirname, '../')

// default port where dev server listens for incoming traffic
var port = process.env.PORT || config.devPort

// add hot-reload related code to entry chunks
Object.keys(webpackConfig.entry).forEach(function (name) {
  var hmrPath = config.devUrl + ':' + port + '/__webpack_hmr'
  webpackConfig.entry[name] = [
    'eventsource-polyfill',
    'webpack-hot-middleware/client?reload=true&path=' + hmrPath
  ].concat(webpackConfig.entry[name])
})

var app = express()
var compiler = webpack(webpackConfig)

var devMiddleware = require('webpack-dev-middleware')(compiler, {
  publicPath: webpackConfig.output.publicPath,
  stats: {
    colors: true,
    chunks: false
  },
  watchOptions: {
    poll: 1000,
    aggregateTimeout: 300
  }
})

var hotMiddleware = require('webpack-hot-middleware')(compiler, {
  log: console.log
})

// force page reload when html-webpack-plugin template changes
compiler.plugin('compilation', function (compilation) {
  compilation.plugin('html-webpack-plugin-after-emit', function (data, cb) {
    hotMiddleware.publish({ action: 'reload' })
    cb()
  })
})

// handle fallback for HTML5 history API
app.use(require('connect-history-api-fallback')())

// serve webpack bundle output
app.use(devMiddleware)

// enable hot-reload and state-preserving
app.use(hotMiddleware)

var key = fs.readFileSync(path.join(projectRoot, 'build', 'localhost.key'), 'utf8')
var cert = fs.readFileSync(path.join(projectRoot, 'build', 'localhost.cert'), 'utf8')
var httpsServer = https.createServer({key: key, cert: cert}, app)

module.exports = httpsServer.listen(port, '0.0.0.0', function onStart(err) {
  if (err) {
    console.log(err)
    return
  }

  var uri = config.devUrl + ':' + port
  console.info('==> Listening on port %s. Open up %s in your browser.', port, uri)
})
