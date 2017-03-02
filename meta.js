module.exports = {
  helpers: {
    if_or: function (v1, v2, options) {
      if (v1 || v2) {
        return options.fn(this)
      }
      return options.inverse(this)
    }
  },
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
      message: 'The URL of your production website (no trailing slash)?',
      default: 'https://www.ou.org'
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
      }
    },
    username: {
      type: "string",
      message: "What is your GitHub username"
    },
    email: {
      type: "string",
      message: "What is your GitHub email"
    },
    eslint: {
      type: "confirm",
      message: "Use ESLint to lint your code?"
    },
  },
  completeMessage: 'To get started:\n\n  cd {{destDirName}}\n  yarn\n  yarn dev\n'
}
