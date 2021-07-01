module.exports = {
  stories: ['../src/**/*.stories.mdx', '../src/**/*.stories.@(js|jsx|ts|tsx|svelte)'],
  addons: [
    '@storybook/addon-links',
    '@storybook/addon-essentials',
    '@storybook/addon-svelte-csf',
    'storybook-dark-mode',
    'storybook-addon-apollo-client',
    '@storybook/addon-storysource'
  ],
  svelteOptions: {
    preprocess: import('../svelte.config.js').preprocess
  }
};
