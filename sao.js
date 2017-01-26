const superb = require('superb')

module.exports = {
  template: 'handlebars',
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
      message: 'The URL of your website?',
      default: 'https://www.ou.org',
      store: true
    },
    username: {
      message: 'What is your GitHub username?',
      role: 'git:name',
      store: true
    },
    email: {
      message: 'What is your GitHub email?',
      role: 'git:email',
      store: true
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
