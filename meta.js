module.exports = {
  prompts: {
    name: {
      type: "string",
      required: true,
      message: "What is the name of the new theme?"
    },
    description: {
      type: "string",
      required: false,
      message: "How would you describe the new theme?",
      default: "My superb Wordpress theme"
    },
    title: {
      message: 'The title of your website?',
      default: 'Orthodox Union'
    },
    website: {
      message: 'The URL of your website?',
      default: 'https://www.ou.org'
    },
    username: {
      type: "string",
      message: "What is your GitHub username"
    },
    email: {
      type: "string",
      message: "What is your GitHub email"
    },
  },
  completeMessage: 'To get started:\n\n  cd {{destDirName}}\n  yarn\n  yarn dev\n'
}
