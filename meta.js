module.exports = {
  prompts: {
    name: {
      message: `What is the name of the new theme?`,
    },
    description: {
      message: `How would you descripe the new theme?`,
      default: `My superb Wordpress theme`
    },
    username: {
      message: `What is your GitHub username`,
      default: ''
    },
    email: {
      message: `What is your GitHub email`,
      default: ''
    },
    website: {
      message: `The URL of your website?`,
      default: ''
    }
  },
  completeMessage: 'To get started:\n\n  cd {{destDirName}}\n  yarn\n  yarn dev\n'
}
