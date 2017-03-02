const superb = require('superb')

module.exports = {
  template: 'handlebars',
  templateOptions: {
    helpers: {
      if_or(v1, v2, options) {
        if (v1 || v2) {
          return options.fn(this)
        }
        return options.inverse(this)
      }
    }
  },
  prompts: {
    name: {
      required: true,
      message: 'What is the name of the new theme?',
      role: 'folder:name'
    },
    description: {
      required: false,
      message: 'How would you describe the new theme?',
      default: `my ${superb()} theme`
    },
    title: {
      message: 'The title of your website?',
      default: 'Orthodox Union',
      store: true
    },
    website: {
      message: 'The URL of your production website (no trailing slash)?',
      default: 'https://www.ou.org',
      store: true
    },
    dev_website: {
      message: 'The URL of your local development website (no trailing slash)?',
      default({website}) {
        var url = website.split("/")

        return `${url[0]}//local.${url[2]}`
      },
      store: true
    },
    text_domain: {
      message: 'Domain to retrieve the translated text?',
      default({name}) {
        return `${name}`
      },
      store: true
    },
    username: {
      message: 'What is your GitHub username?',
      role: 'git:username',
      store: true
    },
    email: {
      message: 'What is your GitHub email?',
      role: 'git:email',
      store: true
    },
    eslint: {
      type: 'confirm',
      message: "Use ESLint to lint your code?"
    }
  },
  filters: {
    '.eslintrc': 'eslint'
  },
  post({log, chalk, isNewFolder, folderName}) {
    log.success('Done!')
    if (isNewFolder) {
      log.info(`cd ${chalk.yellow(folderName)} to get started!`)
    }

    console.log('  yarn install')
    console.log('  yarn dev')

    console.log(chalk.green('\n  To build for production:\n'))
    console.log('  yarn build\n')
  }
}
