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
    username: {
      type: "string",
      message: "What is your GitHub username"
    },
    email: {
      type: "string",
      message: "What is your GitHub email"
    },
    website: {
      message: "The URL of your website?",
    }
  },
  completeMessage: 'To get started:\n\n  cd {{destDirName}}\n  yarn\n  yarn dev\n'
}
