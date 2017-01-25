const superb = require('superb')

module.exports = {
  prompts: {
    name: {
      message: 'What is the name of the new theme?',
      role: 'folder:name'
    },
    description: {
      message: 'How would you descripe the new theme?',
      default: `my ${superb()} theme`
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
    },
    website: {
      message: 'The URL of your website?',
      default({username}) {
        return `github.com/${username}`
      },
      store: true
    }
  },
  post({log, chalk, isNewFolder, folderName}) {
    log.success('Done!')
    if (isNewFolder) {
      log.info(`cd ${chalk.yellow(folderName)} to get started!`)
    }
  }
}
